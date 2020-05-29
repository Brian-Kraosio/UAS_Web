<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class bassAPI extends REST_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('bass_model');
        $this->load->library('form_validation');
        }
        //API GET
        public function index_get()
        {   
            $id = $this->get('id');
            if($id === null){
                $bass = $this->bass_model->getBassData();
            }else{
                $bass = $this->bass_model->getBassData($id);
            }

            if($bass){
                $this->response([
                    'status' =>true,
                    'data' => $bass
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
