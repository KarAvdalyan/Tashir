   <!-- search  -->
<div class="container">

  <h2 style="text-align:center;">Վերջին 7 օրվա գործարքները</h2>
     
   <div class="form-group row">
    <form method="post" action="<?= base_url('index.php/PaymentController/ShowPayments'); ?>">
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
     <button style="margin-top:40px;" type="form-control button" class="btn btn-info">
      <span class="glyphicon glyphicon-search"></span> Search
    </button>
 
     </form>
  </div><br>


  <!-- show search -->

 <table class="table table-bordered" >
  
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
      </tr>
    </thead>
    <tbody>
        <?php foreach ($Payments as  $value) { ?>
      <tr>
        <td><?= $value['registration_date']; ?></td>
        <td><?= $value['productName']; ?></td>
        <td><?= $value['id']; ?></td>
        <td><?= $value['description']; ?></td>
        <td><?= $value['projectName']; ?></td>
        <td><?= $value['supplierName']; ?></td>
        <td><?= $value['price']; ?></td>
        <td><?= $value['quantity']; ?></td>
        
        <td><button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#update_payment">Փոփոխել</button></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>

</div>
      <!-- search  -->