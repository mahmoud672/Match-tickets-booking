<?php
	require_once("header.php");
?>
<script type="text/javascript" src="js/ajaxMethods.js"></script>
<style type="text/css">
.container
{
	width: 80%;
}
</style>
		<div id="" class="container">
			   
<!-- Mixins-->
<!-- Pen Title-->
		<div class="pen-title">
		  <h1>Login</h1><span>Go <i class='fa fa-code'></i> to <a href="index.php"> Home Page</a></span>
		</div>
		<!-- <div class="rerun"><a href="">Nothing else</a></div> -->
		<div class="container">
		  <div class="card"></div>
		  <div class="card">
			<h1 class="title">Login</h1>
			<h1 class="title" style="font-size:15px">
				<p class="msg"></p>
			</h1>
			<form action=""method="POST">
			  <div class="input-container">
				<input type="email" id="user_email" name="user_email" required="required"/>
				<label for="Username">User Email</label>
				<div class="bar"></div>
			  </div>
			  <div class="input-container">
				<input type="password" id="user_password" name="user_password" required="required"/>
				<label for="Password">Password</label>
				<div class="bar"></div>
			  </div>
			  <div class="button-container">
				<button id="login"><span>Go</span></button>
			  </div>
			  <!-- <div class="footer"><a href="#">Forgot your password?</a></div> -->
			</form>
		  </div>
		  <div class="card alt">
			<div class="toggle"></div>
			<h1 class="title" style="font-size:18px">Register
			  <div class="close"></div>
			</h1>
			<h1 class="title" style="font-size:15px">
				<p class="msg"></p>
			</h1>			
			<form action="" method="POST">
			  
			  <div class="input-container">
				<input type="text" id="user_name1" name="user_name1"/>
				<label for="Username">Username</label>
				<div class="bar"></div>
			  </div>
			   <!--- E-mail -->
			   <div class="input-container">
				<input type="email" id="user_email1" name="user_email1"/>
				<label for="e_mail">E-mail</label>
				<div class="bar"></div>
			  </div>
			  <!-- E-mail -->
			  <div class="input-container">
				<input type="password" id="user_password1" name="user_password1"/>
				<label for="Password">Password</label>
				<div class="bar"></div>
			  </div>			  
			   <!-- telephone --> 
			   <div class="input-container">
				<input type="text" id="user_telephone1" name="user_telephone1"/>
				<label for="telephone">User_telephone</label>
				<div class="bar"></div>
			  </div>
			  <div class="button-container">
				<button id="register"><span>Register</span></button>
				<!-- <input type="submit" id="register" value="Register" class="btn btn-default"/> -->

			  </div>
			</form>
		  </div>
		</div>
		<!-- Portfolio--><a id="portfolio" href="#" title="View my portfolio!"><i class="fa fa-link"></i></a>
		<!-- CodePen--><a id="codepen" href="#" title="Follow me!"><i class="fa fa-codepen"></i></a>
			<script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

				<script src="js/indexiogin.js"></script>
		
		
		</div>
		<!---  //content  -->
		<br/><br/>
		<br/><br/>
		<br/>
        <br/>
		<br/>
        <br/>
        <br/>
        <br/>
        <br/>
        <br/>
<?php
	require_once("footer.php");
?>
		
		
	