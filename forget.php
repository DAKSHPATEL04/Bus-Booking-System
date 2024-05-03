<?php

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
            echo '<script>alert("Your current password is wrong");</script>';
        }
    }
    else
    {
        echo '<script>alert("Your password not match");</script>';
    }
  
}

?>

<html>
    <head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<link rel="stylesheet" href="forget.css">
    </head>
    <body>
<div class="container forget-password">
            <div class="row">
                <div class="col-md-12 col-md-offset-4">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="text-center">
                                <img src="https://i.ibb.co/rshckyB/car-key.png" alt="car-key" border="0"  />
                                <h2 class="text-center"><b>Forgot Password?</b></h2>
                                <div class="text">
                                <p><b>You can reset your password here.</b></p>
                                </div>
                                <form id="register-form" role="form" autocomplete="off" class="form" method="post" action="">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="name" name="name" minlength="3" maxlength="12" required>
                                        </div>
                                    </div><b>
                                    <div class="form-group">
                                        <div class="input-group">
                                           <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                           <input type="password" class="form-control" placeholder="password" name="password" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." required>
                                        </div>
                                    </div>
                                        <div class="form-group">
                                        <div class="input-group">
                                           <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                                           <input type="password" class="form-control" placeholder="Confrim password" name="confirmpassword" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." required>
                                        </div>
                                    </div></b>
                                    <div class="form-group">
                                        <input name="submit" class="btn btn-lg btn-primary btn-block btnForget" value="Reset Password" type="submit">
                                        <a href="index.php">Back</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
