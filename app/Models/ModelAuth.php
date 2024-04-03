<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelAuth extends Model
{
    public function login($username, $password, $level)
    {
        return $this->db->table('tbl_user')
            ->where([
                'username' => $username,
                'password' => $password,
                'level' => $level,

            ])->get()->getRowArray();
    }


    public function loginsiswa($nisn, $password)
    {
        return $this->db->table('tbl_siswa')
            ->where([
                'nisn'      => $nisn,
                'password'  => $password,
                'aktif'     => 1,
            ])->get()->getRowArray();
    }

    public function loginguru($username, $password)
    {
        return $this->db->table('tbl_guru')
            ->where([
                'niy' => $username,
                'password' => $password,
            ])->get()->getRowArray();
    }
}
