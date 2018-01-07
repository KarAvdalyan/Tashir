$(document).ready(function(){

   
var today = FormatDate(new Date());

var weekAgo = new Date();
weekAgo.setDate(weekAgo.getDate() - 7);
weekAgo = FormatDate(weekAgo);


$('#start_date').val(weekAgo);
$('#end_date').val(today);



   // auto complete for products
   $('#add_product_name').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProductController/ShowProductsAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
      });

   // auto complete for projects
   $('#add_project_name').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProjectController/ShowProjectsAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
      });

// auto complete for suppliers
   $('#add_supplier_name').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/SupplierController/ShowSuppliersAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
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

 
 $("#add_product_name").on('input keyup blur change', function() { 
      var name = $(this).val();
           $.ajax({
             url:  base_url+'index.php/ProductController/GetProductIdByName',
             type: 'post',
             dataType: 'json',
             data:{name:name},
             success:function(d){
              $('#get_product_id').val((d=="0")?"":d);
             
          }
              
        }); 
  });

 $("#add_project_name").on('input keypress blur change', function() { 
      var name = $(this).val();
           $.ajax({
             url:  base_url+'index.php/ProjectController/GetProjectIdByName',
             type: 'post',
             dataType: 'json',
             data:{name:name},
             success:function(d){
              $('#get_project_id').val((d=="0")?"":d);
             
          }
              
        }); 
  });

 $("#add_supplier_name").on('input keypress blur change', function() { 
      var name = $(this).val();
           $.ajax({
             url:  base_url+'index.php/SupplierController/GetSupplierIdByName',
             type: 'post',
             dataType: 'json',
             data:{name:name},
             success:function(d){
              $('#get_supplier_id').val((d=="0")?"":d);
             
          }
              
        }); 
  });


    //autocompletes for main search form  
    $('#product').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProductController/ShowProductsAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
      });

    $('#project').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProjectController/ShowProjectsAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
      });

    $('#supplier').autoComplete({
    minChars: 0,
    source: function(term, response){
        $.getJSON(base_url+'index.php/SupplierController/ShowSuppliersAjax',  term, 
          function(data)
          {
            result = [].map.call(data, function(obj)
            {
              return obj.name;
            });
            response(result);
          });
          }
      });


// search payments
 $("#search_payment").click(function(){
       ShowPayments();
    

  });

  //search when main form is loaded
  $( "#search_payment" ).trigger( "click" );

 //search_products
 $("#search_product").click(function(){
         var start_date = $("#product_start_date").val();
         var end_date   = $("#product_end_date").val();
         var idd        = $("#product_idd").val();
         var description= $("#product_description").val();
         var product_name= $("#product_name").val();

       $.ajax({
         url:  base_url+'index.php/ProductController/ShowProducts',
         type: 'post',
         data:{start_date:start_date,end_date:end_date,idd:idd,description:description,
          product_name:product_name},
         success:function(d){
          
         }
      });
    

  });


 });