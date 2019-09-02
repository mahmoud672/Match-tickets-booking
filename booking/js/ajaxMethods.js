$(document).ready(function() {
  // send message from user to admin 
  $("#sendMessage").click(function(){
      var sender_email = $("#sender_email").val();
      var sender_message = $("#sender_message").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'sender_email='+ sender_email + '&sender_message='+ sender_message;
      console.log(dataString);
      //check if city_name not empty or not contains only whitspaces!
      if(sender_email=='' || /^\s+$/.test(sender_email) || sender_message=='' || /^\s+$/.test(sender_message))
      {
        // alert("Please Fill City Name");
        $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

      }
      else
      {
        // AJAX Code To Submit Form.
        $.ajax({
          type: "POST",
          url: "insert.php?id=sendMessage",
          data: dataString,
          cache: false,
          success: function(response){
            //alert("Success");      
            $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                window.location.href = "contact.php";
            }, 4000);
          }
        });
      }
      return false;
  });
  // registeration 
  $("#register").click(function(){
      var user_name1 = $("#user_name1").val();
      var user_email1 = $("#user_email1").val();
      var user_password1 = $("#user_password1").val();
      var user_telephone1 = $("#user_telephone1").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'user_name='+ user_name1 + '&user_email='+ user_email1
      + '&user_password='+ user_password1+ '&user_telephone='+ user_telephone1;
      console.log(dataString);
      //check if city_name not empty or not contains only whitspaces!
      if(user_name1=='' || /^\s+$/.test(user_name1) || user_email1=='' || /^\s+$/.test(user_email1)
        || user_password1=='' || /^\s+$/.test(user_password1)
        || user_telephone1=='' || /^\s+$/.test(user_telephone1) )
      {
        // alert("Please Fill City Name");
        $('.msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

      }
      else
      {
        // AJAX Code To Submit Form.
        $.ajax({
          type: "POST",
          url: "insert.php?id=register",
          data: dataString,
          cache: false,
          success: function(response){
            //alert("Success");      
            $('.msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
            window.setTimeout(function() { 
                window.location.href = "loginform.php";
            }, 2500);
          }
        });
      }
      return false;
  });
// login 
  $("#login").click(function(){
      var user_email = $("#user_email").val();
      var user_password = $("#user_password").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'user_email='+ user_email
      + '&user_password='+ user_password;
      console.log(dataString);
      //check if city_name not empty or not contains only whitspaces!
      if(user_email=='' || /^\s+$/.test(user_email)
        || user_password=='' || /^\s+$/.test(user_password) )
      {
        // alert("Please Fill City Name");
        $('.msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Please Fill All Required Fields</strong></div>");

      }
      else
      {
        // AJAX Code To Submit Form.
        $.ajax({
          type: "POST",
          url: "insert.php?id=login",
          data: dataString,
          cache: false,
          success: function(response){
            //alert("Success");      
            if(response=="Login Successfully"){  
              $('.msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
              window.setTimeout(function() { 
                  window.location.href = "index.php";
              }, 2500);
            }
            else{
              $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
              window.setTimeout(function() { 
                  window.location.href = "loginform.php";
              }, 2500);
            }
          }
        });
      }
      return false;
  });
  //addNewBooking
  $("#addNewBooking").click(function(){
      var number_of_tickets_level1 = $("#number_of_tickets_level1").val();
      var number_of_tickets_level2 = $("#number_of_tickets_level2").val();
      var number_of_tickets_level3 = $("#number_of_tickets_level3").val();
      var match_id = $("#match_id").val();
      // Returns successful data submission message when the entered information is stored in database.
      var dataString = 'number_of_tickets_level1='+ number_of_tickets_level1
      + '&number_of_tickets_level2='+ number_of_tickets_level2+ 
      '&number_of_tickets_level3='+ number_of_tickets_level3+ 
      '&match_id='+ match_id;
      console.log(dataString);
      //check if city_name not empty or not contains only whitspaces!
     
        // AJAX Code To Submit Form.
        $.ajax({
          type: "POST",
          url: "insert.php?id=booking",
          data: dataString,
          cache: false,
          success: function(response){
            //alert("Success");      
              // console.log(response);
              if(response==="success"){
                  $('#msg').html("<div class='alert alert-success'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>Booking is done Successfully ! we will contact you through email & telephone to confirm it</strong></div>");
                   window.setTimeout(function() { 
                     window.location.href = "show_details.php?match_id="+match_id;
                  }, 4500);
                }
               else{
                  $('#msg').html("<div class='alert alert-danger'><a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a><strong>"+response+"</strong></div>");
                   window.setTimeout(function() { 
                     window.location.href = "show_details.php?match_id="+match_id;
                  }, 4500);
                } 
              // window.setTimeout(function() { 
              //     window.location.href = "matches.php";
              // }, 3000);
            // }
            
          }
        });
      return false;
  });
});
