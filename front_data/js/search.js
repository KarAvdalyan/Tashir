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




/*   $("#productList").on('click','li',function(){
    $('#add_product_name').val($(this).text());
    $('#get_product_id').val($(this).attr('id'));
    $('#productList').fadeOut();
   });
*/
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
      console.log($(this).val());
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
      console.log($(this).val());
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
      console.log($(this).val());
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
/*   $("#productList").on('click','li',function(){
    $('#add_product_name').val($(this).text());
    $('#get_product_id').val($(this).attr('id'));
    $('#productList').fadeOut();
   });
*/

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


/*   $("#projectList").on('click','li',function(){
    $('#add_project_name').val($(this).text());
    $('#get_project_id').val($(this).attr('id'));
    $('#projectList').fadeOut();
   });
*/

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

/*   $("#supplierList").on('click','li',function(){
    $('#add_supplier_name').val($(this).text());
    $('#get_supplier_id').val($(this).attr('id'));
    $('#supplierList').fadeOut();
   });
*/
// search payments
   $("#search_payment").click(function(){
         ShowPayments();
      

  });

$( "#search_payment" ).trigger( "click" );
 });