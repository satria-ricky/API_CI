<?php

use GuzzleHttp\Client;

class M_update extends CI_model {



  	 //TES api
     public function edit_api_guru($v_data) {
    
      $client = new Client();
    
      $response = $client->request('PUT', 'http://localhost/test_api/api/guru', [
        'form_params' => $v_data
      ]);
    
      
      $hasil = json_decode($response->getBody()->getContents(), true);
    
      // var_dump($result['data']);
      return $hasil;
      }
  

      
    //PFORILE
    public function edit_profile($data,$id){     
      $this->db->update('users', $data, array('id_user' => $id));
    }

  //GURU
  public function edit_informasi_guru($data,$id){     
    $this->db->update('tb_guru', $data, array('id_guru' => $id));
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