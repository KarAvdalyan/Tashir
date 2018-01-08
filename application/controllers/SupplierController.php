<?php
class SupplierController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('SupplierModel');
             $this->load->library('serviceClass');
         }
         
         
         public function ShowSuppliers($startDate="''",$endDate ="''",$supplier_id="''",$supplier_description="''",
         	$supplierName="''")
         {
            $startDate=$this->input->post('start_date');
            $endDate =$this->input->post('end_date');
            $supplier_id=$this->input->post('supplier_id');
            $supplier_description=$this->input->post('supplier_description');
            $supplierName=$this->input->post('supplier_name');
            $autocompleteMode=0;
            
            $result = $this->SupplierModel->GetSuppliers
         	($startDate,$endDate,$supplier_id,$supplier_description,$supplierName,$autocompleteMode);

            $data['Suppliers'] = $result;
         	$this->load->view('show_supplier',$data);
         
         }

         public function GetSupplierIdByName()
         {
            $name=$this->input->post('name');  

            $result = $this->SupplierModel->GetSupplierIdByName($name);
            echo $result;
         }

         public function ShowSuppliersAjax()
         {
            $projectName=$this->input->post('get_supplier_name');
            $startDate="";
            $endDate ="";
            $project_id="";
            $project_description="";
            $autocompleteMode=1;
            $result =  $this->SupplierModel->GetSuppliers
            ($startDate,$endDate,$project_id,$project_description,$projectName,$autocompleteMode);
                       
            echo $this->serviceclass->GetAutoCompleteList($result);
            
         }

         Public function SaveSupplier()
         {
            $name=$this->input->post('get_supplier_name');
            $registrationDate=$this->input->post('get_supplier_date');
            $description =$this->input->post('get_supplier_discripshen');
            echo $this->SupplierModel->SaveSupplier($name,$description,$registrationDate);
         }

        Public function UpdateSupplier()
        {
            $supplierID=4;
            $name='Hello Malmo';
            $registrationDate='12/dec/2017';
            $description ="Hello";
            $this->SupplierModel->updateSupplier($supplierID,$name,$description,$registrationDate);
        }

        function DeleteSupplier()
        {
            $supplierID=2;
            $this->SupplierModel->DeleteSupplier($projectID);
        }

	}
      

