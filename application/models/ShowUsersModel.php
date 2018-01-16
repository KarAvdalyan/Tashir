<?php
class ShowUsersModel extends CI_Model {
   

   public function show_user_model($get_user_id)
      {
		$query = $this->db->query("select * from tbl_users where id='$get_user_id' ");
		return $query->result_array();
	  }


   public function delete_user_model($user_id)
   {
           try
		{
	   		$this->db->delete('tbl_users', array('id' => $user_id)); 
		}
	   
 		catch (Exception $e) 
		{
			echo $e->getMessage();
	    }
         
   }

   public function edit_user_model($first_name,$last_name,$email,$user_id)
   {
       
			$data = array(
			        'first_name' => $first_name,
				    'last_name'  => $last_name,
				    'email'      => $email
				         );

	   		$this->db->where('id', $user_id);
	   		$this->db->update('tbl_users', $data);
	   		
		}
	   
 		
         
   


}


