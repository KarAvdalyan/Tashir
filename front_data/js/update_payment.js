$(document).ready(function(){

     $("#sub_update_product").click(function(){
              
     var update_product_name = $("#update_product_name").val();
     var update_product_id   = $("#update_product_id").val();

         $("#get_upd_product_name").val(update_product_name);
         $(".get_upd_product_id").val(update_product_id);
            
             // $.ajax({
             //    url: 'get.php',
             //    type: 'post',
             //    data: {chk:inp},               
             //    success:function(d){
             //        alert(d);
             //                       }
             //      });    
     
      });


     $("#get_upd_product_name").keyup(function(){
     	 // replace get_upd_product_name and update_product_name value
     	 $("#update_product_name").val($(this).val());
     });




     $("#sub_update_project").click(function(){
              
     var update_project_name = $("#update_project_name").val();
     var update_product_id   = $("#update_product_id").val();

         $("#get_upd_project_name").val(update_project_name);
         $(".get_upd_product_id").val(update_product_id);
            
             // $.ajax({
             //    url: 'get.php',
             //    type: 'post',
             //    data: {chk:inp},               
             //    success:function(d){
             //        alert(d);
             //                       }
             //      });    
     
    });

     $("#get_upd_project_name").keyup(function(){
     	// replace get_upd_project_name and update_project_name value
         $("#update_project_name").val($(this).val());
     });





     $("#sub_update_supplier").click(function(){
              
     var update_supplier_name = $("#update_supplier_name").val();
     var update_product_id   = $("#update_product_id").val();

         $("#get_upd_supplier_name").val(update_supplier_name);
         $(".get_upd_product_id").val(update_product_id);
            
             // $.ajax({
             //    url: 'get.php',
             //    type: 'post',
             //    data: {chk:inp},               
             //    success:function(d){
             //        alert(d);
             //                       }
             //      });    
     
    });

     $("#get_upd_supplier_name").keyup(function(){
     	// replace get_upd_supplier_name and update_supplier_name value
     	$("#update_supplier_name").val($(this).val());
     })





});