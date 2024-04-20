<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelPresensi;
use App\Models\ModelTa;

class Presensi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelTa = new ModelTa();
        $this->ModelPresensi = new ModelPresensi();
    }

    public function index()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Kelas',
            'kelas'         => $this->ModelKelas->AllData(),
            // 'guru'          => $this->ModelGuru->AllData(),
            'tahun'         => $this->ModelTa->tahun(),

        ];
        return view('admin/presensi/index', $data);
    }

    public function scan()
    {

        $data = array(
            'nisn'        => $this->request->getPost('nisn'),
            // 'timein'     =>  NOW(),

        );
        $this->ModelPresensi->add($data);
        session()->setFlashdata('pesan', 'Presensi Berhasil !!!');
        return redirect()->to(base_url('presensi'));
    }
}
