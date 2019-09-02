<?php
	require_once("header.php");
	require_once("config.php");
?>
<style type="text/css">
.how-right-left img
{
	width: 45px;
}
.news_date{
	  background-color: #fff;
  	  opacity: 0.8;
  	  color:#000;
  	}
 .news-grid-left p
 {
 	color: #000;
 }
 .news
 {
 	background-color: #A5A3A3;
 }
</style>		
<!-- banner -->
		<div class="banner-slider">
			<!-- banner Slider starts Here -->
					<script src="js/responsiveslides.min.js"></script>
					 <script>
						// You can also use "$(window).load(function() {"
						$(function () {
						  // Slideshow 4
						  $("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
							  $('.events').append("<li>before event fired.</li>");
							},
							after: function () {
							  $('.events').append("<li>after event fired.</li>");
							}
						  });
					
						});
					  </script>
					<!--//End-slider-script -->
					<div  id="top" class="callbacks_container">
						<ul class="rslides" id="slider3">
							<li>
								<div class="banner"> </div>
							</li>
							<li>
								<div class="banner-img"> </div>
							</li>
						</ul>
					</div>
		</div>
		<!-- //banner -->
		<!-- how -->
		<div class="how">
			<!-- container -->
			<div class="container">
				<div class="how-top-grids">
					<div class="col-md-7 how-left">
						<h3>How the people like to play</h3>
						<img src="images/4.jpg" alt="" />
						<a class="play-icon popup-with-zoom-anim" href="#small-dialog">
							<span> </span>
						</a>
						<!-- pop-up-box -->
						<script type="text/javascript" src="js/modernizr.custom.min.js"></script>    
						<link href="css/popuo-box.css" rel="stylesheet" type="text/css" media="all" />
						<script src="js/jquery.magnific-popup.js" type="text/javascript"></script>
						<!--//pop-up-box -->
						<div id="small-dialog" class="mfp-hide">
							<iframe src="//player.vimeo.com/video/37369607" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
						</div>
						 <script>
							$(document).ready(function() {
							$('.popup-with-zoom-anim').magnificPopup({
								type: 'inline',
								fixedContentPos: false,
								fixedBgPos: true,
								overflowY: 'auto',
								closeBtnInside: true,
								preloader: false,
								midClick: true,
								removalDelay: 300,
								mainClass: 'my-mfp-zoom-in'
							});
																							
							});
						</script>
						<h4>Football is a family of team sports that involve, to varying degrees,
						 kicking a ball to score a goal. Unqualified, the word football is understood to
						  refer to whichever form of football is the most popular in
						  the regional context in which the word appears. Sports commonly called 'football'
						   in certain places include:
						   association football (known as soccer in some countries)
						</h4>
						<p>Various forms of football can be identified in history, often as popular peasant games.
						 Contemporary codes of football can be traced back to the codification of these games at 
						 English public schools during the nineteenth century.[3][4] The expanse of the British
						  Empire allowed these rules of football to spread to areas of British influence outside
						   of the directly controlled Empire,[5] though by the end of the nineteenth century, 
						   distinct regional codes were already developing: Gaelic football, for example, 
						   deliberately incorporated the rules of local traditional football games in order to 
						   maintain their heritage.[6] In 1888, The Football League was founded in England, becoming
						    the first of many professional football competitions. During the twentieth century, 
						    several of the various kinds of football grew to become some of the most popular team
						     sports in the world
						</p>
					</div>
					<div class="col-md-5 how-right">
						<h3>Matches Dates</h3>
						
						<?php
							$getLeates5Matches = "SELECT t1.match_id,t1.match_time,t1.match_name,t4.team_logo as logo1,t5.team_logo as logo2 FROM tbl_match t1 
	INNER JOIN tbl_teams t4 ON t4.team_id = t1.team1_id
	INNER JOIN tbl_teams t5 ON t5.team_id = t1.team2_id
	ORDER BY t1.match_time DESC
	LIMIT 5";
							$result = mysql_query($getLeates5Matches);
							if(!empty($result)){
								while ($row = mysql_fetch_array($result)) {
									?>
									<div class="tournament">
										<div class="how-right-left">
											<img src="admin_panel_booking/images/<?php echo $row['logo1'];?>" alt="" /> 
											vs 
											<img src="admin_panel_booking/images/<?php echo $row['logo2'];?>" alt="" />
										</div>
										<div class="how-right-right">
											<h4><?php echo date("Y-m-d h:i:s A",strtotime($row['match_time']));?></h4>
											<P><?php echo $row['match_name'];?>
											</p>
											<div class="more">
												<a href="matches.php">MORE</a>
											</div>
										</div>
										<div class="clearfix"> </div>
									</div>
									<br>
									<?php
								}
							}
						?>
						
						
						
					</div>
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //how -->
		<!-- news -->
		<div class="news">
			<!-- container -->
			<div class="container">
				<div class="news-info">
					<h3>Our News</h3>
				</div>
				<div class="news-grids">
					
					<?php
						$newsQuery = "select news_title,news_description,news_date from tbl_news ORDER BY news_date DESC LIMIT 3";
						$resultOfNews = mysql_query($newsQuery) or die(mysql_errno());
						if(!empty($resultOfNews)){
							while ($r = mysql_fetch_array($resultOfNews)) {
								?>
								<div class="col-md-4 news-grid">
									<div class="news-grid-left news-grid-right">
										<p class="news_date"><?php echo date("Y-m-d",strtotime($r['news_date']));?></p>
									</div>
									<div class="news-grid-left-info">
										<h5><?php echo $r['news_title'];?></h5>
										<p><?php echo substr($r['news_description'], 0, 60);?>... <a href="news.php"> More>> </a></p>
									</div>
								</div>
								<?php
							}
						}
					?>
					
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //news -->
		<!-- banner-bottom -->
		<div class="banner-bottom">
			<!-- container -->
			<div class="container">
				<div class="banner-bottom-info">
					<h3>Create Account And Make Booking</h3>
					<!-- <h4>Create Account And Make Booking</h4> -->
				</div>
				<div class="banner-bottom-grids">
								
					<div class="clearfix"> </div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //banner-bottom -->
<?php
	require_once("footer.php");
?>