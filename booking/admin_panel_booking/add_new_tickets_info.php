<?php
  require_once("config.php");
  $sql_query = "SELECT t1.match_name,t1.match_time,t2.id as row_id,t2.level_1_details,t2.level_2_details,t2.level_3_details FROM tbl_match t1 INNER JOIN tbl_levels_ticket_prices t2 ON t1.match_id = t2.match_id
  ORDER BY t2.id DESC";
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
         deleteFrom(id,"add_new_tickets");
         
     });
  </script>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>All Tickets Details</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">List All Tickets Details</li>
    </ol>
  </section>    
   <div class="col-md-12">
   <h4>All Tickets Details</h4>
   <div class="table-responsive">
      <table id="mytable" class="table table-bordred table-striped">
         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
            <th>Match Name</th>
            <th>Match Time</th>
            <th>Level 1 (Tickets/Price)</th>
            <th>Level 2 (Tickets/Price)</th>
            <th>Level 3 (Tickets/Price)</th>

            <th>Edit</th>
            <th>Delete</th>
         </thead>
         <tbody>
         <?php
         if(!empty($result)){

           while($row=mysql_fetch_array($result))
            {
               // echo $row['offer_title'];?>

           <tr>
               <td><?php  echo $row['match_name'];?></td>
               <td><?php  echo date("Y-m-d h:i:s A",strtotime($row['match_time']));?></td>
               <td><?php  echo $row['level_1_details'];?></td>
               <td><?php  echo $row['level_2_details'];?></td>
               <td><?php  echo $row['level_3_details'];?></td>
               
               <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
               </td>
               <td>
                 <p data-placement="top" data-toggle="tooltip" title="Delete">
                      <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['row_id'];?>">
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
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
            <h4 class="modal-title custom_align" id="Heading">Edit Your Detail</h4>
         </div>
         <div class="modal-body">
            <div class="form-group">
               <input class="form-control " type="text" placeholder="Mohsin">
            </div>
            <div class="form-group">
               <input class="form-control " type="text" placeholder="Irshad">
            </div>
            <div class="form-group">
               <textarea rows="2" class="form-control" placeholder="CB 106/107 Street # 11 Wah Cantt Islamabad Pakistan"></textarea>
            </div>
         </div>
         <div class="modal-footer ">
            <button type="button" class="btn btn-warning btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-ok-sign"></span> Update</button>
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

<div class="container">
  <div class="row">
    <div class="col-md-6">
          <!--we want to add image using this form so , add new attribute to support multipart-->
          <form class="form-horizontal" action="" id="add_new_news" method="POST" enctype="multipart/form-data">
          <fieldset>
            <div id="legend">
              <div id="msg" class="col-md-12 col-xs-12"></div>
              <legend class="">Add New Tickets</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="matchname">Match Name</label>
              <div class="controls">
               <select name="match_name" id="match_name" class="form-control select-lg">
                  <?php
                    $sql_query="select match_id,match_name,match_time,tickets_numbers from tbl_match order by match_id desc";
                    $resultOfMatchs=mysql_query($sql_query) or die(mysql_error());
                    if(!empty($resultOfMatchs)){
                      global $num_tickets;
                      echo '<option value=""></option>';
                      while ($row=mysql_fetch_array($resultOfMatchs)) {
                        $num_tickets = $row['tickets_numbers'];
                        
                        ?>
                        <option value='<?php echo $row['match_id'];?>'><?php echo $row['match_name'];
                        echo " /Time = ";
                        echo $row['match_time'];
                        echo " /Tickets = ";
                        echo $num_tickets;
                        ?></option>
                        <?php 
                      }
                    }                   
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="level1Tickets">Level 1 Tickets</label>
              <div class="controls">
                <input type="number" id="number_of_tickets_level1" name="number_of_tickets_level1" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
              </div>
            </div>
            <input type="hidden" value='<?php echo $num_tickets;?>' name="num_tickets" id = "num_tickets"/>

            <div class="control-group">
              <label class="control-label" for="level1Price">Level 1 Price</label>
              <div class="controls">
                <input type="number" id="level1_price" name="level1_price" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="level2Tickets">Level 2 Tickets</label>
              <div class="controls">
                <input type="number" id="number_of_tickets_level2" name="number_of_tickets_level2" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="level2Price">Level 2 Price</label>
              <div class="controls">
                <input type="number" id="level2_price" name="level2_price" placeholder="" class="form-control input-md">
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
            <div class="control-group">
              <label class="control-label" for="level3Price">Level 3 Price</label>
              <div class="controls">
                <input type="number" id="level3_price" name="level3_price" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
              </div>
            </div>
            <br>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <input type="button" class="btn btn-success" id="AddNewTickets" value="Add"/>
              </div>
            </div>
            <br>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>

