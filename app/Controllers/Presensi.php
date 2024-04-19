<?php

namespace App\Controllers;

use App\Models\ModelKelas;
use App\Models\ModelAbsen;
use App\Models\ModelGuru;
use App\Models\ModelTa;

class Presensi extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->ModelKelas = new ModelKelas();
        $this->ModelGuru = new ModelGuru();
        $this->ModelTa = new ModelTa();
        $this->ModelAbsen = new ModelAbsen();
    }

    public function index()
    {

        $data = [
            'title'         => 'SIAKADINKA',
            'subtitle'      => 'Kelas',
            'kelas'         => $this->ModelKelas->AllData(),
            'guru'          => $this->ModelGuru->AllData(),
            'tahun'         => $this->ModelTa->tahun(),

        ];
        return view('admin/presensi/index', $data);
    }
}
