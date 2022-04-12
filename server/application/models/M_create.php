<?php
class M_create extends CI_model {

	//GURU
	public function create_guru($v_data)
	{
	  $this->db->insert('tb_guru', $v_data);
	  return $this->db->affected_rows();
	}

	public function create_akun_guru($v_data)
	{
	  $this->db->insert('users', $v_data);
	  return $this->db->affected_rows();
	}


	//SISWA
	public function create_siswa($v_data)
	{
	  $this->db->insert('tb_siswa', $v_data);
	  return $this->db->affected_rows();
	}

	//ASET
	public function create_aset($v_data)
	{
	  $this->db->insert('tb_aset', $v_data);
	  return $this->db->affected_rows();
	}


}