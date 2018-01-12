<?php

class Admin extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		
	}



	public function index()
	{  
		if($this->session->userdata('session_name') !=true){
		$this->load->view('login');	                                                         }
	    else{
	    	return    redirect(base_url('index.php/PaymentController/Index'));
	    }                                                                                             
	}

	

	public function check(){
		$email    = $this->input->post('email');
		$password = $this->input->post('password');
		$userID = $this->admin_model->check_model($email,$password);
		if($userID!= -1){
	        $session_data = array(
	          'user_id' => $userID,
	          'session_name' => $email
	        );


	 	    $this->session->set_userdata($session_data);
			redirect(base_url('index.php/PaymentController/Index'));
		}
		else{
			redirect(base_url('index.php/admin/index'));
		}

	}

	public function logout(){
		$this->session->unset_userdata('session_name');
		$this->session->unset_userdata('user_id');
		redirect(base_url('index.php/admin/index'));
	}

	public function validation_email(){
		$this->load->view('email_validation');
	}

	public function replace_password(){
		$this->load->view('forgot_password');
	}

	public function signup(){
		$this->load->view('signup');
	}


}	