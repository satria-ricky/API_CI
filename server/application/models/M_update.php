<?php
class M_update extends CI_model {

    //PFORILE
    public function edit_profile($data,$id){     
      $this->db->update('users', $data, array('id_user' => $id));
    }

  //GURU
  public function edit_informasi_guru($data,$id){     
    $this->db->update('tb_guru', $data, array('id_guru' => $id));
    return $this->db->affected_rows();
  }   

  public function edit_akun_guru($data,$id){     
    $this->db->update('users', $data, array('id_user' => $id));
  }   

    
  //SISWA
  public function edit_siswa($data,$id){     
    $this->db->update('tb_siswa', $data, array('id_siswa' => $id));
  } 


  //ASET
  public function edit_aset($data,$id){     
    $this->db->update('tb_aset', $data, array('id_aset' => $id));
  } 

}