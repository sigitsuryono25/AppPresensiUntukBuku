<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_m extends CI_Model{

    function getLoginDetail($username, $md5Password){
        return $this->db->get_where("tb_user", ['username' => $username, 'password' => $md5Password]);
    }

}