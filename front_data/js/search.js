$(document).ready(function(){
   $("#add_product_name").keyup(function(){
      var get_product_name = $(this).val();
        
       $.ajax({
         url:  base_url+'index.php/ProductController/ShowProductsAjax',
         type: 'post',
         data:{get_product_name:get_product_name},
         success:function(d){
            $('#productList').fadeIn(); 
            $('#productList').html(d); 
         }
          
    }); 
  });

   $("#productList").on('click','li',function(){
    $('#add_product_name').val($(this).text());
    $('#productList').fadeOut();
   })
 });