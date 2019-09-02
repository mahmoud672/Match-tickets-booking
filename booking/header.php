<!DOCTYPE html>
<html>
<head>
<title>Tickets Booking </title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="forward Responsive web template, Bootstrap Web Templates, Flat Web Templates, Andriod Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyErricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>

<link rel="stylesheet" href="css/resetlogin.css.css">
<link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
<link rel="stylesheet" href="css/stylelogin.css"/>

<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">

<!-- js -->
<script src="js/jquery.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- js -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
jQuery(document).ready(function($) {
	$(".scroll").click(function(event){		
		event.preventDefault();
	$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
});
});
</script>
<!-- <script src="admin_panel_booking/plugins/jQuery/jQuery-2.1.4.min.js"></script> -->

<!-- start-smoth-scrolling -->
</head>
	<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6&appId=903458986465963";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		<!-- header -->
		<div class="header">
			<div class="header-top">
				<!-- container -->
				<div class="container">
					<div class="header-top-left">
						<ul>
							
							<?php
							  session_start();  
						  	  if(isset($_SESSION['user_name']) && isset($_SESSION['user_password']))  
							  {    
							  	 ?>
							  	 <li><a href="">Welcome , <b><?php echo $_SESSION['user_name']; ?></b> : </a></li>
							  	 <li><a href="logout.php">Logout</a></li>
							  	 <?php     
							  }
							  else
							  {
							  	?>
							  	<li><a href="loginform.php">Login</a></li>
							  	<li><a href="loginform.php">registration</a></li>
							  	<?php
							  }  
							?>
							
							<!--<li><a href="#">News</a></li>
							<li><a href="#">Individuals</a><li> -->
						</ul>
					</div>
					<div class="header-top-right">
                        <!--<form>
                            <input type="text" placeholder=" " required="">
                            <input type="submit" value=" ">
                            <div class="clearfix"> </div>
                        </form>-->
                    </div>
                    <div class="clearfix"> </div>
                </div>
                <!-- //container -->
			</div>
			<div class="header-middle">
				<!-- container -->
				<div class="container">
					<div class="header-middle-logo">
						<a href="index.php">Tickets Booking</a>
					</div>
					<div class="header-middle-right">
						<div class="phone">
							<span> </span>
							<ul>
								<li class="gray">Phone</li>
								<li>0201147608798</li>
								<li>0201150344317</li>
							</ul>
							<div class="clearfix"> </div>
						</div>
						<div class="location">
							<span> </span>
							<ul>
								<li class="gray">Address<li>
								<li>Giza</li>
								<li>EGYPT</li>
							</ul>
						</div>
						<div class="clearfix"> </div>
					</div>
					<div class="clearfix"> </div>
				</div>
				<!-- //container -->
			</div>
			<div class="top-nav">
				<!-- container -->
				<div class="container">
					<span class="menu">MENU</span>
					<ul class="nav1">
						<li><a href="videos.php">Videos</a><li>                        
						<li><a href="news.php">News</a><li>						
						<li><a href="matches.php">Matches</a><li>                 
						<!-- <li><a href="gallery.html">Gallery</a><li>                -->
						<!--<li><a href="blog.html">Blogs</a><li> -->
						<li><a href="contact.php">Contact</a></li>
						<?php
						   // session_start();  
						  if(isset($_SESSION['user_name']) && isset($_SESSION['user_password']))  
						  {    
						  	 ?>
						  	 <li><a href="logout.php">Logout</a><li>
						  	 <?php     
						  }
						  else
						  {
						  	?>
						  	<li><a href="loginform.php">Sign in</a></li>
						  	<?php
						  }  
						?>						
						<div class="clearfix"> </div>
					</ul>
					<!-- script-for-menu -->
							 <script> 
							   $( "span.menu" ).click(function() {
								 $( "ul.nav1" ).slideToggle( 300, function() {
								 // Animation complete.
								  });
								 });
							
							</script>
						<!-- /script-for-menu -->
				</div>
				<!-- //container -->
			</div>
			<div class="blue"> </div>
		</div>
		<!-- //header -->