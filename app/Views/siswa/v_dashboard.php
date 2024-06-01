<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>







<?php
$db     = \Config\Database::connect();


$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();


?>
<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="row">
            <div class="col-md-12">

                <?php if ($siswa['status_daftar'] == 1) { ?>

                    <div class="bg-danger p-2">

                        Perhatian: Silahkan Update Data !!!!

                    </div>

                <?php  } else if ($siswa['status_daftar'] == 2) { ?>

                    <div class="bg-warning p-2">
                        Verifikasi : <b>Silahkan Bawa Ijazah dan Kartu Keluarga Asli Ke Sekolah untuk melakukan scan oleh TU !!!</b>
                        
                    </div>

                <?php  } else if ($siswa['status_daftar'] == 3) { ?>
                    <div class="bg-primary p-2">
                        Final: Data Anda Sudah Aktif !!!
                    </div>

                <?php } else if ($siswa['status_daftar'] == 4) { ?>
                    <div class="small-box bg-danger">
                        Perhatian: Data Anda Silahkan Perbaiki Data Yang Salah !!!!
                    </div>
                <?php } ?>


                <div class="card mt-2">
                    <div class="card-header">
                        <p class="card-title">
                            Selamat Datang
                        </p>
                    </div>
                    <div class="card-body">
                        <p> Selamat Datang <strong><?= $siswa['nama_siswa'] ?></strong> di Sistem Informasi Akademik SMP INSAN KAMIL <br></p>
                        <h5>TAHUN PELAJARAN AKTIF : Semester <?= $ta['semester'] ?> <?= $ta['ta'] ?></h5>
                    </div>
                    <div class="card-footer">
                        <?php if ($siswa['status_daftar'] == 0) { ?>
                            <a href="<?= base_url('siswa/edit_alamat/' . $siswa['id_siswa']) ?>" class="btn btn-danger"><i class="fas fa-pencil"></i> Update Data </a>
                        <?php } elseif ($siswa['status_daftar'] == 1) { ?>
                            <a href="<?= base_url('siswa/edit_alamat/' . $siswa['id_siswa']) ?>" class="btn btn-danger"><i class="fas fa-pencil"></i> Update Data </a>

                        <?php } elseif ($siswa['status_daftar'] == 2) { ?>
                            <p class="btn btn-warning"><i class="fas fa-list"></i> Verifikasi </p>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>



























































<?= $this->endSection() ?>