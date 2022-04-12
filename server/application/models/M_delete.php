<?php
class M_delete extends CI_model {


  //API
  public function delete_api_guru($v_id) {
    $this->db->delete('tb_guru', array('id_guru' => $v_id));
    return $this->db->affected_rows();
  }

  public function delete_bidang($v_id) {
    $this->db->delete('tb_bidang', array('id_bidang' => $v_id));
    return $this->db->affected_rows();
  }


  //GURU
	public function delete_informasi_guru($v_id) {
      $this->db->where('id_guru', $v_id);
      $this->db->delete('tb_guru');
    }
  
    public function delete_akun_guru($v_id) {
      $this->db->where('id_user', $v_id);
      $this->db->delete('users');
      
    }

    //SISWA
    public function delete_siswa($v_id) {
      $this->db->where('id_siswa', $v_id);
      $this->db->delete('tb_siswa');
    }


    //ASET
    public function delete_aset($v_id) {
      $this->db->where('id_aset', $v_id);
      $this->db->delete('tb_aset');
    }

}