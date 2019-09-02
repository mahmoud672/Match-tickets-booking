<?php
	// Connection's Parameters
	$db_host="localhost";
	$db_name="booking"; // database name
	$username="root";// user name 
	$password=""; // password pf database
	$db_con=@mysql_connect($db_host,$username,$password);
	$connection_string=mysql_select_db($db_name);
	if($connection_string)
		// echo "connnnnnnnnnnnnnnnnnnnect!";	
	mysql_query("SET NAMES 'utf8'"); 
	mysql_query('SET CHARACTER SET utf8');
	
?>