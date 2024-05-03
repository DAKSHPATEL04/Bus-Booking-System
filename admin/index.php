<?php
    include('auth.php'); 
    include('includes/sidebar.php');
     include('includes/topbar.php');
     include('config/dbcon.php');
     ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Admin Panel</title>
    <style>
body {
  background: #fafafa url(https://jackrugile.com/images/misc/noise-diagonal.png);
  color: #444;
  font: 100%/30px 'Helvetica Neue', helvetica, arial, sans-serif;
  text-shadow: 0 1px 0 #fff;
}

strong {
  font-weight: bold; 
}

em {
  font-style: italic; 
}

table {
  background: #f5f5f5;
  border-collapse: separate;
  box-shadow: inset 0 1px 0 #fff;
  font-size: 12px;
  line-height: 24px;
  margin: 30px auto;
  text-align: left;
  width: 800px;
} 

th {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png), linear-gradient(#ffa500, #ffa500);
  border-left: 1px solid #555;
  border-right: 1px solid #777;
  border-top: 1px solid #555;
  border-bottom: 1px solid #333;
  box-shadow: inset 0 1px 0 #999;
  color: #fff;
  font-weight: bold;
  padding: 10px 15px;
  position: relative;
  text-shadow: 0 1px 0 #000;  
}

th:after {
  background: linear-gradient(rgba(255,255,255,0), rgba(255,255,255,.08));
  content: '';
  display: block;
  height: 25%;
  left: 0;
  margin: 1px 0 0 0;
  position: absolute;
  top: 25%;
  width: 100%;
}

th:first-child {
  border-left: 1px solid #777;  
  box-shadow: inset 1px 1px 0 #999;
}

th:last-child {
  box-shadow: inset -1px 1px 0 #999;
}

td {
  border-right: 1px solid #fff;
  border-left: 1px solid #e8e8e8;
  border-top: 1px solid #fff;
  border-bottom: 1px solid #e8e8e8;
  padding: 10px 15px;
  position: relative;
  transition: all 300ms;
}

td:first-child {
  box-shadow: inset 1px 0 0 #fff;
} 

td:last-child {
  border-right: 1px solid #e8e8e8;
  box-shadow: inset -1px 0 0 #fff;
} 

tr {
  background: url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:nth-child(odd) td {
  background: #f1f1f1 url(https://jackrugile.com/images/misc/noise-diagonal.png); 
}

tr:last-of-type td {
  box-shadow: inset 0 -1px 0 #fff; 
}

tr:last-of-type td:first-child {
  box-shadow: inset 1px -1px 0 #fff;
} 

tr:last-of-type td:last-child {
  box-shadow: inset -1px -1px 0 #fff;
} 

tbody:hover td {
  color: transparent;
  text-shadow: 0 0 3px #aaa;
}

tbody:hover tr:hover td {
  color: #444;
  text-shadow: 0 1px 0 #fff;
}
</style>

</head>

<body>
    
    <div class="container">
        <div class="content">
            <div class="cards">
                <div class="card">
                    <div class="box">
                        
                        <h1> <?php 
                    $query= "SELECT id FROM users ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h1>'.$row.'</h1>';
                    ?></h1>
                        <h3>Admin</h3>
                    </div>
                    <div class="icon-case">
                    <a href="admin.php">
                        <img src="image/admin (2).png" alt="">
                    </a>
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1><?php 
                    $query= "SELECT id FROM route ORDER BY id";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h1>'.$row.'</h1>';
                    ?></h1>
                        <h3>Routes</h3>
                    </div>
                    <div class="icon-case">
                    <a href="route.php">
                        <img src="image/destination (3).png" alt="">
</a>    
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1> <?php 
                    $query= "SELECT SUM(busnumber) FROM route";
                    $query_run= mysqli_query($con, $query);
                    $row= mysqli_num_rows($query_run);                  
                    echo '<h1>'.$row.'</h1>';
                    ?></h1>
                        <h3>Buses</h3>
                    </div>
                    <div class="icon-case">
                    <a href="route.php">
                        <img src="image/electric-bus (3).png" alt="">
</a>    
                    </div>
                </div>
                <div class="card">
                    <div class="box">
                        <h1> <?php 
                   $query= "SELECT SUM(fare) FROM ticket";
                   $query_run= mysqli_query($con, $query);
                   $row= mysqli_fetch_array($query_run);                  
                   echo '<h1>'.$row["SUM(fare)"].'</h1>';
                    ?></h1>
                        <h3>Earnings</h3>
                    </div>
                    
                    <div class="icon-case">
                    <a href="earning.php">
                        <img src="image/earn-money (2).png" alt="">
                    </a>
                    </div>
                </div>
            </div>
            <div class="content-2">
                <div class="recent-payments">
                    <div class="title">
                        <h2>Ticket</h2>
                        <a href="ticket.php" class="btn">View All</a>
                    </div>
                    <table id="customers" >
                        <tr>
                            <th>Ticket No</th>
                            <th>Name</th>
                            <th>Date</th>
                            <th>Departure</th>
                            <th>Arrival</th>
                            <th>Seats</th>
                        </tr>
                        <?php
                                                    $query = "SELECT * FROM ticket";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                        //  echo $row['name'];
                                                ?>
              
                        <tr>
                        <td><?php echo $row['id']; ?></td>
                                                
                                                <td><?php echo $row['pname']; ?></td>
                                                            
                                                <td><?php echo $row['date']; ?></td>
                                                <td><?php echo $row['departure']; ?></td>
                                                <td><?php echo $row['arrival']; ?></td>
                                                
                                                <td><?php echo $row['seat']; ?></td>
                                               
                            
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
                <div class="new-students">
                    <div class="title">
                        <h2>Users</h2>
                        <a href="user.php" class="btn">View All</a>
                    </div>
                    <table  id="customers">
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Username</th>
                        </tr>
                        
                        <?php
                                                    $query = "SELECT * FROM userss";
                                                    $query_run = mysqli_query($con, $query);

                                                    if(mysqli_num_rows($query_run)>0)
                                                    {
                                                        foreach($query_run as $row)
                                                        {
                                                        //  echo $row['name'];
                                                ?>

                        <tr>
                        <td><?php echo $row['id']; ?></td>
                                                <td><?php echo $row['name']; ?></td>
                                                <td><?php echo $row['username']; ?></td>
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