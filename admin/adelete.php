<?php
include('config/dbcon.php');
include('auth.php');
   $user_id = $_GET['user_id'];
   $query= "DELETE FROM users WHERE id='$user_id'";
     $query_run = mysqli_query($con, $query);
     if($query_run)
     {
         $_SESSION['status']= "admin deleted Successfully";
         header("Location:admin.php");
     }
else
{
 $_SESSION['status']= "admin not deleted ";
 header("Location:admin.php");
}





?>