<?php

namespace App\Models;

use CodeIgniter\Model;

class ModelPeserta extends Model

{
    public function AllData()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            // ->where('status', '1')
            ->where('aktif', '1')
            ->get()
            ->getResultArray();
    }

    public function pertahun()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status', '1')
            ->where('status_daftar', '3')
            ->get()
            ->getResultArray();
    }
    public function jmlverifikasi()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            ->countAllResults();
    }

    public function verifikasi()
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            ->get()
            ->getResultArray();
    }

    public function add($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }

    public function edit($data)
    {
        $this->db->table('tbl_siswa')
            ->where('nisn', $data['nisn'])
            ->update($data);
    }
    public function editalamat($data)
    {
        $this->db->table('tbl_siswa')
            ->where('nisn', $data['nisn'])
            ->update($data);
    }

    public function upload($data)
    {
        $this->db->table('tbl_siswa')
            ->insert($data);
    }

    public function cekdata($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)->get()->getRowArray();
    }

    public function DataPeserta($nisn)
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            // ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }
    public function Data($id_siswa)
    {
        return $this->db->table('tbl_siswa')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_siswa.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->join('desa', 'desa.id_desa = tbl_siswa.desa', 'left')
            ->join('provinsi', 'provinsi.id_provinsi = tbl_siswa.provinsi', 'left')
            ->join('kecamatan', 'kecamatan.id_kecamatan = tbl_siswa.kecamatan', 'left')
            ->join('kabupaten', 'kabupaten.id_kabupaten = tbl_siswa.kabupaten', 'left')
            ->where('id_siswa', $id_siswa)
            ->where('tbl_kelas.id_guru')
            ->get()->getRowArray();
    }
    public function jumlahAktif()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('aktif', '1')
            // ->where('status', '1')
            ->countAllResults();
    }

    public function jumlahNonAktif()
    {
        return $this->db->table('tbl_siswa')
            ->where('aktif', '0')
            ->countAllResults();
    }

    public function jml_baru()
    {
        return $this->db->table('tbl_siswa')
            // ->join('tbl_ta', 'tbl_ta.id_ta = tbl_siswa.id_ta', 'left')
            ->where('status_daftar', '2')
            // ->where('status', '1')
            ->countAllResults();
    }


    public function rekamdidik($nisn)
    {
        return $this->db->table('tbl_database')
            // ->join('tbl_siswa', 'tbl_siswa.nisn = tbl_database.nisn', 'left')
            ->join('tbl_ta', 'tbl_ta.id_ta = tbl_database.id_ta', 'left')
            ->join('tbl_kelas', 'tbl_kelas.id_kelas = tbl_database.id_kelas', 'left')
            ->join('tbl_guru', 'tbl_guru.id_guru = tbl_kelas.id_guru', 'left')
            ->where('tbl_database.nisn', $nisn)
            // ->where('status', '1')
            ->get()->getResultArray();
    }

    public function detail_data($nisn)
    {
        return $this->db->table('tbl_siswa')
            ->where('nisn', $nisn)
            ->get()->getRowArray();
    }

    public function naik()
    {

        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('aktif', '1')
            // ->where('tbl_siswa.id_tingkat', '2')
            ->get()
            ->getResultArray();
    }
    public function lulus()
    {

        return $this->db->table('tbl_siswa')
            ->join('tbl_tingkat', 'tbl_tingkat.id_tingkat = tbl_siswa.id_tingkat', 'left')
            ->where('tbl_siswa.id_tingkat', '3')
            ->get()
            ->getResultArray();
    }
}














// class ModelPeserta extends Model
// {
//     

//     
// }
