<?php
    session_start();
    if(isset($_SESSION['auth']))
    {
        $_SESSION['status']= "You Are Logged In";
        header('Location: index.php');
        exit(0);
    }
 ?>
  
   <link rel="stylesheet" href="login.css">
   <script src="login.js"></script>
   <title>Admin Panel</title>
  <div class="login-page">
        <div class="form">
            <form  action="logincode.php" method="post" class="login-form">
                <h2>SIGN IN TO YOUR ACCOUNT</h2>
                <input type="text" required name="username" placeholder="Username" id="user" autocomplete="off" />
                <input oninput="return formvalid()" name="password" type="password" required placeholder="Password" id="pass" autocomplete="off" />
                <img src="image/eye.png"
                    onclick="show()" id="showimg">
                <span id="vaild-pass"></span>
                <button type="submit" name="login_btn">SIGN IN</button>
                <p class="message"><a href="../index.php">Back</a></p>
            </form>
        </div>
    </div>