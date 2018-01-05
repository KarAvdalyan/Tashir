<?php
class PaymentModel extends CI_Model
{
	

	public function __construct()
	{
		parent::__construct();
		
	}

	public function GetPayments($startDate,$endDate,$payment_id,$product_description,$productName,$projectName,$supplierName,$minPrice,$maxPrice) 
	{
		try
		{
		   $sql = "call pr_search_payments('$startDate','$endDate','$payment_id','$product_description','$productName',
		   '$projectName','$supplierName','$minPrice','$maxPrice')";
		   $result = $this->db->query($sql);

		   $output='';
		   //$a = $result->result_array();
		   foreach ($result->result() as $row) {
		   		$output.=' <tr>';
		   		$output.='<td>'.$row->registration_date.'</td>';
		   		$output.='<td>'.$row->productName.'</td>';
		   		$output.='<td>'.$row->id.'</td>';
		   		$output.='<td>'.$row->description.'</td>';
		   		$output.='<td>'.$row->projectName.'</td>';
		   		$output.='<td>'.$row->supplierName.'</td>';
		   		 $output.='<td>'.number_format($row->price, 2, '.', '').'</td>';
		   		$output.='<td>'.$row->quantity.'</td>';
		   		
		   		$output.='<td><button id ="'.$row->id.'" type="button"  class="update_save btn btn-info btn-lg" data-toggle="modal" data-target="#payment">Փոփոխել</button></td>';
	   		    
	   		    $output.='<td><button type="button" class="btn btn-info btn-lg" data-toggle="modal"
	   		    data-target="#update_payment">Հեռացնել</button></td>';
		   		$output.=' </tr>';

		   }
	   	   return $output;
   	   	}

		catch (Exception $e) 
		{
			echo "<div style='color:red;'> ".$e->getMessage() ."</div>";
	    }

	 }

	public function GetPaymentByID($paymentID) 
	{
		try 
		{
		   $sql = "SELECT PD.id product_id,PJ.id project_id,S.id supplier_id, P.registration_date, PD.name productName, p.description,    
					PJ.name projectName, S.name supplierName,
					price,quantity FROM tbl_payments P 
					INNER JOIN tbl_suppliers S ON P.supplier_id=S.id
					INNER JOIN tbl_products PD ON PD.ID=P.product_id
					INNER JOIN tbl_projects PJ ON PJ.id=P.project_id    WHERE P.id=$paymentID;";
		   $result = $this->db->query($sql);

		   $a = $result->result_array();
		   
	   	   return $a;
		}

		catch (Exception $e) 
		{
			echo "<div style='color:red;'> ".$e->getMessage() ."</div>";
	    }

	 }

 	public function GetMinMaxPrices($startDate,$endDate,$payment_id,$product_description,$productName,$projectName,$supplierName,$minPrice,$maxPrice) 
	{
		try 
		{
		   $sql = "call pr_get_min_max_prices('$startDate','$endDate','$payment_id','$product_description',
		   '$productName','$projectName','$supplierName','$minPrice','$maxPrice')";
		   $result = $this->db->query($sql);

		   $a = $result->result_array();
		   
	   	   return $a;
		}

		catch (Exception $e) 
		{
			echo "<div style='color:red;'> ".$e->getMessage() ."</div>";
	    }

	 }

	 public function SavePayment($productID,$supplierID,$projectID,$description,$registrationDate,$price,$quantity)
	 {
	 	try {
	 		
	 		  if($productID=="" || $supplierID=="" || $projectID =="" 
	 		  	|| $description=="" || $registrationDate=="" || $price =="" || $quantity=="")
	 		  {
	 		  	throw new Exception("Տվյալները ճիշտ լրացված չեն։", 0);	 
	 		  }

			  $checkingResult = $this->db->query("select 1 from tbl_products where id ='$productID' ");
 			  if ($checkingResult->num_rows() == 0)
 			  {
	  			 throw new Exception("Պրոդուկտը մուտքագրված չէ։", 0);	 
 			  }

 			  $checkingResult = $this->db->query("select 1 from tbl_projects where id ='$projectID' ");
 			  if ($checkingResult->num_rows() == 0)
 			  {
	  			 throw new Exception("Պրոյեկտը մուտքագրված չէ։", 0);	 
 			  }

 			  $checkingResult = $this->db->query("select 1 from tbl_suppliers where id ='$supplierID' ");
 			  if ($checkingResult->num_rows() == 0)
 			  {
	  			 throw new Exception("Մատակարարը մուտքագրված չէ։", 0);	 
 			  }
			
     		  $this->db->trans_start();
 		  	  $a="insert into tbl_payments(product_id,supplier_id,project_id,description,registration_date,price,quantity) 
			  		values($productID,$supplierID,$projectID,'$description','$registrationDate',
			  		$price,$quantity);";
			  		

 		  	 
 		  	 $this->db->query($a);
 		  	 

 		  	 
 			  $result = $this->db->query("select max(id)  as id from tbl_payments;");

			   $a = $result->result_array();
   	     	   $this->db->trans_complete();
			   return $a[0]["id"];
			}

			catch (Exception $e) 
			{
				$this->db->trans_rollback();
				echo "<div style='color:red;'> ".$e->getMessage() ."</div>";
				
		    }
	   
	 }

  	 public function updatePayment($paymentID,$name,$description,$registrationDate)
	 {
	 	try {
 			$checkingResult = $this->db->query("select 1 from tbl_payments where id = $paymentID");

			if($checkingResult->num_rows() == 0)
			{
				throw new Exception("Գործարքը գտնված չէ։", 0);				
			}

			$res = $this->db->query("update tbl_payments set name =$name, description=$description, 
			  	registration_date=$registration_date where id = $paymentID");

			}
			catch (Exception $e) 
			{
				echo "<div style='color:red;'> ".$e->getMessage()."</div>";
			}
	   
	 }

	public function DeletePayment($PaymentID) 
	{
		try
		{
			$sql = "delete from tbl_payments where id=$PaymentID)";
	   		$result = $this->db->query($sql);
		}
	   
 		catch (Exception $e) 
		{
			echo "<div style='color:red;'> ".$e->getMessage()."</div>";
	    }

	 }	
}


