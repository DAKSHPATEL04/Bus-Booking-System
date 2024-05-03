<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="registered.css">
    <title>Admin Panel</title>
    <?php
    include('auth.php');
    include('includes/sidebar.php');
     include('includes/topbar.php');
     include('config/dbcon.php');
     ?>
</head>

<body>
    

<!-- partial:index.partial.html -->
<div class="container">
<div class="content"> 
<div class="wrapper">
    <div class="title">
      Add admin
    </div>
    <form action="admincode.php" method="POST">
    <div class="form">
       <div class="inputfield"> 
        <label for="">Name</label>
        <input type="text" name="name" class="input" placeholder="name" minlength="3" maxlength="12" required>
          </div>
          <div class="inputfield">
        <label for="">Phone Number</label>
        <input type="text" name="phone" class="input" placeholder="phone number" minlength="10" maxlength="10" required>
          </div>
          <div class="inputfield">
        <label for="">Username</label>
        <input type="text" name="username" class="input"  minlength="3" maxlength="12" placeholder="username" required>
          </div>

                <div class="inputfield">
                  <label for="">Password</label>
                  <input type="password" name="password" class="input" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." placeholder="password" required>
                </div>
              
               
                  <div class="inputfield">
                    <label for="">Confirm Password</label>
                    <input type="password" name="confirmpassword" class="input" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6." placeholder="confirm password" required>
                  </div>
                 <div class="inputfield">
                   <button type="submit" class="btn" data-dismiss="modal" name="adduser">Save</button>
                   </div>
                  <div class="inputfield"> 
               <a href="admin.php" class="btn">Back</a>
                </div>
           </div>
</form>
    </div>
    </div>
 </div>


    </body>
    
    </html>