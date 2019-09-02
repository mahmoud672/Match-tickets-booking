<?php
	require_once('config.php');

	$table_name=$_GET['table_name'];
	// die($table_name);
	if($table_name == "teams_table"){
		// die($table_name);
		$team_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_teams WHERE team_id = '".$team_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "levels_table"){
		// die($table_name);
		$level_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_levels WHERE level_id = '".$level_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "champions_table"){
		// die($table_name);
		$champion_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_champions WHERE champion_id = '".$champion_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "places_table"){
		// die($table_name);
		$place_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_places WHERE place_id = '".$place_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "news_table"){
		// die($table_name);
		$news_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_news WHERE news_id = '".$news_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "users_table"){
		// die($table_name);
		$user_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_users WHERE user_id = '".$user_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "messages_table"){
		// die($table_name);
		$message_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM messages_table WHERE msg_id = '".$message_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "videos_table"){
		// die($table_name);
		$video_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_videos WHERE video_id = '".$video_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "match_table"){
		// die($table_name);
		$match_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_match WHERE match_id = '".$match_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "add_new_tickets"){
		// die($table_name);
		$row_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_levels_ticket_prices WHERE id = '".$row_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "booking_table"){
		// die($table_name);
		$booking_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_booking WHERE booking_id = '".$booking_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
	else if($table_name == "admins_table"){
		// die($table_name);
		$admin_id = mysql_real_escape_string($_POST['id']);
		$sqlQuery = "DELETE FROM tbl_admins WHERE admin_id = '".$admin_id."'";

		$result = mysql_query($sqlQuery) or die(mysql_error());
		if($result){
			echo "doneeeeeeeeee";
		}
		else{
			echo "Falssseeee";
		}
	}
?>