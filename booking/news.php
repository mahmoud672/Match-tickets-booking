<?php
	require_once("config.php");
	require_once("header.php");

	$NewsQuery = "SELECT * FROM tbl_news ORDER BY news_date DESC LIMIT 5";
	$NewsResultArray = mysql_query($NewsQuery) or die(mysql_errno());
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
					<h2 style="margin-left:20px">Latest News</h2>
				</div>
				<table class="table table-hover">
				  <tbody>
				    <?php
				    	if(!empty($NewsResultArray)){
				    		// $iterator = 0;
				    		while ($row = mysql_fetch_array($NewsResultArray)) {
				    			?>
				    			 <tr>
				    			 	<td width="20%"><img src="admin_panel_booking/images/<?php echo $row['news_image'];?>" class="img-responsive service-img"/></td>
				    			   	<td>
				    			   		<h3><?php echo $row['news_title'];?></h3>
				    			   		<h5><b>Date : </b> <?php echo $row['news_date'];?></h5>
				    			   		<p class="lead"><?php echo $row['news_description'];?></p>			
				    					</td>
				    			 </tr>
				    			<?php
				    		}
				    	}
				    ?>				  				    				    
				  </tbody>
				</table>
				<div class="fb-comments" data-href="http://localhost:7777/GP-HELWAN-TEAM/booking/news.php" data-numposts="5"></div>
			</div>
		</div>
		<!-- //article -->
<?php
	require_once("footer.php");
?>