<?php

use GuzzleHttp\Client;

class M_read extends CI_model {


  // TES

  public function get_api_guru(){

    $client = new Client();

    $response = $client->request('GET', 'http://localhost/test_api/api/guru', [
      'query' => [
        'nama_key' => 'isikey'
      ]
    ]);

    $hasil = json_decode($response->getBody()->getContents(), true);

    // var_dump($result['data']);
    return $hasil['data'];
  }


  public function get_api_guru_by_id($id){
    $client = new Client();

    $response = $client->request('GET', 'http://localhost/test_api/api/guru', [
      'query' => [
        'nama_key' => 'isikey',
        'id' => $id
      ]
    ]);

    $hasil = json_decode($response->getBody()->getContents(), true);

    // var_dump($result['data']);
    return $hasil['data'][0];
   }

    //GURU

    public function get_total_guru(){
      $sql='SELECT COUNT(id_guru) AS total FROM tb_guru';
      return $query=$this->db->query($sql);
    }
    
    public function get_guru(){
      $sql='SELECT * FROM tb_guru ORDER BY id_guru ASC';
      return $query=$this->db->query($sql);
    }

    public function get_guru_by_id($id){
      $sql='SELECT * FROM users LEFT JOIN tb_guru ON users.id_user = tb_guru.id_guru WHERE id_user=?';
       return $query=$this->db->query($sql,$id);    
     }

    public function cek_nip($v_nip,$id){
      $sql='SELECT * FROM tb_guru WHERE nip_guru=? AND id_guru!=?';
      return $query=$this->db->query($sql,array($v_nip,$id))->row_array();
    }
  
    public function cek_nip_aja($v_nip){
      $sql='SELECT * FROM tb_guru WHERE nip_guru=?';
      return $query=$this->db->query($sql,$v_nip)->row_array();
    }


    //SISWA

    public function get_total_siswa(){
      $sql='SELECT COUNT(id_siswa) AS total FROM tb_siswa';
      return $query=$this->db->query($sql);
    }

    public function get_total_siswa_by_guru($id){
      $sql='SELECT COUNT(id_siswa) AS total FROM tb_siswa WHERE id_guru_siswa = ?';
      return $query=$this->db->query($sql,$id);
    }

    public function get_siswa(){
      $sql='SELECT * FROM tb_siswa LEFT JOIN tb_guru ON tb_siswa.id_guru_siswa = tb_guru.id_guru ORDER BY id_siswa ASC';
      return $query=$this->db->query($sql);
    }

    public function get_siswa_by_guru($id){
      $sql='SELECT * FROM tb_siswa LEFT JOIN tb_guru ON tb_siswa.id_guru_siswa = tb_guru.id_guru WHERE id_guru_siswa = ? ORDER BY id_siswa ASC';
      return $query=$this->db->query($sql,$id);
    }

    public function get_siswa_by_id($id){
      $sql='SELECT * FROM tb_siswa LEFT JOIN tb_guru ON tb_siswa.id_guru_siswa = tb_guru.id_guru WHERE id_siswa =?';
       return $query=$this->db->query($sql,$id);    
     }


     public function cek_nis($v_nis,$id){
      $sql='SELECT * FROM tb_siswa WHERE nis_siswa=? AND id_siswa!=?';
      return $query=$this->db->query($sql,array($v_nis,$id))->row_array();
    }
  
    public function cek_nis_aja($v_nis){
      $sql='SELECT * FROM tb_siswa WHERE nis_siswa=?';
      return $query=$this->db->query($sql,$v_nis)->row_array();
    }


    //ASET

    public function get_total_aset(){
      $sql='SELECT COUNT(id_aset) AS total FROM tb_aset';
      return $query=$this->db->query($sql);
    }

    public function get_aset(){
      $sql='SELECT * FROM tb_aset ORDER BY id_aset ASC';
      return $query=$this->db->query($sql);
    }

    public function get_aset_by_id($id){
      $sql='SELECT * FROM tb_aset WHERE id_aset = ?';
      return $query=$this->db->query($sql,$id);
    }


    //PROFILE
  public function get_akun($id){
    $sql='SELECT * FROM users WHERE id_user = ?';
    return $query=$this->db->query($sql,$id)->row_array();
  }  

  public function cek_username($username,$id){
    $sql='SELECT * FROM users WHERE username=? AND id_user!=?';
    return $query=$this->db->query($sql,array($username,$id))->row_array();
  }

  public function cek_username_aja($username){
    $sql='SELECT * FROM users WHERE username=?';
    return $query=$this->db->query($sql,$username)->row_array();
  }


}