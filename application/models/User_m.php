<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User_m
 *
 * @author sigits
 */
class User_m extends CI_Model{
    //put your code here
    
    function daftarUser(){
        return $this->db->get("tb_user");
    }
    
    function tambahUser($data){
        $this->db->insert("tb_user", $data);
        return $this->db->affected_rows();
    }
    function updateUser($data, $where) {
        $this->db->where($where);
        $this->db->update("tb_user", $data);
        return $this->db->affected_rows();
    }
    
    function hapusUser($where){
        $this->db->where($where);
        $this->db->delete('tb_user');
        return $this->db->affected_rows();
    }
}
