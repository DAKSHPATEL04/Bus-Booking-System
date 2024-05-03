<?php
include('../admin/auth.php');
include('../admin/config/dbcon.php');

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <link href="profile.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">
    <title>Bus India | Profile | Message</title>
</head>

<body style="font-size: 18.5px;">

    <!-- header section starts  -->

    <header style="padding: 0rem 9%;">

        <div id="menu-bar" class="fas fa-bars"></div>

        <a href="../user.php" class="logo"><span>B</span>US INDIA</a>

        <nav class="navbar" style="padding-top: 20px;">
            <a href="../user.php"> Home</a>

            <a href="../ticket.php">Ticket</a>
            <a href="profile.php">

                <?php
                if (isset($_SESSION['auth'])) {
                    echo $_SESSION['auth_user']['user_name'];
                } else {
                    echo "not logged in";
                }
                ?></a>

            <a href="../logout.php">Logout</a>
        </nav>


    </header>

    <!-- header section ends -->

    <!-- login form container  -->



    <!-- home section starts  -->



    <!-- home section ends -->

    <!-- book section starts  -->

    <section class="book" id="book">

        <h1 class="heading">

        </h1>

        <div class="row">





        </div>

    </section>
    <div class="container bootstrap snippets bootdey">
        <div class="row">
            <?php
            if (isset($_SESSION['auth'])) {
                $uid = $_SESSION['auth_user']['user_id'];

                $query = "SELECT * FROM userss where id='$uid'";
                $query_run = mysqli_query($con, $query);
                if (mysqli_num_rows($query_run) > 0) {
                    foreach ($query_run as $row) {
            ?>
                        <div class="profile-nav col-md-3">
                            <div class="panel">
                                <div class="user-heading round">
                                    <a href="#">
                                        <img src="../profile/img/<?php echo $row['image'] ?> " alt="">
                                    </a>
                                    <h1><?php echo $row['name']; ?></h1>
                                    <p>Joined on: <?php echo $row['created_at'] ?></p>

                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                                    <li class="active"><a href="message.php"> <i class="fa fa-envelope "></i> Message <span class="label label-warning pull-right r-activity"></span></a></li>
                                    <li><a href="edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                    <li><a href="chp.php"> <i class="fa fa-key"></i> Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-info col-md-9">


                            <div>
                    <?php



                    }
                }
            }
                    ?>

                    <div class="panel">
                        <div class="bio-graph-heading">
                            <b>MESSAGE</b>
                        </div>
                        <?php
                        if (isset($_SESSION['auth'])) {
                            $uid = $_SESSION['auth_user']['user_id'];


                            $query = "SELECT * FROM message WHERE uid='$uid'";
                            $query_run = mysqli_query($con, $query);
                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $row) {


                        ?>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="bio-chart">
                                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" data-fgcolor="#e06b7d" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(224, 107, 125); padding: 0px; background: none;"></div>
                                                    </div>
                                                    <div class="bio-desk">

                                                        <h4 class="terques"> <b> Message No : </b><?php echo $row['id']; ?></h4>
                                                        <h4> <b> Subject : </b><?php echo $row['subject']; ?></h4>
                                                        <h4> <b> Issue : </b><?php echo $row['message']; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="panel">
                                                <div class="panel-body">
                                                    <div class="bio-chart">
                                                        <div style="display:inline;width:100px;height:100px;"><canvas width="100" height="100px"></canvas><input class="knob" data-width="100" data-height="100" data-displayprevious="true" data-thickness=".2" data-fgcolor="#4CC5CD" data-bgcolor="#e8e8e8" style="width: 54px; height: 33px; position: absolute; vertical-align: middle; margin-top: 33px; margin-left: -77px; border: 0px; font-weight: bold; font-style: normal; font-variant: normal; font-stretch: normal; font-size: 20px; line-height: normal; font-family: Arial; text-align: center; color: rgb(76, 197, 205); padding: 0px; background: none;"></div>
                                                    </div>
                                                    <div class="bio-desk">
                                                        <h4 class="purple"><b>Replied : </b></h4>
                                                        <h4><?php echo $row['reply']; ?></h4>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                        <?php
                                }
                            }
                        }
                        ?>
                    </div>
                            </div>
                        </div>
        </div>
    </div>





    <!-- book section ends -->

    <!-- packages section starts  -->



    <!-- packages section ends -->

    <!-- services section starts  -->


    <!-- services section ends -->

    <!-- gallery section starts  -->



    <!-- gallery section ends -->

    <!-- review section starts  -->



    <!-- review section ends -->

    <!-- contact section starts  -->



    <!-- contact section ends -->

    <!-- brand section  -->


    <!-- footer section  -->

    <section class="footer" style="padding: 0.52rem 9%;margin-top: 14.66rem;">

        <div class="box-container">



        </div>

        <h1 class="credit"> created by: Bus India<span> </span> | &#169 2024 all rights reserved! </h1>


    </section>
















    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

    <!-- custom js file link  -->
    <script src="script.js"></script>

</body>

</html>