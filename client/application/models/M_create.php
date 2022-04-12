<?php

use GuzzleHttp\Client;
class M_create extends CI_model {


	 //TES api
	 public function create_api_guru($v_data) {
    
		$client = new Client();
	
		$response = $client->request('POST', 'http://localhost/test_api/api/guru', [
		  'form_params' => $v_data
		]);
	
		
		$hasil = json_decode($response->getBody()->getContents(), true);
	
		// var_dump($result['data']);
		return $hasil;
	  }


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