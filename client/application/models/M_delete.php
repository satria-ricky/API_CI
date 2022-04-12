<?php
use GuzzleHttp\Client;
class M_delete extends CI_model {


  //TES api
	public function delete_api_guru($v_id) {
    
    $client = new Client();

    $response = $client->request('DELETE', 'http://localhost/test_api/api/guru', [
      'form_params' => [
        'nama_key' => 'isikey',
        'id' => $v_id
      ]
    ]);

    
    $hasil = json_decode($response->getBody()->getContents(), true);

    // var_dump($result['data']);
    return $hasil;
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