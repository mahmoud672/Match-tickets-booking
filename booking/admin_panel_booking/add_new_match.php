	<!-- Content Header (Page header) -->
	<?php        
      require_once("config.php");      
      $result = mysql_query("
        SELECT t1.* ,t2.champion_name,t3.place_name FROM tbl_match t1 , tbl_champions t2 , tbl_places t3 
        where t1.champion_id = t2.champion_id AND t1.place_id = t3.place_id  ORDER BY t1.match_time DESC") or die ("Error . ".mysql_error());      
  ?> 
  <!--Start Include Js Files from ajax Directory-->

      <!--this file contains all ajax methods like get requests methods-->
      <script type="text/javascript" src="ajax/ajaxMethods.js"></script>
      <!--this file contains all ajax methods like submit/insert requests methods-->
      <script type="text/javascript" src="ajax/submit.js"></script>
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
             deleteFrom(id,"match_table");
             
         });
     </script>
  <!--End Include Js Files from ajax Directory-->
  
  <section class="content-header">
	  <h1>
	    Dashboard
	    <small>Add New Match</small>
	  </h1>
	  <ol class="breadcrumb">
	    <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
	    <li class="active">Add new match</li>
	  </ol>    
	</section>

   <div class="col-md-12">
     <h4>All Matches</h4>
     <div class="table-responsive">
        <table id="mytable" class="table table-bordred  table-hover">
           <thead style="background-color:rgba(21, 126, 181, 0.69);color:white">
            <th>Match Name</th>
            <th>Champion Name</th>
            <th>Time</th>
            <th>Place</th>
            <th>Number Of Tickets</th>
            <th>Edit</th>
            <th>Delete</th>
         </thead>
         <tbody>
            <?php
              if(!empty($result)){
                while($row = mysql_fetch_assoc($result)) {
                  ?>
                  <tr>
                     <td><?php echo $row["match_name"]; ?></td>
                     <td><?php echo $row["champion_name"]; ?></td>
                     <td><?php echo $row["match_time"]; ?></td>
                     <td><?php echo $row["place_name"]; ?></td>
                     <td><?php echo $row["tickets_numbers"]; ?></td>
                     <td>
                        <p data-placement="top" data-toggle="tooltip" title="Edit"><button class="btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p>
                     </td>
                     <td>
                        <p data-placement="top" data-toggle="tooltip" title="Delete">
                             <button class="btn btn-danger btn-xs confirm-delete" data-title="Delete" data-toggle="modal"  data-id="<?php echo $row['match_id'];?>">
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
          <form class="form-horizontal" action="" method="POST">
          <fieldset>
            <div id="legend">
              <div id="msg" class="col-md-12 col-xs-12"></div>
              <legend class="">Add New Match</legend>
            </div>
            <div class="control-group">
              <label class="control-label" for="matchName">Match Name</label>
              <div class="controls">
                <input type="text" id="match_name" name="match_name" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Username can contain any letters or numbers, without spaces</p> -->
              </div>
            </div>
         
            <div class="control-group">
              <label class="control-label" for="matchTime">Match Time</label>
              <div class="controls">
                <input type="datetime-local" id="match_time" name="match_time" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Please provide your E-mail</p> -->
              </div>
            </div>
         
         
            <div class="control-group">
              <label class="control-label" for="numberOfTickets">Number Of Tickets</label>
              <div class="controls">
                <input type="number" id="number_of_tickets" name="number_of_tickets" placeholder="" class="form-control input-md">
                <!-- <p class="help-block">Password should be at least 6 characters</p> -->
              </div>
            </div>
            <!--Start -> Add New Match Form-->
            <div class="control-group">
              <label class="control-label" for="matchPlaces">Match Place</label>
              <div class="controls">
                <!-- <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg"> -->
                <!-- <p class="help-block">Please confirm password</p> -->
                <select name="places_list" id="places_list" class="form-control select-lg">
                  <?php
                    $sql_query="select place_id,place_name from tbl_places";
                    $resultOfPlaces=mysql_query($sql_query) or die(mysql_error());
                    if(!empty($resultOfPlaces)){
                      echo '<option value=""></option>';
                      while ($row=mysql_fetch_array($resultOfPlaces)) {
                        ?>
                        <option value='<?php echo $row['place_id'];?>'><?php echo $row['place_name'];?></option>
                        <?php 
                      }
                    }                   
                  ?>
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="teamOne">Team 1 Name</label>
              <div class="controls">
                <!-- <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg"> -->
                <!-- <p class="help-block">Please confirm password</p> -->
                <select name="team_1_name" id="team_1_name" class="form-control select-lg" onchange="getAllTeamsExceptPassedTeam(this.value)">
                  <?php
                    $sql_query="select team_id,team_name from tbl_teams";
                    $resultOfTeams=mysql_query($sql_query) or die(mysql_error());
                    if(!empty($resultOfTeams)){
                      echo '<option value=""></option>';
                      while ($row=mysql_fetch_array($resultOfTeams)) {
                        ?>
                        <option value='<?php echo $row['team_id'];?>'><?php echo $row['team_name'];?></option>
                        <?php 
                      }
                    }                   
                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="teamTwo">Team 2 Name</label>
              <div class="controls">
                <!-- <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg"> -->
                <!-- <p class="help-block">Please confirm password</p> -->
                <select name="team_2_name" id="team_2_name" class="form-control select-lg">
                  
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label" for="champion">Champion Name</label>
              <div class="controls">
                <!-- <input type="password" id="password_confirm" name="password_confirm" placeholder="" class="form-control input-lg"> -->
                <!-- <p class="help-block">Please confirm password</p> -->
                <select name="champion_name" id="champion_name" class="form-control select-lg">
                  <option value=""></option>
                  <?php
                    $sql_query="select champion_id,champion_name from tbl_champions";
                    $resultOfChampions=mysql_query($sql_query) or die(mysql_error());
                    if(!empty($resultOfChampions)){
                      echo '<option value=""></option>';
                      while ($row=mysql_fetch_array($resultOfChampions)) {
                        ?>
                        <option value='<?php echo $row['champion_id'];?>'><?php echo $row['champion_name'];?></option>
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
                <input type="button" class="btn btn-success" id="AddNewMatch" value="Add"/>
              </div>
            </div>
            <br>
          </fieldset>
        </form>
    
    </div> 
  </div>
</div>
	<?php
?>