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
                      window.location.replace(base_url+'index.php/ShowUsers/index/'+d);
                      alert(d);
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
                                      

   //window.location.replace(base_url+'index.php/AdminController/show_user');

	});
