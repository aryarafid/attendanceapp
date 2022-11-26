<?php

namespace App\Models;

use CodeIgniter\Model;

class AbsensiModel extends Model
{
    protected $table      = 'absensi';
    protected $primaryKey = 'id_absensi';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    protected $useSoftDeletes = false;

    protected $allowedFields = ['id_pegawai', 'tanggal_absen', 'waktu_masuk', 'waktu_pulang'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getPegawaiName($id)     //unused
    {
        $db = \Config\Database::connect();
        $sql = $db->table('absensi');
        $sql->select('*');
        $sql->join('pegawai', 'absensi.id_pegawai = pegawai.id_pegawai');
        $sql->where('id_pegawai', $id);
        $sql->get()->getResult();
        return $sql;
    }

    public function joinTabs()      //join the tables
    {
        $db = \Config\Database::connect();
        $sql = $db->table('absensi');
        $sql->select('*');
        $sql->join('pegawai', 'absensi.id_pegawai = pegawai.id_pegawai');
        $sql->get()->getResultArray();
        return $sql;
    }

    public function joinTabs2()      //join the tables w query
    {}

    
}
