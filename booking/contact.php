<?php 
	require_once("header.php");
?>
<script type="text/javascript" src="js/ajaxMethods.js"></script>
<style type="text/css">
	.contact-info-grids form input[type="email"]
	{
	  width: 32.63%;
	  color: #898888;
	  outline: none;
	  font-size: 14px;
	  padding: .5em;
	  margin: 0 .5em 1em 0;
	  border: solid 1px #D5D4D4;
	  -webkit-appearance: none;
	}
	.contact-info-grids form textarea
	{
	  resize: none;
	    width: 80%;
	    color: #898888;
	    font-size: 14px;
	    outline: none;
	    padding: .5em;
	    border: solid 1px #D5D4D4;
	    min-height: 150px;
	    -webkit-appearance: none;
	  }
</style>
		<!-- contact -->
		<div class="contact">
			<!-- container -->
			<div class="container">
				<div class="contact-info">
					<!--<h3 class="c-text">Get in Touch</h3>
				</div>
				<div class="map">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d387144.0363579609!2d-73.97967999999999!3d40.70562585!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sin!4v1420306161351" frameborder="0" style="border:0"></iframe>-->
				</div>
				<div class="contact-grids">
					<div class="col-md-4 contact-grid-left">
						<h3>Address :</h3>
						<p>The Company Name TB.
						<span>Elharam_Giza,</span>
							55Elharam Street.
						</p>
					</div>
					<div class="col-md-4 contact-grid-middle">
						<h3>Phones :</h3>
						<ul>
							<li>Ph: 0201147608798</li>
							<li>Ph: 0201150344317</li>
							<li>Ph: 0201115696583</li>
							<li>Ph: 0201118834073</li>
						</ul>
					</div>
					<div class="col-md-4 contact-grid-right">
						<h3>E-mail :</h3>
						<a href="mailto:ibrahimmostafa237@yahoo.com">ibrahimmostafa237@yahoo.com</a>
                        <a href="mailto:ahmedhamed426@gmail.com">ahmedhamed426@gmail.com</a>
					</div>
					<div class="clearfix"> </div>
					<div class="contact-info">
						<div class="contact-info-text">
							<h3>Information about us:</h3>
							<p>Our team want to help clients to solve their problems that faces. 
								If you want to contact us don't hesitate fill this form and send .
							<div id="msg" class="col-md-12 col-xs-12"></div>
							</p>
						</div>							
						<div class="contact-info-grids">

							<form action="" method="POST">
								<input type="email" name="sender_email" id="sender_email" placeholder="Email" required="required" >
								<textarea name="sender_message" id="sender_message" placeholder="Message" required="required" ></textarea>
								<br>
								<!-- <input type="submit" value="SEND" id="sendMessage"> -->
								<input type="submit" id="sendMessage" value="SEND"/>

							</form>
						</div>
					</div>
				</div>
			</div>
			<!-- //container -->
		</div>
		<!-- //contact -->
<?php
	require_once("footer.php");
?>