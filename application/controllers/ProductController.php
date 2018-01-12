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
            $data['Products'] = $result;
         	$this->load->view('search_table',$data);
         
         }

          public function Index()
         {
            
            $startDate=$this->input->post('start_date');
            $endDate =$this->input->post('end_date');
            $product_id=$this->input->post('product_id');
            $product_description=$this->input->post('product_description');
            $productName=$this->input->post('product_name');
            $autocompleteMode=0;

            $result = $this->ProductModel->GetProducts
            ($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);
            $data['Products'] = $result;
            $this->load->view('show_product',$data);
         
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

         public function GetProductIdByName()
         {
            $name=$this->input->post('name');  

            $result = $this->ProductModel->GetProductIdByName($name);
            echo $result;
         }

         public function ShowProductsAjax()
         {
            $productName = $this->input->get('get_product_name', TRUE);
            $startDate="";
            $endDate ="";
            $product_id="";
            $product_description="";
            $autocompleteMode=1;
            
            $result = $this->ProductModel->GetProducts
            ($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode);
            
            echo json_encode($result->result_array());
            
         }

        Public function SaveProduct()
        {
            
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
            echo $this->ProductModel->updateProduct($productID,$name,$description,$registrationDate);
         }

	}
      

