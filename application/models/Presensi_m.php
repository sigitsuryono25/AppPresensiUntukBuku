<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Presensi_m
 *
 * @author sigits
 */
class Presensi_m extends CI_Model {

    //put your code here
    function getRekapTahunan($tahunSekarang) {
        return $this->db->select("*")
                        ->from("tb_presensi")
                        ->join("tb_user", "tb_presensi.id_user=tb_user.username", "INNER")
                        ->where(['YEAR(presensi_masuk)' => $tahunSekarang])
                        ->get();
    }

    function getAkumulasiTahunan($tahun, $userid) {
        return $this->db->select("COUNT(*) as akumulasi")
                        ->from("tb_presensi")
                        ->where("YEAR(presensi_masuk) IN ('$tahun') "
                                . "AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL"
                                . " AND id_user IN ('$userid')")
                        ->get();
//                        ->get_compiled_select();         
    }

    function getRekapRange($dari, $sampai) {
        return $this->db->select("*")
                        ->from("tb_presensi")
                        ->join("tb_user", "tb_presensi.id_user=tb_user.username", "INNER")
                        ->where("DATE(presensi_masuk) BETWEEN '$dari' AND '$sampai' "
                                . "AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL")
                        ->get();
//                        ->get_compiled_select();
    }

    function getAkumulasiRange($dari, $sampai, $userid) {
        return $this->db->select("COUNT(*) as akumulasi")
                        ->from("tb_presensi")
                        ->where("DATE(presensi_masuk) BETWEEN '$dari' AND '$sampai' "
                                . "AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL"
                                . " AND id_user IN ('$userid')")
                        ->get();
//                        ->get_compiled_select();         
    }

    function getRekapHariIni($hariIni) {
        return $this->db->select("*")
                        ->from("tb_presensi")
                        ->where("DATE(presensi_masuk) IN ('$hariIni')")
                        ->get();
    }

    function getRekapBulanan($month, $year, $chart = false) {
        if ($chart) {
            return $this->db->select("*")
                            ->from("tb_presensi")
                            ->join("tb_user", "tb_presensi.id_user=tb_user.username", "INNER")
                            ->where("MONTH(presensi_masuk) IN ('$month') AND YEAR(presensi_masuk) IN ('$year')"
                                    . " AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL")
                            ->group_by("id_user")
                            ->get();
        } else {
            return $this->db->select("*")
                            ->from("tb_presensi")
                            ->join("tb_user", "tb_presensi.id_user=tb_user.username", "INNER")
                            ->where("MONTH(presensi_masuk) IN ('$month') AND YEAR(presensi_masuk) IN ('$year')"
                                    . " AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL")
                            ->get();
        }
    }

    function getAkumulasiBulanan($month, $year, $userid) {
        return $this->db->select("COUNT(*) as akumulasi")
                        ->from("tb_presensi")
                        ->where("MONTH(presensi_masuk) IN ('$month') AND YEAR(presensi_masuk) IN ('$year') "
                                . "AND presensi_masuk IS NOT NULL AND presensi_pulang IS NOT NULL"
                                . " AND id_user IN ('$userid')")
                        ->get();
    }

}
