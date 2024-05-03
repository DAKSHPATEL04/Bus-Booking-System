<?php

include('../admin/auth.php');
include('../admin/config/dbcon.php');


    if(isset($_POST['update']))
    {
        $user_id = $_POST['id'];
        $name = $_POST['cname'];
        $dob = $_POST['dob'];
        $add = $_POST['address'];
        $city = $_POST['city'];
        $st = $_POST['state'];
        $pin = $_POST['pincode'];
 
        $query= "UPDATE userss SET name='$name', dob='$dob', address='$add', city='$city', state='$st', pincode='$pin' WHERE id='$user_id'";
        $query_run = mysqli_query($con, $query);
        if($query_run)
        {
            echo"<script>
            alert('User Updated  Successfully'); 
            window.location.href='profile.php';
            </script>"; 
        }
   else
   {
    echo"<script>
    alert('User Updated Not Successfully'); 
    window.location.href='edit.php';
    </script>";
   }
    }
   
?>