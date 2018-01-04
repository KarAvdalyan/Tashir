$(document).ready(function(){

 /*   function FormatDate(date)
  {
    console.log(date);
    var dd = date.getDate();
    var mm = date.getMonth()+1; //January is 0!
    var yyyy = date.getFullYear();

    if(dd<10){
        dd='0'+dd;
    } 
    if(mm<10){
        mm='0'+mm;
    }
    date = yyyy+'-'+mm+'-'+dd;
    return date;

  }*/
   
var today = FormatDate(new Date());

var weekAgo = new Date();
weekAgo.setDate(weekAgo.getDate() - 7);
weekAgo = FormatDate(weekAgo);


$('#start_date').val(weekAgo);
$('#end_date').val(today);



   // auto complete for products
   $("#add_product_name").keyup(function(){
      var get_product_name = $(this).val();
        if(get_product_name!='')
        {
            $.ajax({
             url:  base_url+'index.php/ProductController/ShowProductsAjax',
             type: 'post',
             data:{get_product_name:get_product_name},
             success:function(d){
                $('#productList').fadeIn(); 
                $('#productList').html(d); 
             }
              
          });    
        }
       
  });


   $("#productList").on('click','li',function(){
    $('#add_product_name').val($(this).text());
    $('#get_product_id').val($(this).attr('id'));
    $('#productList').fadeOut();
   });

 $("#get_product_id").keyup(function(){
      var product_id = $(this).val();

      if (product_id !='' && product_id !=undefined)
      {
           $.ajax({
             url:  base_url+'index.php/ProductController/GetProductById',
             type: 'post',
             dataType: 'json',
             data:{product_id:product_id},
             success:function(d){
              $('#add_product_name').val((d!=undefined)?d.name:'');
             
          }
              
        }); 
      }
      else
      {
        $('#add_product_name').val(''); 
      }
        
  });


   $("#productList").on('click','li',function(){
    $('#add_product_name').val($(this).text());
    $('#get_product_id').val($(this).attr('id'));
    $('#productList').fadeOut();
   });


   // auto complete for projects
   $("#add_project_name").keyup(function(){
      var get_project_name = $(this).val();
        
       $.ajax({
         url:  base_url+'index.php/ProjectController/ShowProjectsAjax',
         type: 'post',
         data:{get_project_name:get_project_name},
         success:function(d){
            $('#projectList').fadeIn(); 
            $('#projectList').html(d); 
         }
          
    }); 
  });

   $("#projectList").on('click','li',function(){
    $('#add_project_name').val($(this).text());
    $('#get_project_id').val($(this).attr('id'));
    $('#projectList').fadeOut();
   });


// auto complete for suppliers
   $("#add_supplier_name").keyup(function(){
      var get_supplier_name = $(this).val();
        
       $.ajax({
         url:  base_url+'index.php/SupplierController/ShowSuppliersAjax',
         type: 'post',
         data:{get_supplier_name:get_supplier_name},
         success:function(d){
            $('#supplierList').fadeIn(); 
            $('#supplierList').html(d); 
         }
          
    }); 
  });

   $("#supplierList").on('click','li',function(){
    $('#add_supplier_name').val($(this).text());
    $('#get_supplier_id').val($(this).attr('id'));
    $('#supplierList').fadeOut();
   });

// search payments
   $("#search_payment").click(function(){
         var start_date = $("#start_date").val();
         var end_date   = $("#end_date").val();
         var idd        = $("#idd").val();
         var description= $("#description").val();
         var product    = $("#product").val();
         var supplier   = $("#supplier").val();
         var min_price  = $("#min_price").val();     
         var max_price  = $("#max_price").val();     
         
       $.ajax({
         url:  base_url+'index.php/PaymentController/ShowPayments',
         type: 'post',
         //dataType: 'json',
         data:{start_date:start_date,end_date:end_date,idd:idd,description:description,
          product:product,supplier:supplier,min_price:min_price,max_price:max_price},
         success:function(d){
          //console.log(d);
          $("#payments_result").html(d);
         }
          
    }); 
  });

$( "#search_payment" ).trigger( "click" );
 });