<?php
require_once("config.php");
$sql_query="select t1.match_name as matchName,t1.match_time as matchTime,t2.user_name as userName,t3.* FROM tbl_match t1 
INNER JOIN tbl_booking t3 ON t1.match_id = t3.match_id 
INNER JOIN tbl_users t2 ON t2.user_id = t3.user_id order by t3.booking_id desc";
$result=mysql_query($sql_query) or die(mysql_error());
	?>
  <!--jqueryscript to handle all ajaxMethods methods-->
  <script type="text/javascript" src="ajax/ajaxMethods.js"></script>

  <script type="text/javascript">
      $('#delete_modal').on('show', function() {
         var id = $('.confirm-delete').data('id');
         var id = $(this).data('id'),
         removeBtn = $(this).find('.danger');
     })

     $('.confirm-delete').on('click', function(e) {
         e.preventDefault();

         var id = $(this).data('id');
         $('#delete_modal').data('id', id).modal('show');
     });

     $('#btnYes').click(function() {
         // handle deletion here
         var id = $('#delete_modal').data('id');                
         $('[data-id='+id+']').parents('tr').remove();
         $('#delete_modal').modal('hide');
         deleteFrom(id,"booking_table");
         
     });
     //--------Handle Confirm Appo. Here-----------
     $('.confirm-appo').on('click', function(e) {
         e.preventDefault();

         var id = $(this).data('id');
         $('#confirm_model').data('id', id).modal('show');
     });
     $('#btnYes-appo').click(function() {
         // handle deletion here
         var booking_id = $('#confirm_model').data('id');                
         //$('[data-id='+id+']').parents('tr').remove();
         $('#confirm_model').modal('hide');
         // console.log("appo_id = "+ id);
         confirmBooking(booking_id);
         
     });
  </script>
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Dashboard
	    <small>All Bookings</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">List All Bookings</li>
	  </ol>
	</section>
  <div id="msg" class="col-md-12 col-xs-12"></div>		
   <div class="col-md-12">
   <h4>All Bookings</h4>

   <div class="table-responsive">
      <table id="mytable" class="table table-bordred table-striped">
         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">

          <th>User Name</th>
          <th>Match Name</th>
          <th>Match Time</th>
          <th>#Tickets_Level 1</th>
          <th>#Tickets_Level 1</th>
          <th>#Tickets_Level 1</th>
          <th>Booking Time</th>
          <th>Booking Status</th> 
          <th>Confirm</th>
          <th>Delete</th>
         </thead>
         <tbody>
            <?php
           if(!empty($result)){

             while($row=mysql_fetch_array($result))
              {
                 ?>
             <tr>
                 <td><?php  echo $row['userName'];?></td>
                 <td><?php  echo $row['matchName'];?></td>
                 <td><?php  echo $row['matchTime'];?></td>
                 <td><?php  echo $row['level1_details'];?></td>
                 <td><?php  echo $row['level2_details'];?></td>
                 <td><?php  echo $row['level3_details'];?></td>
                 <td><?php  echo $row['booking_time'];?></td>
                 <td><?php  echo $row['booking_status'];?></td>
                 
                 <td>
                    <p data-placement="top" data-toggle="tooltip" title="Confirm">
                      <button <?php if ($row['booking_status']=="1"){ ?> disabled="disabled" <?php } ?> class="btn btn-success btn-xs confirm-appo" data-title="Confirm" data-toggle="modal" data-id="<?php echo $row['booking_id'];?>" >
                        <span class="glyphicon glyphicon-pencil"></span>
                      </button>
                    </p>
                 </td>
                 <td>
                    <p data-placement="top" data-toggle="tooltip" title="Delete">
                      <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['booking_id'];?>">
                        <span class="glyphicon glyphicon-trash"></span>
                      </button>
                    </p>
                 </td>
              </tr>
                
                <?php
              }
            }

           ?>
             
             
            
         </tbody>
      </table>
      <div class="clearfix"></div>
   </div>
</div>

<div class="modal fade" id="confirm_model" tabindex="-1" role="dialog" aria-labelledby="confirm" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Confirm This Appointment</h4>
         </div>
         <div class="modal-body">
            <div class="alert alert-success"><span class="glyphicon glyphicon-warning-sign"></span> Are you sure you want to confirm ?</div>
            <p></p>
         </div>
         <div class="modal-footer ">
            <button type="button" class="btn btn-success" data-dismiss="modal" id="btnYes-appo"><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
            <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
         </div>
      </div>
      <!-- /.modal-content --> 
   </div>
   <!-- /.modal-dialog --> 
</div>

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
<div class="col-xs-12 col-md-12"><hr style="height:5px;background-color:#3c8dbc"></div>



