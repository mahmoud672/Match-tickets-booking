<?php
	require_once("header.php");
	require_once("config.php");
	$match_id = $_GET['match_id'];

	$sql_query = "SELECT * FROM tbl_users WHERE";
	$result=mysql_query($sql_query) or die(mysql_error());


?>




<?php
	require_once("footer.php");
?>