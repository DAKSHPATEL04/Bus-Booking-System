<?php
include('config/dbcon.php');
include('auth.php');

if (isset($_POST['addroute'])) {
    $bus = $_POST['busnumber'];
    $name = $_POST['name'];
    $phone = $_POST['depart'];
    $username = $_POST['duration'];
    $password = $_POST['arrival'];
    $conpassword = $_POST['fare'];
    $aseats = $_POST['aseats'];
    $bu = $_POST['date'];

    $user_query = "INSERT into route(busnumber,busname,departure,duration,arrival,aseats,fare,datee) values($bus,'$name','$phone','$username','$password','$aseats','$conpassword','$bu')";
    $user_query_run = mysqli_query($con, $user_query);
    if ($user_query_run) {
        $_SESSION['status'] = "Route Added Successfully";
        header("Location:route.php");
    } else {
        $_SESSION['status'] = "Route not Added ";
        header("Location:route.php");
    }
}


if (isset($_POST['update'])) {
    $route_id = $_POST['route_id'];
    $bus = $_POST['busnumber'];
    $name = $_POST['name'];
    $phone = $_POST['depart'];
    $username = $_POST["duration"];
    $password = $_POST['arrival'];
    $conpassword = $_POST['fare'];
    $aseats = $_POST['aseats'];
    $bu = $_POST['date'];
    $query = "UPDATE route SET busnumber='$bus',busname='$name', departure='$phone', duration='$username',arrival='$password', aseats='$aseats',fare='$conpassword', datee='$bu' WHERE id='$route_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Route updated Successfully";
        header("Location:route.php");
    } else {
        $_SESSION['status'] = "Route not updated ";
        header("Location:route.php");
    }
}
if (isset($_POST['delete'])) {
    $route_id = $_POST['delete_id'];
    $query = "DELETE FROM route WHERE id='$route_id'";
    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['status'] = "Route deleted Successfully";
        header("Location:route.php");
    } else {
        $_SESSION['status'] = "Route not deleted ";
        header("Location:route.php");
    }
}
