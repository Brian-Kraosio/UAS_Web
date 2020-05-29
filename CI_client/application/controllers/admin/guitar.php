<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class guitar extends CI_Controller {
    
        public function __construct()
    {
        parent::__construct();
        $this->load->model('guitar_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

        public function index($name='')
        {  
            $data['title']='MUSIC SHOP';
            $data['name']='$name';
            $data['guitar'] = $this->guitar_model->getguitarData();
            if($this->input->post('keyword')){
                $data['guitar']=$this->guitar_model->searchData();
            }
            $this->load->view('template/header', $data);
            $this->load->view('admin/guitar/index', $data);
            $this->load->view('template/footer');
            
            if($this->session->userdata('level')!='admin'){
                redirect('login','refresh');
            }
        }

        public function add()
        {   
            $data['title']='Adding Data';
            $data['inst_type'] = ['Accoustic Guitar', 'Mini Guitar','Electric Guitar','Smart Ukulele','Ukulele'];
            $data['color'] = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Guitar Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/guitar/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->guitar_model->addData();
                $this->session->set_flashdata('flash-data','Added');
                redirect('guitar','refresh');
                
            }
        }

        public function delete($id)
        {
            $this->guitar_model->hapusdatamhs($id);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/guitar','refresh');
        }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['guitar'] = $this->guitar_model->getGuitarID($id);
            $this->load->view('template/header', $data);
            $this->load->view('admin/guitar/detail', $data);
            $this->load->view('template/footer');
        }

        public function edit($id)
        {   
            $data['title']='Edit Guitar Data';
            $data['guitar'] = $this->guitar_model->getGuitarID($id);
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Guitar Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/guitar/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->guitar_model->editData();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/guitar','refresh');
                
            }
        }
    }
    
    /* End of file guitar.php */
?>