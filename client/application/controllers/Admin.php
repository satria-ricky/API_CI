<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Admin extends CI_Controller {

    public function __construct(){
        parent::__construct();
        cek_login();
    }


function validasi_username()
{
    $v_username = $this->input->post('username');
    $v_id = $this->input->post('user_id');

    if (!$v_id) {
        if ($this->M_read->cek_username_aja($v_username)) {
            $this->session->set_flashdata('error', 'Username telah tersedia!');
            return FALSE;   
        }
        return TRUE;
    }else {
        if ($this->M_read->cek_username($v_username,$v_id)) {
            $this->session->set_flashdata('error', 'Username telah tersedia!');
            return FALSE;   
        }
        return TRUE;    
    }
}


function validasi_nip()
{
    $v_nip = $this->input->post('nip_guru');
    $v_id = $this->input->post('user_id');

    if (!$v_id) {
        if ($this->M_read->cek_nip_aja($v_nip)) {
            $this->session->set_flashdata('error', 'NIP telah tersedia!');
            return FALSE;   
        }
        return TRUE;
    }else {
        if ($this->M_read->cek_nip($v_nip,$v_id)) {
            $this->session->set_flashdata('error', 'NIP telah tersedia!');
            return FALSE;   
        }
        return TRUE;    
    }
}


function validasi_nis()
{
    $v_nis = $this->input->post('nis_siswa');
    $v_id = $this->input->post('user_id');

    if (!$v_id) {
        if ($this->M_read->cek_nis_aja($v_nis)) {
            $this->session->set_flashdata('error', 'NIS telah tersedia!');
            return FALSE;   
        }
        return TRUE;
    }else {
        if ($this->M_read->cek_nis($v_nis,$v_id)) {
            $this->session->set_flashdata('error', 'NIS telah tersedia!');
            return FALSE;   
        }
        return TRUE;    
    }
}

//BERANDA
public function index(){

        $v_data['is_aktif'] = 'beranda';
        $total_guru = $this->M_read->get_total_guru()->row_array();
        $total_siswa = $this->M_read->get_total_siswa()->row_array();
        $total_aset = $this->M_read->get_total_aset()->row_array();
        $v_data['isi_konten'] = '

            <div class="row">         
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL GURU</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$total_guru['total'].' </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL SISWA</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$total_siswa['total'].' </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-users fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">TOTAL ASET</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"> '.$total_aset['total'].' </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-list fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>    
          </div>

        ';
        $this->load->view('templates/header',$v_data);
        $this->load->view('templates/sidebar',$v_data);
        $this->load->view('templates/topbar_admin',$v_data);
        $this->load->view('beranda/beranda',$v_data);
        $this->load->view('templates/footer');            
    }



//PROFILE

    public function profile(){
        
        $v_id = $this->session->userdata('id_user');
        $v_data['is_aktif'] = 'profile';
        $v_data['data'] = $this->M_read->get_profile($v_id);

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);

        $this->form_validation->set_rules('password', 'Password', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);

        

        if($this->form_validation->run() == false){
            $this->load->view('templates/header',$v_data);
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('profile/profile',$v_data);
            $this->load->view('templates/footer');       
        }
        else{
            $v_nama = $this->input->post('nama');
            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
            $upload_foto = $_FILES['gambar_ttd']['name'];

            if($upload_foto){
                
                $config['allowed_types'] = 'gif|jpg|png|jpeg';
                $config['max_size']     = '5000';
                $config['upload_path'] = './assets/foto/ttd/';
                    
                $this->load->library('upload', $config);

                if ($this->upload->do_upload('gambar_ttd')){
                    $v_nama_foto = $this->upload->data('file_name');
                    $v_foto_lama = $v_data['data']['user_ttd'];
                    unlink(FCPATH . 'assets/foto/ttd/' . $v_foto_lama);
                    $v_data = [
                        'user_nama' => $v_nama,
                        'user_username' => $v_username,
                        'user_password' => $v_password,
                        'user_ttd' => $v_nama_foto
                    ];
                }
                else
                {
                    echo $this->upload->display_errors();
                }

            }else{
                $v_data = [
                    'user_nama' => $v_nama,
                    'user_username' => $v_username,
                    'user_password' => $v_password
                ];
            }
            $this->M_update->edit_profile($v_data,$v_id);
            $this->session->set_flashdata('pesan', 'Profile berhasil diubah!');
            redirect('admin/profile');       
        }             
    }


     public function pengaturan(){
        
        $v_id = $this->session->userdata('id_user');

        $v_data['data'] = $this->M_read->get_akun($v_id);

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);
        

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('profile/pengaturan',$v_data);
            $this->load->view('templates/footer');       
        }
        else{
            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');

            $v_data = [
                'username' => $v_username,
                'password' => $v_password
            ];
            
            $this->M_update->edit_profile($v_data,$v_id);
            $this->session->set_flashdata('pesan', 'Profile berhasil diubah!');
            redirect('admin/pengaturan');       
        }             
    }



//GURU
    public function daftar_guru(){
        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Daftar Guru';

        $list_data = $this->M_read->get_guru();
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

        if($list_data->num_rows() > 0)
        {
            $index=1;
            foreach($list_data->result() as $row)
            {
                $v_data['isi_konten'] .= '
                    <tr>
                        <td style="text-align: center;">'. $index.'</td>
                        <td>'.$row->nip_guru.'</td>
                        <td>'.$row->nama_guru.'</td>
                        <td>'.$row->tgl_guru.'</td>
                        <td style="text-align: center;">'.$row->jk_guru.'</td>
                        <td>'.$row->telp_guru.'</td>
                        <td>
                            <a href="javascript:;" class="badge badge-info" onclick="button_detail(\''."guru".'\', \''.encrypt_url($row->id_guru).'\')">Detail</a>
                            <a href="'.base_url().'admin/edit_guru/'.encrypt_url($row->id_guru).'" class="badge badge-primary">Edit</a>
                            <a href="javascript:;" class="badge badge-danger" onclick="button_hapus(\''."guru".'\', \''.encrypt_url($row->id_guru).'\')">Hapus</a >
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
        $this->load->view('templates/footer');  
    }


    


    public function tambah_guru(){

        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Tambah Data Guru';

        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);

        $this->form_validation->set_rules('nip_guru', 'Nip_guru', 'required|trim|callback_validasi_nip', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('tambah/tambah_guru',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
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
                        $v_data_informasi = [
                            'nip_guru' => $v_nip_guru,
                            'nama_guru' => $v_nama_guru,
                            'tgl_guru' => $v_tgl_lahir,
                            'jk_guru' => $v_jenis_kelamin,
                            'telp_guru' => $v_nomer_telp,
                            'foto_guru' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nip_guru' => $v_nip_guru,
                        'nama_guru' => $v_nama_guru,
                        'tgl_guru' => $v_tgl_lahir,
                        'jk_guru' => $v_jenis_kelamin,
                        'telp_guru' => $v_nomer_telp
                    ];
                }

                $v_id_akun = $this->M_create->create_guru($v_data_informasi);
                $v_data_akun_guru = [
                    'id_user' => $v_id_akun['id_guru'],
                    'username' => $v_username,
                    'password' => $v_password,
                    'level_user' => 2
                ];

                $this->M_create->create_akun_guru($v_data_akun_guru);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect("admin/daftar_guru");       

        }
    }



    public function edit_guru($id){

        $v_id = decrypt_url($id);

        $v_data['is_aktif'] = 'guru';
        $v_data['judul_daftar'] = 'Edit Data Guru';

        $v_data['data'] = $this->M_read->get_guru_by_id($v_id)->row_array();
            
        $this->form_validation->set_rules('username', 'Username', 'required|trim|callback_validasi_username', [
            'required' => 'Kolom harus diisi!',
        ]);

        $this->form_validation->set_rules('nip_guru', 'Nip_guru', 'required|trim|callback_validasi_nip', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('edit/edit_guru',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_username = $this->input->post('username');
            $v_password = $this->input->post('password');
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
                            'nip_guru' => $v_nip_guru,
                            'nama_guru' => $v_nama_guru,
                            'tgl_guru' => $v_tgl_lahir,
                            'jk_guru' => $v_jenis_kelamin,
                            'telp_guru' => $v_nomer_telp,
                            'foto_guru' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nip_guru' => $v_nip_guru,
                        'nama_guru' => $v_nama_guru,
                        'tgl_guru' => $v_tgl_lahir,
                        'jk_guru' => $v_jenis_kelamin,
                        'telp_guru' => $v_nomer_telp
                    ];
                }

                $v_id_akun = $this->M_update->edit_informasi_guru($v_data_informasi,$v_id);

                $v_data_akun_guru = [
                    'username' => $v_username,
                    'password' => $v_password
                ];

                $this->M_update->edit_akun_guru($v_data_akun_guru,$v_id);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect("admin/daftar_guru"); 

        }
    }


    public function hapus_guru($id){
        $v_id = decrypt_url($id);
        
        $hapus_foto = $this->M_read->get_guru_by_id($v_id)->row_array();
        
        unlink(FCPATH . 'assets/penyimpanan_foto/guru/'. $hapus_foto['foto_guru']);

        $this->M_delete->delete_informasi_guru($v_id);
        $this->M_delete->delete_akun_guru($v_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/daftar_guru');
    }  


//SISWA
    public function daftar_siswa(){
        $v_data['is_aktif'] = 'siswa';
        $v_data['judul_daftar'] = 'Daftar Siswa';

        $list_data = $this->M_read->get_siswa();
        $v_data['isi_konten'] = '';

        $v_data['isi_konten'] .= '
            
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;">NIS</th>
                    <th style="text-align: center;">Nama Siswa</th>
                    <th style="text-align: center;">Tanggal Lahir</th>
                    <th style="text-align: center;">Jenis Kelamin</th>
                    <th style="text-align: center;">No. Telpon</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
                </thead>
            <tbody>  
        ';

        $index =1;
        if($list_data->num_rows() > 0)
        {
            foreach($list_data->result() as $row)
            {
                $v_data['isi_konten'] .= '
                    <tr>
                        <td>'.$index.'</td>
                        <td>'.$row->nis_siswa.'</td>
                        <td>'.$row->nama_siswa.'</td>
                        <td>'.$row->tgl_siswa.'</td>
                        <td style="text-align: center;">'.$row->jk_siswa.'</td>
                        <td>'.$row->telp_siswa.'</td>
                        <td>
                            <a href="javascript:;" class="badge badge-info" onclick="button_detail(\''."siswa".'\', \''.encrypt_url($row->id_siswa).'\')">Detail</a>
                            <a href="'.base_url().'admin/edit_siswa/'.encrypt_url($row->id_siswa).'" class="badge badge-primary">Edit</a>
                            <a href="javascript:;" class="badge badge-danger" onclick="button_hapus(\''."siswa".'\', \''.encrypt_url($row->id_siswa).'\')">Hapus</a >
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
        $this->load->view('templates/footer');  
    }


    public function tambah_siswa(){
        $v_data['is_aktif'] = 'siswa';
        $v_data['judul_daftar'] = 'Tambah Data Siswa';

        $list_guru = $this->M_read->get_guru();
        $data_guru = '';
        if($list_guru->num_rows() > 0)
        {
            foreach($list_guru->result() as $row)
            {
                $data_guru .= '
                    <option value="'.$row->id_guru.'">'.$row->nama_guru.'</option>
                '; 
            }  
        }
        $v_data['data_guru'] = '
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Pendamping</label>
                </div>
                <select class="custom-select" id="guru_pendamping" name="guru_pendamping">
                <option value=""> -- Pilih Guru -- </option>
                '.$data_guru.'
                </select>
            </div>
        ';

        $this->form_validation->set_rules('nis_siswa', 'Nis_siswa', 'required|trim|callback_validasi_nis', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('tambah/tambah_siswa',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_nis_siswa = $this->input->post('nis_siswa');
            $v_nama_siswa = $this->input->post('nama_siswa');
            $v_jenis_kelamin = $this->input->post('jenis_kelamin');
            $v_tgl_lahir = $this->input->post('tgl_lahir');
            $v_nomer_telp = $this->input->post('nomer_telp');
            $v_guru_pendamping = $this->input->post('guru_pendamping');
            $upload_foto = $_FILES['foto_siswa']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/siswa/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_siswa')){
                        $v_nama_foto = $this->upload->data('file_name');
                        $v_data_informasi = [
                            'nis_siswa' => $v_nis_siswa,
                            'nama_siswa' => $v_nama_siswa,
                            'tgl_siswa' => $v_tgl_lahir,
                            'jk_siswa' => $v_jenis_kelamin,
                            'telp_siswa' => $v_nomer_telp,
                            'id_guru_siswa' => $v_guru_pendamping,
                            'foto' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nis_siswa' => $v_nis_siswa,
                        'nama_siswa' => $v_nama_siswa,
                        'tgl_siswa' => $v_tgl_lahir,
                        'jk_siswa' => $v_jenis_kelamin,
                        'telp_siswa' => $v_nomer_telp,
                        'id_guru_siswa' => $v_guru_pendamping
                    ];
                }

                $this->M_create->create_siswa($v_data_informasi);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect("admin/daftar_siswa");       

        }
    }



    public function edit_aset($id){

        $v_id = decrypt_url($id);
        $v_data['is_aktif'] = 'aset';
        $v_data['judul_daftar'] = 'Edit Data Aset';
        
        $v_data['data'] = $this->M_read->get_aset_by_id($v_id)->row_array();

        $this->form_validation->set_rules('nama_aset', 'Nama_aset', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('edit/edit_aset',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_nama_aset = $this->input->post('nama_aset');
            $v_kondisi_aset = $this->input->post('kondisi_aset');
            $v_banyak_aset = $this->input->post('banyak_aset');
            $upload_foto = $_FILES['foto_aset']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/aset/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_aset')){
                        $v_nama_foto = $this->upload->data('file_name');
                        $v_foto_lama = $v_data['data']['foto_aset'];
                        unlink(FCPATH . 'assets/penyimpanan_foto/aset/' . $v_foto_lama);

                        $v_data_informasi = [
                            'nama_aset' => $v_nama_aset,
                            'kondisi_aset' => $v_kondisi_aset,
                            'banyak_aset' => $v_banyak_aset,
                            'foto_aset' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nama_aset' => $v_nama_aset,
                        'kondisi_aset' => $v_kondisi_aset,
                        'banyak_aset' => $v_banyak_aset
                    ];
                }

                $this->M_update->edit_aset($v_data_informasi,$v_id);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect("admin/daftar_aset"); 
        }
    }


    public function hapus_siswa($id){
        $v_id = decrypt_url($id);
        
        $hapus_foto = $this->M_read->get_siswa_by_id($v_id)->row_array();
        
        unlink(FCPATH . 'assets/penyimpanan_foto/siswa/'. $hapus_foto['foto']);

        $this->M_delete->delete_siswa($v_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/daftar_siswa');
    } 


    //ASET

    public function daftar_aset(){
        $v_data['is_aktif'] = 'aset';
        $v_data['judul_daftar'] = 'Daftar Aset';

        $list_data = $this->M_read->get_aset();
        $v_data['isi_konten'] = '';

        $v_data['isi_konten'] .= '
            
            <table id="example" class="table table-striped table-bordered" style="width:100%">
                <thead>
                <tr>
                    <th style="text-align: center;">NO</th>
                    <th style="text-align: center;">Nama aset</th>
                    <th style="text-align: center;">Kondisi</th>
                    <th style="text-align: center;">Banyak aset</th>
                    <th style="text-align: center;">Foto</th>
                    <th style="text-align: center;">Aksi</th>
                </tr>
                </thead>
            <tbody>  
        ';

        $index =1;
        if($list_data->num_rows() > 0)
        {
            foreach($list_data->result() as $row)
            {
                $v_data['isi_konten'] .= '
                    <tr>
                        <td>'.$index.'</td>
                        <td>'.$row->nama_aset.'</td>
                        <td>'.$row->kondisi_aset.'</td>
                        <td style="text-align: center;">'.$row->banyak_aset .'</td>
                        <td style="text-align: center;"> 
                            <img src="'.base_url().'assets/penyimpanan_foto/aset/'.$row->foto_aset.'" class="card-img-top" alt="..." style="width: 7rem;">
                            </td>
                        <td>
                            <a href="'.base_url().'admin/edit_aset/'.encrypt_url($row->id_aset).'" class="badge badge-primary">Edit</a>
                            <a href="javascript:;" class="badge badge-danger" onclick="button_hapus(\''."aset".'\', \''.encrypt_url($row->id_aset).'\')">Hapus</a >
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
        $this->load->view('templates/footer');  
    }


    public function tambah_aset(){
        $v_data['is_aktif'] = 'aset';
        $v_data['judul_daftar'] = 'Tambah Data Aset';


        $this->form_validation->set_rules('nama_aset', 'Nama_aset', 'required|trim', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('tambah/tambah_aset',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_nama_aset = $this->input->post('nama_aset');
            $v_kondisi_aset = $this->input->post('kondisi_aset');
            $v_banyak_aset = $this->input->post('banyak_aset');
            $upload_foto = $_FILES['foto_aset']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/aset/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_aset')){
                        $v_nama_foto = $this->upload->data('file_name');
                        $v_data_informasi = [
                            'nama_aset' => $v_nama_aset,
                            'kondisi_aset' => $v_kondisi_aset,
                            'banyak_aset' => $v_banyak_aset,
                            'foto_aset' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nama_aset' => $v_nama_aset,
                        'kondisi_aset' => $v_kondisi_aset,
                        'banyak_aset' => $v_banyak_aset
                    ];
                }

                $this->M_create->create_aset($v_data_informasi);
                $this->session->set_flashdata('pesan', 'Data berhasil ditambah!');
                redirect("admin/daftar_aset");       

        }
    }


    public function edit_siswa($id){

        $v_id = decrypt_url($id);
        $v_data['is_aktif'] = 'siswa';
        $v_data['judul_daftar'] = 'Edit Data Siswa';
        
        $v_data['data'] = $this->M_read->get_siswa_by_id($v_id)->row_array();

        $list_guru = $this->M_read->get_guru();

        $data_guru = '';
        if($list_guru->num_rows() > 0)
        {
            foreach($list_guru->result() as $row)
            {
                if($v_data['data']['id_guru_siswa'] == $row->id_guru){
                    $data_guru .= '
                        <option selected value="'.$row->id_guru.'">'.$row->nama_guru.'</option>
                    '; 
                }else{
                    $data_guru .= '
                        <option value="'.$row->id_guru.'">'.$row->nama_guru.'</option>
                    ';
                }
                 
            }  
        }
        $v_data['data_guru'] = '
            <div class="input-group mb-3">
                <div class="input-group-prepend">
                <label class="input-group-text" for="inputGroupSelect01">Pendamping</label>
                </div>
                <select class="custom-select" id="guru_pendamping" name="guru_pendamping">
                <option value=""> -- Pilih Guru -- </option>
                '.$data_guru.'
                </select>
            </div>
        ';

        $this->form_validation->set_rules('nis_siswa', 'Nis_siswa', 'required|trim|callback_validasi_nis', [
            'required' => 'Kolom harus diisi!',
        ]);

        if($this->form_validation->run() == false){
            $this->load->view('templates/header');
            $this->load->view('templates/sidebar',$v_data);
            $this->load->view('templates/topbar_admin',$v_data);
            $this->load->view('edit/edit_siswa',$v_data);
            $this->load->view('templates/footer');    
        }
        else{

            $v_nis_siswa = $this->input->post('nis_siswa');
            $v_nama_siswa = $this->input->post('nama_siswa');
            $v_jenis_kelamin = $this->input->post('jenis_kelamin');
            $v_tgl_lahir = $this->input->post('tgl_lahir');
            $v_nomer_telp = $this->input->post('nomer_telp');
            $v_guru_pendamping = $this->input->post('guru_pendamping');
            $upload_foto = $_FILES['foto_siswa']['name'];

                if($upload_foto){
                    
                    $config['allowed_types'] = 'gif|jpg|png|jpeg';
                    $config['max_size']     = '5000';
                    $config['upload_path'] = './assets/penyimpanan_foto/siswa/';
                        
                    $this->load->library('upload', $config);
    
                    if ($this->upload->do_upload('foto_siswa')){
                        $v_nama_foto = $this->upload->data('file_name');
                        $v_foto_lama = $v_data['data']['foto'];
                        unlink(FCPATH . 'assets/penyimpanan_foto/siswa/' . $v_foto_lama);

                        $v_data_informasi = [
                            'nis_siswa' => $v_nis_siswa,
                            'nama_siswa' => $v_nama_siswa,
                            'tgl_siswa' => $v_tgl_lahir,
                            'jk_siswa' => $v_jenis_kelamin,
                            'telp_siswa' => $v_nomer_telp,
                            'id_guru_siswa' => $v_guru_pendamping,
                            'foto' => $v_nama_foto
                        ];
                    }
                    else
                    {
                        echo $this->upload->display_errors();
                    }
    
                }else{
                    $v_data_informasi = [
                        'nis_siswa' => $v_nis_siswa,
                        'nama_siswa' => $v_nama_siswa,
                        'tgl_siswa' => $v_tgl_lahir,
                        'jk_siswa' => $v_jenis_kelamin,
                        'telp_siswa' => $v_nomer_telp,
                        'id_guru_siswa' => $v_guru_pendamping
                    ];
                }

                $this->M_update->edit_siswa($v_data_informasi,$v_id);
                $this->session->set_flashdata('pesan', 'Data berhasil diubah!');
                redirect("admin/daftar_siswa"); 
        }
    }


    public function hapus_aset($id){
        $v_id = decrypt_url($id);
        
        $hapus_foto = $this->M_read->get_aset_by_id($v_id)->row_array();
        
        unlink(FCPATH . 'assets/penyimpanan_foto/aset/'. $hapus_foto['foto_aset']);

        $this->M_delete->delete_aset($v_id);
        $this->session->set_flashdata('pesan', 'Data berhasil dihapus!');
        redirect('admin/daftar_aset');
    } 


}   