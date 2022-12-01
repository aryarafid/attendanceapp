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
        $data_pegawai = $this->PegawaiModel->getPeg3($id);
        dd($data_pegawai);

        
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
