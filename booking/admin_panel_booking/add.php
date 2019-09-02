<?php
	require_once("config.php");
	$identifier = $_GET['id'];
	// insert new match
	if($identifier =="newMatch"){
		$match_name = mysql_real_escape_string($_POST['match_name']);
		$match_time = mysql_real_escape_string($_POST['match_time']);
		$number_of_tickets = mysql_real_escape_string($_POST['number_of_tickets']);
		$match_place = mysql_real_escape_string($_POST['match_place']);
		$team_1_name = mysql_real_escape_string($_POST['team_1_name']);
		$team_2_name = mysql_real_escape_string($_POST['team_2_name']);
		$champion_name = mysql_real_escape_string($_POST['champion_name']);
		
		if(!empty($match_name) && !empty($match_time) 
			&& !empty($number_of_tickets) && !empty($match_place) 
			&& !empty($team_1_name) && !empty($team_2_name) 
			&& !empty($champion_name)){

			$sqlQuery = "INSERT INTO tbl_match
                                VALUES('','".$match_name."','".$match_time."','".$number_of_tickets."','".$match_place."','".$team_1_name."','".$team_2_name."','".$champion_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}	
	}
	//*******************************************
	else if ($identifier === "AddNewTeam") {
		//so insert new team.
		$team_name = mysql_real_escape_string($_POST['team_name']);
		// die($team_name);
		$folder = "images/";  
		$myname="booking"; 
		$file_name ="";
		if(!empty($team_name)){
			// die("inside first if");
			/*****STARTING UPLOADING PHOTO******/
		    if ($_FILES['team_image']['size'] != 0){
		        
		        $ext = explode( "." , $_FILES['team_image']["name"] );
		        $file_name =  $myname.time().".".end($ext);

		        $up = move_uploaded_file($_FILES['team_image']["tmp_name"] , $folder.$file_name);
		        // die($up);
		    }

			$sqlQuery = "INSERT INTO tbl_teams (team_id,team_name,team_logo)
                                VALUES('','".$team_name."','".$file_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			if($result) echo "Success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if($identifier === "addNewLevel"){		
		//so insert new level.
		$level_name = mysql_real_escape_string($_POST['level_name']);
		if(!empty($level_name)){

			$sqlQuery = "INSERT INTO tbl_levels (level_id,level_name)
                                VALUES('','".$level_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if($identifier === "addNewChampion"){		
		//so insert new champion.
		$champion_name = mysql_real_escape_string($_POST['champion_name']);
		if(!empty($champion_name)){

			$sqlQuery = "INSERT INTO tbl_champions (champion_id,champion_name)
                                VALUES('','".$champion_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if($identifier === "addNewPlace"){		
		//so insert new place.
		$place_name = mysql_real_escape_string($_POST['place_name']);
		if(!empty($place_name)){

			$sqlQuery = "INSERT INTO tbl_places (place_id,place_name)
                                VALUES('','".$place_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if ($identifier === "addNewNews") {
		//so insert new service.
		$news_name = mysql_real_escape_string($_POST['news_name']);
		$news_content  = mysql_real_escape_string($_POST['news_content']);
		$news_time = mysql_real_escape_string($_POST['news_time']);
		//$offer_image = mysql_real_escape_string($_POST['offer_image']);
		$folder = "images/";  
		$myname="booking"; 
		$file_name ="";
		if(!empty($news_name) && !empty($news_content) && !empty($news_time)){
			/*****STARTING UPLOADING PHOTO******/
		    if ($_FILES['news_image']['size'] != 0){
		        $ext = explode( "." , $_FILES['news_image']["name"] );
		        $file_name =  $myname.time().".".end($ext);
		        $up = move_uploaded_file($_FILES['news_image']["tmp_name"] , $folder.$file_name);
		    }

			$sqlQuery = "INSERT INTO tbl_news (news_id,news_title,news_description,news_date,news_image)
                                VALUES('','".$news_name."','".$news_content."','".$news_time."' ,'".$file_name."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if($identifier === "addNewVideo"){		
		//so insert new video of specific match.
		$video_url = mysql_real_escape_string($_POST['video_url']);
		$video_description = mysql_real_escape_string($_POST['video_description']);
		$match_id = mysql_real_escape_string($_POST['match_id']);

		if(!empty($video_url) && !empty($video_description) && !empty($match_id)){

			$sqlQuery = "INSERT INTO tbl_videos (video_id,video_url,video_description,match_id)
                                VALUES('','".$video_url."','".$video_description."','".$match_id."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "success";	
		}
		else{
			echo "Error.. try again!";
		}
	}
	else if($identifier === "AddNewTickets"){		
		//so insert new video of specific match.
		$match_id = mysql_real_escape_string($_POST['match_id']);
		$level1_tickets = mysql_real_escape_string($_POST['number_of_tickets_level1']);
		$level1_price = mysql_real_escape_string($_POST['level1_price']);
		$level2_tickets = mysql_real_escape_string($_POST['number_of_tickets_level2']);
		$level2_price = mysql_real_escape_string($_POST['level2_price']);
		$level3_tickets = mysql_real_escape_string($_POST['number_of_tickets_level3']);
		$level3_price = mysql_real_escape_string($_POST['level3_price']);
		$num_tickets = mysql_real_escape_string($_POST['num_tickets']);// all available tickets for all levels
		
		if(($level1_tickets + $level2_tickets + $level3_tickets) > $num_tickets){
			echo "The Total Number of Tickets You Entered is Bigger Than The Available Number of Tickets for this match";
		}
		else{
			//num_tickets
			if(!empty($match_id) && !empty($level1_tickets) && !empty($level2_tickets)
				&& !empty($level3_tickets) && !empty($level1_price) && !empty($level2_price) 
				&& !empty($level3_price)){


				$sqlQuery = "INSERT INTO tbl_levels_ticket_prices (id,match_id,level_1_details,level_2_details,level_3_details)
	                                VALUES('','".$match_id."','".$level1_tickets."/".$level1_price."','".$level2_tickets."/".$level2_price."','".$level3_tickets."/".$level3_price."')";
				$result = mysql_query($sqlQuery) or die(mysql_error());
				//die($city_name);
				echo "success";	
			}
			else{
				echo "Error.. try again!";
			}
		}
	}
	else if($identifier === "addNewAdmin"){		
		//so insert new video of specific match.
		$admin_name = mysql_real_escape_string($_POST['admin_name']);
		$admin_email = mysql_real_escape_string($_POST['admin_email']);
		$admin_password = mysql_real_escape_string($_POST['admin_password']);
		$admin_telephone = mysql_real_escape_string($_POST['admin_telephone']);
		
		if(!empty($admin_name) && !empty($admin_email) && !empty($admin_password)
				&& !empty($admin_telephone) ){


				$sqlQuery = "INSERT INTO tbl_admins (admin_id,admin_name,admin_email,admin_password,admin_telephone)
	                                VALUES('','".$admin_name."','".$admin_email."','".$admin_password."','".$admin_telephone."')";
				$result = mysql_query($sqlQuery) or die(mysql_error());
				//die($city_name);
				echo "success";	
			}
			else{
				echo "Error.. try again!";
			}

			
		
	}
?>