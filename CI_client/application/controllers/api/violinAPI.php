<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class violinAPI extends REST_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('violin_model');
        $this->load->library('form_validation');
        }
        //API GET
        public function index_get()
        {   
            $id = $this->get('id');
            if($id === null){
                $violin = $this->violin_model->getViolinData();
            }else{
                $violin = $this->violin_model->getViolinData($id);
            }

            if($violin){
                $this->response([
                    'status' =>true,
                    'data' => $violin
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => false,
                    'data' => 'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }
    
    /* End of file user.php */
