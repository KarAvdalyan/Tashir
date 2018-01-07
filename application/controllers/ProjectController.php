<?php
class ProjectController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('ProjectModel');
             $this->load->library('serviceClass');
         }
         
         



          public function ShowProjects()
         {
            $startDate=$this->input->post('start_date');
            $endDate =$this->input->post('end_date');
            $project_id=$this->input->post('project_id');
            $project_description=$this->input->post('project_description');
            $projectName=$this->input->post('project_name');
            $autocompleteMode=0;

            
            $result = $this->ProjectModel->GetProjects
            ($startDate,$endDate,$project_id,$project_description,$projectName,$autocompleteMode);
            
            $data['Projects'] =  $result;
            $this->load->view('show_project',$data);
         
         }

         public function GetProjectIdByName()
         {
            $name=$this->input->post('name');  

            $result = $this->ProjectModel->GetProjectIdByName($name);
            echo $result;
         }

         public function ShowProjectsAjax()
         {
            $projectName=$this->input->post('get_project_name');
            $startDate="";
            $endDate ="";
            $project_id="";
            $project_description="";
            $autocompleteMode=1;
            $result =  $this->ProjectModel->GetProjects
            ($startDate,$endDate,$project_id,$project_description,$projectName,$autocompleteMode);
                       
            echo $this->serviceclass->GetAutoCompleteList($result);
            
         }

         Public function SaveProject()
         {
            $name=$this->input->post('get_project_name');
            $registrationDate=$this->input->post('get_project_date');
            $description =$this->input->post('get_project_discripshen');
            echo $this->ProjectModel->SaveProject($name,$description,$registrationDate);
         }

        Public function UpdateProject()
        {
            $projectID=4;
            $name='Hello Malmo';
            $registrationDate='12/dec/2017';
            $description ="Hello";
            $this->ProjectModel->updateProject($projectID,$name,$description,$registrationDate);
        }

        function DeleteProject()
        {
            $projectID=2;
            $this->ProjectModel->DeletePayment($projectID);
        }

	}
      

