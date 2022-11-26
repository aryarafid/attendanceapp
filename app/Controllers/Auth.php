<?php

namespace App\Controllers;

use App\Models\AuthModel;

class Auth extends BaseController
{
    public function __construct()
    {
        $this->AuthModel = new AuthModel();
		// $this->PegawaiModel = new AbsensiModel();
        $db = \Config\Database::connect();
		// $builderRP = $db->table('absensi');
    }

    public function index()
    {
        // $data_absensi = $this->AbsensiModel->findAll();

        $data= [
            'title' => "Login Aplikasi Absensi",
            'heading' => "Login Aplikasi Absensi",
            // "data_absensi" => $data_absensi
        ];
        // dd($data);
        return view('v_login', $data);
    }

    public function logger()
    {
        # code...
    }
}
