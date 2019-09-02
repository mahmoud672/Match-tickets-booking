<?php
ob_start();
session_start();//session starts here  
	require_once("config.php");
	$identifier = $_GET['id'];
	// send message  to admin
	if($identifier =="sendMessage"){
		$sender_email = mysql_real_escape_string($_POST['sender_email']);
		$sender_message = mysql_real_escape_string($_POST['sender_message']);
		
		if(!empty($sender_email) && !empty($sender_message)){

			$sqlQuery = "INSERT INTO messages_table
                                VALUES('','".$sender_email."','".$sender_message."')";
			$result = mysql_query($sqlQuery) or die(mysql_error());
			//die($city_name);
			echo "Your Message is sent Successfully";	
		}
		else{
			echo "Error.. try again!";
		}	
	}
	else if($identifier =="booking"){
		$number_of_tickets_level1 = mysql_real_escape_string($_POST['number_of_tickets_level1']);
		$number_of_tickets_level2 = mysql_real_escape_string($_POST['number_of_tickets_level2']);
		$number_of_tickets_level3 = mysql_real_escape_string($_POST['number_of_tickets_level3']);
		$match_id = mysql_real_escape_string($_POST["match_id"]);
		if( empty($number_of_tickets_level1)){
			$number_of_tickets_level1=0;
		}
		if( empty($number_of_tickets_level2)){
			$number_of_tickets_level2=0;
		}
		if( empty($number_of_tickets_level3)){
			$number_of_tickets_level3=0;
		}

		
		if(!empty($number_of_tickets_level1) || !empty($number_of_tickets_level2) || !empty($number_of_tickets_level3)){

			$ticketsnumberOfEachLevel = "select * from tbl_levels_ticket_prices where match_id ='$match_id'";	
			$resultofticketsNumberOfEachLevel = mysql_query($ticketsnumberOfEachLevel) or die(mysql_error());

			$resultRow = mysql_fetch_array($resultofticketsNumberOfEachLevel);
			$level1Tickets =  explode("/",$resultRow["level_1_details"]);
			$level2Tickets = explode("/",$resultRow["level_2_details"]);
			$level3Tickets = explode("/",$resultRow["level_3_details"]);

			if(($number_of_tickets_level1+$number_of_tickets_level2+$number_of_tickets_level3) 
				<= ( $level1Tickets[0]+$level2Tickets[0]+$level3Tickets[0] )){
				   
					$getSumOfBookingTicketsForEachLevel = "SELECT DISTINCT (match_id), SUM( level1_details ) as sum1 , SUM( level2_details ) as sum2 , SUM( level3_details ) as sum3 
					FROM tbl_booking
					WHERE match_id ='$match_id'";
				 	$resultOfSumOfBookingTicketsForEachLevel = mysql_query($getSumOfBookingTicketsForEachLevel);
				 	if(!empty($resultOfSumOfBookingTicketsForEachLevel)){
				 			
				 			$row = mysql_fetch_array($resultOfSumOfBookingTicketsForEachLevel);
				 		 	$sum1 = $row['sum1'];
				 		 	$sum2 = $row['sum2'];
				 		 	$sum3 = $row['sum3'];
				 		 	// die($sum1);
				 		 	// die($number_of_tickets_level1);
				 			if ( ( $sum1+$number_of_tickets_level1 <= $level1Tickets[0] ) && 
				 				($sum2+$number_of_tickets_level2 <= $level2Tickets[0] ) &&
				 				($sum3+$number_of_tickets_level3 <= $level3Tickets[0] ) ){
				 				// echo "<script>console.log('1');</script>";
				 				// die($sum1);
				 				// here the booking shoud be done well !				 		
				 				// echo "success";
				 				$time =  date('Y-m-d H:i:s');
				 				// die($_SESSION["user_id"]);
				 				$current_user_id = $_SESSION["user_id"]; 
				 				
				 				// $doneBooking = "INSERT INTO tbl_booking
         //                        VALUES('','".$current_user_id."','".$match_id."','".$number_of_tickets_level1."','".$number_of_tickets_level2."','".$number_of_tickets_level3."','".$time."','')";

                                $resultDoneBooking = mysql_query("INSERT INTO tbl_booking
                                VALUES('','".$current_user_id."','".$match_id."','".$number_of_tickets_level1."','".$number_of_tickets_level2."','".$number_of_tickets_level3."','".$time."','')") or die(mysql_errno());
                                
                                if($resultDoneBooking){
                                	echo "success";
                                	// exit();
                                }

                                else{
                                	echo "Sorry, Failed to insert";
                                }

				 			}
				 			else
				 			{
				 				echo "Sorry! The Sum of tickets you entered not available.. Maybe There is not available tickets ! or try less number of tickets in each level";	
				 			}
				 	}
				 	else
				 	{
				 		echo "Sorry! Empty Array!";
				 	}				
			}	
			else
			{
				echo "Sorry ! The Total Number Of Tickets You Entered Is Bigger Than The Total Number Of Tickets";
			}
		}
		
	}
	else if($identifier =="register"){
		$user_name = mysql_real_escape_string($_POST['user_name']);
		$user_email = mysql_real_escape_string($_POST['user_email']);
		$user_password = mysql_real_escape_string($_POST['user_password']);
		$user_telephone = mysql_real_escape_string($_POST['user_telephone']);
		
		if(!empty($user_name) && !empty($user_email) 
			&& !empty($user_password) && !empty($user_telephone)){
			$time =  date('Y-m-d H:i:s');
			
			$sql="SELECT * FROM tbl_users WHERE user_email='$user_email'";
			$result=mysql_query($sql) or die(mysql_error());
			$count=mysql_num_rows($result);
			
			// If result matched $email so email exist before
			if($count==1){
				echo "Email Exist Before !";
				// exit();
			}
			else{

				$sqlQuery = "INSERT INTO tbl_users
                                VALUES('','".$user_name."','".$user_email."','".$user_password."','".$user_telephone."','".$time."')";
				$result = mysql_query($sqlQuery);
				//die($city_name);
				if($result) echo "Registration done Successfully";
				
				else echo "Error.. try again!";	
			}			
		}	
	}
	else if($identifier =="login"){
		$user_email = mysql_real_escape_string($_POST['user_email']);
		$user_password = mysql_real_escape_string($_POST['user_password']);
		
		if(!empty($user_email) 
			&& !empty($user_password)){
			$time =  date('Y-m-d H:i:s');
			
			$sql="SELECT * FROM tbl_users WHERE user_email='$user_email' and user_password='$user_password' ";
			$result=mysql_query($sql) or die(mysql_error());
			$resultRow = mysql_fetch_array($result);
			$user_name = $resultRow['user_name'];
			$user_id = $resultRow['user_id'];
			$user_last_login_time = $resultRow['user_last_login_time'];
			
			$count=mysql_num_rows($result);
			
			// If result matched $email and $password, table row must be 1 row
			if($count==1){

				// // Register $user_name, $user_password and redirect to file "index.php"
				$_SESSION["user_name"] = $user_name;
				$_SESSION["user_password"] = $user_password;
				$_SESSION["user_id"] = $user_id;
				// $_SESSION["user_last_login_time"] = $user_last_login_time;
				
				//update last login time 
				$time =  date('Y-m-d H:i:s');
				$updateLastLoginTime = "update tbl_users set user_last_login_time ='$time' WHERE user_email='$user_email' and user_password='$user_password'";
				$resultUpdateTime=mysql_query($updateLastLoginTime) or die(mysql_error());
				
				if(isset($_SESSION["user_name"]) && isset($_SESSION["user_password"])) {
				  echo "Login Successfully";	
				  // header("Location:index.php");
				}
				else {
		  			echo "Try Again";
				}					
			}
			else{
				echo "Email or Password Not Correct";			
			}			
		}	
	}
ob_end_flush();	
?>