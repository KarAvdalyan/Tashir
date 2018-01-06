   <!-- search  -->
<div class="container">

  <h2 style="text-align:center;">Վերջին 7 օրվա գործարքները</h2>
     
   <div class="form-group row">
    <form>
     <div class="col-xs-2">
        <label>Սկիզբ</label>
        <input class="form-control" id="start_date" type="date" name="start_date"> 
     </div>
     
     <div class="col-xs-2">
     <label>Վերջ</label>
        <input class="form-control" id="end_date" type="date" name="end_date">
     </div>
     
     <div class="col-xs-2">
     <label>Պրոդուկտ</label>
        <input class="form-control" id="product" placeholder="Պրոդուկտ" type="text" name="product">
     </div>
     
     <div class="col-xs-2">
     <label>ID</label>
        <input class="form-control" id="idd" placeholder="ID" type="number" name="idd">
     </div>
     
     <div class="col-xs-2">
     <label>Նկարագիր</label>
        <input class="form-control" id="description" placeholder="Նկարագիր" type="number" name="description">
     </div>
     
     <div class="col-xs-2">
     <label>Պրոյեկտ</label>
        <input class="form-control" id="project" placeholder="Պրոյեկտ" type="text" name="project">
     </div>
     
     <div class="col-xs-2" style="margin-top:15px;">
     <label>Մատակարար</label>
        <input class="form-control" id="supplier" placeholder="Մատակարար" type="text" name="supplier">
     </div>
     
     <div class="col-xs-2" style="margin-top:15px;">
     <label>Մինիմում գին</label>
        <input class="form-control" id="min_price" placeholder="Մինիմում գին" type="number" name="min_price">
     </div>
     
     <div class="col-xs-2" style="margin-top:15px;">
     <label>Մաքսիմում գին</label>
        <input class="form-control" id="max_price" placeholder="Մաքսիմում գին" type="number" name="max_price">
     </div>
    
      <div style="margin-top:15px;">
     <button style="margin-top:40px; margin-bottom: 40px;" id="search_payment" type="button" class="btn btn-primary  col-xs-1">
      <span class="glyphicon glyphicon-search"></span> Search
     </button>

     <div class="col-xs-2" style="margin-top:15px;">
      <label>Առավելագույն գին</label>
        <label style="background-color: #eee; text-align: right;" class="form-control" id="result_max_price" name="result_max_price"></label>
     </div>

     <div class="col-xs-2" style="margin-top:15px;">
      <label>Նվազագույն գին</label>
        <label style="background-color: #eee;text-align: right;" class="form-control" id="result_min_price" name="result_min_price"></label>
     </div>
 </form>
</div><br>


  <!-- show search -->

 <table id="myTable" class="table table-bordered" >
  
    <thead>
      <tr>
        <th>Ամսաթիվ</th>
        <th>Պրոդուկտ</th>
        <th>ID</th>
        <th>Նկարագիր</th>
        <th>Պրոյեկտ</th>
        <th>Մատակարար</th>
        <th>Գին</th>
        <th>Քանակ</th>
        <th>Փոփոխել</th>
        <th>Հեռացնել</th>
      </tr>
    </thead>
    <tbody id ="payments_result">
        
    </tbody>
  </table>

</div>
      <!-- search  -->