<!DOCTYPE html>
<html lang="en">

<body>


 <!-- header -->
 <?php  $this->load->view('inc/index/header.php'); ?>
 <!-- header -->

 <!-- add_project -->
 <?php  $this->load->view('inc/insert_payment/add_project.php'); ?>
 <!-- add_project -->

 <!-- add_product -->
 <?php  $this->load->view('inc/insert_payment/add_product.php'); ?>
 <!-- add_product -->

 <!-- add_supplier -->
 <?php  $this->load->view('inc/insert_payment/add_supplier.php'); ?>
 <!-- add_supplier -->

 <!-- paymant_insertion -->
 <?php  $this->load->view('inc/insert_payment/paymant_insertion'); ?>
 <!-- paymant_insertion -->






  <div class="container">

  <h2 style="text-align:center;">Պրոյեկտի Դիտում և որոնում</h2>
     
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
     

      <div style="margin-top:15px;">
     <button style="margin-top:25px; margin-bottom: 40px;" id="search_payment" type="button" class="btn btn-primary  col-xs-1">
      <span class="glyphicon glyphicon-search"></span> Որոնել
     </button>


 </form>
</div><br>

            
  <table class="table table-bordered">
    <thead>
      <tr style="background-color:darkgray;text-align:center;">
        <th style="text-align:center;">ID</th>
        <th style="text-align:center;">Պրոյեկտ</th>
        <th style="text-align:center;">Նկարագիր</th>
        <th style="text-align:center;">Ամսաթիվ</th>
        <th style="text-align:center;">Փոփոխել</th>
        <th style="text-align:center;">Հեռացնել</th>
      </tr>
    </thead>
  <tbody>
      <?php foreach ($Projects->result() as $value) { ?>
      <tr style="text-align:center;">
        <td contenteditable="true"><?= $value->id; ?></td>
        <td contenteditable="true"><?= $value->name; ?></td>
        <td contenteditable="true"><?= $value->description; ?></td>
        <td contenteditable="true"><?= $value->registration_date; ?></td>
        <!-- <td contenteditable="true"><input id="date" class="form-control" type="date" style="width:100%;height:25px;"
          value='"'+ <?= $value->registration_date; ?> + '"'></td> -->
        <td id=<?= $value->id ?>  style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;">Փոփոխել</td>
        <td id=<?= $value->id ?> style="cursor:pointer;background-color:#5e8eb7;color:white;text-align:center;vertical-align:inherit;">Հեռացնել</td>
      </tr>
     <?php } ?>
    </tbody>
  </table>
</div>


  


  