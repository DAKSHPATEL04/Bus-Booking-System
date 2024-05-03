<?php

session_start();
$_SESSION = array();
session_destroy();
echo"<script>
alert('Logout Succesfully');
window.location.href='index.php';
</script>";

?>