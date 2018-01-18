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


    //$('.delete_save').confirmation();
    $("#show_product_table").on("click",' tbody tr .delete_save',function(){
        if(confirm("Are you sure you want to delete this record?"))
        {
                  var delete_id = $(this).attr('id');
                  delete_id=delete_id.substring(1, delete_id.length);
                  $.ajax({
                    url:  base_url+'index.php/ProductController/DeleteProduct',
                    type: 'post',
                    data:{delete_id:delete_id},
                    success:function(d){

                        if(!Number.isInteger(parseInt(d)))
                        {
                            alert (d);
                        }
                        else
                        {
                            ShowProducts();
                        }
                        
                    }
                })
        }
        
               
    });



});