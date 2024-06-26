<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<?php if (session()->getFlashdata('pesan')) {
    echo '<div class="alert alert-success" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
} elseif (session()->getFlashdata('error')) {
    echo '<div class="alert alert-danger" role="alert">';
    echo session()->getFlashdata('pesan');
    echo ' </div>';
}

?>
<?php
$db     = \Config\Database::connect();
$tahun = $db->table('tbl_ta')
    ->where('status', '1')
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
                    <div class="col-lg-7">
                        <h3>Setting Tahun</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $tahun['ta'] ?> Semester <b> <?= $tahun['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#modal"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">Data Tahun Akademik</h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered table-hover" id="example2">
                            <thead>
                                <tr>
                                    <th class="text-center" width="10px">No</th>
                                    <th class="text-center">Tahun Ajaran</th>
                                    <th class="text-center">Ganjil/Genap</th>
                                    <th class="text-center">Titi Mangsa Rapot</th>
                                    <th class="text-center">Titi Mangsa Biodata</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Aktif/Non Aktif</th>
                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                $no = 1;
                                foreach ($ta as $key => $value) { ?>
                                    <tr>
                                        <td>
                                            <?= $no++; ?> </td>
                                        <td class="text-center"><?= $value['ta'] ?></td>
                                        <td class="text-center"><?= $value['semester'] ?></td>
                                        <td class="text-center"><?= $value['titimangsa'] ?></td>
                                        <td class="text-center"><?= $value['titimangsabiodata'] ?></td>
                                        <td class="text-center"><?= $value['semester'] ?></td>
                                        <td class="text-center"><?= ($value['status'] == 1) ? '<span class="right badge badge-success">Aktif</span>' : '<span class="right badge badge-danger">Non Aktif</span>'  ?></td>




                                        <td class="text-center"><?php if ($value['status'] == 1) { ?>
                                                <a href="<?= base_url('ta/statusNonaktif/' . $value['id_ta']) ?>" class="btn btn-danger btn-xs ">Non Aktif</a>

                                            <?php } else { ?>
                                                <a href="<?= base_url('ta/statusAktif/' . $value['id_ta']) ?>" class="btn btn-success btn-xs ">Aktifkan</a>
                                            <?php } ?>
                                        </td>
                                        <td class="text-center">
                                            <button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#edit<?= $value['id_ta'] ?>"><i class="fas fa-pencil-alt"></i></button>
                                            <button class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapus<?= $value['id_ta'] ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                        <!-- <td>
                                <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch> 
                            <input type="checkbox" name="my-checkbox" checked data-bootstrap-switch data-off-color="danger" data-on-color="success">
                            </td> -->
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>






<!-- modalAdd -->
<div class="modal fade" id="modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('ta/add'); ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Tahun Akademik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Tahun Ajaran</label>
                    <input type="text" name="ta" class="form-control" placeholder="Tahun Akademik">
                </div>
                <div class="form-group">
                    <label for="">Semester</label>
                    <select name="semester" id="" class="form-control">
                        <option value="Ganjil">Ganjil</option>
                        <option value="Genap">Genap</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<!-- ModalTambah -->

<!-- modal Edit -->
<?php foreach ($ta as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_ta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('ta/edit/' . $value['id_ta']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Tahun Akademik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Tahun Ajaran</label>
                        <input type="text" name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                    <div class="form-group">
                        <label for="">Titi Mangsa Rapot</label>
                        <input type="text" name="titimangsa" value="<?= $value['titimangsa'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                    <div class="form-group">
                        <label for="">Titi Mangsa Biodata</label>
                        <input type="text" name="titimangsabiodata" value="<?= $value['titimangsabiodata'] ?>" class="form-control" placeholder="Tahun Akademik">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>


<!-- ModalHapus -->
<?php foreach ($ta as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_ta'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('ta/delete/' . $value['id_ta']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Hapus Tahun Akademik</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <!-- <div class="form-group">
                            <label for="">Tahun Akademik</label>
                            <input type="text" name="ta" value="<?= $value['ta'] ?>" class="form-control" placeholder="Tahun Akademik">
                        </div> -->
                    <p>Apakah anda akan menghapus data <?= $value['ta'] ?> ini???</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <a href="<?= base_url('ta/delete/' . $value['id_ta']) ?>" type="submit" class="btn btn-danger">Delete</a>
                </div>
            </div>
            <!-- <?php echo form_close() ?> -->
        </div>
    </div>
<?php } ?>
<!-- Modaledit -->







<?= $this->endSection() ?>