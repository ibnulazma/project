<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\ModelPeserta;
use App\Models\ModelKelas;
use App\Models\ModelSetting;
use App\Models\ModelWilayah;
use App\Models\ModelTinggal;
use App\Models\ModelTransportasi;
use App\Models\ModelPenghasilan;
use App\Models\ModelPekerjaan;
use App\Models\ModelPendidikan;
use App\Models\MPeserta;
use \Dompdf\Dompdf;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use \PhpOffice\PhpSpreadsheet\Style;


class Peserta extends BaseController
{


    public function __construct()
    {
        helper('gantiformat');
        helper('form');
        $this->ModelPeserta = new ModelPeserta();
        $this->ModelKelas = new ModelKelas();
        $this->ModelSetting = new ModelSetting();
        $this->ModelWilayah = new ModelWilayah();
        $this->ModelPekerjaan = new ModelPekerjaan();
        $this->ModelTinggal = new ModelTinggal();
        $this->ModelTransportasi = new ModelTransportasi();
        $this->ModelPenghasilan = new ModelPenghasilan();
        $this->ModelPendidikan = new ModelPendidikan();
    }


    public function index()
    {

        session();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => 'Peserta Didik',
            'menu'       => 'akademik',
            'submenu'    => 'peserta',
            'tingkat'    => $this->ModelKelas->Tingkat(),
            'kelas'      => $this->ModelKelas->kelas(),
            'peserta'    => $this->ModelPeserta->AllData(),
            'jumlverifikasi'    => $this->ModelPeserta->jmlverifikasi(),
            'lulus'    => $this->ModelPeserta->lulus(),
            'naik'    => $this->ModelPeserta->naik(),
            // 'siswa'    => $this->ModelPeserta->detail_data()

        ];
        return view('admin/peserta/v_peserta', $data);
    }









    public function verifikasi()
    {

        session();
        $data = [
            'title'      => 'SIAKADINKA',
            'subtitle'   => ' VerifikasiPeserta Didik',
            'menu'       => 'akademik',
            'submenu'    => 'peserta',
            'tingkat'    => $this->ModelKelas->Tingkat(),
            'kelas'      => $this->ModelKelas->kelas(),
            'verifikasi'    => $this->ModelPeserta->verifikasi()

        ];
        return view('admin/peserta/verifikasi', $data);
    }


    public function add()
    {
        session();

        if ($this->validate([
            'nama_siswa' => [
                'label' => 'Nama Lengkap',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],
            'nisn' => [
                'label' => 'NISN',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!',

                ]
            ],
            'password' => [
                'label' => 'Password',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} Wajib Di Isi !!!!'
                ]
            ],

        ])) {


            $db     = \Config\Database::connect();


            $data = array(
                'nama_siswa'        => $this->request->getPost('nama_siswa'),
                'jenis_kelamin'     => $this->request->getPost('jenis_kelamin'),
                'nik'               => $this->request->getPost('nik'),
                'nama_ibu'          => $this->request->getPost('nama_ibu'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'tanggal_lahir'     => $this->request->getPost('tanggal_lahir'),
                'tempat_lahir'      => $this->request->getPost('tempat_lahir'),
                'nisn'              => $this->request->getPost('nisn'),
                'password'          => $this->request->getPost('password'),
                'id_tingkat'        =>  $this->request->getPost('id_tingkat'),
                'status_daftar'     =>  1,
                'aktif'             =>  1,

            );
            $this->ModelPeserta->add($data);
            session()->setFlashdata('pesan', 'Peserta Berhasil Ditambah !!!');
            return redirect()->to(base_url('peserta'));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('peserta'));
        }
    }


    public function detail_siswa($nisn)
    {
        session();
        $data = [
            'title'         => 'SIAKAD',
            'subtitle'      => 'Profil Siswa',
            'menu'          => 'akademik',
            'submenu'       => 'peserta',
            'kelas'         => $this->ModelKelas->kelas(),
            'provinsi'      => $this->ModelWilayah->provinsi(),
            'tinggal'       => $this->ModelTinggal->AllData(),
            'transportasi'  => $this->ModelTransportasi->AllData(),
            'kerja'         => $this->ModelPekerjaan->AllData(),
            'didik'         => $this->ModelPendidikan->AllData(),
            'hasil'         => $this->ModelPenghasilan->AllData(),
            'siswa'         => $this->ModelPeserta->DataPeserta($nisn),
            'validation'    =>  \Config\Services::validation(),
            'rekamdidik'    => $this->ModelPeserta->rekamdidik($nisn)
        ];
        return view('admin/peserta/v_detail_siswa', $data);
    }

    public function data_siswa()
    {
        $model = new MPeserta();
        $listing = $model->get_datasiswa();

        $data = array();
        $no = $_POST['start'];
        foreach ($listing as $key) {
            $no++;
            $row = array();
            $row[] = $no;
            $row[] = $key->nama_lengkap;
            $row[] = $key->id_tingkat;
            $data[] = $row;
        }

        $output = array(
            "draw" => $_POST['draw'],
            "data"  => $data
        );
        echo json_encode($output);
    }

    public function siswa_edit($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function downloadtemplate()
    {
        // $siswa = $this->ModelKelas->datasiswa($id_kelas);
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Tempat Lahir');
        $sheet->setCellValue('F1', 'Tanggal Lahir');
        $sheet->setCellValue('G1', 'Nama Ibu');
        $sheet->setCellValue('H1', 'NIK');
        $sheet->setCellValue('I1', 'Password');
        $sheet->setCellValue('J1', 'Tingkat');

        $sheet->getStyle('A1:J1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:J1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFD700');

        // $column = 2;
        // foreach ($siswa as  $key => $value) {
        //     $sheet->setCellValue('A' . $column, ($column - 1));
        //     $sheet->setCellValue('B' . $column, $value['nama_siswa']);
        //     $sheet->setCellValue('C' . $column, $value['nisn']);
        //     $column++;
        // }

        $writer = new Xlsx($spreadsheet);
        header('Content-Type:application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment:filename=datanilai.xlsx');
        header('Cache-Control:max-age=0');
        $writer->save('php://output');
        exit();
    }

    public function upload()
    {

        $db     = \Config\Database::connect();
        $ta = $db->table('tbl_ta')
            ->where('status', '1')
            ->get()->getRowArray();

        $validation = \Config\Services::validation();
        $valid = $this->validate(
            [
                'fileimport' => [
                    'label' => 'Input File',
                    'rules' => 'uploaded[fileimport]|ext_in[fileimport,xls,xlsx]',
                    'error' => [
                        'uploaded' => '{field} wajib diisi',
                        'ext_in' => '{field} harus ekstensi xls atau xlsx'
                    ]
                ]
            ]
        );

        if (!$valid) {


            $this->session->setFlashdata('pesan', $validation->getError('fileimport'));
            return redirect()->to('peserta');
        } else {

            $file = $this->request->getFile('fileimport');
            $ext = $file->getClientExtension();

            if ($ext == 'xls') {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xls();
            } else {
                $render = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
            }

            $spreadsheet = $render->load($file);
            $data = $spreadsheet->getActiveSheet()->toArray();


            $jumlaherror = 0;
            $jumlahsukses = 0;
            foreach ($data as $x => $row) {
                if ($x == 0) {
                    continue;
                }
                $nis            = $row[1];
                $nama           = $row[2];
                $jk             = $row[3];
                $tempat_lahir   = $row[4];
                $tanggal_lahir  = $row[5];
                $nama_ibu       = $row[6];
                $nik            = $row[7];
                $password       = $row[8];
                $tingkat        = $row[9];
                $db = \Config\Database::connect();

                $ceknonis = $db->table('tbl_siswa')->getWhere(['nisn' => $nis])->getResult();

                if (count($ceknonis) > 0) {
                    $jumlaherror++;
                } else {
                    $datasimpan = [
                        'nisn'                  => $nis,
                        'nama_siswa'            => $nama,
                        'jenis_kelamin'         => $jk,
                        'tempat_lahir'          => $tempat_lahir,
                        'tanggal_lahir'         => $tanggal_lahir,
                        'nama_ibu'              => $nama_ibu,
                        'nik'                   => $nik,
                        'password'              => $password,
                        'id_tingkat'            => $tingkat,
                        // 'id_ta'                 => $ta['id_ta'],
                        'status_daftar'         => 1,
                        'aktif'                 => 1,
                    ];

                    $db->table('tbl_siswa')->insert($datasimpan);
                    $jumlahsukses++;
                }
            }
            $this->session->setFlashdata('pesan', "$jumlaherror Data tidak bisa disimpan <br> $jumlahsukses Data bisa disimpan");
            return redirect()->to('peserta');
        }
    }


    public function reset($id_siswa)
    {
        $data = [
            'id_siswa' => $id_siswa,
            'status_daftar' => 1
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Reset Berhasil !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function editbiodata($id_siswa)
    {
        $data = [
            'id_siswa'      => $id_siswa,
            'nama_siswa'    => $this->request->getPost('nama_siswa'),
            'tempat_lahir'  => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nisn'          => $this->request->getPost('nisn'),
            'nama_ibu'   => $this->request->getPost('nama_ibu'),
        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }



    public function editdata($id_siswa)
    {
        $data = [
            'title' => 'Buku Induk Siswa-SIAKAD',
            'siswa'     => $this->ModelPeserta->DataPeserta($id_siswa)
        ];
        return view('admin/editdata', $data);
    }

    public function delete($id_siswa)
    {
        $db     = \Config\Database::connect();

        $data = [
            'id_siswa' => $id_siswa,
        ];
        $db->table('tbl_siswa')->delete($data);

        session()->setFlashdata('pesan', 'Peserta Didik Berhasil Di Hapus !!!');
        return redirect()->to(base_url('peserta'));
    }

    public function print($nisn)
    {
        $dompdf = new Dompdf();

        $data = [
            'title'         =>  'Biodata Siswa',
            'datasekolah'   =>  $this->ModelSetting->Profile(),

            'siswa'     => $this->ModelPeserta->Data($nisn),


            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/peserta/print', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('A4', 'potrait');
        $dompdf->render();
        $dompdf->stream('data siswa kelas.pdf', array(
            "Attachment" => false
        ));
    }

    public function edit_identitas($nisn)
    {

        $data = [
            // 'id_siswa'                => $id_siswa,
            'nama_siswa'            => $this->request->getPost('nama_siswa'),
            'nisn'                   => $nisn,
            'nik'                    => $this->request->getPost('nik'),
            'tempat_lahir'           => $this->request->getPost('tempat_lahir'),
            'tanggal_lahir'          => $this->request->getPost('tanggal_lahir'),
            'nis'                    => $this->request->getPost('nis'),
            'status_registrasi'      => $this->request->getPost('status_registrasi'),

        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $nisn);
    }

    public function update_alamat($nisn)
    {

        $data = [
            'nisn'          => $nisn,
            'no_kip'            => $this->request->getPost('no_kip'),
            'kip'               => $this->request->getPost('kip'),
            'anak_ke'           => $this->request->getPost('anak_ke'),
            'alamat'            => $this->request->getPost('alamat'),
            'rt'                => $this->request->getPost('rt'),
            'rw'                => $this->request->getPost('rw'),
            'provinsi'          => $this->request->getPost('provinsi'),
            'kabupaten'         => $this->request->getPost('kabupaten'),
            'kecamatan'         => $this->request->getPost('kecamatan'),
            'desa'              => $this->request->getPost('desa'),
            'kodepos'           => $this->request->getPost('kodepos'),
        ];
        $this->ModelPeserta->editalamat($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $nisn);
    }

    public function update_orangtua($nisn)
    {
        $data = [
            'nisn'          => $nisn,
            'nama_ayah'         => $this->request->getPost('nama_ayah'),
            'nik_ayah'          => $this->request->getPost('nik_ayah'),
            'tahun_ayah'        => $this->request->getPost('tahun_ayah'),
            'didik_ayah'        => $this->request->getPost('didik_ayah'),
            'kerja_ayah'        => $this->request->getPost('kerja_ayah'),
            'hasil_ayah'        => $this->request->getPost('hasil_ayah'),
            'telp_ayah'         => $this->request->getPost('telp_ayah'),
            'nama_ibu'          => $this->request->getPost('nama_ibu'),
            'nik_ibu'           => $this->request->getPost('nik_ibu'),
            'tahun_ibu'         => $this->request->getPost('tahun_ibu'),
            'didik_ibu'         => $this->request->getPost('didik_ibu'),
            'kerja_ibu'         => $this->request->getPost('kerja_ibu'),
            'hasil_ibu'         => $this->request->getPost('hasil_ibu'),
            'telp_ibu'          => $this->request->getPost('telp_ibu'),
        ];
        $this->ModelPeserta->editorangtua($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $nisn);
    }

    public function update_periodik($nisn)
    {
        $data = [
            'nisn'                  => $nisn,
            'anak_ke'               => $this->request->getPost('anak_ke'),
            'berat'                 => $this->request->getPost('berat'),
            'tinggi'                => $this->request->getPost('tinggi'),
            'tinggal'               => $this->request->getPost('tinggal'),
            'transportasi'          => $this->request->getPost('transportasi'),
            'jml_saudara'           => $this->request->getPost('jml_saudara'),
            'hobi'                  => $this->request->getPost('hobi'),
            'telp_anak'             => $this->request->getPost('telp_anak'),
            'cita_cita'             => $this->request->getPost('cita_cita'),
            'lingkar'               => $this->request->getPost('lingkar'),
            'seri_ijazah'           => $this->request->getPost('seri_ijazah'),

        ];
        $this->ModelPeserta->edit($data);
        session()->setFlashdata('pesan', 'Data Berhasil Diubah');
        return redirect()->to('peserta/detail_siswa/' . $nisn);
    }

    public function dataKabupaten($id_provinsi)
    {
        $data = $this->ModelWilayah->getKabupaten($id_provinsi);
        echo '<option>--Pilih Kabupaten--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kabupaten'] . '">' . $value['city_name'] . '</option>';
        }
    }
    public function dataKecamatan($id_kabupaten)
    {
        $data = $this->ModelWilayah->getKecamatan($id_kabupaten);
        echo '<option>--Pilih Kecamatan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_kecamatan'] . '">' . $value['nama_kecamatan'] . '</option>';
        }
    }
    public function dataDesa($id_kecamatan)
    {
        $data = $this->ModelWilayah->getDesa($id_kecamatan);
        echo '<option>--Pilih Desa/Kelurahan--</option>';
        foreach ($data as $value) {
            echo '<option value="' . $value['id_desa'] . '">' . $value['desa'] . '</option>';
        }
    }


    public function editfoto($nisn)
    {
        if ($this->validate([

            'foto_siswa' => [
                'label' => 'Foto',
                'rules' => 'max_size[foto_siswa,1024]|mime_in[foto_siswa,image/png,image/jpg,image/gif,image/jpeg,image/ico]',
                'errors' => [
                    'max_size' => '{field} Max 1024 KB !!!!',
                    'mime_in' => 'Format {field} Harus PNG, JPG, JPEG, GIF, ICO !!!!',
                    'max_size' => 'Harus Size 1024Kb'
                ]
            ],
        ])) {

            //masukan foto ke input
            $foto = $this->request->getFile('foto_siswa');
            if ($foto->getError() == 4) {

                $data = array(
                    'nisn'   => $nisn,
                );
                $this->ModelPeserta->edit($data);
            } else {

                //menghapus fotolama
                $user = $this->ModelPeserta->detail_data($nisn);
                if ($user['foto_siswa'] != "") {
                    unlink('foto_siswa/' . $user['foto_siswa']);
                }
                //merename
                $nama_file = $foto->getRandomName();
                //jika valid
                $data = array(
                    'nisn'                  => $nisn,
                    'foto_siswa'            => $nama_file,
                );
                $foto->move('foto_siswa', $nama_file);
                $this->ModelPeserta->edit($data);
            }
            session()->setFlashdata('pesan', 'Foto Berhasil Diubah !!!');
            return redirect()->to(base_url('peserta/detail_siswa/' . $nisn));
        } else {
            session()->setFlashdata('errors', \Config\Services::validation()->getErrors());
            return redirect()->to(base_url('peserta/detail_siswa/' . $nisn));
        }
    }

    public function kartu_keluarga($nisn)
    {
        $berkas = new ModelPeserta();
        $data = $berkas->DataPeserta($nisn);
        return $this->response->download('kartu_keluarga/' . $data['kartu_keluarga'], null);
    }
    public function ijazah($nisn)
    {
        $berkas = new ModelPeserta();
        $data = $berkas->DataPeserta($nisn);
        return $this->response->download('ijazah/' . $data['ijazah'], null);
    }
    public function akte($nisn)
    {
        $berkas = new ModelPeserta();
        $data = $berkas->DataPeserta($nisn);
        return $this->response->download('akte/' . $data['akte'], null);
    }

    public function lulus()
    {
        // $siswa = $this->ModelPeserta->detail_data($nisn);
        $nisn           = $_POST['nisn'];
        $id_tingkat     = $_POST['id_tingkat'];
        $aktif          = $_POST['aktif'];


        $jml_siswa = count($nisn);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'nisn' =>       $nisn[$i],
                'id_tingkat' => $id_tingkat[$i],
                'aktif' =>      $aktif[$i],
            );
            $this->ModelPeserta->edit($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }
    public function naik()
    {
        // $siswa = $this->ModelPeserta->detail_data($nisn);
        $nisn           = $_POST['nisn'];
        $id_tingkat     = $_POST['id_tingkat'];


        $jml_siswa = count($nisn);
        for ($i = 0; $i < $jml_siswa; $i++) {
            $data = array(
                'nisn' =>       $nisn[$i],
                'id_tingkat' => $id_tingkat[$i],
            );
            $this->ModelPeserta->edit($data);
        }
        session()->setFlashdata('pesan', 'Siswa Berhasil Di Update !!!');
        return redirect()->to(base_url('peserta'));
    }



    public function eksporexcel()
    {
        $siswa = new ModelPeserta();
        $datasiswa = $siswa->AllData();

        $spreadsheet = new Spreadsheet();
        // tulis header/nama kolom 
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        $sheet->setCellValue('A1', 'NO');
        $sheet->setCellValue('B1', 'NISN');
        $sheet->setCellValue('C1', 'Nama');
        $sheet->setCellValue('D1', 'Jenis Kelamin');
        $sheet->setCellValue('E1', 'Tempat Lahir');
        $sheet->setCellValue('F1', 'Tanggal Lahir');
        $sheet->setCellValue('G1', 'Nama Ibu');
        $sheet->setCellValue('H1', 'Tingkat');

        $sheet->getStyle('A1:H1')->getFont()->setBold(true);
        $spreadsheet->getActiveSheet()->getStyle('A1:H1')->getFill()
            ->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
            ->getStartColor()->setARGB('FFFFD700');
        $column = 2;

        foreach ($datasiswa as $data) {

            $sheet->setCellValue('A' . $column, ($column - 1));
            $sheet->setCellValue('B' . $column, $data['nisn']);
            $sheet->setCellValue('C' . $column, $data['nama_siswa']);
            $sheet->setCellValue('D' . $column, $data['jenis_kelamin']);
            $sheet->setCellValue('E' . $column, $data['tempat_lahir']);
            $sheet->setCellValue('G' . $column, $data['tanggal_lahir']);
            $sheet->setCellValue('H' . $column, $data['nama_ibu']);
            $column++;
        }

        // tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Data Siswa';

        // Redirect hasil generate xlsx ke web client
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
    }


    public function eksporpdf()
    {
        $dompdf = new Dompdf();

        $data = [
            'title'         =>  'Biodata Siswa',
            'siswa'     => $this->ModelPeserta->AllData(),

            // 'tingkat'       => $this->ModelKelas->SiswaTingkat(),
        ];
        $html = view('admin/peserta/eksporpdf', $data);
        $dompdf->loadHtml($html);
        $dompdf->setPaper('Legal', 'landscape');
        $dompdf->render();
        $dompdf->stream('data siswa.pdf', array(
            "Attachment" => false
        ));
    }
}
