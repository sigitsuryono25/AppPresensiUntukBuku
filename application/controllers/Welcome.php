<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {
	public function index()
	{
		$this->load->view('login');
	}

	public function proses_login(){
		$username = $this->input->post("username");
		$password = $this->input->post("password");
		$md5Password = md5($password);

		$hasilLogin = $this->login->getLoginDetail($username, $md5Password);
		if($hasilLogin->num_rows() > 0){
			$sessionData = $hasilLogin->row_array();
			$this->session->set_userdata($sessionData);
			$this->session->set_flashdata("login_success", "Selamat datang, ".$sessionData['nama']);
			redirect('Dashboard/');
		}else{
			$this->session->set_flashdata("login_error", "Login Gagal");
			redirect("/");
		}
	}
}
