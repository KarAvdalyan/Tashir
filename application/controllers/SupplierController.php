<?php
class SupplierController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('SupplierModel');
         }
         
         
         public function ShowSuppliers($startDate="''",$endDate ="''",$supplier_id="''",$supplier_description="''",
         	$supplierName="''")
         {

            $data['Suppliers'] = $this->SupplierModel->GetSuppliers
         	($startDate,$endDate,$supplier_id,$supplier_description,$supplierName);

         	$this->load->view('SupplierView',$data);
         
         }

         Public function SaveSupplier()
         {
            $name=$this->input->post('get_supplier_name');
            $registrationDate=$this->input->post('get_supplier_date');
            $description =$this->input->post('get_supplier_discripshen');
            $this->SupplierModel->SaveSupplier($name,$description,$registrationDate);
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
      

