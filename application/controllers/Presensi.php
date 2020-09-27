<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Presensi
 *
 * @author sigits
 */
class Presensi extends CI_Controller {

    //put your code here
    function index() {
        $this->load->view('headfoot/header');
        $this->load->view('presensi/rekap_presensi');
        $this->load->view('headfoot/footer');
    }

    function rekap_hari_ini() {
        $date = $this->input->post('tanggal');
        $data['rekap'] = $this->presensi->getRekapHariIni($date)->result();
        $this->load->view('presensi/report', $data);
    }

    function rekap_range() {
        $dari = $this->input->post("dari");
        $sampai = $this->input->post("sampai");
        $data['chart'] = [];
        $rekap = $this->presensi->getRekapRange($dari, $sampai)->result();
        foreach ($rekap as $r) {
            $tmp = [];
            $tmp['nama'] = $r->nama;
            $tmp['akumulasi'] = $this->presensi->getAkumulasiRange($dari, $sampai, $r->username)->row()->akumulasi;
            array_push($data['chart'], $tmp);
        }
        $data['rekap'] = $rekap;
        $data['title'] = "Rekap dari " . date_format(date_create($dari), 'd/m/Y') . " sampai " . date_format(date_create($sampai), 'd/m/Y');
        $this->load->view('presensi/report', $data);
    }

    function rekap_tahunan() {
        //tahunan
        $tahun = $this->input->post("tahun");
        $rekap = $this->presensi->getRekapTahunan($tahun)->result();
        $data['chart'] = [];
        foreach ($rekap as $r) {
            $tmp = [];
            $tmp['nama'] = $r->nama;
            $tmp['akumulasi'] = $this->presensi->getAkumulasiTahunan($tahun, $r->username)->row()->akumulasi;
            array_push($data['chart'], $tmp);
        }
        $data['rekap'] = $rekap;
        $data['title'] = "Rekap tahun $tahun";
        $this->load->view('presensi/report', $data);
    }

    function rekap_bulanan() {
        $bulan = $this->input->post("bulan");
        $tahun = $this->input->post("tahun");
        $rekap = $this->presensi->getRekapBulanan($bulan, $tahun)->result();
        $chart= $this->presensi->getRekapBulanan($bulan, $tahun, true)->result();
        $data['labels'] = [];
        $data['data'] = [];
        $data['background'] = [];
        foreach ($chart as $r) {
            $labels = [$r->nama];
            array_push($data['labels'], $labels);

            $akumulasi = [$this->presensi->getAkumulasiBulanan($bulan, $tahun, $r->username)->row()->akumulasi];
            array_push($data['data'], $akumulasi);
            
            $background = [$r->color];
            array_push($data['background'], $background);
           
        }
        $data['rekap'] = $rekap;
        $data['title'] = "Rekap untuk $bulan/$tahun";
        $this->load->view('presensi/report', $data);
    }

}
