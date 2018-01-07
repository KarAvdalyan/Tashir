
	function FormatDate(date)
	{
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

	}	

function ShowPayments ()
      {
          
         var start_date = $("#start_date").val();
	       var end_date   = $("#end_date").val();
	       var idd        = $("#idd").val();
	       var description= $("#description").val();
	       var product    = $("#product").val();
         var project    = $("#project").val();
	       var supplier   = $("#supplier").val();
	       var min_price  = $("#min_price").val();     
	       var max_price  = $("#max_price").val();  
        /*get payments*/
       $.ajax({
         url:  base_url+'index.php/PaymentController/ShowPayments',
         type: 'post',
         data:{start_date:start_date,end_date:end_date,idd:idd,description:description,
          product:product,project:project,supplier:supplier,min_price:min_price,max_price:max_price},
         success:function(d){
          $("#payments_result").html(d);
         }
      });

       /*get min/max prices*/
       $.ajax({
         url:  base_url+'index.php/PaymentController/GetMinMaxPrices',
         type: 'post',
         dataType: 'json',
         data:{start_date:start_date,end_date:end_date,idd:idd,description:description,
          product:product,supplier:supplier,min_price:min_price,max_price:max_price},
         success:function(d){
          if (d.length!=0)
          {
            var max_price = d[0].max_price;
            var min_price = d[0].min_price;

            $("#result_max_price").text((+max_price).toFixed(2));
            $("#result_min_price").text((+min_price).toFixed(2));
          //alert (result);            
          }

          
         }
          
    });
   }