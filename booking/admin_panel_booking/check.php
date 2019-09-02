<?php
ob_start();
session_start();//session starts here  
require("config.php");


$admin_email = $_POST['admin_email']; 
$admin_password = $_POST['admin_password']; 

// die( $admin_password );
// echo $admin_password;
// echo " ***** ";
// echo $admin_email;
// To protect MySQL injection (more detail about MySQL injection)
$admin_email = stripslashes($admin_email);
$admin_password = stripslashes($admin_password);
$admin_email = mysql_real_escape_string($admin_email);
$admin_password = mysql_real_escape_string($admin_password);
	if(!empty($admin_email) && !empty($admin_password)){
		// echo "inside first if ";
		// die();
		$sql="SELECT * FROM tbl_admins WHERE admin_email='$admin_email' and admin_password='$admin_password'";
		$result=mysql_query($sql) or die(mysql_error());
		$resultRow = mysql_fetch_array($result);
		$admin_name = $resultRow['admin_name'];
		$admin_last_login_time = $resultRow['admin_last_login_time'];
		
		$count=mysql_num_rows($result);
		
		// If result matched $email and $password, table row must be 1 row
		if($count==1){

			// // Register $admin_name, $admin_pass and redirect to file "index.php"
			$_SESSION["admin_name"] = $admin_name;
			$_SESSION["admin_password"] = $admin_password;
			$_SESSION["admin_last_login_time"] = $admin_last_login_time;
			
			//update last login time 
			$time =  date('Y-m-d H:i:s');
			$updateLastLoginTime = "update tbl_admins set admin_last_login_time ='$time' WHERE admin_email='$admin_email' and admin_password='$admin_password'";
			$resultUpdateTime=mysql_query($updateLastLoginTime) or die(mysql_error());
			
			if(isset($_SESSION["admin_name"]) && isset($_SESSION["admin_password"])) {
			  header("Location:index.php");
			}
			else {
	  			header("location:login.php");
			}	
		}
		else {
	  			header("location:login.php");
			}

	}
	else {
	  	header("location:login.php");
	}
ob_end_flush();
?>
