<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<?php

$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
    ->where('status', '1')
    ->get()->getRowArray();

?>

<div class="swal" data-swal="<?= session()->getFlashdata('pesan'); ?>"></div>


<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="card">
            <div class="card-header">
                <h1 class="card-title"><?= $subtitle ?></h1>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-7">
                        <h3>Daftar PTK</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-5">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#tambah"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>

                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#upload"> <i class="fa-solid fa-cloud-arrow-up fa-3x" style="color: #74C0FC"></i></button>
                                <p style="color:#74C0FC">Import</p>
                            </div>

                            <div class="tombol text-center">
                                <a href="" class="btn"> <i class="fa-solid fa-cloud-arrow-down fa-3x" style="color: #74C0FC;"></i></a>
                                <p style="color:#74C0FC">Export</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h5 class="card-title">
                            Data Pendidik dan Tenaga Kependidikan
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered " id="example2">
                            <thead>
                                <tr class="text-center">
                                    <th>#</th>
                                    <th>NIY</th>
                                    <th>NAMA</th>
                                    <th>STATUS</th>
                                    <th>ACTION</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php $no = 1;
                                foreach ($guru as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value["niy"] ?></td>
                                        <td><?= $value["nama_guru"] ?></td>
                                        <td class="text-center">

                                            <?php if ($value['status_guru'] == 0) { ?>
                                                <span class="badge badge-danger ">belum aktif</span>

                                            <?php } else if ($value['status_guru'] == 1) { ?>
                                                <button data-toggle="modal" data-target="#edit<?= $value['id_guru'] ?>" class="btn btn-danger btn-xs ">verifikasi</button>
                                            <?php } else if ($value['status_guru'] == 2) { ?>
                                                <a href="" class="btn btn-danger btn-xs ">aktif</a>
                                            <?php } ?>
                                        </td>

                                        <td class="text-center">
                                            <a class="btn btn-xs btn-primary" data-toggle="modal" data-target="#edit<?= $value['id_guru'] ?>"> <i class="fas fa-pencil"></i> </a>
                                            <button class="btn btn-xs btn-danger" data-toggle="modal" data-target="#hapus<?= $value['id_guru'] ?>"> <i class=" fas fa-trash-alt"></i></button>
                                            <a class="btn btn-xs btn-info" href="<?= base_url('guru/detail_guru/' . $value['id_guru']) ?>"> <i class=" fas fa-user"></i></a>
                                        </td>

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




<!-- Tambah Guru Single -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open_multipart('guru/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah PTK</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Nama Guru</label>
                    <input type="text" class="form-control" name="nama_guru">
                </div>
                <div class="form-group">
                    <label for="">NIY</label>
                    <input type="text" class="form-control" name="niy">
                </div>
                <div class="form-group">
                    <label for="">Password</label>
                    <input type="password" class="form-control" name="password">
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="walas" id="" class="form-control">
                        <option value="">-Walas Atau Tidak-</option>
                        <option value="1">Ya</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
<!-- Upload Guru -->
<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open_multipart('guru/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Guru</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= base_url('guru/templateGuru') ?>" class="btn btn-outline-success btn-lg"> <i class="fas fa-file-excel mr-2"></i> Download Template</a>
                <?= form_open_multipart('peserta/upload') ?>
                <div class="form-group mt-2">
                    <label for="exampleInputFile">
                        <h5>File input</h5>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileimport" id="exampleInputFile">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
</div>


<!-- Edit -->

<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <?php echo form_open('guru/edit/' . $value['id_guru']); ?>
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Nama Guru</label>
                        <input type="text" class="form-control" name="nama_guru" value="<?= $value['nama_guru'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="walas" id="" class="form-control">
                            <option value="">-Walas Atau Tidak-</option>
                            <option value="1">Ya</option>
                            <option value="0">Tidak</option>
                        </select>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Simpan</button>
                </div>
            </div>
            <?php echo form_close() ?>
        </div>
    </div>
<?php } ?>







<?php foreach ($guru as $key => $value) { ?>
    <div class="modal fade" id="hapus<?= $value['id_guru'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <?= form_open('guru/nonaktif/' . $value['id_guru']) ?>
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Proses Non Aktif PTK</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah yakin akan menonaktifkan PTK A.N <?= $value['nama_guru'] ?> ?
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Submit</button>
                </div>
                <?= form_close() ?>
            </div>

        </div>
    </div>
<?php } ?>


<?= $this->endSection() ?>