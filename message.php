<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');

if(isset($_POST['sendbtn']))
    {   
        $uid=$_SESSION['auth_user']['user_id']; 
        $name = $_POST['name'];
        $email = $_POST['email'];
        $number = $_POST['number'];      
        $subject = $_POST['subject']; 
        $message = $_POST['message'];       
                $user_query = "INSERT into message(uid,name,email,number,subject,message) values('$uid','$name','$email','$number','$subject','$message')";
                $user_query_run = mysqli_query($con ,$user_query);
                if($user_query_run)
                {
                    echo"<script>
                    alert('Message Sent! Wait for reply');
                    window.location.href='user.php';
                    </script>";
                }
           else
           {
           
            header("Location:user.php");
           }
  }
  ?>
  