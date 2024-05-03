<?php
include('../admin/auth.php');
include('../admin/config/dbcon.php');
if (isset($_POST['update'])) {

    $uid = $_SESSION['auth_user']['user_id'];
    $cpassword = $_POST['cpassword'];
    $password = $_POST['password'];
    $conpassword = $_POST['confirmpassword'];

    $sql = "SELECT ID FROM userss WHERE id=$uid and Password='$cpassword'";
    $sql_run = mysqli_query($con, $sql);

    if (mysqli_num_rows($sql_run) > 0) {
        if ($password == $conpassword) {
            $checkusername = "UPDATE userss SET password='$password' where id=$uid";
            $checkusername_run = mysqli_query($con, $checkusername);
            echo '<script>alert("Your password successully changed")</script>';
            echo "<script>window.location.href ='profile.php'</script>";
        } else {
            echo '<script>alert("Your current password is wrong")</script>';
        }
    }
}
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
    <title>Bus India | Profile</title>
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
                                        <img src="../profile/img//<?php echo $row['image'] ?> " alt="">
                                    </a>
                                    <h1><?php echo $row['name']; ?></h1>
                                    <p>Joined on: <?php echo $row['created_at'] ?></p>

                                </div>

                                <ul class="nav nav-pills nav-stacked">
                                    <li><a href="profile.php"> <i class="fa fa-user"></i> Profile</a></li>
                                    <li><a href="message.php"> <i class="fa fa-envelope "></i> Message <span class="label label-warning pull-right r-activity"></span></a></li>
                                    <li><a href="edit.php"> <i class="fa fa-edit"></i> Edit profile</a></li>
                                    <li class="active"><a href="chp.php"> <i class="fa fa-key"></i> Change Password</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="profile-info col-md-9">

                            <div class="panel">
                                <div class="bio-graph-heading">
                                    <b>CHANGE PASSWORD</b>
                                </div>

                                <div class="panel-body bio-graph-info">
                                    <h1></h1>
                                    <div class="row">
                                        <div class="bio-row">
                                            <form action="#" method="post">
                                                <p><span>Current Password </span>: <input type="text" name="cpassword" style="border:1px solid #333"></p>
                                                <br>

                                                <p><span>New Password </span>: <input type="text" name="password" style="border:1px solid #333"> </p>
                                                <br>
                                                <p><span>Confrim Password </span>: <input type="text" name="confirmpassword" style="border:1px solid #333"> </p>
                                                <br>

                                                <input type="submit" name="update" value="Change Password" class="btn btn-primary" style="position: relative;left: 50rem; top: 5rem; margin-bottom: 6rem;">
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div>
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

<section class="footer" style="padding: 0.52rem 9%;margin-top: 18rem;">

    <div class="box-container">



    </div>

    <h1 class="credit"> created by: Bus India<span> </span> | &#169 2024 all rights reserved! </h1>


</section>
















<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>

<!-- custom js file link  -->
<script src="script.js"></script>

</body>

</html>