<?php


class ShowUsers extends CI_Controller {


    public function __construct()
	{
		parent::__construct();
		//$this->load->model('admin_model');
		
	}


	public function index($id){
       
        $this->load->view('show_users');
        //echo $id;
	}


}