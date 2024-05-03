<?php
include('./admin/auth.php');
    include('./admin/config/dbcon.php');

   
   
   

    if(isset($_POST['check_username']))
    {
        $username = $_POST['username'];

        $checkusername = "SELECT username FROM userss WHERE username ='$username'";
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
        $username =trim($_POST["username"]);
        $password = $_POST['password'];
        $conpassword = $_POST['confirmpassword'];

        if($password == $conpassword)
        {
            $checkusername = "SELECT username FROM userss WHERE username ='$username'";
            $checkusername_run = mysqli_query($con,$checkusername);

            if(mysqli_num_rows($checkusername_run) > 0)
            {
              $_SESSION['status']= "Username Taken";
              header("Location:login.php");
              exit;
            }
              else{
                $user_query = "INSERT into userss(id,name,username,password) values('$name','$username','$password')";
                $user_query_run = mysqli_query($con ,$user_query);
                if($user_query_run)
                {
                    $_SESSION['status']= "Users Added Successfully";
                    header("Location:login.php");
                }
           else
           {
            $_SESSION['status']= "Users not Added ";
            header("Location:login.php");
           }

            }
        }

      else {

        $_SESSION['status']= "Password not match ";
        header("Location:login.php");

      }
     
    }

?>