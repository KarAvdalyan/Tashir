<?php
class ProductController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('ProductModel');
         }
         
         
         public function ShowProducts($startDate="''",$endDate ="''",$product_id="''",$product_description="''",
         	$productName="''")
         {
            $autocompleteMode=0;

            $data['Products'] = $this->ProductModel->GetProducts
         	($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);

         	$this->load->view('index',$data);
         
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
                       
            echo $result;
            
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
      

