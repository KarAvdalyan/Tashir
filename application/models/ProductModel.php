	<?php
class ProductModel extends CI_Model
{
	

	public function GetProducts($startDate,$endDate,$product_id,$product_description,$productName,$autocompleteMode=0) 
	{
		try {
			   $sql = "call pr_search_products('$startDate','$endDate','$product_id','$product_description',
			   '$productName',$autocompleteMode)";
			   $result = $this->db->query($sql);
		   		
		   		if ($autocompleteMode==1)
		   		{
					$output = '<ul class = "list-unstyled">';

					if ($result->num_rows() > 0)
			            {
			                foreach ($result->result() as $row)
			                {
			                        $output.='<li>'.$row->name.'</li>';
			                }
			            }
			            else
			            {
			                $output='<li> not found</li>';
			            }

			            $output.='</ul>';
			            return $output;
		   		}
		   		else
		   		{
		   			return $result->result_array();
		   		}
			   
			}

		catch (Exception $e) 
			{
				echo "<div style='color:red;'> ".$e->getMessage()."</div>";
			}
	}	

	

	 public function SaveProduct($name,$description,$registrationDate)
	 {
	 	try {
	 		  if($name=="" || $description =="" || $registrationDate=="" )
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
				echo "<div style='color:red;'> ".$e->getMessage()."</div>";
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
				echo "<div style='color:red;'> ".$e->getMessage()."</div>";
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
			echo "<div style='color:red;'> ".$e->getMessage()."</div>";
	    }

	 }	
}




