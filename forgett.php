<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');

if(isset($_POST['submit']))
{
    
    $name = $_POST['name'];  
   
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];

    $sql= "SELECT ID FROM userss WHERE name='$name'";
    $sql_run = mysqli_query($con,$sql);

    if(mysqli_num_rows($sql_run) > 0)
    {
        if($password == $conpassword)
        {
            
        
        

        
            $checkusername = "UPDATE userss SET password='$password' where name='$name'";
            $checkusername_run = mysqli_query($con,$checkusername);
            echo '<script>alert("Your password successully changed")</script>';
            echo "<script>window.location.href ='login.php'</script>";
        }
        else
        {
            echo '<script>alert("Your current password is wrong")</script>';
        }
    }
    else
    {
        echo '<script>alert("Your password not match")</script>';
    }
  
}

?>