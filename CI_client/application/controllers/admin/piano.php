<?php
 
 defined('BASEPATH') OR exit('No direct script access allowed');
 
 class piano extends CI_Controller {
        
        public function __construct()
    {
        parent::__construct();
        $this->load->model('piano_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

        public function index($name='')
        {  
            $data['title']='MUSIC SHOP';
            $data['name']='$name';
            $data['piano'] = $this->piano_model->getPianoData();
            if($this->input->post('keyword')){
                $data['piano']=$this->piano_model->searchData();
            }
            $this->load->view('template/header', $data);
            $this->load->view('admin/piano/index', $data);
            $this->load->view('template/footer');
            
            if($this->session->userdata('level')!='admin'){
                redirect('login','refresh');
            }
        }

        public function add()
        {   
            $data['title']='Adding Data';
            $data['inst_type'] = ['Digital Piano','Slim Digital Piano','Keyboard','Portable Keyboard','Synthesizer Keyboard'];
            $data['color'] = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Piano Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/piano/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->piano_model->addData();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/piano','refresh');
                
            }
        }

        public function delete($id)
        {
            $this->piano_model->hapusdatamhs($id);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/piano','refresh');
        }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['piano'] = $this->piano_model->getPianoID($id);
            $this->load->view('template/header', $data);
            $this->load->view('admin/piano/detail', $data);
            $this->load->view('template/footer');
        }

        public function edit($id)
        {   
            $data['title']='Edit Piano Data';
            $data['piano'] = $this->piano_model->getPianoID($id);
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Piano Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/piano/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->piano_model->editData();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/piano','refresh');
            }
        }
    }
 /* End of file piano.php */
 
?>