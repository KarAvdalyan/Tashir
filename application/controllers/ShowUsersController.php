<?php


class ShowUsersController extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		$this->load->model('ShowUsersModel');
		$this->show_user_list();
	}


     public function show_user_list()
	{
		$data['show_user'] = $this->ShowUsersModel->show_user_model();
		$this->load->view('inc/index/header',$data);
	}

	public function show_user_data($id){
       
        $this->load->view('show_users');
        echo $id;
	}


  

}