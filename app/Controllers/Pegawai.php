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
        $data_pegawai = $this->PegawaiModel->findAllExclude();
        $data = [
            'title' => "Manage Pegawai",
            'heading' => "Manage Pegawai",
            "data_pegawai" => $data_pegawai
        ];
        return view('pegawai/v_pegawai', $data);
    }

    public function pegawai_detail($id)
    {
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

        foreach ($data_pegawai2 as $key => $value) {
            if ($data_pegawai2[$key]['telat']) {
                $time = explode(':', $data_pegawai2[$key]['swm']);
                $wmm[$key] = ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
            } else if ($data_pegawai2[$key]['pulang_cepat']) {
                $time2 = explode(':', $data_pegawai2[$key]['swp']);
                $wmp[$key] = ($time2[0] * 60) + ($time2[1]) + ($time2[2] / 60);
            } else if ($data_pegawai2[$key]['lembur']) {
                $time3 = explode(':', $data_pegawai2[$key]['swp']);
                $wmp2[$key] = ($time3[0] * 60) + ($time3[1]) + ($time3[2] / 60);
            }
        }

        $sumtelat = array_sum($wmm);
        $sumpulcep = array_sum($wmp);
        $sumlembur = array_sum($wmp2);

        // d($wmm);
        // d($wmp);
        // d($wmp2);
        // dd($data_pegawai2);
        // d($sumtelat);
        // d($sumpulcep);
        // dd($sumlembur);

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

    public function add_pegawai_page()
    {
        # code...
    }
}