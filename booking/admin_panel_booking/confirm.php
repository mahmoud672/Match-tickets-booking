<?php
	require_once('config.php');

	$id = $_GET['id'];
	if($id == "booking"){
	
		$booking_id = mysql_real_escape_string($_POST['booking_id']);

		if(!empty($booking_id)){
			//select email of appo_owner
			//then send mail message to him
			// then update appo_row id => status =1
			$getUserEmailQuery = "SELECT t1.user_email FROM tbl_users t1
					INNER JOIN tbl_booking t2
					ON t1.user_id = t2.user_id";
			$result = mysql_query($getUserEmailQuery) or die(mysql_error());
			$emailArray = mysql_fetch_assoc($result);
			$email =  $emailArray['user_email'];
			// die($email);
			$headers = "From: BookingEgypt.com";
			// mail($to,$subject,$msg,$headers)
			$retval = mail($email,"Confirm Booking","Hello, Dear Customer <br> we would like to confirm Your Booking",$headers);

			 // $retval = mail ($to,$subject,$message,$header);
	         
	         if( $retval == true ) {
	            echo "Confirmation Email is sent successfully...";
	            $updateBookingStatus = "UPDATE tbl_booking
								 SET booking_status=1
								 WHERE booking_id='".$booking_id."'";
				mysql_query($updateBookingStatus);	
	         }else {
	            echo "Confirmation Email could not be sent !! Try Again";
	         }
		}
	}
	
?>