<?php
class ProjectModel extends CI_Model
{
	

	public function GetProjects($startDate,$endDate,$project_id,$project_description,$projectName,$autocompleteMode=0) 
	{
		try {
			   $sql = "call pr_search_projects('$startDate','$endDate','$project_id',
			   '$project_description','$projectName',$autocompleteMode)";
			   $result = $this->db->query($sql);
		   		return $result;
			}

		catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	}	

	 public function SaveProject($name,$description,$registrationDate)
	 {
	 	try {
	 		
 			  if($name=="" || $description =="" || $registrationDate=="" )
	 		  {
	 		  	throw new Exception("Տվյալները ճիշտ լրացված չեն։", 0);	 
	 		  }
     	 	  
     	 	  $checkingResult = $this->db->query("select 1 from tbl_projects where name ='$name' ");
 			  
 			  if ($checkingResult->num_rows() > 0)
 			  {
	  			 throw new Exception("Նշված անունով պրոյեկտ արդեն կա։", 0);	 
 			  }
			  
			  $this->db->trans_start();

			  $this->db->query("insert into tbl_projects(name,description,registration_date) 
			  		values('$name','$description','$registrationDate');");

			  $result = $this->db->query("select max(id) as id from tbl_projects;");

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

  	 public function updateProject($projectID,$name,$description,$registrationDate)
	 {
	 	try {
 			$checkingResult = $this->db->query("select 1 from tbl_projects where id = $projectID");

			if($checkingResult->num_rows() == 0)
			{
				throw new Exception("Պրոյեկտը գտնված չէ։", 0);				
			}

			$res = $this->db->query("update tbl_projects set name =$name, description=$description, 
			  	registration_date=$registration_date where id = $projectID");

			}
			catch (Exception $e) 
			{
				echo $e->getMessage();
			}
	   
	 }

	 public function GetProjectIdByName($name)
	 {
	 	try {
 				
			$res = $this->db->query("select id from tbl_projects where name = ifnull('$name','');");

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


	 public function DeleteProject($projectID) 
	 {
		try
		{
			$sql = "delete from tbl_projects where id=$projectID)";
	   		$result = $this->db->query($sql);
		}
	   
 		catch (Exception $e) 
		{
			echo $e->getMessage();
	    }

	 }		
}





