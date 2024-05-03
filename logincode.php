<?php

session_start();
include('./admin/config/dbcon.php');

if (isset($_POST['logout_btn'])) {
    session_destroy();
    unset($_SESSION['auth']);
    unset($_SESSION['auth_user']);

    $_SESSION['status'] = "logged out successfully";
    header("Location: login.php");
    exit(0);
}

if (isset($_POST['login_btn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $log_query = "SELECT * FROM userss WHERE username='$username' AND password='$password'   LIMIT 1";
    $log_query_run = mysqli_query($con, $log_query);

    if (mysqli_num_rows($log_query_run) > 0) {
        foreach ($log_query_run as $row) {
            $user_id = $row['id'];
            $user_name = $row['name'];
            $user_username = $row['username'];
        }

        $_SESSION['auth'] = true;
        $_SESSION['auth_user'] = [
            'user_id' => $user_id,
            'user_name' => $user_name,
            'user_username' => $user_username,

        ];

        echo "<script>
        alert('Welcome $username');
        window.location.href='user.php';
        </script>";
    } else {
        echo "<script>
      alert(' Credential Not Matched');
      window.location.href='login.php';
      </script>";
    }
}

?>

<?php
if (isset($_POST['adduser'])) {
    $name = $_POST['name'];
    $username = trim($_POST["username"]);
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];
    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    // Define the folder where you want to store the uploaded file
    $folder = "profile/upload_img/" . $filename;

    // Check if passwords match
    if ($password == $conpassword) {
        // Create a prepared statement to check if the username already exists
        $checkusername = "SELECT username FROM userss WHERE username = ?";
        $stmt_check = mysqli_prepare($con, $checkusername);
        mysqli_stmt_bind_param($stmt_check, "s", $username);

        // Check for errors in the prepared statement
        if (!$stmt_check) {
            die("Error in prepared statement: " . mysqli_error($con));
        }

        mysqli_stmt_execute($stmt_check);
        mysqli_stmt_store_result($stmt_check);

        if (mysqli_stmt_num_rows($stmt_check) > 0) {
            echo "<script>
                alert('Username Taken');
                window.location.href='login.php';
                </script>";
            exit;
        } else {
            // Insert the new user using a different prepared statement
            $user_query = "INSERT INTO userss (name, username, password, image) VALUES (?, ?, ?, ?)";
            $stmt_insert = mysqli_prepare($con, $user_query);

            // Check for errors in the prepared statement
            if (!$stmt_insert) {
                die("Error in prepared statement: " . mysqli_error($con));
            }

            // Hash the password for security
            // $hashed_password = password_hash($password, PASSWORD_DEFAULT);
            mysqli_stmt_bind_param($stmt_insert, "ssss", $name, $username, $password, $filename);

            if (mysqli_stmt_execute($stmt_insert)) {
                // Move the uploaded file to the destination folder
                if (move_uploaded_file($tempname, $folder)) {
                    echo "<script>
                        alert('User Added Successfully');
                        window.location.href='login.php';
                        </script>";
                } else {
                    echo "<script>
                        alert('Error moving uploaded file');
                        window.location.href='login.php';
                        </script>";
                }
            } else {
                echo "<script>
                    alert('Error adding user: " . mysqli_error($con) . "');
                    window.location.href='login.php';
                    </script>";
            }
        }
    } else {
        echo "<script>
            alert('Passwords do not match');
            window.location.href='login.php';
            </script>";
    }
}
?>
