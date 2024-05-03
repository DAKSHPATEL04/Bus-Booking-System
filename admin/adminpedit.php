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
      Edit Admin
    </div>
    <div class="form">
       <div class="inputfield">
                    <form action="adminpcode.php" method="POST">
                                          <div class="modal-body">
                                        <?php
                                    if(isset($_GET['user_id']))
                                    {
                                    $user_id = $_GET['user_id'];
                                    $query= "SELECT * FROM users WHERE id='$user_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                                <div class="inputfield">
                                                  <input type="hidden" name="user_id" class="input" value="<?php echo $row['id']; ?>">
                                                        <label for="">Name</label>
                                                        <input type="text" name="name" class="input"  minlength="3" maxlength="12" value="<?php echo $row['name']; ?>" placeholder="name" required>
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Phone Number</label>
                                                        <input type="text" name="phone" class="input"  minlength="10" maxlength="10" value="<?php echo $row['phone']; ?>" placeholder="phone number" required >
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Username</label>
                                                        <input type="text" name="username" class="input" value="<?php echo $row['username']; ?>"  minlength="3" maxlength="12" placeholder="username" required>
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Password</label>
                                                        <input type="password" name="password" class="input" value="<?php echo $row['password']; ?>" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Please include at least 1 uppercase character, 1 lowercase character, and 1 number min char6."  placeholder="password" required>
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
                          
                          
                          
