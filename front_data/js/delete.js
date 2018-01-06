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
                       alert(d);
                }
            });
        });

});