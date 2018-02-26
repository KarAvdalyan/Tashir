<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Import Controller
 *
 * @author TechArise Team
 *
 * @email  info@techarise.com
 */

class ImportController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->userID=$this->session->userdata('user_id');
        date_default_timezone_set('Asia/Yerevan');
        $this->load->model('Import_model', 'import');
    }

    public function save() {
            
        $this->load->library('excel');
         try {
                $path = ROOT_UPLOAD_IMPORT_PATH;

                $config['upload_path'] = $path;
                $config['allowed_types'] = 'xlsx|xls|csv|jpg|png';
                $config['remove_spaces'] = TRUE;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                
                if (!$this->upload->do_upload('userfile')) {
                    $error = array('error' => $this->upload->display_errors());
                } else {
                    $data = array('upload_data' => $this->upload->data());
                }
                
                if (!empty($data['upload_data']['file_name'])) {
                    $import_xls_file = $data['upload_data']['file_name'];
                } else {
                    $import_xls_file = 0;
                }
                
                $result = $this->import->ReadFiles($path,$import_xls_file,$this->userID);
                echo $result;

        }
        catch(Exception $e)
            {
                if(file_exists ( $path.$import_xls_file )){
                    unlink($path.$import_xls_file);    
                }
                
            }
    }

    public function GetUnReadedPayments()
    {
        $query = $this->import->GetUnReadedPayments();
        $data['un_readed_payments'] = $query;  
        $this->load->view('UnReadedPayments',$data);
    }

}
