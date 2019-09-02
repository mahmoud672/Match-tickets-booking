<?php
	require_once("config.php");
	require_once("header.php");

	$VideosQuery = "SELECT t1.*,t2.match_name,t2.match_time FROM tbl_videos t1 INNER JOIN tbl_match t2
	ON t1.match_id = t2.match_id
	ORDER BY video_id DESC LIMIT 5";
	$VideosResultArray = mysql_query($VideosQuery) or die(mysql_errno());
?>
<!-- article -->
		<!-- <div class="article"> -->
			<style>
				/*.content-section
				{
					min-height: 350px;
				}*/
				.service-img
				{
					width: 400px;
					height: 250px;
				}
				.lead
				{
					font-size: 17px;
					font-weight: 100px;
				}
			</style>
			<br>
			<div class="container content-section">
				<div style="margin-bottom:30px">
					<h2 style="margin-left:20px">Latest Videos</h2>
				</div>
				<table class="table table-hover">
				  <tbody>
				    <?php
				    	if(!empty($VideosResultArray)){
				    		// $iterator = 0;
				    		while ($row = mysql_fetch_array($VideosResultArray)) {
				    			$full_url = $row['video_url'];
				    			$ex_url = explode("watch?v=", $full_url);
				    			// echo $ex_url[0];
				    			// echo $ex_url[1];
				    			// die();
				    			// $custom_url = $ex_url[0]+$ex_url[1];
				    			$custom_url = implode("embed/", $ex_url);
				    			// echo $custom_url;
				    			// die();

				    			?>
				    			 <tr>
				    			 	<td width="40%">
				    			 		<div class="embed-responsive embed-responsive-16by9">
				    			 		    <iframe class="embed-responsive-item" src="<?php echo $custom_url;?>"></iframe>
				    			 		</div>
				    			   	<td>
				    			   		<h4><b>Match Name  : </b> <?php echo $row['match_name'];?></h4>
				    			   		<h4><b>Match Date  : </b> <?php echo $row['match_time'];?></h4>
				    			   		<p class="lead"><?php echo $row['video_description'];?></p>			
				    					</td>
				    			 </tr>
				    			<?php
				    		}
				    	}
				    ?>				  				    				    
				  </tbody>
				</table>
				
			</div>
		</div>
		<!-- //article -->
<?php
	require_once("footer.php");
?>