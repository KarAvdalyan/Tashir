<?php
class Admin_model extends CI_Model {



	public function check_model($email,$password){
	 $query = $this->db->get_where('tbl_users', array('email' => $email,'password'=>md5($password)));
	 if($query->num_rows()>0){
	 	return $query->row()->id;	 	 
	 }
	 	return -1;
	}

}