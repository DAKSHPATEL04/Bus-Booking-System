<?php

include('./admin/auth.php');
include('./admin/config/dbcon.php');
?>






<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Bus India | Ticket</title>
    <script src="https://kit.fontawesome.com/d8cfbe84b9.js" crossorigin="anonymous"></script>
    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="ticket2.css" />
    <link rel="stylesheet" href="index.css" />
    <link rel="stylesheet" href="mode_bot.css">

</head>

<body>

    <!-- header section starts  -->

    <header>
        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>B</span>us India</a>

        <nav class="navbar">

            <a href="user.php"> Home</a>


            <a href="profile/profile.php">

                <?php
                if (isset($_SESSION['auth'])) {
                    echo $_SESSION['auth_user']['user_name'];
                } else {
                    echo "not logged in";
                }
                ?></a>

            <a href="logout.php">Logout</a>
        </nav>
    </header>

    <h1 class="heading" style="padding-top:14rem">
        <span> <i class="fa fa-ticket-alt"></i></span>
        <span class="space"></span>
        <span>T</span>
        <span>I</span>
        <span>C</span>
        <span>K</span>
        <span>E</span>
        <span>T</span>
        <span>S</span>
    </h1>
    <div class="table-wrapper">
        <table class="fl-table">
            <thead>
                <tr>
                    <th>Ticket No</th>

                    <th>Name</th>
                    <th>Bus No</th>
                    <th>Bus Name</th>
                    <th>Departure</th>
                    <th>Arrival</th>
                    <th>Departure Time</th>
                    <th>No of Seat</th>
                    <th>Fare</th>
                    <th>Payment</th>
                    <th>Veiw</th>
                    <th>Cancel</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_SESSION['auth'])) {
                    $uid = $_SESSION['auth_user']['user_id'];


                    $query = "SELECT * FROM ticket WHERE uid='$uid'";
                    $query_run = mysqli_query($con, $query);
                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {


                ?>

                            <tr>
                                <td><?php echo $row['id']; ?></td>

                                <td><?php echo $row['pname']; ?></td>
                                <td><?php echo $row['busnumber']; ?> </td>
                                <td><?php echo $row['busname']; ?></td>
                                <td><?php echo $row['departure']; ?></td>
                                <td><?php echo $row['arrival']; ?></td>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['seat']; ?></td>
                                <td><?php echo $row['fare']; ?></td>
                                <td><?php echo $row['pay']; ?></td>
                                <td><a href="profile/test.php?t_id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                                    <form method="post" action="cancel.php">
                                        <input type="hidden" name="cancel" value="<?php echo $row['id']; ?>">
                                </td>
                                <td><input type="hidden" name="busnumber" value="<?php echo $row['busnumber']; ?>">
                                    <button class="btn btn-primary" type="submit" name="cancelbtn">Cancel Ticket</button>
                                    </form>
                            </tr>
                <?php
                        }
                    }
                }
                ?>

            <tbody>
        </table>
    </div>
    <section class="footer" style="margin-top:57.05rem;">

        <div class="box-container">


            <div class="box" style="padding-left: 640px;">
                <label>follow us</label>
                <a href="https://www.facebook.com/login/" class="fab fa-facebook-f"></a>
                <a href="https://www.instagram.com/accounts/login/" class="fab fa-instagram"></a>
                <a href="https://twitter.com/i/flow/login" class="fab fa-twitter"></a>
                <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="fab fa-linkedin"></a>

            </div>

        </div>

        <h1 class="credit"> created by: Bus India<span> </span> | &#169 2024 all rights reserved! </h1>

    </section>

</body>

</html>