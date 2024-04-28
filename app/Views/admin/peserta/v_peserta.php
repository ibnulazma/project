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
                        <h3>Daftar Peserta Didik</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                        <p class=" text-danger">*<i> Proses Luluskan dahulu tingkat 9, baru Proses Naik Tingkat</i></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#tambah"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>

                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#upload"> <i class="fa-solid fa-cloud-arrow-down fa-3x" style="color: #74C0FC"></i></button>
                                <p style="color:#74C0FC">Import</p>
                            </div>

                            <div class="tombol text-center">
                                <button class="btn" data-toggle="modal" data-target="#eksport"> <i class="fa-solid fa-cloud-arrow-up fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Eksport</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">
                            Data <?= $subtitle ?>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="example2">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>NISN</th>
                                        <th>Nama Siswa</th>
                                        <th>TTL</th>
                                        <th>L/P</th>
                                        <th>Tingkat</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $no = 1;

                                    foreach ($peserta as $key => $value) { ?>
                                        <tr class="<?php
                                                    $hasil = "Sudah Meninggal";
                                                    if ($hasil == $value['kerja_ayah']) { ?>
                                                            echo bg-lightblue
                                                    <?php } ?>
                                                    ">
                                            <td><?= $no++; ?></td>
                                            <td class="text-center"><?= $value["nis"] ?></td>
                                            <td class="text-center"><?= $value["nisn"] ?></td>
                                            <td><?= $value["nama_siswa"] ?></td>
                                            <td class="text-center"><?= $value["tempat_lahir"] ?>, <?= date('d M Y', strtotime($value["tanggal_lahir"])) ?></td>
                                            <td class="text-center"><?= $value["jenis_kelamin"] ?></td>
                                            <td class="text-center"><?= $value["tingkat"] ?></td>

                                            <td class="text-center">

                                                <?php if ($value['status_daftar'] == 1) { ?>
                                                    <span class="badge bg-danger">belum aktif</span>
                                                <?php } elseif ($value['status_daftar'] == 2) { ?>
                                                    <span class="badge bg-info">verifikasi</span>
                                                <?php } elseif ($value['status_daftar'] == 3) { ?>
                                                    <span class="badge bg-success">aktif</span>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-xs btn-info" href="<?= base_url('peserta/detail_siswa/' .  $value['nisn']) ?>"> <i class="fa-solid fa-id-card-clip"></i> </a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>

                <button class="btn btn-danger mr-3" data-toggle="modal" data-target="#lulus">Proses Lulus</button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#naik">Proses Naik Tingkat</button>

            </div>
        </div>
    </div>
</div>
</div>

<!-- Modal TambahManual -->

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Impor Data Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <a href="<?= base_url('peserta/downloadtemplate') ?>" class="btn btn-outline-success btn-lg"> <i class="fas fa-file-excel mr-2"></i> Download Template</a>
                <?= form_open_multipart('peserta/upload') ?>
                <div class="form-group mt-2">
                    <label for="exampleInputFile">
                        <h5>File input</h5>
                    </label>
                    <div class="input-group">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input" name="fileimport" id="exampleInputFile" accept=".xls,.xlsx">
                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                        </div>
                        <div class="input-group-append">
                            <span class="input-group-text"><i class="fas fa-folder"></i></span>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                    </div>

                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open_multipart('peserta/add') ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nama siswa">Nama Siswa</label>
                            <input type="text" class="form-control" name="nama_siswa">
                        </div>
                        <div class="form-group">
                            <label for="jenis_kelamin">Jenis Kelamin</label>
                            <input type="text" class="form-control" name="jenis_kelamin">
                        </div>
                        <div class="form-group">
                            <label for="">Tempat</label>
                            <input type="text" class="form-control" name="tempat_lahir">
                        </div>
                        <div class="form-group">
                            <label for="">Tanggal Lahir</label>
                            <input type="text" class="form-control" name="tanggal_lahir" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy/mm/dd" data-mask>
                        </div>
                        <div class="form-group">
                            <label for="">NISN</label>
                            <input type="text" class="form-control" name="nisn">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="">NIK</label>
                            <input type="text" class="form-control" name="nik">
                        </div>
                        <div class="form-group">
                            <label for="">Nama Ibu</label>
                            <input type="text" class="form-control" name="nama_ibu">
                        </div>
                        <div class="form-group">
                            <label for="">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="">Tingkat</label>
                            <select name="id_tingkat" id="" class="form-control">
                                <?php foreach ($tingkat as $key => $val) { ?>
                                    <option value="<?= $val['id_tingkat'] ?>"><?= $val['tingkat'] ?></option>
                                <?php } ?>

                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="lulus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('peserta/lulus') ?>
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-all"></th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lulus as $key => $data) { ?>
                            <tr>
                                <td><input type="checkbox" class="check-item" name="nisn[]" value="<?= $data['nisn'] ?>"></td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <td><?= $data['tingkat'] ?></td>
                                <input type="hidden" name="aktif[]" value="0">
                                <input type="hidden" name="id_tingkat[]" value="0">

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>


<div class="modal fade" id="eksport" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eksport Data Peserta Didik</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-start">
                    <div class="excel text-center">
                        <a href=" <?=base_url('peserta/eksporexcel')?>"><img src="<?= base_url() ?>/AdminLTE/dist/img/logo.png" alt="" width="90px" class="mr-3"></a>
                        <p style="font-size: 20px;font-weight:bold">.xlsx</p>
                    </div>
                    <div class="pdf text-center">
                        <a href="<?=base_url('peserta/eksporpdf')?>"><img src="<?= base_url() ?>/AdminLTE/dist/img/pdf.png" alt="" width="90px"></a>
                        <p style="font-size: 20px;font-weight:bold">.pdf</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="naik" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Proses Naik Tingkat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <?= form_open('peserta/naik') ?>
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="check-in"></th>
                            <th>Nama Peserta Didik</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($naik as $key => $data) { ?>
                            <tr>
                                <td><input type="checkbox" class="check-item" name="nisn[]" value="<?= $data['nisn'] ?>"></td>
                                <td><?= $data['nama_siswa'] ?></td>
                                <td><?= $data['nisn'] ?></td>
                                <td><?= $data['tingkat'] ?></td>
                                <input type="hidden" class="form-control" name="id_tingkat[]" value="<?= $data['id_tingkat'] + 1 ?>">
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>



<?= $this->endSection() ?>

<script>
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideDown(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>