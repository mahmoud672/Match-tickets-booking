<?php
  require_once("config.php");
  $sql_query="select * from tbl_admins order by admin_id desc";
  $result=mysql_query($sql_query) or die(mysql_error());
?>
  <!--jqueryscript to handle all insert methods-->
  <script type="text/javascript" src="ajax/submit.js"></script>
  <script type="text/javascript" src="ajax/jquery-min-form.js"></script>
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
         console.log("id of team = "+id);
         deleteFrom(id,"admins_table");
         
     });
  </script>
	<!-- Content Header (Page header) -->
	<section class="content-header">
	  <h1>
	    Dashboard
	    <small>All Admins</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">List All Admins</li>
	  </ol>
	</section>		
   <div class="col-md-12">
   <h4>All Admins</h4>
   <div class="table-responsive">
      <table id="mytable" class="table table-bordred table-striped">
         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
            <th>Admin Name</th>
            <th>Admin Email</th>
            <th>Admin Password</th>
            <th>Admin Telephone</th>
            
            <th>Delete</th>
         </thead>
         <tbody>
         <?php
         if(!empty($result)){

           while($row=mysql_fetch_array($result))
            {
              ?>

           <tr>
               <td><?php  echo $row['admin_name'];?></td>
               <td><?php  echo $row['admin_email'];?></td>
               <td><?php  echo $row['admin_password'];?></td>
               <td><?php  echo $row['admin_telephone'];?></td>
               
               <td>
                 <p data-placement="top" data-toggle="tooltip" title="Delete">
                      <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['admin_id'];?>">
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

<div class="container">
  <div class="row">
  	<div class="col-md-6">
          <form class="form-horizontal" action="" id="add_new_team" method="POST" >
          <fieldset>
            <div id="legend">
              <div id="msg" class="col-md-12 col-xs-12"></div>
              <legend class="">Add New Admin</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="adminname">Admin Name</label>
              <div class="controls">
                <input type="text" id="admin_name" name="admin_name" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="admin_email">Admin Email</label>
              <div class="controls">
                <input type="email" id="admin_email" name="admin_email" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="admin_password">Admin Password</label>
              <div class="controls">
                <input type="password" id="admin_password" name="admin_password" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="admin_telephone">Admin Telephone</label>
              <div class="controls">
                <input type="text" id="admin_telephone" name="admin_telephone" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
                 
            <br>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <input type="button" class="btn btn-success" id="AddNewAdmin" value="Add"/>
              </div>
            </div>
            <br>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>

