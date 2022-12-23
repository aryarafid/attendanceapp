<?php

namespace App\Models;

use CodeIgniter\Model;

class PegawaiModel extends Model
{
    protected $table = 'pegawai';
    protected $primaryKey = 'id_pegawai';

    protected $useAutoIncrement = true;

    protected $returnType = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['nama_pegawai'];

    protected $useTimestamps = false;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;

    public function getDataForOnePegawai($id) //get data for one guy

    {
        $db = \Config\Database::connect();
        $sql = $db->table('absensi');
        $sql->join('pegawai', 'pegawai.id_pegawai = absensi.id_pegawai', 'left');
        $sql->where('absensi.id_pegawai', $id);
        $sql->get();
        return $sql;
    }

    public function getDataForOnePegawai2($id) //get data for one guy

    {
        $db = \Config\Database::connect();
        $sql = "SELECT * FROM absensi a, pegawai p WHERE a.id_pegawai=p.id_pegawai AND a.id_pegawai=:id:";
        $sql =
            $db->query($sql, [
                'id' => $id
            ]);
        $sql = $sql->getResultArray();
        return $sql;
    }

    public function getPegCountSelisih($id) //pake data selisih buat bantu hitung menit2annya

    {
        $db = \Config\Database::connect();
        $sql = "SELECT a.id_absensi, a.id_pegawai, p.nama_pegawai, 
            a.tanggal_absen, a.waktu_masuk, a.waktu_pulang,
            TIMEDIFF(a.waktu_masuk, '08:00:00') AS 'swm', TIMEDIFF(a.waktu_pulang, '17:00:00') AS 'swp'
        from absensi a join
            pegawai p
            ON a.id_pegawai = p.id_pegawai
        WHERE p.id_pegawai=:id:";
        $sql =
            $db->query($sql, [
                'id' => $id
            ]);
        $sql = $sql->getResultArray();
        return $sql;
    }

    public function getPeg3($id) //pake data selisih buat bantu hitung menit2annya

    {
        $db = \Config\Database::connect();
        $sql = "SELECT a.id_absensi,
        a.id_pegawai,
        p.nama_pegawai,
        a.tanggal_absen,
        a.waktu_masuk,
        a.waktu_pulang,
                if(a.waktu_masuk > '08:00:00', TRUE, FALSE) AS 'telat',
                if(a.waktu_pulang < '17:00:00', TRUE, FALSE) AS 'pulang_cepat',
                if(a.waktu_pulang > '17:00:00', TRUE, FALSE) AS 'lembur',
              TIMEDIFF(a.waktu_masuk, '08:00:00') AS 'swm', TIMEDIFF(a.waktu_pulang, '17:00:00') AS 
                 'swp'
        
        from absensi a join
             pegawai p
             ON a.id_pegawai = p.id_pegawai
        WHERE p.id_pegawai=:id:";
        $sql =
            $db->query($sql, [
                'id' => $id
            ]);
        $sql = $sql->getResultArray();
        return $sql;
    }

    public function countThree($data) //count menit telat, lembur, pulang cepat in a $data array

    {
        //$data[$i][number]
        //kemungkinan - telat TRUE OR either pulcep OR lembur (telat v (pc v lemb))

        //if telat = true   : swm covert masuk array telat
        //if lembur = true  : swp covert masuk array lembur
        //if pulcep = true  : swp covert masuk array pulcep

        // return arr

        $sum = 0;

        $pattern = "/-/i";

        for ($i = 0; $i < count($data); $i++) {
            $data[$i]['xswm'] = preg_replace($pattern, "", $data[$i]['swm']);
            $data[$i]['xswp'] = preg_replace($pattern, "", $data[$i]['swp']);
            // if ($data[$i]) {
            //     # code...
            // }
        }

        return;

    }

    protected function hoursTominutes($time)
    {
        $time = explode(':', $time);
        return ($time[0] * 60) + ($time[1]) + ($time[2] / 60);
    }

    public function converter($data)
    {
        //data -> array of data, modify swp and swm
        $telat = 0;
        $pulang_cepat = 0;
        $lembur = 0;

        for ($i = 0; $i < count($data); $i++) {
            if ($data[$i]['telat'] === 1) {
                $telat = $this->hourstominutes($data[$i]['swm']);
            } elseif ($data[$i]['pulang_cepat'] === 1) {
                $pulang_cepat = $this->hourstominutes($data[$i]['swp']);
            } elseif ($data[$i]['lembur'] === 1) {
                $lembur = $this->hourstominutes($data[$i]['swp']);
            }
        }

        return $returnArray = array(
            $telat,
            $pulang_cepat,
            $lembur
        );

    }

}