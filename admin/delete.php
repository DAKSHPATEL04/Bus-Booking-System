<?php
include('config/dbcon.php');
include('auth.php');
      $route_id = $_GET['route_id'];
      $query= "DELETE FROM route WHERE id='$route_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            $_SESSION['status']= "Route deleted Successfully";
            header("Location:route.php");
        }
   else
   {
    $_SESSION['status']= "Route not deleted ";
    header("Location:route.php");
   }


?>
