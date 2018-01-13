$(document).ready(function(){

   
var today = FormatDate(new Date());

var weekAgo = new Date();
weekAgo.setDate(weekAgo.getDate() - 7);
weekAgo = FormatDate(weekAgo);

$('.default_start_date').val(weekAgo);
$('.default_end_date').val(today);


/*$('#start_date').val(weekAgo);
$('#end_date').val(today);
*/
var $loading = $('#loading').hide();
$(document)
  .ajaxStart(function () {
    $loading.show();
  })
  .ajaxStop(function () {
    $loading.hide();
  });

   // auto complete for products
   $('#add_product_name').autoComplete({
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProductController/ShowProductsAjax',  {get_product_name:term}, 
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

   $('#product_name').autoComplete({
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProductController/ShowProductsAjax',  {get_product_name:term}, 
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
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProjectController/ShowProjectsAjax',  {get_project_name:term}, 
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

   $('#project_name').autoComplete({
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProjectController/ShowProjectsAjax',  {get_project_name:term}, 
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
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/SupplierController/ShowSuppliersAjax',  {get_supplier_name:term}, 
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

    $('#supplier_name').autoComplete({
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/SupplierController/ShowSuppliersAjax',  {get_supplier_name:term}, 
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
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProductController/ShowProductsAjax', {get_product_name:term} , 
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
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/ProjectController/ShowProjectsAjax',  {get_project_name:term}, 
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
    minChars: 1,
    source: function(term, response){
        $.getJSON(base_url+'index.php/SupplierController/ShowSuppliersAjax',  {get_supplier_name:term}, 
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

 // payments sort
 $("#payment_reg").click(function(){
     if($($this).attr("checked") == 'checked')  
     {
       ShowPayments(1);
     }
     else
     {
       ShowPayments(1);
     }
      

  });

 // payments sort
 $("#payment_date").click(function(){
       ShowPayments(1);
  });

 $("#payment_price").click(function(){
       ShowPayments(2);
  });

  //search when main form is loaded
  $( "#search_payment" ).trigger( "click" );

 //search_products
 $("#search_product").click(function(){
         
         var start_date  = $("#product_start_date").val();
         var end_date    = $("#product_end_date").val();
         var product_id  = $("#product_idd").val();
         var description = $("#product_description").val();
         var product_name= $("#product_name").val();

       $.ajax({
         url:  base_url+'index.php/ProductController/ShowProducts',
         type: 'post',
         data:{start_date:start_date,end_date:end_date,product_id:product_id,description:description,
          product_name:product_name},
         success:function(d){
           $(".table_search").html(d);
         
          
         }
      });

  });

 //search_projects
 $("#search_project").click(function(){
         
         var start_date  = $("#project_start_date").val();
         var end_date    = $("#prjeuct_end_date").val();
         var project_id  = $("#project_idd").val();
         var description = $("#project_description").val();
         var project_name= $("#project_name").val();

       $.ajax({
         url:  base_url+'index.php/ProjectController/ShowProjects',
         type: 'post',
         data:{start_date:start_date,end_date:end_date,project_id:project_id,description:description,
          project_name:project_name},
         success:function(d){
          //  show  project
           $(".table_search").html(d);
         
          
         }
      });

  });

 //search_supplier
 $("#search_supplier").click(function(){
         
         var start_date  = $("#start_date").val();
         var end_date    = $("#end_date").val();
         var supplier_id  = $("#supplier_idd").val();
         var description = $("#description").val();
         var supplier_name= $("#supplier_name").val();

       $.ajax({
         url:  base_url+'index.php/SupplierController/ShowSuppliers',
         type: 'post',
         data:{start_date:start_date,end_date:end_date,supplier_id:supplier_id,description:description,
          supplier_name:supplier_name},
         success:function(d){
           $(".table_search").html(d);
          
         }
      });

  });

 });