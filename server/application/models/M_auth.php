<?php
class M_auth extends CI_model {

    public function auth($v_level, $v_username, $v_password){
        $sql='SELECT * FROM users WHERE level_user=? AND username=? AND password=?';
        return $this->db->query($sql, array($v_level,$v_username,$v_password))->row_array();
    }


}