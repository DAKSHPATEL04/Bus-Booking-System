<?php
include('./admin/auth.php');
include('./admin/config/dbcon.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bus India| Buses</title>

    <!-- swiper css link  -->
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <!-- custom css file link  -->
    <link rel="stylesheet" href="index.css">
    <link rel="stylesheet" href="ticket2.css">
    <script language="javascript" type="text/javascript" src="f.js"></script>
</head>

<body>

    <!-- header section starts  -->

    <header>

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="#" class="logo"><span>B</span>us India</a>

        <nav class="navbar">

            <a href="user.php"> Home</a>
            <a href="ticket.php">Ticket</a>
            <a style="color:#fff" href="profile/profile.php">

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

    <!-- header section ends -->
    <h1 class="heading" style="padding-top:10rem">
        <span> <i class="fa fa-search"></i></span>
        <span class="space"></span>
        <span>S</span>
        <span>E</span>
        <span>A</span>
        <span>R</span>
        <span>C</span>
        <span>H</span>
        <span class="space"></span>
        <span>B</span>
        <span>U</span>
        <span>S</span>
        <span>E</span>
        <span>S</span>
    </h1>
    <div class="table-wrapper" style="margin-top:7rem">

        <table class="fl-table">
            <thead>
                <tr>
                    <th>Bus Number</th>
                    <th>Bus Name</th>
                    <th>Date</th>
                    <th>Departure</th>
                    <th>Departure Time</th>
                    <th>Arrival</th>
                    <th>Fare</th>
                    <th>Seat Available</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>

                <?php
                if (isset($_POST['search_btn'])) {
                    $from = $_POST['form'];
                    $to = $_POST['to'];
                    $date = $_POST['date'];

                    $query = "SELECT * FROM route WHERE departure='$from' AND arrival='$to' AND datee='$date'";
                    $query_run = mysqli_query($con, $query);

                    if (mysqli_num_rows($query_run) > 0) {
                        foreach ($query_run as $row) {
                            //  echo $row['name'];

                ?>
                            <tr>
                                <td><?php echo $row['busnumber']; ?></td>
                                <td><?php echo $row['busname']; ?></td>
                                <td><?php echo $row['datee']; ?></td>
                                <td><?php echo $row['departure']; ?></td>
                                <td><?php echo $row['duration']; ?></td>
                                <td><?php echo $row['arrival']; ?></td>
                                <td><?php echo $row['fare']; ?></td>
                                <td><?php echo $row['aseats']; ?></td>
                                <td><a href="booking.php?route_id=<?php echo $row['id']; ?>" class="btn btn-info" style="text-align:center" onClick="testJ()">Book Now</a>

                                </td>
                            </tr>

                    <?php
                        }
                    }
                } else {
                    ?>
                    <tr>
                        <td>"No Bus On This Day"</td>
                    </tr>
                <?php
                }
                ?>

            </tbody>
        </table>
    </div>

    <!-- review section ends -->



    <!-- brand section  -->
    <section class="brand-container">



    </section>

    <!-- footer section  -->

    <section class="footer" style="border-top-style: solid; border-top-width: 0px; margin-top: 49.2rem; position: inherit;">

        <div class="box-container">


            <div class="box" style="padding-left: 640px;">
                <label>follow us</label>
                <a href="https://www.facebook.com/login/" class="fab fa-facebook-f"></a>
                <a href="https://www.instagram.com/accounts/login/" class="fab fa-instagram"></a>
                <a href="https://twitter.com/i/flow/login" class="fab fa-twitter"></a>
                <a href="https://www.linkedin.com/login?fromSignIn=true&trk=guest_homepage-basic_nav-header-signin" class="fab fa-linkedin"></a>

            </div>

        </div>

        <h1 class="credit"> created by: Bus India<span> </span> | &#169 2022 all rights reserved! </h1>

    </section>
















    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="index.js"></script>

</body>

</html>