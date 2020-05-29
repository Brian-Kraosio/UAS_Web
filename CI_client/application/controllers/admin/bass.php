<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class bass extends CI_Controller {
        
        public function __construct()
    {
        parent::__construct();
        $this->load->model('bass_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

        public function index($name='')
        {  
            $data['title']='MUSIC SHOP';
            $data['name']='$name';
            $data['bass'] = $this->bass_model->getBassData();
            if($this->input->post('keyword')){
                $data['bass']=$this->bass_model->searchData();
            }
            $this->load->view('template/header', $data);
            $this->load->view('admin/bass/index', $data);
            $this->load->view('template/footer');
            
            if($this->session->userdata('level')!='admin'){
                redirect('login','refresh');
            }
        }

        public function add()
        {   
            $data['title']='Adding Data';
            $data['inst_type'] = ['Double Bass','Electric Bass','Accoustic Bass','Semi-Accoustic'];
            $data['color'] = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Bass Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/bass/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->bass_model->addData();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/bass','refresh');
                
            }
        }

        public function delete($id)
        {
            $this->bass_model->hapusdatamhs($id);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/bass','refresh');
        }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['bass'] = $this->bass_model->getBassID($id);
            $this->load->view('template/header', $data);
            $this->load->view('admin/bass/detail', $data);
            $this->load->view('template/footer');
        }

        public function edit($id)
        {   
            $data['title']='Edit bass Data';
            $data['bass'] = $this->bass_model->getBassID($id);
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Bass Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/bass/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->bass_model->editData();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/bass','refresh');
                
            }
        }
    }
    
    /* End of file Controllername.php */
    
?>