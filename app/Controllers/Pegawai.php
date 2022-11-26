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
        // show detail pegawai, crud pegawai, dan crud absensi hanya 1 pegawai ini saja
        // $wmasuknix = array();
        // $wkeluarnix = array();

        // call fungsi, show absensi only for 1 guy
        // $data_pegawai = $this->PegawaiModel->getDataForOnePegawai2($id);
        $data_pegawai = $this->PegawaiModel->getPegCountSelisih($id);
        dd($data_pegawai);

        // foreach ($data_pegawai as $dp) {
        // for ($i = 0; $i < count($data_pegawai); $i++) {
        //     // $wmasuknix = strtotime($data_pegawai[$i]['waktu_masuk']) - $wmasuk;
        //     // $wkeluarnix = strtotime($data_pegawai[$i]['waktu_pulang']) - $wkeluar;

        //     $wmasuknix = array_map(function ($a) {
        //         $wmasuk = strtotime('08:00:00');
        //         return $a - $wmasuk;
        //     }, $data_pegawai[$i]['waktu_masuk']);

        //     $wkeluarnix = array_map(function ($a) {
        //         $wkeluar = strtotime('17:00:00');
        //         return $a - $wkeluar;
        //     }, $data_pegawai[$i]['waktu_pulang']);
        // };

        // }

        // d($wmasuknix);
        // dd($wkeluarnix);
        
        $data = [
            'title' => "Detail Pegawai",
            'heading' => "Detail Pegawai",
            'data_pegawai' => $data_pegawai,
            // 'wmasuknix' =>  $wmasuknix,
            // 'wkeluarnix' => $wkeluarnix,
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
