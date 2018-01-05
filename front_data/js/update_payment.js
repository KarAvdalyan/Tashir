$(document).ready(function(){

     $("#sub_update_product").click(function(){
              
     var update_product_name = $("#update_product_name").val();
     var update_product_id   = $("#update_product_id").val();

         $("#get_upd_product_name").val(update_product_name);
         $(".get_upd_product_id").val(update_product_id);
            
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




     // get payment by id
$("#myTable").on("click",'tbody tr td .update_save',function(){
         var payment_id = $(this).attr('id');
          
             $.ajax({
               url:  base_url+'index.php/PaymentController/GetPaymentByID',
               type: 'post',
               dataType: 'json',
               data:{payment_id:payment_id},
               success:function(d){
                  $('#get_product_id').val(d[0].product_id); 
                  $('#get_project_id').val(d[0].project_id); 
                  $('#get_supplier_id').val(d[0].supplier_id); 
                  $('#add_product_name').val(d[0].productName); 
                  $('#payment_description').val(d[0].description); 
                  $('#add_project_name').val(d[0].projectName); 
                  $('#add_supplier_name').val(d[0].supplierName); 
                  $('#price').val(d[0].price); 
                  $('#quantity').val(d[0].quantity); 
                  $('#date').val(FormatDate(new Date(d[0].registration_date))); 
                  $(".update_payment").attr('id',payment_id);
               }
                
          }); 
      
     });


               //  Update  Payments

         $(".update_payment").on('click',function(){
             var payment_id          = $(this).attr('id');
             var get_product_id      = $('#get_product_id').val(); 
             var get_project_id      = $('#get_project_id').val();
             var get_supplier_id     = $('#get_supplier_id').val();
             var payment_description = $('#payment_description').val();
             var price               = $('#price').val();
             var quantity            = $('#quantity').val();
             var date                = $('#date').val();
             //alert(date);

             $.ajax({
                   url:  base_url+'index.php/PaymentController/UpdatePayment',
                   type: 'post',
                   data:{payment_id:payment_id,get_product_id:get_product_id,get_project_id:get_project_id,get_supplier_id:get_supplier_id,payment_description:payment_description,price:price,quantity:quantity,date:date},
                   success:function(d){
                       alert(d);
                          
                      
                       ShowPayments();

                   }
             });
         });

});