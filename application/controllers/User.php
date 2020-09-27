<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of User
 *
 * @author sigits
 */
class User extends CI_Controller {

    //put your code here

    function index() {
        $this->load->view('headfoot/header');
        //prepare data for list user
        $data['user'] = $this->user->daftarUser();
        $this->load->view('user/list_user', $data);
        //include modal
        $this->load->view('user/modal_user');
        $this->load->view('headfoot/footer');
    }

    function proses_user() {
        $mode = $this->input->post('mode');
        $nama = $this->input->post('nama');
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        //for insert
        $dataInsert = ['username' => $username, 'password' => md5($password), 'nama' => $nama];

        //for update
        $where = ['username' => $username];
        $dataUpdate = ['password' => md5($password), 'nama' => $nama];

        if ($mode == "add") {
            $message = ($this->user->tambahUser($dataInsert)) ? "Berhasil ditambahkan" : "Gagal Ditambahkan";
        } else if ($mode == "edit") {
            $message = ($this->user->updateUser($dataUpdate, $where)) ? "Berhasil diubah" : "Gagal diubah";
        }

        $this->session->set_flashdata("message", $message);
        redirect('user/');
    }

    function hapus_data() {
        $username = $this->input->get('username');
        $where = ['username' => $username];
        $del = $this->user->hapusUser($where);
        if ($del) {
            $this->session->set_flashdata("message", "Data berhasil dihapus");
        } else {
            $this->session->set_flashdata("message", "Data gagal dihapus");
        }
        redirect("user/");
    }

}
