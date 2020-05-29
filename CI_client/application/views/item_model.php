<?php
    class item_model extends CI_Model {
    
        public function getItem($id = null)
        {
            if($id === null){
                return $this->db->get('item')->result_array();
            } else{
                return $this->db->get_where('item', ['item_id'=>$id])->result_array();
            }
        }
        public function getItemByType($id = null)
        {
            if($id === null){
                return $this->db->get('item')->result_array();
            } else{
                // return $this->db->get_where('item', ['inst_type'=>$id])->result_array();
                $this->db->like('inst_type',$id);
                return $this->db->get('item')->result_array();
            }
        }

        public function deleteItem($id){
            $this->db->delete('item',['item_id' => $id]);
            return $this->db->affected_rows();
        }
        public function createItem($data){
            $this->db->insert('item',$data);
            return $this->db->affected_rows();
        }
        public function updateItem( $data, $id){
            $this->db->update('item',$data ,['item_id' => $id]);
            return $this->db->affected_rows();
        }
    
    }
    
    /* End of file Mahasiswa_model.php */
    
?>