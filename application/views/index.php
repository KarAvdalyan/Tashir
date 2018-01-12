


 <!-- header -->
 <?php  $this->load->view('inc/index/header.php'); ?>
 <!-- header -->

 <!-- search  -->
 <?php $this->load->view('inc/index/search.php'); ?>  
 <!-- search  -->
  
 <!--  insert Payment  -->
 <?php
    if($this->session->userdata('user_id') == 2){
  $this->load->view('inc/index/insert_payment.php'); 
}


  ?>
 <!--  insert Payment  -->




  </body>