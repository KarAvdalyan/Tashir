<?php
class ProjectController extends CI_Controller {
         
         public function __Construct()
         {
         	parent::__Construct();
         	
         	 $this->load->model('ProjectModel');
         }
         
         
         public function ShowProjects($startDate="''",$endDate ="''",$project_id="''",$project_description="''",
         	$projectName="''")
         {

            $data['Projects'] = $this->ProjectModel->GetProjects
         	($startDate,$endDate,$project_id,$project_description,$projectName);

         	$this->load->view('ProjectView',$data);
         
         }

         Public function SaveProject()
         {
            $name=$this->input->post('get_project_name');
            $registrationDate=$this->input->post('get_project_date');
            $description =$this->input->post('get_project_discripshen');
            $this->ProjectModel->SaveProject($name,$description,$registrationDate);
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
      

