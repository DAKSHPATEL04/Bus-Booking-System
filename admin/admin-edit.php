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
<div class="content" style="
    top: 90px;
"> 
<div class="wrapper">
    <div class="title">
      Edit Admin
    </div>
    <div class="form">
       <div class="inputfield">
                    
                           <form action="index.php" method="POST">
                                          <div class="modal-body">
                                        <?php
                                    if(isset($_GET['route_id']))
                                    {
                                    $route_id = $_GET['route_id'];
                                    $query = "SELECT * FROM route WHERE id='$route_id'";
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
                                                        <div class="inputfieldinputfield">
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
                                                                else
                                                                {
                                                                echo "<h4>No Record Found. !</h4>";
                                                                }
                                                                }
                                                                 ?>

                                                                    <div class="inputfield">
                                                                        <button type="submit" name="update" class="btn">Update</button>
                                                                    </div>
                                          </div>
                                                                </form>
                                                            </div>                
                                                       </div>
                                                 </div>
                                               </div>
                                           </div>
 </body>
    
 </html>
                        
                       
                       
                    
                           
                        
                    
                                                    
                          
                