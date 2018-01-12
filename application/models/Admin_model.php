<?php
class Admin_model extends CI_Model {



	public function check_model($email,$password){
	 $query = $this->db->get_where('tbl_admin', array('email' => $email,'password'=>$password));
	 if($query->num_rows()>0){
	 	return true;	 	 
	 }
	 	return false;
	}

}