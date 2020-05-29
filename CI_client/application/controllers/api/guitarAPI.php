<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . 'libraries/REST_Controller.php';
    require APPPATH . 'libraries/Format.php';
    
    class guitarAPI extends REST_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('guitar_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        }
        //API GET
        public function index_get()
        {   
            $id = $this->get('item_id');
            if($id === null){
                $guitar = $this->guitar_model->getGuitarData();
            }else{
                $guitar = $this->guitar_model->getGuitarData($id);
            }

            if($guitar){
                $this->response([
                    'status' =>true,
                    'data' => $guitar
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
