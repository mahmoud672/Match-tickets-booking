<?php
require_once("config.php");
$sql_query="select msg_id,sender_email,msg_content from messages_table";
$result=mysql_query($sql_query) or die(mysql_error());
	?>
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
         deleteFrom(id,"messages_table");
         
     });
  </script>
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Dashboard
	    <small>All Messages</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">List All Messages</li>
	  </ol>
	</section>		
   <div class="col-md-12">
   <h4>All Messages</h4>
   <div class="table-responsive">
      <table id="mytable" class="table table-bordred table-striped">
         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
            <th>Sender Email </th> 
            <th>Sender Message</th>
            
             
           
            <th>Delete</th>
         </thead>
         <tbody>
            <?php
           if(!empty($result)){

             while($row=mysql_fetch_array($result))
              {
                 // echo $row['offer_title'];?>

             <tr>
                 <td><?php  echo $row['sender_email'];?></td>
                 <td><?php  echo $row['msg_content'];?></td>                 
                 <td>
                   <p data-placement="top" data-toggle="tooltip" title="Delete">
                     <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['msg_id'];?>">
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



