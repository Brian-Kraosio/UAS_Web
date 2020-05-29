<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class guitar_model extends CI_Model {
    
        // Get the data guitar in the database
        public function getGuitarData()
        {
            $this->db->like('item_id','g');
            $this->db->or_like('item_id','u');
            return $this->db->get('item')->result_array();
        }

        public function addData()
        {
            $data = [
                "item_id" => $this->input->post('item_id',true),
                "inst_type" => $this->input->post('inst_type',true),
                "item_name" => $this->input->post('item_name',true),
                "color" => $this->input->post('color',true),
                "spec" => $this->input->post('spec',true),
                "price" => $this->input->post('price',true),
            ];
            $this->db->insert('item', $data);
        }

        public function deleteData($id)
        {
            $this->db->where('id', $id);
            $this->db->delete('item');
        }

        // Get the data description from id 
        public function getGuitarID($id)
        {
            return $this->db->get_where('item', ['item_id'=> $id])->row_array();
        }

        public function editData()
        {
            $data = [
                "inst_type" => $this->input->post('inst_type',true),
                "item_name" => $this->input->post('item_name',true),
                "color" => $this->input->post('color',true),
                "spec" => $this->input->post('spec',true),
                "price" => $this->input->post('price',true),
            ];
            $this->db->where('item_id', $this->input->post('id'));
            $this->db->update('item', $data);
        }

        public function searchData()
        {
            $keyword=$this->input->post('keyword');
            $this->db->like('item_name', $keyword);
            $this->db->like('item_id','g');
            $this->db->or_like('item_id','u');
            return $this->db->get('item')->result_array();
        }

        
        public function datatabels()
        {
            $this->db->like('item_id','g');
            $this->db->or_like('item_id','u');
            $query = $this->db->order_by('item_id')->get('item');
            return $query->result();
        }

        //API
        public function getGuitarDataAPI($id = null)
        {
            if($id === null){
                $this->db->like('item_id','g');
                $this->db->or_like('item_id','u');
                return $this->db->get('item')->result_array();
            }
            else{
                return $this->db->get_where('item', ['item_id'=> $id])->row_array();
            }
        }
    
    }
    
    /* End of file guitar_model.php */
    
?> 