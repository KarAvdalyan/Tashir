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

  <h2 style="text-align:center;">Պրոդուկտ Դիտում և որոնում</h2>
     
   <div class="form-group row">
    <form>
     <div class="col-xs-2">
        <label>Սկիզբ</label>
        <input class="form-control default_start_date" id="product_start_date" type="date" name="product_start_date"> 
     </div>
     
     <div class="col-xs-2">
     <label>Վերջ</label>
        <input class="form-control default_end_date" id="product_end_date"  type="date" name="product_end_date">
     </div>
     
     <div class="col-xs-2">
     <label>Պրոդուկտ</label>
        <input class="form-control" id="product_name" placeholder="Պրոդուկտ" type="text" name="product_name">
     </div>
     
     <div class="col-xs-2">
     <label>ID</label>
        <input class="form-control" id="product_idd" placeholder="ID" type="number" name="product_idd">
     </div>
     
     <div class="col-xs-2">
     <label>Նկարագիր</label>
        <input class="form-control" id="product_description" placeholder="Նկարագիր" type="text" name="product_description">
     </div>

      <div style="margin-top:15px;">
     <button style="margin-top:25px; margin-bottom: 40px;" id="search_product" type="button" class="btn btn-primary  col-xs-1">
      <span class="glyphicon glyphicon-search"></span> Որոնել
     </button>

     

    
 </form>
</div><br>

            
  <table id="show_product_table" class="table table-bordered">
    <thead>
      <tr style="background-color:darkgray;text-align:center;">
        <th style="text-align:center;">ID</th>
        <th style="text-align:center;">Պրոդուկտ</th>
        <th style="text-align:center;">Նկարագիր</th>
        <th style="text-align:center;">Ամսաթիվ</th>
        <th style="text-align:center;">Փոփոխել</th>
        <th style="text-align:center;">Հեռացնել</th>
      </tr>
    </thead>
  <tbody class="table_search">
    <?php  $this->load->view('search_table.php'); ?>
  </tbody>  
  </table>
</div>


  