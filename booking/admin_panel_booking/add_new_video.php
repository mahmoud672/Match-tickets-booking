<?php
  require_once("config.php");
  $sql_query="select t1.video_id,t1.video_url,t1.video_description,t2.match_name from tbl_videos t1 
              LEFT JOIN tbl_match t2 ON t1.match_id=t2.match_id order by t1.video_id desc";
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
         deleteFrom(id,"videos_table");
         
     });
  </script>
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Dashboard
      <small>All Video</small>
    </h1>
    <ol class="breadcrumb">
      <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li class="active">List All Video</li>
    </ol>
  </section>    
   <div class="col-md-12">
   <h4>All Video</h4>
   <div class="table-responsive">
      <table id="mytable" class="table table-bordred table-striped">
         <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
            <th>Video Description</th>
            <th>Video URL</th>
            <th>Match Name</th>
            
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
               <td><?php  echo $row['video_description'];?></td>
               <td><a href="<?php  echo $row['video_url'];?>" target="_blank"> Video Link </a></td>
               <td><?php  echo $row['match_name'];?></td>
               
               <td>
                  <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
               </td>
               <td>
                 <p data-placement="top" data-toggle="tooltip" title="Delete">
                      <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['video_id'];?>">
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
              <legend class="">Add New Video</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="videourl">Video URL</label>
              <div class="controls">
                <input type="url" id="video_url" name="video_url" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
             <div class="control-group">
              <label class="control-label" for="videodescription">Video Description</label>
              <div class="controls">
                <textarea id="video_description" name="video_description" placeholder="" class="form-control input-md"> </textarea> 
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="matchname">Match Name</label>
              <div class="controls">
               <select name="match_name" id="match_name" class="form-control select-lg">
                  <?php
                    $sql_query="select match_time,match_id,match_name from tbl_match order by match_id desc";
                    $resultOfMatchs=mysql_query($sql_query) or die(mysql_error());
                    if(!empty($resultOfMatchs)){
                      echo '<option value=""></option>';
                      while ($row=mysql_fetch_array($resultOfMatchs)) {
                        ?>
                        <option value='<?php echo $row['match_id'];?>'><?php echo $row['match_name'];
                        echo " /Time = ";
                        echo $row['match_time'];?></option>
                        <?php 
                      }
                    }                   
                  ?>
                </select>
              </div>
            </div>

            <br>
            <div class="control-group">
              <!-- Button -->
              <div class="controls">
                <input type="button" class="btn btn-success" id="AddNewVideo" value="Add"/>
              </div>
            </div>
            <br>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>

