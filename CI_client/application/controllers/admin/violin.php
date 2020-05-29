<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class violin extends CI_Controller {
    
        public function __construct()
    {
        parent::__construct();
        $this->load->model('violin_model');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

        public function index($name='')
        {  
            $data['title']='MUSIC SHOP';
            $data['name']='$name';
            $data['violin'] = $this->violin_model->getViolinData();
            if($this->input->post('keyword')){
                $data['violin']=$this->violin_model->searchData();
            }
            $this->load->view('template/header', $data);
            $this->load->view('admin/violin/index', $data);
            $this->load->view('template/footer');
            
            if($this->session->userdata('level')!='admin'){
                redirect('login','refresh');
            }
        }

        public function add()
        {   
            $data['title']='Adding Data';
            $data['inst_type'] = ['Classical Violin', 'Baroque Violin','Electric Violin','Stroh Violin'];
            $data['color'] = ['Brown','Orange','Natural','Black','White','BlacK Red','Light Blue','Yellow','Mix','Blue','Dark Blue'];
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Violin Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/violin/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->violin_model->addData();
                $this->session->set_flashdata('flash-data','Added');
                redirect('admin/violin','refresh');
                
            }
        }

        public function delete($id)
        {
            $this->violin_model->hapusdatamhs($id);
            $this->session->set_flashdata('flash-data','Deleted');
            redirect('admin/violin','refresh');
        }

        public function detail($id)
        {
            $data['title']='Detail Data';
            $data['violin'] = $this->violin_model->getViolinID($id);
            $this->load->view('template/header', $data);
            $this->load->view('admin/violin/detail', $data);
            $this->load->view('template/footer');
        }

        public function edit($id)
        {   
            $data['title']='Edit Violin Data';
            $data['violin'] = $this->violin_model->getViolinID($id);
            $this->form_validation->set_rules('item_id','Item Id','required');
            $this->form_validation->set_rules('item_name', 'Violin Name','required');
            $this->form_validation->set_rules('price', 'Price','required|numeric');
            if($this->form_validation->run() == FALSE){
                $this->load->view('template/header', $data);
                $this->load->view('admin/violin/add', $data);
                $this->load->view('template/footer');
            }
            else{
                $this->violin_model->editData();
                $this->session->set_flashdata('flash-data','Edited');
                redirect('admin/violin','refresh');
                
            }
        }
    }
    
    /* End of file violin.php */
    
?>