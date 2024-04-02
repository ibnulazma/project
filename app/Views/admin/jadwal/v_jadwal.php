<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<div class="row justify-content-center">
    <div class="col-md-6 ">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Jadwal Pelajaran</h3>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr class="text-center">
                            <th>No</th>
                            <th>Tingkat</th>
                            <th>Aksi </th>

                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($tingkat as $key => $value) { ?>

                            <tr class="text-center">
                                <td><?= $no++ ?></td>
                                <td><?= $value['tingkat'] ?></td>
                                <td>
                                    <a href="<?= base_url('jadwal/rincian_jadwal/' . $value['id_tingkat']) ?>" class="btn btn-success btn-sm"><i class="fas fa-calendar"></i></a>
                                    <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_tingkat'] ?>"><i class="fas fa-trash"></i></button>

                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>