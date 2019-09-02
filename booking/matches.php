<?php
	require_once("header.php");
	require_once("config.php");

	$MatchesQuery = "SELECT t1.match_id,t1.match_time,t2.place_name,t3.champion_name,t4.team_name as team1,t4.team_logo as logo1,t5.team_name as team2,t5.team_logo as logo2 FROM tbl_match t1 
	INNER JOIN tbl_places t2 ON  t2.place_id = t1.place_id 
	INNER JOIN tbl_champions t3 ON t1.champion_id = t3.champion_id
	INNER JOIN tbl_teams t4 ON t4.team_id = t1.team1_id
	INNER JOIN tbl_teams t5 ON t5.team_id = t1.team2_id
	ORDER BY t1.match_time DESC";
	$MatchesResultArray = mysql_query($MatchesQuery) or die(mysql_errno());

?>
<script type="text/javascript">

  </script>
		<!-- match -->
		<div class="match">
			<!-- container -->
			<div class="container">
				<div class="match-table">
					<?php
						if(!empty($MatchesResultArray)){
							while ( $row = mysql_fetch_array($MatchesResultArray)) {
								?>
								<!--start of table-->
								<div class="table-rows">
									<div class="table-hedding">
										<h3><?php echo date("Y-m-d h:i:s A",strtotime($row['match_time']));?></h3>
									</div>
									<div class="table-row">
										<div class="t-match">
											<div class="col-md-4 table-address">
												<div class="list-hedding">
													<h4>Place & Champion</h4>	
												</div>
												<ul>
													<!-- <li>18 May 2014 - 14:00</li> -->
													<li><b>Place :</b> <?php echo $row['place_name'];?></li>
													<li><b>Champion Name :</b> <?php echo $row['champion_name'];?></li>													
												</ul>
											</div>
											<div class="col-md-4 table-country">
												<div class="list-hedding">
													<h4>Teams</h4>	
												</div>
												<h5><?php echo $row['team1'];?> Vs <?php echo $row['team2'];?><h5>
												<h5>
													<img src="admin_panel_booking/images/<?php echo $row['logo1'];?>" 
													style="width:30px;height:40px"> 
													Vs 
													<img src="admin_panel_booking/images/<?php echo $row['logo2'];?>"
													style="width:30px;height:40px"><h5>
											</div>
											<div class="col-md-4 table-result">
												<div class="list-hedding">
													<h4>Booking</h4>
												</div>
												<p>
													<?php
														  // session_start();  
													  	  if(isset($_SESSION['user_name']) && isset($_SESSION['user_password'])){
													  	  	?>
													  	  	<p>
													  	  		<a href="show_details.php?match_id=<?php echo $row['match_id'];?>"
													  	  			class="btn btn-default btn-md">Book</a>                      											
                  											</p>
													  	  	<?php
													  	  } 
													  	  else{
													  	  	?>
													  	  	<p>
													  	  		<a href="#" class="btn btn-default btn-md disabled">Book</a>
													  	  		<p style="font-size:12px;">Pleas Login First to book</p>
													  	  	</p>
                  
													  	  	<?php
													  	  } 
													?>
													
												</p>
											</div>
											<div class="clearfix"> </div>
										</div>
										
									</div>
								</div>
								<!--end of table-->
								<?php
							}
						}
						
					?>
					
					
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //match -->
		<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="delete" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-danger "><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to delete this Record?</div>
            <!-- <p></p> -->
         </div>
         <div class="modal-footer ">
            <button type="button" class="btn btn-success" data-dismiss="modal" id="btnYes"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
         </div>
      </div>
      <!-- /.modal-content --> 
   </div>
   <!-- /.modal-dialog --> 
</div>
<?php
	require_once("footer.php");
?>		