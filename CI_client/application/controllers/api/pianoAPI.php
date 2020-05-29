<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class pianoAPI extends REST_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('piano_model');
        $this->load->library('form_validation');
        }
        //API GET
        public function index_get()
        {   
            $id = $this->get('id');
            if($id === null){
                $piano = $this->piano_model->getPianoData();
            }else{
                $piano = $this->piano_model->getPianoData($id);
            }

            if($piano){
                $this->response([
                    'status' =>true,
                    'data' => $piano
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
