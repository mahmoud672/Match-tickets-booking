<?php
	require_once("header.php");
	require_once("config.php");
	$match_id = $_GET['match_id'];

	$sql_query = "select t1.match_name,t1.match_time,t1.tickets_numbers,t2.level_1_details,t2.level_2_details,t2.level_3_details from tbl_match t1
	INNER JOIN tbl_levels_ticket_prices t2 ON t1.match_id = t2.match_id AND t1.match_id = '$match_id'";
	$result=mysql_query($sql_query) or die(mysql_error());


?>
<script type="text/javascript" src="js/ajaxMethods.js"></script>

<style type="text/css">
	.content-section
	{
		min-height: 350px;
	}
	.table > thead > tr > th
	{
		color:white;

	}
	.table
	{
		font-size: 15px;
	}
	.table > thead > tr > th,
	.table > tbody > tr > th,
	.table > tfoot > tr > th,
	.table > thead > tr > td,
	.table > tbody > tr > td,
	.table > tfoot > tr > td
	{
	  color: black;
    }
</style>
<div class="content-section container-fluid">
	<!--========================-->
	  <!--jqueryscript to handle all insert methods-->
	  <script type="text/javascript" src="js/ajaxMethods.js"></script>
	  <!-- Content Header (Page header) -->
	  <section class="content-header">
	    <h1>
	      All Tickets Details
	    </h1>
	    <ol class="breadcrumb">
	      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	      <li class="active">List All Tickets Details of The Match</li>
	    </ol>
	  </section>    
	   <div class="col-md-12">
	   <h4>Match Details</h4>
	   <div class="table-responsive">
	      <table id="mytable" class="table table-bordred table-striped">
	         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
	            <th>Match Name</th>
	            <th>Match Time</th>
	            <th>All Tickets Number</th>
	            <th>Level 1 (Tickets/Price)</th>
	            <th>Level 2 (Tickets/Price)</th>
	            <th>Level 3 (Tickets/Price)</th>
	         </thead>
	         <tbody>
	         <?php
	         if(!empty($result)){

	           $row=mysql_fetch_array($result);
	            // {
	               // echo $row['offer_title'];?>

	           <tr>
	               <td><?php  echo $row['match_name'];?></td>
	               <td><?php  echo date("Y-m-d h:i:s A",strtotime($row['match_time']));?></td>
	               <td><?php  echo $row['tickets_numbers'];?></td>	               
	               <td><?php  echo $row['level_1_details'];?></td>
	               <td><?php  echo $row['level_2_details'];?></td>
	               <td><?php  echo $row['level_3_details'];?></td>	           	              
	            </tr>
	              
	              <?php
	            // }
	          }

	         ?>
	           
	        </tbody>
	      </table>
	      <div class="clearfix"></div>
	   </div>
	</div>
	
	<div class="col-xs-12 col-md-12"><hr style="height:5px;background-color:#3c8dbc"></div>

	<div class="container">
	  <div class="row">
	    <div class="col-md-6">
	          <!--we want to add image using this form so , add new attribute to support multipart-->
	          <?php
    	        $count=mysql_num_rows($result);

	          	if($count==1){
	          ?>
	          <form class="form-horizontal" action="" id="add_new_booking" method="POST">
	          <fieldset>
	            <div id="legend">
	              <div id="msg" class="col-md-12 col-xs-12"></div>
	              <legend class="">Do You Want to Book ? do it now !</legend>
	            </div>
	           
	            <div class="control-group">
	              <label class="control-label" for="level1Tickets">Level 1 Tickets</label>
	              <div class="controls">
	                <input type="number" id="number_of_tickets_level1" name="number_of_tickets_level1" placeholder="" class="form-control input-md">
	                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
	              </div>
	            </div>
	            <input type="hidden" value='<?php echo $match_id;?>' name="match_id" id = "match_id"/>
	            <div class="control-group">
	              <label class="control-label" for="level2Tickets">Level 2 Tickets</label>
	              <div class="controls">
	                <input type="number" id="number_of_tickets_level2" name="number_of_tickets_level2" placeholder="" class="form-control input-md">
	                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
	              </div>
	            </div>
	            
	            <div class="control-group">
	              <label class="control-label" for="level3Tickets">Level 3 Tickets</label>
	              <div class="controls">
	                <input type="number" id="number_of_tickets_level3" name="number_of_tickets_level3" placeholder="" class="form-control input-md">
	                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
	              </div>
	            </div>
	           
	            <br>
	            <div class="control-group">
	              <!-- Button -->
	              <div class="controls">
	                <input type="button" class="btn btn-success" id="addNewBooking" value="Book"/>
	              </div>
	            </div>
	            <br>
	          </fieldset>
	        </form>
	    <?php } ?>
	    </div> 
	  </div>
	</div>
	<!--=======================-->

</div>
<?php
	require_once("footer.php");
?>


