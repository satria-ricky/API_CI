<?php 

use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';


class Guru extends REST_Controller {
    public function __construct(){
        parent::__construct();
    }

    public function index_get(){

        $v_id = $this->get('id');

        if ($v_id === null){
            $data_guru = $this->M_read->api_get_guru()->result_array();
        }
        else{
            $data_guru = $this->M_read->api_get_guru($v_id)->result_array();
        }

        if($data_guru){
            $this->response([
                'status' => TRUE,
                'data' => $data_guru
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'ID not found'
            ], REST_Controller::HTTP_NOT_FOUND);
        }

    }


    public function index_delete(){

        $v_id = $this->delete('id');

        if($v_id === null ){
            $this->response([
                'status' => FALSE,
                'message' => 'provide an id!'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }else{
        
            if( $this->M_delete->delete_api_guru($v_id)){
                $this->response([
                    'status' => TRUE,
                    'id' => $v_id,
                    'message' => 'deleted!'
                ], REST_Controller::HTTP_OK);
            }else{
                $this->response([
                    'status' => FALSE,
                    'message' => 'ID not found'
                ], REST_Controller::HTTP_NOT_FOUND);
            }
        }
    }


    public function index_post(){

        $v_data = [
            'nip_guru' => $this->post('nip'),
            'nama_guru' => $this->post('nama'),
            'tgl_guru' => $this->post('tgl'),
            'jk_guru' => $this->post('jk'),
            'telp_guru' => $this->post('telp')
        ];

        if($this->M_create->create_guru($v_data)){
            $this->response([
                'status' => TRUE,
                'message' => 'Berhasil ditambah!'
            ], REST_Controller::HTTP_CREATED);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Gagal'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


    public function index_put(){
        $v_id = $this->put('id');

        $v_data = [
            'nip_guru' => $this->put('nip'),
            'nama_guru' => $this->put('nama'),
            'tgl_guru' => $this->put('tgl'),
            'jk_guru' => $this->put('jk'),
            'telp_guru' => $this->put('telp')
        ];

        if($this->M_update->edit_informasi_guru($v_data,$v_id)){
            $this->response([
                'status' => TRUE,
                'message' => 'Berhasil diubah!'
            ], REST_Controller::HTTP_OK);
        }else{
            $this->response([
                'status' => FALSE,
                'message' => 'Gagal diubah'
            ], REST_Controller::HTTP_BAD_REQUEST);
        }
    }


}


