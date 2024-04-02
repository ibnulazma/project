<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>
<?php
$db     = \Config\Database::connect();
$profil = $db->table('tbl_profile')
    ->get()->getRowArray();

?>

<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-9">
                        <h3><?= $profil['npsn'] ?> - <?= $profil['nama_sekolah'] ?></h3>
                    </div>
                    <div class="col-lg-3 col">
                        <div class="tombol text-center">
                            <a href="" class="btn btn-circle"><i class="fa-solid fa-pen-to-square fa-3x" style="color: #74C0FC;"></i></a>
                            <p style="color:#74C0FC">Edit</p>
                        </div>
                    </div>
                </div>
                <h5><b>Informasi Tentang Sekolah</b></h5>
                <table width="40%" style="font-size: 16px;">
                    <tr>
                        <td>Nama Sekolah</td>
                        <td><?= $profil['nama_sekolah'] ?></td>
                    </tr>
                    <tr>
                        <td>NPSN</td>
                        <td><?= $profil['npsn'] ?></td>
                    </tr>
                    <tr>
                        <td>Status</td>
                        <td><?= $profil['status'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td><?= $profil['alamat'] ?></td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td><?= $profil['email'] ?></td>
                    </tr>
                    <tr>
                        <td>Kepala Sekolah</td>
                        <td><?= $profil['kepsek'] ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>










<?= $this->endSection() ?>