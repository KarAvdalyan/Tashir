<?php
class PaymentController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	$this->load->model('PaymentModel');
         }
         
         
         public function ShowPayments()
         {
            $startDate=$this->input->post('start_date');
            $endDate =$this->input->post('end_date');
            $payment_id=$this->input->post('idd');
            $product_description=$this->input->post('description');
            $productName=$this->input->post('product');
            $projectName=$this->input->post('project');
            $supplierName=$this->input->post('supplier');
            $minPrice=$this->input->post('min_price');
            $maxPrice=$this->input->post('max_price');

            $data['Payments'] = $this->PaymentModel->GetPayments
         	($startDate,$endDate,$payment_id,$product_description,$productName,$projectName,$supplierName,$minPrice,$maxPrice);

         	$this->load->view('index',$data);
         
         }

         Public function SavePayment(){
            $productID=$this->input->post('get_product_id');
            $projectID=$this->input->post('get_project_id');
            $supplierID=$this->input->post('get_supplier_id');
            $registrationDate=$this->input->post('price');
            $price=$this->input->post('quantity');
            $quantity=$this->input->post('date');
            $description=$this->input->post('payment_description');

           //alert("hello PaymentController");
            $this->PaymentModel->SavePayment($productID,$supplierID,$projectID,$description,$registrationDate,$price,
               $quantity);
         }


        Public function UpdateProduct()
        {
            $paymentID=4;
            $name='Hello Malmo';
            $registrationDate='12/dec/2017';
            $description ="Hello";
            $this->PaymentModel->updatePayment($paymentID,$name,$description,$registrationDate);
        }
         
         function DeletePayment()
         {
            $paymentID=2;
            $this->PaymentModel->DeletePayment($paymentID);
         }

}