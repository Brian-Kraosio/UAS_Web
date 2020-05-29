<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class guitar extends CI_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->API = 'http://localhost/UTS_web/CI_client/api/guitarAPI';
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('guitar_model');
        $this->load->library('Curl');
        $this->load->library('session');
        
        if($this->session->userdata('level')!="user"){
            redirect('login','refresh');
        }

        }

        //Get data with api
        function index() {
            if($this->session->userdata('level') == "user"){

                $result = $this->curl->simple_get($this->API);
    
                $guitar = [
                    'guitar'  => json_decode($result,true),
                    'title'   => 'Guitar',
                ];
    
                $this->load->view('template/header_user', $guitar);
                $this->load->view('user/guitar/index', $guitar);
                $this->load->view('template/footer_user');
            }else{
                redirect(base_url());
            }
        }
        // for function button to get done
        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['guitar'] = $this->guitar_model->getGuitarID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/guitar/detail', $data);
            $this->load->view('template/footer_user');
        }

        public function buy($id)
        {
            $data['title']='Buy Guitar';
            $data['guitar'] = $this->guitar_model->getGuitarID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/guitar/buy', $data);
            $this->load->view('template/footer_user');
        }        
    }   
        
        /* End of file user.php */
        