<?php
class ProjectModel extends CI_Model
{
	

	public function GetProjects($startDate,$endDate,$project_id,$project_description,$projectName,$userID,$autocompleteMode=0) 
	{
		try {
			   $sql = "call pr_search_projects('$startDate','$endDate','$project_id',
			   '$project_description','$projectName',$userID,$autocompleteMode)";

			   $result = $this->db->query($sql);

			   if (!$result)
			   {
			        $error = $this->db->error(); 
			        throw new Exception($error['message']);
			   }
			   //throw new Exception($sql, 0);	
		   	 	return $result;
			}

		catch (Exception $e) 
			{
				$this->db->query('insert into tbl_log(description) values("'.$e->getMessage().'  GetProjects()");');
				echo $e->getMessage().'  GetProjects()';
			}
	}	

	 public function SaveProject($name,$description,$registrationDate,$userID)
	 {
	 	try {
	 		
 			  if($name=="" || $registrationDate=="" )
	 		  {
	 		  	throw new Exception("Տվյալները ճիշտ լրացված չեն։", 0);	 
	 		  }

	 		  if($userID=="")
	 		  {
	 		  	throw new Exception("Մուտքագրողը լրացված չէ։", 0);	 	
	 		  }
     	 	  
     	 	  $checkingResult = $this->db->query("select 1 from tbl_projects where name ='$name' ");
 			  
 			  if ($checkingResult->num_rows() > 0)
 			  {
	  			 throw new Exception("Նշված անունով պրոյեկտ արդեն կա։", 0);	 
 			  }
			  
			  $this->db->query("SET AUTOCOMMIT=0");
			  $this->db->trans_start();

			  
			  $sql ="call pr_add_project('$name','$description','$registrationDate',$userID)";
			  $result=$this->db->query($sql);
			
			   if (!$result)
			   {
			        $error = $this->db->error(); 
			        throw new Exception($error['message']);
			   }

	  		   $a = $result->result_array();

   	     	   $this->db->trans_complete();
   	     	   //throw new Exception($sql, 0);	 

			   return $a[0]['id'];

			}
			catch (Exception $e) 
			{
			  $this->db->trans_rollback();
			  $this->db->query('insert into tbl_log(description) values("'.$e->getMessage().'  SaveProject()");');
			  echo $e->getMessage().'  SaveProject()';
			}
	   
	 }

  	 public function UpdateProject($projectID,$name,$description,$registrationDate,$userID)
	 {
	 	try {
	 			$checkingResult = $this->db->query("select 1 from tbl_projects where id = $projectID");

				if($checkingResult->num_rows() == 0)
				{
					throw new Exception("Պրոյեկտը գտնված չէ։", 0);				
				}

				if($userID=="")
	 		    {
	 		     	throw new Exception("Մուտքագրողը լրացված չէ։", 0);	 	
	 		    }

				$result = $this->db->query("update tbl_projects set name ='$name', description='$description', 
				  	registration_date='$registrationDate',user_id=$userID where id = $projectID");

				if (!$result)
			    {
			        $error = $this->db->error(); 
			        throw new Exception($error['message']);
			    }
			    
				return $projectID;
			}
			catch (Exception $e) 
			{
				$this->db->query('insert into tbl_log(description) values("'.$e->getMessage().'  UpdateProject()");');
				echo $e->getMessage().'  UpdateProject()';
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





