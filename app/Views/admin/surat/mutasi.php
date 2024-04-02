<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>




<div class="row">


    <div class="col-md-8">
        <div class="card text-center">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Surat Permohonan</th>
                            <th>Surat Mutasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($mutasi as $key => $value) { ?>
                            <tr>
                                <td><?= $key + 1 ?></td>
                                <td><?= $value['nama_siswa'] ?></td>
                                <td><?= $value['nisn'] ?></td>
                                <td><a href="<?= base_url('surat/permohonan/' . $value['nisn']) ?>" target="_blank" class="btn btn-success"><i class="fas fa-print"></i></a></td>
                                <td><a href="" class="btn btn-info"><i class="fas fa-print"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>