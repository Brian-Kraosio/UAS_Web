<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    require APPPATH . '/libraries/REST_Controller.php';
    require APPPATH . '/libraries/Format.php';

    class item extends REST_Controller {

        function __construct() {
            parent::__construct();
            $this->load->model('item_model','item');
            
        }

        //Menampilkan data kontak
        function index_get() {
            $id = $this->get('item_id');
            $type = $this->get('inst_type');
            // if ($id == null) {
            //     $item = $this->item->getItem();
            // } else {
            //     $item = $this->item->getItem($id);
            // }
            // if($item){
            //     $this->response([
            //         'status' => true,
            //         'data'=> $item
            //     ], REST_Controller::HTTP_OK);

            // }
            // else{
            //     $this->response([
            //         'status' =>false,
            //         'message'=>'id not found'
            //     ], REST_Controller::HTTP_NOT_FOUND);
            // }

            if ($id == null and $type == null)  {
                $item = $this->item->getItem();
            } else if($id != null and $type == null){
                $item = $this->item->getItem($id);
            } else if ($id == null and $type != null){
                $item = $this->item->getItemByType($type);
            } 
            if($item){
                $this->response([
                    'status' => true,
                    'data'=> $item
                ], REST_Controller::HTTP_OK);

            }
            else{
                $this->response([
                    'status' =>false,
                    'message'=>'id not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }

        public function index_delete(){
            $id=$this->delete('item_id');

            if($id === null){
                $this->response([
                    'status' =>false,
                    'message' =>'Provide an Id!'
                ], REST_Controller::HTTP_BAD_REQUEST);
            } else{
                if($this->item->deleteItem($id) > 0){
                    $this->response([
                        'status' => true,
                        'id' => $id,
                        'message'=> 'Deleted'
                    ], REST_Controller::HTTP_OK);
                } else{
                    $this->response([
                        'status' =>false,
                        'message'=>'id not found'
                    ], REST_Controller::HTTP_BAD_REQUEST);
                }
            }
        }

        public function index_post(){
            $data =[
                'item_id' => $this->post('item_id'),
                'inst_type' => $this->post('inst_type'),
                'item_name' => $this->post('item_name'),
                'color' => $this->post('color'),
                'spec' => $this->post('spec'),
                'price' => $this->post('price'),


            ];

            if($this->item->createItem($data) > 0){
                $this->response([
                    'status' => true,
                    'message'=> 'New Item Has been created'
                ], REST_Controller::HTTP_CREATED);
            } else{
                $this->response([
                    'status' =>false,
                    'message'=>'Failed To create a New Data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }


        public function index_put(){
            $id= $this->put('item_id');
            $data =[
                'item_id' => $this->put('item_id'),
                'inst_type' => $this->put('inst_type'),
                'item_name' => $this->put('item_name'),
                'color' => $this->put('color'),
                'spec' => $this->put('spec'),
                'price' => $this->put('price'),

            ];

            if($this->item->updateItem($data, $id) > 0){
                $this->response([
                    'status' => true,
                    'message'=> 'Item Data Has been Updated'
                ], REST_Controller::HTTP_OK);
            } else{
                $this->response([
                    'status' =>false,
                    'message'=>'Failed To Update Data'
                ], REST_Controller::HTTP_BAD_REQUEST);
            }
        }
        //Masukan function selanjutnya disini
    }
?>
    
    