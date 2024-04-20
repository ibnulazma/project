<?php

namespace App\Controllers;

use Endroid\QrCode\QrCode;
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
            'menu'  => 'presensi',
            'tahun'         => $this->ModelTa->tahun(),

        ];
        return view('admin/presensi/index', $data);
    }
    public function generate()
    {
        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Generate Barcode',
            'kelas'         => $this->ModelKelas->AllData(),
            'menu'  => 'presensi',
            'submenu' => 'generate',
            'tahun'         => $this->ModelTa->tahun(),

        ];
        return view('admin/presensi/generate', $data);
    }

    public function generate_qr()
    {

        $qrCode = new QrCode('Life is too short to generating QR codes');
        header('Content-Type: ' . $qrCode->getContentType());
        echo $qrCode->writeString();
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
