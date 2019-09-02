
// get all teams except the paramtered team 
function getAllTeamsExceptPassedTeam(team1){
    //var team1_id = $('#team_1_name').val();
    $.ajax({
      type:"POST",
      url:"get_all.php?id=getTeamsOfSecondList",
      data: {team_one_id:team1},
      success : function(data){
        $("#team_2_name").html(data);
        //console.log(data);
      }
    });    
}
//===============================================
//get the UI of add new match page
function getMatchPage(){
    $.ajax({
      type:"GET",
      url: "add_new_match.php",
      success:function(data){
           $("#content-section").html(data); 

      }                                
    });          
}
// get all teams
function getAllTeams(){
    $.ajax({
      type:"GET",
      url: "add_new_team.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all levels
function getAllLevels(){
    $.ajax({
      type:"GET",
      url: "add_new_level.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all champions
function getAllChampions(){
    $.ajax({
      type:"GET",
      url: "add_new_champion.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all places
function getAllPlaces(){
    $.ajax({
      type:"GET",
      url: "add_new_place.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all news
function getAllNews(){
    $.ajax({
      type:"GET",
      url: "add_new_news.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all users
function getAllUsers(){
    $.ajax({
      type:"GET",
      url: "list_all_users.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all messages which are sent by users (contact page)
function getAllMessages(){
    $.ajax({
      type:"GET",
      url: "list_all_messages.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all videos
function getAllVideos(){
    $.ajax({
      type:"GET",
      url: "add_new_video.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// get all tickets numbers/price for each level of spcific match 
function getAllTicketsDetails(){
    $.ajax({
      type:"GET",
      url: "add_new_tickets_info.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}
// delete from any table
 //delete from any table ajaxMethod 
  function deleteFrom(id,tableName) {
     // console.log(id);
     var dataString = 'id='+ id;
      console.log("ajax method id = "+id);
     $.ajax({
     type: "POST",
     url: "delete.php?table_name="+tableName,
     data: dataString,
     cache: false,
     success: function(data){
       console.log(data);
       // $("#content-section").html(data);
     }
     });
 }
 //confrim post 
  function confirmBooking(booking_id){
    // console.log("inside ajax method = "+appo_id);
   var dataString = 'booking_id='+ booking_id;
   $.ajax({
   type: "POST",
   url: "confirm.php?id=booking",
   data: dataString,
   cache: false,
   success: function(data){
     console.log(data);
     $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+data+"</strong></div>");
     window.setTimeout(function() { 
                getAllBooking();
     }, 2000);
   }
   });
 }
 //get all bookings
function getAllBooking(){
    $.ajax({
      type:"GET",
      url: "list_all_bookings.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
} 
//get All Admins
function getAllAdmins(){
    $.ajax({
      type:"GET",
      url: "add_new_admin.php",
      success:function(data){
           $("#content-section").html(data);            
      }                                
    });          
}    