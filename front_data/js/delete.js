$(document).ready(function(){
	
    // delete  payments
       $("#myTable").on("click",'tbody tr .delete_payment',function(){

            var delete_payment_id = $(this).attr('id');
            $(this).parent().remove();
            
            $.ajax({
                url:  base_url+'index.php/PaymentController/DeletePayment',
                type: 'post',
                data:{delete_payment_id:delete_payment_id},
                success:function(d){
                }
            });
        });


    //$("#show_product_table").on("click",'tbody tr .delete_save',function(){
        $("#show_product_table tbody tr .delete_save").confirmation({
                onConfirm: function() {
                  var delete_id = $(this).attr('id');
                  $('#'+delete_id).parent().remove();
                  delete_id=delete_id.substring(1, delete_id.length);
                  $.ajax({
                    url:  base_url+'index.php/ProductController/DeleteProduct',
                    type: 'post',
                    data:{delete_id:delete_id},
                    success:function(d){
                        $('#'+delete_id).parent().remove();
                        //alert(d);
                        //alert("Հեռացումը կատարված է։")
                        
                    }
                })
                }
        
                     
                
                //alert("hello"); 
                
                 
    
  });

                
                /*$.ajax({
                    url:  base_url+'index.php/ProductController/DeleteProduct',
                    type: 'post',
                    data:{delete_id:delete_id},
                    success:function(d){
                        $('#'+delete_id).parent().remove();
                        alert(d);
                        alert("Հեռացումը կատարված է։")
                        
                    }
                });*/
            });



//});