<?php

namespace App\Controllers;

use App\Models\AbsensiModel;
use App\Models\PegawaiModel;

class Pegawai extends BaseController
{
    public function __construct()
    {
        $this->AbsensiModel = new AbsensiModel();
        $this->PegawaiModel = new PegawaiModel();
        $this->db = \Config\Database::connect();
        $builderRP = $this->db->table('absensi');
    }

    public function index()
    {
        $data_pegawai = $this->PegawaiModel->findAll();
        $data = [
            'title' => "Manage Pegawai",
            'heading' => "Manage Pegawai",
            "data_pegawai" => $data_pegawai
        ];
        return view('pegawai/v_pegawai', $data);
    }

    public function pegawai_detail($id)
    {

        // $data_pegawai = $this->PegawaiModel->getPegCountSelisih($id);
        // $data_pegawai3 = $this->PegawaiModel->countThree($data_pegawai2);
        // d($data_pegawai);

        $data_pegawai2 = $this->PegawaiModel->getPeg3($id);
        $wmm = array();
        $wmp = array();
        $wmp2 = array();

        $sumtelat = 0;
        $sumpulcep = 0;
        $sumlembur = 0;

        $pattern = "/-/i";
        for ($i = 0; $i < count($data_pegawai2); $i++) { //tumpuk value
            $data_pegawai2[$i]['swm'] = preg_replace($pattern, "", $data_pegawai2[$i]['swm']);
            $data_pegawai2[$i]['swp'] = preg_replace($pattern, "", $data_pegawai2[$i]['swp']);
        }

        // for ($i = 0; $i < count($data_pegawai2); $i++) {
        //     if ($data_pegawai2[$i]['telat']) {
        //         $time = explode(':', $data_pegawai2[$i]['swm']);
        //         $wmm[$i] = ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
        //     } else if ($data_pegawai2[$i]['pulang_cepat']) {
        //         $time2 = explode(':', $data_pegawai2[$i]['swp']);
        //         $wmp[$i] = ($time2[0] * 60) + ($time2[1]) + ($time2[2] / 60);
        //     } else if ($data_pegawai2[$i]['lembur']) {
        //         // } else {
        //         $time3 = explode(':', $data_pegawai2[$i]['swp']);
        //         $wmp2[$i] = ($time3[0] * 60) + ($time3[1]) + ($time3[2] / 60);
        //     }
        // }



        foreach ($data_pegawai2 as $key => $value) {
            if ($data_pegawai2[$key]['telat']) {
                $time = explode(':', $data_pegawai2[$key]['swm']);
                $wmm[$key] = ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
            } else if ($data_pegawai2[$key]['pulang_cepat']) {
                $time2 = explode(':', $data_pegawai2[$key]['swp']);
                $wmp[$key] = ($time2[0] * 60) + ($time2[1]) + ($time2[2] / 60);
            } else if ($data_pegawai2[$key]['lembur']) {
                // } else {
                $time3 = explode(':', $data_pegawai2[$key]['swp']);
                $wmp2[$key] = ($time3[0] * 60) + ($time3[1]) + ($time3[2] / 60);
            }
        }


        // switch (true) {
        //     case $data_pegawai2[$i]['telat']:
        //         $time = explode(':', $data_pegawai2[$i]['swm']);
        //         $wmm[$i] = ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
        //         // break;
        //     case $data_pegawai2[$i]['pulang_cepat']:
        //         $time2 = explode(':', $data_pegawai2[$i]['swp']);
        //         $wmp[$i] = ($time2[0] * 60) + ($time2[1]) + ($time2[2] / 60);
        //         // break;
        //     case $data_pegawai2[$i]['lembur']:
        //         $time3 = explode(':', $data_pegawai2[$i]['swp']);
        //         $wmp2[$i] = ($time3[0] * 60) + ($time3[1]) + ($time3[2] / 60);
        //         // break;

        //     default:
        //         // echo 'default';
        //         // break;
        // }
        // }


        // d($wmm);
        // d($wmp);
        // d($wmp2);
        d($data_pegawai2);


        $sumtelat = array_sum($wmm);
        $sumpulcep = array_sum($wmp);
        $sumlembur = array_sum($wmp2);

        d($sumtelat);
        d($sumpulcep);
        dd($sumlembur);

        $data = [
            'title' => "Detail Pegawai",
            'heading' => "Detail Pegawai",
            'data_pegawai' => $data_pegawai2,
            'sumtelat' => $sumtelat,
            'sumpulcep' => $sumpulcep,
            'sumlembur' => $sumlembur
        ];
        // dd($data);
        return view('pegawai/v_pegawai_detail', $data);
    }

    //count 3 categories
    public function add_pegawai_page()
    {
        # code...
    }
}