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
        <div class="card">
            <div class="card-body">
                <h1>Selamat datang di dashboard SIAKAD INSAN KAMIL !</h1>
                <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                <br>
                <br>


                <hr>
                <div class="row">
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?= $jumlahaktif ?></h3>
                                <p>Peserta Didik</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-user-friends"></i>
                            </div>
                            <a href="<?= base_url('peserta') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-primary">
                            <div class="inner">
                                <h3><?= $jumlahptk ?></h3>
                                <p>Guru dan TU</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-chalkboard-teacher"></i>
                            </div>
                            <a href="<?= base_url('guru') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-4 col-6">
                        <div class="small-box bg-pink">
                            <div class="inner">
                                <h3><?= $jumlahkelas ?></h3>
                                <p>Rombel</p>
                            </div>
                            <div class="icon">
                                <i class="fas fa-building-columns"></i>
                            </div>
                            <a href="<?= base_url('kelas') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
</div>










<script>
    const ctx = document.getElementById('dognut');

    new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['Aktif', ' Belum Aktif'],
            datasets: [{
                label: '',
                data: [<?= json_encode($jumlahaktif) ?>, <?= json_encode($jumlahtidakaktif) ?>],
                backgroundColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',

                ],

            }]
        },

    });
</script>






<?= $this->endSection() ?>