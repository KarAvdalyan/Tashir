<?php
class PaymentController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	$this->load->model('PaymentModel');
         }
         
         public function Index()
         {
            $this->load->view('index');
            
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

            //$data['Payments'] = '';
            echo $this->PaymentModel->GetPayments
         	($startDate,$endDate,$payment_id,$product_description,$productName,$projectName,$supplierName,$minPrice,$maxPrice);

         }

           public function GetPaymentByID()
         {
            $paymentID=$this->input->post('payment_id');

            $result=$this->PaymentModel->GetPaymentByID($paymentID);
            echo json_encode($result);

         }

         public function GetMinMaxPrices()
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

            $result = $this->PaymentModel->GetMinMaxPrices
            ($startDate,$endDate,$payment_id,$product_description,$productName,$projectName,$supplierName,$minPrice,$maxPrice);

            echo json_encode($result); 
         }

         Public function SavePayment(){
            $productID=$this->input->post('get_product_id');
            $projectID=$this->input->post('get_project_id');
            $supplierID=$this->input->post('get_supplier_id');
            $registrationDate=$this->input->post('date');
            $price=$this->input->post('price');
            $quantity=$this->input->post('quantity');
            $description=$this->input->post('payment_description');

           
            echo $this->PaymentModel->SavePayment($productID,$supplierID,$projectID,$description,$registrationDate,
               $price,$quantity);
         }


        Public function updatePayment()
        {
            $paymentID            = $this->input->post('payment_id');
            $productID            = $this->input->post('get_product_id'); 
            $projectID            = $this->input->post('get_project_id');
            $supplierID           = $this->input->post('get_supplier_id');
            $paymentDescription   = $this->input->post('payment_description');
            $price                = $this->input->post('price');
            $quantity             = $this->input->post('quantity');
            $registrationDate     = $this->input->post('date');
           
            $this->PaymentModel->updatePayment($paymentID,$productID,$projectID,$supplierID,$paymentDescription,$price,$quantity,$registrationDate);
        }


         
         function DeletePayment()
         {
            $paymentID = $this->input->post('delete_payment_id');
            $this->PaymentModel->DeletePayment($paymentID);
         }

}