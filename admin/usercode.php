<?php

    include('config/dbcon.php');
    include('auth.php');

    if(isset($_POST['update']))
    {
        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        
        $username =trim($_POST["username"]);
        $password = $_POST['password'];

        $query= "UPDATE userss SET name='$name', username='$username',password='$password' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Users updated Successfully";
            header("Location:user.php");
        }
   else
   {
    $_SESSION['status']= "Users not updated ";
    header("Location:user.php");
   }
    }
?>