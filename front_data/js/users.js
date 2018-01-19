$(document).ready(function(){


       // insert user
       $('#insert_user').click(function(){
           var first_name      = $('#first_name').val();
           var last_name       = $('#last_name').val();
           var email           = $('#email').val();
           var password        = $('#password').val();
           var repeat_password = $('#repeat_password').val();
           var security_code   = $('#security_code').val();

           if(password == repeat_password){

           $.ajax({
                 url:   base_url+'index.php/AdminController/add_user',
                 type: 'post',
                 data: {first_name:first_name,last_name:last_name,email:email,password:password,security_code:security_code},
                 success:function(d){
                  if(d!=0)
                   {
                      window.location.replace(base_url+'index.php/ShowUsersController/show_user_data/'+d);  
                   }
                   else
                   {
                    $("#email").css("border-color","red");
                   }
                   
                 }
           });
                   }else {alert('Ձեր գաղտանաբառերը չեն համնկնում։');}
       });




       //  check email and  edit security code
       $('#edit_security_code').click(function(){
             var email = $('#email').val();
             $.ajax({
             	url:  base_url+'index.php/AdminController/edit_security_code',
             	type: 'post',
             	data: {email:email},
             	success:function(d){

             		   //  check  edit  edit_security_code
                      if (d!=1)
                      {
                      	$("#email").css("border-color", "red");
                      }
                      else{
                      	alert('Ջեր անվտանգության ծածկագիրը ուղարկվել Է ձեր Էլ․ փոստին');
                      	window.location.replace(base_url+'index.php/AdminController/replace_password');

                      }
             	} 

             });
       });


       //  check repeat  password
       $('#repeat_password').keyup(function(){
             var password          = $('#password').val();
             var repeat_password   = $('#repeat_password').val();

             if(password != repeat_password)
             {
             	$("#repeat_password").css("color", "red");
             }
             else
             {
             	$("#repeat_password").css("color", "green");
             }
       });


       // check security_code
       $('#security_code').keyup(function(){
         var security_code =  $(this).val();
           $.ajax({
           	    url:  base_url+'index.php/AdminController/check_security_code',
           	    type: 'post',
           	    data: {security_code:security_code},
           	    success:function(d){
                        if(d!=security_code)
                        {
                           $("#security_code").css("color", "red");
                        } 
                        else
                        {
                        	$("#security_code").css("color", "green");
                        }
           	    }
           });
       });

          // edit user
      $('.edit_user').click(function(){
          var first_name = $('#first_name').text();
          var last_name  = $('#last_name').text();
          var email      = $('#email').text();
          var edit_user  = $(this).attr('id');
          //alert(user_id);
          $.ajax({
             url:  base_url+'index.php/ShowUsersController/edit_user',
             type: 'post',
             data:{first_name:first_name,last_name:last_name,email:email,edit_user:edit_user},
             success:function(d){
                // alert('Ձեր փոփոխությունը կատարված Է');
                alert(d);
             }
          });
      });
                                      
          //  delete user 
       $('.delete_user').click(function(){
           var delete_user = $(this).attr('id');
           $(this).parent().remove();

           $.ajax({
              url:  base_url+'index.php/ShowUsersController/delete_user',
              type: 'post',
              data: {delete_user:delete_user},
              success:function(d){
                window.location.replace(base_url+'index.php/AdminController/signup');
              }
           });
       });


      if($('#user_type_read').attr('checked')="checked")
        get_user_type=1;//miayn ditel
      
      if($('#user_type_edit').attr('checked')="checked")
        get_user_type=2;//dite/popoxel

      

     $("#user_type_read").click(function(){
      $('#user_type_edit').removeAttr('checked')
      $(this).attr('checked', 'checked');
     })

     $("#user_type_edit").click(function(){
      $('#user_type_read').removeAttr('checked')
      $(this).attr('checked', 'checked');
     })
     
	});
