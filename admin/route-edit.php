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

                        <form action="routecode.php" method="POST">
                            <div class="modal-body">
                                <?php
                                if (isset($_GET['route_id'])) {
                                    $route_id = $_GET['route_id'];
                                    $query = "SELECT * FROM route WHERE id='$route_id'";
                                    $query_run = mysqli_query($con, $query);
                                    if (mysqli_num_rows($query_run) > 0) {
                                        foreach ($query_run as $row) {
                                ?>
                                            <div class="inputfield">
                                                <input type="hidden" name="route_id" class="input" value="<?php echo $row['id']; ?>">
                                                <div class="inputfield">
                                                    <label for="">Bus Number</label>
                                                    <input type="text" name="busnumber" class="input" value="<?php echo $row['busnumber']; ?>" placeholder="Bus number" disabled required>
                                                </div>
                                            </div>
                                            <div class="inputfield">
                                                <label for="">Bus Name</label>
                                                <input type="text" name="name" class="input" value="<?php echo $row['busname']; ?>" placeholder="name" disabled required>
                                            </div>
                                            <div class="inputfield">
                                                <label for="">Depature</label>
                                                <input type="text" name="depart" class="input" value="<?php echo $row['departure']; ?>" placeholder="phone number" required>
                                            </div>

                                            <div class="inputfield">
                                                <label for="">Duration</label>
                                                <input type="time" name="duration" class="input" value="<?php echo $row['duration']; ?>" placeholder="username" required>
                                            </div>
                                            <div class="inputfield">
                                                <label for="">Arrival</label>
                                                <input type="text" name="arrival" class="input" value="<?php echo $row['arrival']; ?>" placeholder="password" required>
                                            </div>
                                            <div class="inputfield">
                                                <label for="">Fare</label>
                                                <input type="text" name="fare" class="input" value="<?php echo $row['fare']; ?>" placeholder="password" required>
                                            </div>
                                            <div class="inputfield">
                                                <label for="">Available Seats</label>
                                                <input type="number" name="aseats" max="50" class="input" value="<?php echo $row['aseats']; ?>" placeholder="50" disabled required>
                                            </div>
                                            <div class="inputfield">
                                                <label for="datePicker">Depature Date</label>
                                                <input type="date" name="date" class="input" value="<?php echo $row['datee']; ?>" placeholder="phone number" id="datePicker" required>
                                            </div>


                                <?php
                                        }
                                    } else {
                                        echo "<h4>No Record Found. !</h4>";
                                    }
                                }
                                ?>

                                <div class="inputfield">
                                    <button type="submit" name="update" class="btn">Update</button>
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
<script>
    // Get today's date in the format "YYYY-MM-DD"
    function getToday() {
        const now = new Date();
        const year = now.getFullYear();
        const month = String(now.getMonth() + 1).padStart(2, '0'); // Month is 0-based
        const day = String(now.getDate()).padStart(2, '0');
        return `${year}-${month}-${day}`;
    }

    // Set the min attribute of the date input to today's date
    document.getElementById("datePicker").setAttribute("min", getToday());
</script>

</html>