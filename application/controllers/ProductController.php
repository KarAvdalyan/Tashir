<?php
class ProductController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('ProductModel');
             $this->load->library('serviceClass');
         }
         
         
         public function ShowProducts()
         {
            
            $startDate=$this->input->post('start_date');
            $endDate =$this->input->post('end_date');
            $product_id=$this->input->post('product_id');
            $product_description=$this->input->post('product_description');
            $productName=$this->input->post('product_name');
            $autocompleteMode=0;

            $result = $this->ProductModel->GetProducts
         	($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);

            $data['Products'] = $result->result_array();

         	$this->load->view('index',$data);
         
         }

         public function GetProductById()
         {
            $product_id=$this->input->post('product_id');  
            $productName="";
            $startDate="";
            $endDate ="";
            $product_description="";
            $autocompleteMode=0;

            $result = $this->ProductModel->GetProducts
            ($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);
            echo json_encode($result->row());
         }

         public function ShowProductsAjax()
         {
            $productName=$this->input->post('get_product_name');
            $startDate="";
            $endDate ="";
            $product_id="";
            $product_description="";
            $autocompleteMode=1;
            
            $result = $this->ProductModel->GetProducts
            ($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);
            
            echo $this->serviceclass->GetAutoCompleteList($result);
            
         }

        Public function SaveProduct()
        {
            echo "hello from SaveProduct";
            $name=$this->input->post('get_product_name');
            $registrationDate=$this->input->post('get_product_date');
            $description =$this->input->post('get_product_discripshen');
            echo $this->ProductModel->SaveProduct($name,$description,$registrationDate);
         }

        Public function updateProduct()
        {
            $productID=4;
            $name='Hello Malmo';
            $registrationDate='12/dec/2017';
            $description ="Hello";
            $this->ProductModel->updateProduct($productID,$name,$description,$registrationDate);
         }

	}
      

