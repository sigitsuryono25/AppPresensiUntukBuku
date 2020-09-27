<?php 
defined('BASEPATH') OR exit('No direct script access allowed');


class Dashboard extends CI_Controller{
    function index(){
        $this->load->view("headfoot/header");
        $this->load->view("dashboard");
        $this->load->view("headfoot/footer");
    }
}