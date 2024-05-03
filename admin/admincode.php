<?php
session_start();
include('auth.php');
include('config/dbcon.php');
if(isset($_POST['update']))
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $username =trim($_POST["username"]);
        $password = $_POST['password'];

        $query= "UPDATE users SET name='$name', phone='$phone', username='$username',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Users updated Successfully";
            header("Location:admin.php");
        }
   else
   {
    $_SESSION['status']= "Users not updated ";
    header("Location:admin.php");
   }



}

                           if (isset($_POST['delete'])) {
                               $user_id = $_POST['delete_id'];
                               $query = "DELETE FROM users WHERE id='$user_id'";
                               $query_run = mysqli_query($con, $query);
                               if ($query_run) {
                                   $_SESSION['status'] = "Users deleted Successfully";
                                   header("Location:admin.php");
                               } else {
                                   $_SESSION['status'] = "Users not deleted ";
                                   header("Location:admin.php");
                               }
                           }

           
                           if(isset($_POST['check_username']))
                           {
                               $username = $_POST['username'];
                       
                               $checkusername = "SELECT username FROM users WHERE username ='$username'";
                               $checkusername_run = mysqli_query($con,$checkusername);
                       
                               if(mysqli_num_rows($checkusername_run) > 0)
                               {
                                echo "username taken";
                               }
                               else 
                               {
                                   echo "it available";    
                               }
                       
                       
                           }
                                        
 if(isset($_POST['adduser']))
    {
        $name = $_POST['name'];
        $phone = $_POST['phone'];
        $username =trim($_POST["username"]);
        $password = $_POST['password'];
        $conpassword = $_POST['confirmpassword'];

        if($password == $conpassword)
        {
            $checkusername = "SELECT username FROM users WHERE username ='$username'";
            $checkusername_run = mysqli_query($con,$checkusername);

            if(mysqli_num_rows($checkusername_run) > 0)
            {
              $_SESSION['status']= "Username Taken";
              header("Location:admin.php");
              exit;
            }
              else{
                $user_query = "INSERT into users(name,phone,username,password) values('$name','$phone','$username','$password')";
                $user_query_run = mysqli_query($con ,$user_query);
                if($user_query_run)
                {
                    $_SESSION['status']= "Users Added Successfully";
                    header("Location:admin.php");
                }
           else
           {
            $_SESSION['status']= "Users not Added ";
            header("Location:admin.php");
           }

            }
        }

      else {

        $_SESSION['status']= "Password not match ";
        header("Location:admin.php");

      }
        }




        if(isset($_POST['logout_btn']))
        {
          //session_destroy();
          unset($_SESSION['auth']);
          unset($_SESSION['auth_user']);
    
          $_SESSION['status'] = "logged out successfully";
          header("Location: ../index.php");
          exit(0);
        }               
?>
