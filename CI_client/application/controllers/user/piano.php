<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class piano extends CI_Controller {
    
        public function __construct()
        {
        parent::__construct();
        $this->API = 'http://localhost/UTS_web/CI_client/api/pianoAPI';
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->model('login_model');
        $this->load->model('piano_model');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library('curl');
        

        if($this->session->userdata('level')!="user"){
            redirect('login','refresh');
        }

        }

        function index() {
            if($this->session->userdata('level') == "user"){

                $result = $this->curl->simple_get($this->API);
    
                $piano = [
                    'piano'  => json_decode($result,true),
                    'title'     => 'Piano',
                ];
    
                $this->load->view('template/header_user', $piano);
                $this->load->view('user/piano/index', $piano);
                $this->load->view('template/footer_user');
            }else{
                redirect(base_url());
            }
        }

        // public function index()
        // {
        //     $data['title']='MUSIC SHOP';
        //     $data['name']='$name';
        //     $data['piano'] = $this->piano_model->getPianoData();
        //     if($this->input->post('keyword')){
        //         $data['piano']=$this->piano_model->searchData();
        //     }
        //     $this->load->view('template/header_user', $data);
        //     $this->load->view('user/piano/index', $data);
        //     $this->load->view('template/footer_user');
        // }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['piano'] = $this->piano_model->getPianoID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/piano/detail', $data);
            $this->load->view('template/footer_user');
        }
        public function buy($id)
        {
            $data['title']='Detail Data';
            $data['piano'] = $this->piano_model->getPianoID($id);
            $this->load->view('template/header_user', $data);
            $this->load->view('user/piano/buy', $data);
            $this->load->view('template/footer_user');
        }
    
    }
    
    /* End of file user.php */
