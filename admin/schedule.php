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

        #customers td,
        #customers th {
            border: 1px solid #ddd;
            padding: 8px;
        }

        #customers tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        #customers tr:hover {
            background-color: #ddd;
        }

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
                        <h2>Schedule</h2>
                        <form action="" method="post" style="margin-left: 750px;">





                            <th><b>Date:</b>
                                <input type="date" name="date" placeholder="to" required>

                                <input type="submit" class="btn btn-primary noprint" name="search_btn" value="Search Buses">
                            </th>

                        </form>
                    </div>
                    <table id="customers">
                        <tr>
                            <th>ID</th>
                            <th>Bus Number</th>
                            <th>Bus Name</th>
                            <th>Departure</th>
                            <th>Departure Date</th>
                            <th>Departure Time</th>
                            <th>Arrival</th>
                            <th>Available Seat</th>
                            <th>Fare</th>

                        </tr>
                        <?php
                        if (isset($_POST['search_btn'])) {

                            $date = $_POST['date'];

                            $query = "SELECT * FROM route WHERE  datee='$date'";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {
                                    //  echo $row['name'];

                        ?>

                                    <tr>
                                        <td><?php echo $row['id']; ?></td>
                                        <td><?php echo $row['busnumber']; ?></td>
                                        <td><?php echo $row['busname']; ?></td>
                                        <td><?php echo $row['departure']; ?></td>
                                        <td><?php echo $row['datee']; ?></td>
                                        <td><?php echo $row['duration']; ?></td>
                                        <td><?php echo $row['arrival']; ?></td>
                                        <td><?php echo $row['aseats']; ?></td>
                                        <td>₹<?php echo $row['fare']; ?></td>


                                    </tr>
                            <?php
                                }
                            }
                        } else {
                            ?>
                            <tr>
                                <td>Enter Date to Search Bus</td>
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