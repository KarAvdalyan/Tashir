<?php
class SupplierModel extends CI_Model
{
	

	public function GetSuppliers($startDate,$endDate,$supplier_id,$supplier_description,$supplierName,
		$autocompleteMode=0) 
	{
	   $sql = "call pr_search_suppliers('$startDate','$endDate','$supplier_id','$supplier_description',
	   '$supplierName',$autocompleteMode)";
	   $result = $this->db->query($sql);

	   return $result;
	 
	}	

	public function SaveSupplier($name,$description,$registrationDate)
	 {
	 	try {
	 		  if($name=="" || $registrationDate=="" )
	 		  {
	 		  	throw new Exception("Տվյալները ճիշտ լրացված չեն։", 0);	 
	 		  }
	 		  
	 		  $checkingResult = $this->db->query("select 1 from tbl_suppliers where name ='$name' ");
 			  
 			  if ($checkingResult->num_rows() > 0)
 			  {
	  			 throw new Exception("Նշված անունով մատակարար արդեն կա։", 0);	 
 			  }

	  		  $this->db->trans_start();
			  
			  	$this->db->query("insert into tbl_suppliers(name,description,registration_date) 
			  		values('$name','$description','$registrationDate');");
				
				$result = $this->db->query("select max(id) as id from tbl_suppliers;");

			   	$a = $result->result_array();
     	   		
     	   		$this->db->trans_complete();
			   return $a[0]["id"];

			}

			catch (Exception $e) 
			{
				$this->db->trans_rollback();
				echo $e->getMessage();
			}
	   
	 }

	 public function updateSupplier($supplierID,$name,$description,$registrationDate)
	 {
	 	try {
	 			$checkingResult = $this->db->query("select 1 from tbl_suppliers where id = $supplierID");

				if($checkingResult->num_rows() == 0)
				{
					throw new Exception("Մատակարարը գտնված չէ։", 0);				
				}

				$res = $this->db->query("update tbl_suppliers set name =$name, description=$description, 
				  	registration_date=$registration_date where id = $projectID");
				return $supplierID;
			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	   
	 }

	 public function GetSupplierIdByName($name)
	 {
	 	try {
 				
			$res = $this->db->query("select id from tbl_suppliers where name = ifnull('$name','');");

			$row = $res->row();

			if (isset($row))
			{
			    $result = $row->id;
			}
			else
			{
				$result ='0';
			}
			
			return $result;
             

			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	   
	 }

	 public function DeleteSupplier($supplierID) 
	 {
		try
		{
			$sql = "delete from tbl_suppliers where id=$supplierID)";
	   		$result = $this->db->query($sql);
		}
	   
 		catch (Exception $e) 
		{
			echo $e->getMessage();
	    }

	 }			
}




