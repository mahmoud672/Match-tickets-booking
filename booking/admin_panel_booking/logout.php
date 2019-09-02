<?php 
session_start();
unset($_SESSION["admin_name"]);
unset($_SESSION["admin_password"]);
unset($_SESSION["admin_last_login_time"]);

header("Location:login.php");
?>