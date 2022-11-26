<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $data= [
            'title' => "Aplikasi Absensi",
            'heading' => "Dashboard Aplikasi Absensi"
        ];
        return view('v_home', $data);
    }
}
