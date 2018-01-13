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

  <h2 style="text-align:center;">Մատակարարի Դիտում և որոնում</h2>
     
     <div class="form-group row">
    <form>
     <div class="col-xs-2">
        <label>Սկիզբ</label>
        <input class="form-control default_start_date" id="start_date"  type="date" name="start_date"> 
     </div>
     
     <div class="col-xs-2">
     <label>Վերջ</label>
        <input class="form-control default_end_date" id="end_date"  type="date" name="end_date">
     </div>
          
     <div class="col-xs-2">
     <label>ID</label>
        <input class="form-control" id="supplier_idd" placeholder="ID" type="number" name="supplier_idd">
     </div>
     
     <div class="col-xs-2">
     <label>Նկարագիր</label>
        <input class="form-control" id="description" placeholder="Նկարագիր" type="text" name="description">
     </div>
             
     <div class="col-xs-2" style="margin-top:15px;">
     <label>Մատակարար</label>
        <input class="form-control" id="supplier_name" placeholder="Մատակարար" type="text" name="supplier_name">
     </div>
        
      <div style="margin-top:15px;">
     <button style="margin-top:40px; margin-bottom: 40px;" id="search_supplier" type="button" class="btn btn-primary  col-xs-1">
      <span class="glyphicon glyphicon-search"></span> Որոնել
     </button>

 </form>
</div><br>
      
            
  <table class="table table-bordered">
    <thead>
      <tr style="background-color:darkgray;text-align:center;">
        <th style="text-align:center;">ID</th>
        <th style="text-align:center;">Մատակարար</th>
        <th style="text-align:center;">Նկարագիր</th>
        <th style="text-align:center;">Ամսաթիվ</th>
        <th style="text-align:center;">Փոփոխել</th>
        <th style="text-align:center;">Հեռացնել</th>
      </tr>
    </thead>
    <tbody class="table_search">
     
    </tbody>
  </table>
</div>


  


  


  