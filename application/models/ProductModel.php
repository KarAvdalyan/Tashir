	<?php
class ProductModel extends CI_Model
{
	

	public function GetProducts($startDate,$endDate,$product_id,$product_description,
		$productName,$autocompleteMode=0) 
	{
		try {
			   $sql = "call pr_search_products('$startDate','$endDate','$product_id','$product_description',
			   '$productName',$autocompleteMode)";
			   $result = $this->db->query($sql);
		   		
			   return $result;
			}

		catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	}	

	

	 public function SaveProduct($name,$description,$registrationDate)
	 {
	 	try {
	 		  if($name=="" || $registrationDate=="" )
	 		  {
	 		  	throw new Exception("Տվյալները ճիշտ լրացված չեն։", 0);	 
	 		  }
			  
			  $checkingResult = $this->db->query("select 1 from tbl_products where name ='$name' ");
 			  
 			  if ($checkingResult->num_rows() > 0)
 			  {
	  			 throw new Exception("Նշված անունով պրոդուկտ արդեն կա։", 0);	 
 			  }


	  		  $this->db->trans_start();
	  		  $this->db->query("insert into tbl_products(name,description,registration_date) 
			  		values('$name','$description','$registrationDate');");

			  $result = $this->db->query("select max(id) as id from tbl_products;");

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

 	 public function updateProduct($productID,$name,$description,$registrationDate)
	 {
	 	try {
 			$checkingResult = $this->db->query("select 1 from tbl_products where id = $productID");

			if($checkingResult->num_rows() == 0)
			{
				throw new Exception("Պրոդուկտը գտնված չէ։", 0);				
			}

			$res = $this->db->query("update tbl_products set name =$name, description=$description, 
			  	registration_date=$registration_date where id = $productID");

			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	   
	 }

  	 public function GetProductIdByName($name)
	 {
	 	try {
 				
			$res = $this->db->query("select id from tbl_products where name = ifnull('$name','');");

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
				echo getMessage();
			}
	   
	 }

	 public function DeleteProduct($productID) 
	 {
		try
		{
			$sql = "delete from tbl_products where id=$productID)";
	   		$result = $this->db->query($sql);
		}
	   
 		catch (Exception $e) 
		{
			echo $e->getMessage();
	    }

	 }	
}




