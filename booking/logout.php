<?php 
session_start();
unset($_SESSION["user_name"]);
unset($_SESSION["user_password"]);
unset($_SESSION["user_id"]);


header("Location:index.php");
?>