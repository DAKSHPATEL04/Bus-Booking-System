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
      Admin Info
    </div>
    <div class="form">
       <div class="inputfield">
                    
                           <form action="admincode.php" method="POST">
                                          <div class="modal-body">
                                          <?php
       
                                        if(isset($_SESSION['auth']))
                                        {
                                        $uid= $_SESSION['auth_user']['user_id']; 
                                        
                                    $query = "SELECT * FROM users where id='$uid'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                             
                                                <div class="inputfield">
                                                  <input type="hidden" name="user" class="input" value="<?php echo $row['id']; ?>">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" class="input" value="<?php echo $row['name']; ?>" placeholder="name" disabled>
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" name="phone" class="input" value="<?php echo $row['phone']; ?>" placeholder="phone number" disabled >
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Username</label>
                                                <input type="text" name="username" class="input" value="<?php echo $row['username']; ?>" placeholder="username" disabled>
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" class="input" value="<?php echo $row['password']; ?>" placeholder="password" disabled>
                                                        </div>
                                             
                          
                                                    

                                                        <?php
                                                                
                                                                
                                                                
                                                              }
                                                                                      }
                                                                                          }
                                                                                           ?>
                          

                                                                    <div class="inputfield">
                                                                       <a href="index.php" class="btn">Back</a>
                                                                    </div>
                                                                    <div class="inputfield">
                                                                    <a href="adminpedit.php?user_id=<?php echo $row['id'];?>" class="btn">Edit</a>                                                                    </div>
                                          </div>
                                                                </form>
                                                            </div>                
                                                       </div>
                                                 </div>
                                               </div>
                                           </div>
 </body>
    
 </html>
                        
                       
                       
                    
                           
                        
                    
                          
                