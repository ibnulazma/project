<?php

$db     = \Config\Database::connect();

$profile = $db->table('tbl_profile')
    ->get()->getRowArray();
$tahun = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Surat Penerimaan</title>
</head>

<style>
    body {
        margin: 0;
        padding: 0;
        font-family: 'Times New Roman', Times, serif;
    }

    .container {
        text-align: center;
        padding: 0;
    }

    .wrapper {
        margin-bottom: 100px;

    }

    table {
        width: 100%;
        font-size: 14px;
        margin-bottom: 20px;

    }

    .table2,
    td {
        text-align: left;
    }

    .table1 {
        border-collapse: collapse;

    }

    .table3 {
        border-collapse: collapse;

    }

    .table4 {
        border-collapse: collapse;
        width: 50%;

    }

    .table5 {
        border-collapse: collapse;
        width: 50%;

    }

    .center {
        text-align: center;
    }

    .vertical {
        vertical-align: top;
    }

    .borderbottom {
        border-bottom: 1px;
    }

    .smp {
        font-size: 30px;
        font-weight: bold;
    }

    .akredit {
        font-size: 20px;
    }

    .npsn {
        font-size: 20px;
    }

    hr {
        border: 2px solid black;
    }

    .image {
        width: 5px;
    }

    .table7 {
        width: 100%;
        border-bottom: 5px solid black;
        padding: 1px;
    }

    .judul {
        font-size: 18px;
    }

    .jalan {
        font-size: 15px;
    }

    @page {
        margin: 0.2in 0.5in 0.2in 0.5in;
    }


    .judul1 {
        margin-bottom: 0;
        font-size: 22px;
        font-weight: bold;
        text-align: center;
        text-decoration: underline;
        margin-top: -5px;

    }

    .nomor {
        margin-top: 0;
        text-align: center;
        font-size: 20px;
    }

    .isi {
        font-size: 18px;

    }

    .tabel {
        margin-left: 60px;
    }

    .tabel2 {
        font-size: 18px;
        /* margin-bottom: 50%; */
        /* width: 100%; */
    }

    .nama {
        font-size: 18px;
    }

    .lis {
        font-size: 18px;
    }

    .ttd {
        text-align: end;
    }

    .nama1 {
        text-align: justify;
    }
</style>

<body>
    <div class="wrapper">
        <div class="header ">
            <table class="table7">
                <tr>
                    <td class="image" width="30%"><?= $image_url ?></td>
                    <td width="40%">
                        <p class="center judul">YAYASAN SULUK INSAN KAMIL TARTILA <br>
                            <span class="smp">SMP INSAN KAMIL</span><br>
                            <span class="akredit"><b>Terakreditasi B</b></span><br>
                            <span class="npsn">NPSN: <?= $profile['npsn'] ?></span><br>
                            <span class="jalan">Jalan Raya Legok KM 06 N0 89 RT 07 RW 02 Legok-Tangerang</span>
                        </p>
                    </td>
                </tr>
            </table>


        </div>
        <section>
            <h4 class="judul1">SURAT KETERANGAN PENERIMAAN SEKOLAH</h4>
            <p class="nomor">NOMOR : <?= $terima['no_surat'] ?></p>
            <p class="isi">Yang bertanda tangan di bawah ini Kepala SMP Insan Kamil menerangkan bahwa:</p>
            <div class="tabel">
                <table class="tabel2">
                    <tr>
                        <td width="30%">Nama Lengkap</td>
                        <td width="1%">:</td>
                        <td width="60%"><?= $terima['nama_siswa'] ?></td>
                    </tr>
                    <tr>
                        <td>TTL</td>
                        <td>:</td>
                        <td><?= $terima['tempat_lahir'] ?>, <?= $terima['tanggal_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>NISN</td>
                        <td>:</td>
                        <td><?= $terima['nisn'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ayah </td>
                        <td>:</td>
                        <td><?= $terima['nama_ayah'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Ibu </td>
                        <td>:</td>
                        <td><?= $terima['nama_ibu'] ?></td>
                    </tr>
                </table>
            </div>
            <p class="nama">Adalah benar bahwa orangtua siswa tersebut telah mengajukan permohonan pindah dari <?= $terima['asal_sekolah'] ?> ke SMP INSAN KAMIL Kabupaten Tangerang, dikarenakan <?= $terima['alasan_pindah'] ?>
                dan dengan ini kami menyatakan bahwa siswa tersebut <b>DITERIMA di SMP INSAN KAMIL</b> kelas <?= $terima['diterima'] ?> Tahun Pelajaran <?= $tahun['ta'] ?>.</p>
            <p class="nama1">Demikian surat keterangan ini dibuat sebagai salah satu persyaratan untuk melengkapi administrasi mutasi siswa dari sekolah asal ke sekolah yang baru.</p>
            <div class="ttd">
                <table style="width: 100%;margin-left:500px; font-size:18px">
                    <tr>
                        <td width="30%">Tangerang, <?= date('d m Y') ?></td>
                    </tr>
                    <tr>
                        <td>Kepala SMP Insan Kamil</td>
                    </tr>
                    <br>
                    <br>
                    <br>
                    <tr>
                        <td style=" text-decoration: underline;"><b><?= $profile['kepsek'] ?></b></td>
                    </tr>
                </table>
            </div>
        </section>

    </div>
</body>

</html>