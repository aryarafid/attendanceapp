<?php

namespace App\Controllers;

use App\Models\AbsensiModel;

class Absensi extends BaseController
{
    public function __construct()
    {
        $this->AbsensiModel = new AbsensiModel();
		// $this->PegawaiModel = new AbsensiModel();
        $db = \Config\Database::connect();
		$builderRP = $db->table('absensi');
    }

    public function index()
    {
        $data_absensi = $this->AbsensiModel->findAll();

        $data= [
            'title' => "Absensi Pegawai",
            'heading' => "Absensi Pegawai",
            "data_absensi" => $data_absensi
        ];
        // dd($data);
        return view('absensi/v_absensi', $data);
    }
}
