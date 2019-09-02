// add new match 
$("#AddNewMatch").click(function(){
    var matchName = $("#match_name").val();
    var matchTime = $("#match_time").val();
    var numberOfTickets = $("#number_of_tickets").val();
    var matchPlace = $("#places_list").val();
    var team1Name = $("#team_1_name").val();
    var team2Name = $("#team_2_name").val();
    var championName = $("#champion_name").val();

    // Returns successful data submission message when the entered information is stored in database.
    // var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
    // var dataString = 'match_name='+ city_name;
    var dataString = 'match_name='+ matchName + '&match_time='+ matchTime + '&number_of_tickets='+ numberOfTickets + '&team_1_name='+ team1Name+ '&team_2_name='+ team2Name+ '&champion_name='+ championName+ '&match_place='+matchPlace ; 
    //check if city_name not empty or not contains only whitspaces!
    if(matchTime=='' || matchName=='' || numberOfTickets=='' 
      || matchPlace=='' || team1Name=='' ||team2Name=='' || championName=='')
    {
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");
      // alert("Please Fill All Fields");
    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=newMatch",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");      
          $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");                        
          // getMatchPage();
          window.setTimeout(function() { 
              getMatchPage();
          }, 1000);
        }
      });
    }
    return false;
});
//==============================================================
//this method to handle add new team and return response
$("#AddNewTeam").click(function(){
    var team_name = $("#team_name").val();
    var team_image = $("#team_image").val();
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'team_name='+ team_name + '&team_image='+ team_image;
    // alert(team_image);
    console.log(dataString);
    // var dataString = 'type_name='+ type_name;
    
    //check if team_name not empty or not contains only whitspaces!
    if(team_name=='' || /^\s+$/.test(team_name) ||  team_image=='' )
    {
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");
      // alert("Please Fill All Required Fields");
    }
    else
    { 
      ///$(FormID).ajaxSubmit
      $('#add_new_team').ajaxSubmit({ //FormID - id of the form.
              type: "POST",
              url: "add.php?id=AddNewTeam",
              data: dataString,
              cache: false,
              success: function (response) {
                console.log(response);
                $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
                 window.setTimeout(function() { 
                     getAllTeams();
                 }, 1000);
               }
      });
    }
    return false;
});
//---------------------------------------------------------//
// add new level 
$("#AddNewLevel").click(function(){
    var level_name = $("#level_name").val();
    // Returns successful data submission message when the entered information is stored in database.
    // var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
    var dataString = 'level_name='+ level_name;
    
    //check if city_name not empty or not contains only whitspaces!
    if(level_name=='' || /^\s+$/.test(level_name))
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=addNewLevel",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");      
          $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
          window.setTimeout(function() { 
              getAllLevels();
          }, 1000);
        }
      });
    }
    return false;
});
// add new champion 
$("#AddNewChampion").click(function(){
    var champion_name = $("#champion_name").val();
    // Returns successful data submission message when the entered information is stored in database.
    // var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
    var dataString = 'champion_name='+ champion_name;
    
    //check if city_name not empty or not contains only whitspaces!
    if(champion_name=='' || /^\s+$/.test(champion_name))
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=addNewChampion",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");      
          $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
          window.setTimeout(function() { 
              getAllChampions();
          }, 1000);
        }
      });
    }
    return false;
});
// add new place 
$("#AddNewPlace").click(function(){
    var place_name = $("#place_name").val();
    // Returns successful data submission message when the entered information is stored in database.
    // var dataString = 'name1='+ name + '&email1='+ email + '&password1='+ password + '&contact1='+ contact;
    var dataString = 'place_name='+ place_name;
    
    //check if city_name not empty or not contains only whitspaces!
    if(place_name=='' || /^\s+$/.test(place_name))
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=addNewPlace",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");      
          $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
          window.setTimeout(function() { 
              getAllPlaces();
          }, 1000);
        }
      });
    }
    return false;
});
//------------------------
//======== add new news ===========
//this method to handle add new offer and return response
$("#AddNewNews").click(function(){
    var news_name = $("#news_name").val();
    var news_content = $("#news_content").val();
    var news_time = $("#news_time").val();
    var news_image = $("#news_image").val();
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'news_name='+ news_name + 
    '&news_content='+ news_content + '&news_time='+ news_time+ '&news_image='+ news_image;
    // alert(offer_image);
    // var dataString = 'type_name='+ type_name;
    
    //check if city_name not empty or not contains only whitspaces!
    if(news_name=='' || /^\s+$/.test(news_name) || 
      news_content=='' || /^\s+$/.test(news_content) ||
      news_time=='' || /^\s+$/.test(news_time) || news_image=='' )
    {
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

      // alert("Please Fill All Required Fields");
    }
    else
    { 
      ///$(FormID).ajaxSubmit
      $('#add_new_news').ajaxSubmit({ //FormID - id of the form.
              type: "POST",
              url: "add.php?id=addNewNews",
              data: dataString,
              cache: false,
              success: function (response) {
                $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
                 window.setTimeout(function() { 
                     getAllNews();
                 }, 1000);
               }
      });
    }
    return false;
});
// add new video 
$("#AddNewVideo").click(function(){
    var video_url = $("#video_url").val();
    var video_description = $("#video_description").val();
    var match_id = $("#match_name").val();
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'video_url='+ video_url + '&video_description='+ video_description + 
    '&match_id='+ match_id;
    // var dataString = 'place_name='+ place_name;
    // console.log(dataString);
    //check if city_name not empty or not contains only whitspaces!
    if(video_url=='' || /^\s+$/.test(video_url) 
      || video_description=='' || /^\s+$/.test(video_description) 
      || match_id=='')
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=addNewVideo",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");      
          $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
          window.setTimeout(function() { 
              getAllVideos();
          }, 1000);
        }
      });
    }
    return false;
});
//------------------------

// AddNewTickets 
$("#AddNewTickets").click(function(){
    var match_id = $("#match_name").val();
    var number_of_tickets_level1 = $("#number_of_tickets_level1").val();
    var level1_price = $("#level1_price").val();
    var number_of_tickets_level2 = $("#number_of_tickets_level2").val();
    var level2_price = $("#level2_price").val();
    var number_of_tickets_level3 = $("#number_of_tickets_level3").val();
    var level3_price = $("#level3_price").val();

      var num_tickets = $("#num_tickets").val();
    // console.log("num of tickets = ");
    // console.log(num_tickets);
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'match_id='+ match_id + '&number_of_tickets_level1='+ number_of_tickets_level1 + 
    '&number_of_tickets_level2='+ number_of_tickets_level2 + 
    '&number_of_tickets_level3='+ number_of_tickets_level3+ 
    '&level1_price='+ level1_price+ 
    '&level2_price='+ level2_price+ 
    '&level3_price='+ level3_price+ 
    '&num_tickets='+ num_tickets;
    // var dataString = 'place_name='+ place_name;
    // console.log(dataString);
    //check if city_name not empty or not contains only whitspaces!
    if(match_id == '' || number_of_tickets_level1 == '' || number_of_tickets_level2 == ''
      || number_of_tickets_level3 == '' || level1_price == '' || level2_price == '' ||
      level3_price =='')
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=AddNewTickets",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");    
          if(response =="success"){  
            $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                getAllTicketsDetails();
            }, 1000);
          }
          else{  
            $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                getAllTicketsDetails();
            }, 10000);
          }
        }
      });
    }
    return false;
});
// Add New admin 
$("#AddNewAdmin").click(function(){
    var admin_name = $("#admin_name").val();
    var admin_email = $("#admin_email").val();
    var admin_password = $("#admin_password").val();
    var admin_telephone = $("#admin_telephone").val();
    
    // Returns successful data submission message when the entered information is stored in database.
    var dataString = 'admin_name='+ admin_name + '&admin_email='+ admin_email
    + '&admin_password='+ admin_password
    + '&admin_telephone='+ admin_telephone;
    // var dataString = 'place_name='+ place_name;
    // console.log(dataString);
    //check if city_name not empty or not contains only whitspaces!
    if(admin_name == '' || admin_email == '' || admin_password == ''
      || admin_telephone == '' ||  /^\s+$/.test(admin_name) || /^\s+$/.test(admin_email) 
      || /^\s+$/.test(admin_telephone) || /^\s+$/.test(admin_password))
    {
      // alert("Please Fill City Name");
      $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

    }
    else
    {
      // AJAX Code To Submit Form.
      $.ajax({
        type: "POST",
        url: "add.php?id=addNewAdmin",
        data: dataString,
        cache: false,
        success: function(response){
          //alert("Success");    
          if(response =="success"){  
            $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                getAllAdmins();
            }, 1000);
          }
          else{  
            $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                getAllTicketsDetails();
            }, 10000);
          }
        }
      });
    }
    return false;
});