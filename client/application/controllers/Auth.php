<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {
    
    public function __construct(){
        parent::__construct();
    }

    public function get_guru_by_id(){
        $v_data = $this->M_read->get_guru_by_id(decrypt_url($this->input->post('id')))->row_array();
        echo json_encode($v_data);
    }

    public function get_siswa_by_id(){
        $v_data = $this->M_read->get_siswa_by_id(decrypt_url($this->input->post('id')))->row_array();
        echo json_encode($v_data);
    }


    public function index (){
        if ($this->session->userdata('level_user')) {
            if ($this->session->userdata('level_user') == 1) {
               redirect('admin');
            }elseif ($this->session->userdata('level_user') == 2){
                redirect('guru');
            }
        }

        $this->load->view('templates/header_login');    
        $this->load->view('login/login');
        $this->load->view('templates/footer_login');
    }

    public function login(){

        $v_level = $this->input->post('level_user');
        $v_username = $this->input->post('username');
        $v_password = $this->input->post('password');

        $pengguna = $this->M_auth->auth($v_level, $v_username, $v_password);

        if ($pengguna){

            $v_data['level_user'] = $pengguna['level_user'];
            $v_data['id_user'] = $pengguna['id_user'];
            $this->session->set_userdata($v_data);
            $this->session->set_flashdata('pesan', 'Berhasil login !');

            if ($pengguna['level_user'] == 1) {
                redirect('admin');
            }else {
                redirect('guru');
            }

        }else {
            $this->session->set_flashdata('error', 'username dan password salah !');
            redirect('auth');
        }

    }


    public function logout(){
        $array_items = array('id_user','level_user');
        $this->session->unset_userdata($array_items);
        // session_destroy();
        $this->session->set_flashdata('pesan', 'Berhasil logout !');
        redirect('auth');
    }


}