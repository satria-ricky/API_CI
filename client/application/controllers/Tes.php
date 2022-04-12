<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Tes extends CI_Controller {

    public function __construct(){
        parent::__construct();
    }

    public function index(){
        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Daftar Guru';

        $list_data = $this->M_read->get_api_guru();

        $v_data['isi_konten'] = '';

        $v_data['isi_konten'] .= '
            
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                 <tr>
                    <th style="text-align: center;">#NO</th>
                    <th style="text-align: center;">NIP</th>
                    <th style="text-align: center;">Nama Guru</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
                    <th style="text-align: center;">Jenis Kelamin</th>
                    <th style="text-align: center;">No. Telpon</th>
                    <th style="text-align: center;">Aksi</th>
                  </tr>
                </thead>
            <tbody>  
        ';

        if($list_data)
        {
            $index=1;
            foreach($list_data as $row)
            {
                $v_data['isi_konten'] .= '
                    <tr>
                        <td style="text-align: center;">'. $index.'</td>
                        <td>'.$row['nip_guru'].'</td>
                        <td>'.$row['nama_guru'].'</td>
                        <td>'.$row['tgl_guru'].'</td>
                        <td style="text-align: center;">'.$row['jk_guru'].'</td>
                        <td>'.$row['telp_guru'].'</td>
                        <td>
                            <a href="javascript:;" class="badge badge-info" onclick="button_detail(\''."guru".'\', \''.encrypt_url($row['id_guru']).'\')">Detail</a>
                            <a href="'.base_url().'tes/edit_guru/'.encrypt_url($row['id_guru']).'" class="badge badge-primary">Edit</a>
                            <a href="javascript:;" class="badge badge-danger" onclick="button_hapus(\''."guru".'\', \''.encrypt_url($row['id_guru']).'\')">Hapus</a >
                        </td>
                    </tr>

                '; 
                $index++;
            }   
        }

       $v_data['isi_konten']  .= ' 
            </tbody>
           </table>
       ';


        $this->load->view('templates/header');
        $this->load->view('templates/sidebar',$v_data);
        $this->load->view('templates/topbar_admin',$v_data);
        $this->load->view('daftar/daftar',$v_data);
        $this->load->view('templates/footer_tes');  
    }



    public function edit_guru($id){

        $v_id = decrypt_url($id);

        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Edit Data Guru';

        $v_data['data'] = $this->M_read->get_api_guru_by_id($v_id);
            
        $this->form_validation->set_rules('nip_guru', 'Nip_guru', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('edit/edit_guru',$v_data);
            $this->load->view('templates/footer_tes');    
        }
        else{

            $v_nip_guru = $this->input->post('nip_guru');
            $v_nama_guru = $this->input->post('nama_guru');
            $v_jenis_kelamin = $this->input->post('jenis_kelamin');
            $v_tgl_lahir = $this->input->post('tgl_lahir');
            $v_nomer_telp = $this->input->post('nomer_telp');
            $upload_foto = $_FILES['foto_guru']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/guru/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_guru')){

                        $v_nama_foto = $this->upload->data('file_name');
                        $v_foto_lama = $v_data['data']['foto_guru'];
                        unlink(FCPATH . 'assets/penyimpanan_foto/guru/' . $v_foto_lama);
                        
                        $v_data_informasi = [
                            'nip' => $v_nip_guru,
                            'nama' => $v_nama_guru,
                            'tgl' => $v_tgl_lahir,
                            'jk' => $v_jenis_kelamin,
                            'telp' => $v_nomer_telp,
                            'id' =>  $v_id,
                            'nama_key' => 'isikey'
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nip' => $v_nip_guru,
                        'nama' => $v_nama_guru,
                        'tgl' => $v_tgl_lahir,
                        'jk' => $v_jenis_kelamin,
                        'telp' => $v_nomer_telp,
                        'id' =>  $v_id,
                        'nama_key' => 'isikey'
                    ];
                }

                $this->M_update->edit_api_guru($v_data_informasi);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect("tes/"); 

        }
    }

    public function hapus_guru($id){
        $v_id = decrypt_url($id);
        
        // $hapus_foto = $this->M_read->get_guru_by_id($v_id)->row_array();
        
        // unlink(FCPATH . 'assets/penyimpanan_foto/guru/'. $hapus_foto['foto_guru']);

        $this->M_delete->delete_api_guru($v_id);
        // $this->M_delete->delete_akun_guru($v_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('tes/');
    }  



    public function tambah_guru(){

        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Tambah Data Guru';
        $this->form_validation->set_rules('nip_guru', 'Nip_guru', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);
        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('tambah/tambah_guru',$v_data);
            $this->load->view('templates/footer_tes');    
        }
        else{

            $v_nip_guru = $this->input->post('nip_guru', true);
            $v_nama_guru = $this->input->post('nama_guru', true);
            $v_jenis_kelamin = $this->input->post('jenis_kelamin', true);
            $v_tgl_lahir = $this->input->post('tgl_lahir', true);
            $v_nomer_telp = $this->input->post('nomer_telp', true);
            $upload_foto = $_FILES['foto_guru']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/guru/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_guru')){
                        $v_nama_foto = $this->upload->data('file_name');
                        $v_data_informasi = [
                            'nip' => $v_nip_guru,
                            'nama' => $v_nama_guru,
                            'tgl' => $v_tgl_lahir,
                            'jk' => $v_jenis_kelamin,
                            'telp' => $v_nomer_telp,
                            'nama_key' => 'isikey'
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nip' => $v_nip_guru,
                        'nama' => $v_nama_guru,
                        'tgl' => $v_tgl_lahir,
                        'jk' => $v_jenis_kelamin,
                        'telp' => $v_nomer_telp,
                        'nama_key' => 'isikey'
                    ];
                }

                $this->M_create->create_api_guru($v_data_informasi);
                
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect("tes/");       

        }
    }


}