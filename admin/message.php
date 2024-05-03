<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Panel</title>
    <?php
    include('auth.php');
    include('includes/sidebar.php');
     include('includes/topbar.php');
     include('config/dbcon.php');
     ?>
      <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #ffa500;
  color: white;
}
</style>
</head>

<body>
    
    <div class="container">
        
        <div class="content">
           
            <div class="content-2" style="padding-top:80px">
                <div class="recent-payments" style="padding-top: -7px;">
                    <div class="title">
                        <h2>Message</h2>
                        <a href="export/exportticket.php"  class="btn btn-primary btn-sm float-right" style="margin-right: 2px;margin-left: 900px;">Export to Excel </a>
                    </div>
                    <table id="customers">
                        <tr>
                            <th>ID</th>
                            <th>Uid</th>
                            <th>Name</th>
                            <th>Subject</th>
                            <th>Message</th>
                            <th>Reply</th>
                            <th>Action</th>
                           
                            
                        </tr><?php
                                                    $query = "SELECT * FROM message";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                        //  echo $row['name'];
                                                ?>
                                            <tr>
                                                <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['uid']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['subject']; ?></td>
                                                <td><?php echo $row['message']; ?></td>
                                                <td><?php echo $row['reply']; ?></td>
                                                <td><a href="reply.php?reply_id=<?php echo $row['id']; ?>" class="btn btn-info">Reply</a>
                                                
                                                
                                               

                                               
                                            </tr>
                                            
                                               
                                                <?php
                                                    }
                                                    }else{
                                                    ?>
                                                    <tr>
                                                        <td>No data Found</td>
                                                    </tr>
                                                    <?php
                                                        }
                                                ?>
             </table>
                </div>
                
            </div>
        </div>
    </div>
</body>

</html>