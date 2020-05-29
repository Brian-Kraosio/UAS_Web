<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    

    class bass extends CI_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->API = 'http://localhost/UTS_web/CI_client/api/bassAPI';
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('bass_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('curl');
        

        if($this->session->userdata('level')!="user"){
            redirect('login','refresh');
        }

        }

    

        // public function index()
        // {
        //     $data['title']='MUSIC SHOP';
        //     $data['name']='$name';
        //     $data['bass'] = $this->bass_model->getBassData();
        //     if($this->input->post('keyword')){
        //         $data['bass']=$this->bass_model->searchData();
        //     }
        //     $this->load->view('template/header_user', $data);
        //     $this->load->view('user/bass/index', $data);
        //     $this->load->view('template/footer_user');
        // }

        function index() {
            if($this->session->userdata('level') == "user"){

                $result = $this->curl->simple_get($this->API);
    
                $bass = [
                    'bass'  => json_decode($result,true),
                    'title'     => 'bass',
                ];
    
                $this->load->view('template/header_user', $bass);
                $this->load->view('user/bass/index', $bass);
                $this->load->view('template/footer_user');
            }else{
                redirect(base_url());
            }
        }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['bass'] = $this->bass_model->getBassID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/bass/detail', $data);
            $this->load->view('template/footer_user');
        }
        public function buy($id)
        {
            $data['title']='Detail Data';
            $data['bass'] = $this->bass_model->getBassID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/bass/buy', $data);
            $this->load->view('template/footer_user');
        }
    
    }
    
    /* End of file user.php */
