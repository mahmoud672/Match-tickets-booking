<?php
	require_once("config.php");
	$identifier = $_GET['id'];

	/* 
	/* team1_id -> recieve it and select all teams except it and then fill the second dropown menu
	/* (add new match) page => get all teams except parametered team  
	*/
	$team1_id = $_POST['team_one_id'];
	if($identifier == "getTeamsOfSecondList"){
		$sql_query="select team_id,team_name from tbl_teams where team_id !=$team1_id";
		$result=mysql_query($sql_query) or die(mysql_error());
		if(!empty($result)){
			while ($row=mysql_fetch_array($result)) {
				echo '<option value="'.$row['team_id'].'">'.$row['team_name'].'</option>';
			}
		}	
	}
	//====================================
	/* 
	/* 
	/*   
	*/
	
	
?>