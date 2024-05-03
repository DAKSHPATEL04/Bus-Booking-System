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
      Edit Route
    </div>
    <div class="form">
       <div class="inputfield">
                    
                           <form action="replyy.php" method="POST">
                                          <div class="modal-body">
                                        <?php
                                    if(isset($_GET['reply_id']))
                                    {
                                    $route_id = $_GET['reply_id'];
                                    $query = "SELECT * FROM message WHERE id='$route_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if(mysqli_num_rows ($query_run) > 0)
                                    {
                                    foreach($query_run as $row)
                                    {
                                             ?>
                                                <div class="inputfield">
                                                  <input type="hidden" name="id" class="input" value="<?php echo $row['id']; ?>">
                                                  <div class="inputfield">
                                                        <label for="">Name</label>
                                                        <input type="text"  class="input" value="<?php echo $row['name']; ?>"  required >
                                                        </div>
                                                </div>
                                                        <div class="inputfield">
                                                        <label for="">Subject</label>
                                                        <input type="text"  class="input" value="<?php echo $row['subject']; ?>"  required>
                                                        </div>
                                                        <div class="inputfield">
                                                        <label for="">Message</label>
                                                        <input type="text"  class="input" value="<?php echo $row['message']; ?>" required >
                                                        </div>
                                                        
                                                        <div class="inputfield">
                                                        <label for="">Answer</label>
                                                <input type="text" name="reply" class="input" value="<?php echo $row['reply']; ?>"  required>
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
                                                                        <button type="submit" name="update" class="btn">Reply</button>
                                                                    </div>
                                                                    <div class="inputfield"> 
          <a href="route.php" class="btn">Close</a>
       
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
                        
                       
                       
                    
                           
                        
                    
                                                    
                          
                