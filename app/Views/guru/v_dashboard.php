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
                <div class="card card-primary mt-2">
                    <div class="card-header">
                        <p class="card-title">
                            Selamat Datang
                        </p>
                    </div>
                    <div class="card-body">
                        <p> Selamat Datang <strong><?= $guru['nama_guru'] ?></strong> di Sistem Informasi Akademik SMP INSAN KAMIL <br></p>
                        <h5>TAHUN PELAJARAN AKTIF : <?= $ta['ta'] ?> semester <b><?= $ta['semester'] ?> </b></h5>
                    </div>
                    <div class="card-footer">
                        <?php if ($guru['walas'] == 1) { ?>
                            <a href="<?= base_url('pendidik/walas') ?>" class="btn btn-primary"> Tugas Tambahan Sebagai Wali Kelas <?= $guru['kelas'] ?></a>
                        <?php } elseif ($guru['walas'] == 0) { ?>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>