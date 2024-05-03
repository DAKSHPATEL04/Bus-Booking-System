<?php
include('../admin/auth.php');
include('../admin/config/dbcon.php');

if (isset($_SESSION['auth'])) {
    $uid = $_SESSION['auth_user']['user_id'];

    $user = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM userss WHERE id = $uid"));
}
?>

-
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="profile.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <title>Bus India | Profile</title>
</head>

<body style="font-size: 18.5px;">

    <!-- header section starts  -->

    <header style="padding: 0rem 9%;">

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="../user.php" class="logo"><span>B</span>US INDIA</a>

        <nav class="navbar" style="padding-top: 20px;">
            <a href="../user.php"> Home</a>

            <a href="../ticket.php">Ticket</a>
            <a href="profile.php">

                <?php
                if (isset($_SESSION['auth'])) {
                    echo $_SESSION['auth_user']['user_name'];
                } else {
                    echo "not logged in";
                }
                ?></a>

            <a href="../logout.php">Logout</a>
        </nav>


    </header>

    <!-- header section ends -->

    <!-- login form container  -->



    <!-- home section starts  -->



    <!-- home section ends -->

    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading">

        </h1>

        <div class="row">





        </div>

    </section>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <?php
            if (isset($_SESSION['auth'])) {
                $uid = $_SESSION['auth_user']['user_id'];

                $query = "SELECT * FROM userss where id='$uid'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
            ?>
                        <div class="profile-nav col-md-3">
                            <div class="panel">
                                <div class="user-heading round">


                                    <form class="form" id="form" action="" enctype="multipart/form-data" method="post">
                                        <div class="upload">
                                            <?php
                                            $id = $user["id"];
                                            $name = $user["name"];
                                            $image = $user["image"];
                                            ?>
                                            <img src="../profile/img/<?php echo $image; ?>" width=125 height=125 title="<?php echo $image; ?>">
                                            <div class="round">
                                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                                                <input type="hidden" name="name" value="<?php echo $name; ?>">
                                                <input type="file" name="image" id="image" accept=".jpg, .jpeg, .png">
                                                <i class="fa fa-camera" style="color: #fff;padding-top: 6px;"></i>
                                            </div>

                                        </div>
                                        <h1><?php echo $row['name']; ?></h1>
                                        <p>Joined on: <?php echo $row['created_at'] ?></p>
                                    </form>
                                    <script type="text/javascript">
                                        document.getElementById("image").onchange = function() {
                                            document.getElementById("form").submit();
                                        };
                                    </script>

                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="message.php"> <i class="fa fa-envelope "></i> Message <span class="label label-warning pull-right r-activity"></span></a></li>
                                    <li class="active"><a href="edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                    <li><a href="chp.php"> <i class="fa fa-key"></i> Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-info col-md-9">

                            <div class="panel">
                                <div class="bio-graph-heading">
                                    <b> EDIT PROFILE</b>
                                </div>
                                <form method="post" action="update.php">

                                    <div class="panel-body bio-graph-info">

                                        <div class="row" style="font-size: 16.5px;">
                                            <form method="post" action="update.php" enctype="multipart/form-data">
                                                <div class="bio-row">
                                                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                                    <p><span>User Name :</span> </p>
                                                    <input type="text" value="<?php echo $row['username']; ?>" disabled style="border:1px solid #333">
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Name :</span> </p>
                                                    <input type="text" name="cname" value="<?php echo $row['name']; ?>" style="border:1px solid #333">
                                                </div>


                                                <div class="bio-row">
                                                    <p><span>Address :</span> </p>
                                                    <textarea name="address" value="" style="border:1px solid #333"><?php echo $row['address']; ?></textarea>

                                                </div>
                                                <div class="bio-row">
                                                    <p><span>City :</span> </p>
                                                    <input type="text" name="city" value="<?php echo $row['city']; ?> " style="border:1px solid #333">
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>State :</span> </p>
                                                    <input type="text" name="state" value="<?php echo $row['state']; ?>" style="border:1px solid #333">
                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Pincode :</span> </p>
                                                    <input type="text" name="pincode" value="<?php echo $row['pincode']; ?>  " style="border:1px solid #333">

                                                </div>
                                                <div class="bio-row">
                                                    <p><span>Birth Date:</span> </p>
                                                    <input type="date" name="dob" value="<?php echo $row['dob']; ?>" style="border:1px solid #333">
                                                </div>


                                                <input type="submit" name="update" value="Save" class="btn btn-primary" style="position: relative;left: 12rem; top: 2rem; margin-bottom: 9rem;">

                                                </from>
                                        </div>
                                    </div>

                            </div>
                            <div>
                            </div>
                        </div>
        </div>
    </div>

<?php



                    }
                }
            }
?>

</div>
</div>
</div>
</div>




<!-- book section ends -->

<!-- packages section starts  -->



<!-- packages section ends -->

<!-- services section starts  -->


<!-- services section ends -->

<!-- gallery section starts  -->



<!-- gallery section ends -->

<!-- review section starts  -->



<!-- review section ends -->

<!-- contact section starts  -->



<!-- contact section ends -->

<!-- brand section  -->


<!-- footer section  -->

<section class="footer" style="padding: 0.52rem 9%;margin-top: 23.3rem;">

    <div class="box-container">



    </div>

    <h1 class="credit"> created by: Bus India<span> </span> | &#169 2024 all rights reserved! </h1>


</section>
<?php
if (isset($_FILES["image"]["name"])) {
    $id = $_POST["id"];
    $name = $_POST["name"];

    $imageName = $_FILES["image"]["name"];
    $imageSize = $_FILES["image"]["size"];
    $tmpName = $_FILES["image"]["tmp_name"];

    // Image validation
    $validImageExtension = ['jpg', 'jpeg', 'png'];
    $imageExtension = explode('.', $imageName);
    $imageExtension = strtolower(end($imageExtension));
    if (!in_array($imageExtension, $validImageExtension)) {
        echo
        "
        <script>
          alert('Invalid Image Extension');
          document.location.href = 'edit.php';
        </script>
        ";
    } elseif ($imageSize > 1200000) {
        echo
        "
        <script>
          alert('Image Size Is Too Large');
          document.location.href = 'edit.php';
        </script>
        ";
    } else {
        $newImageName = $name; // Generate new image name
        $newImageName .= '.' . $imageExtension;
        $query = "UPDATE userss SET image = '$newImageName' WHERE id = $id";
        mysqli_query($con, $query);
        move_uploaded_file($tmpName, '../profile/img/' . $newImageName);
        echo
        "
        <script>
        document.location.href = 'profile.php';
        </script>
        ";
    }
}




?>











<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="../script.js"></script>

</body>

</html>