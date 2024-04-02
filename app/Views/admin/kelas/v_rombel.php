<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<?php
$db     = \Config\Database::connect();

$ta = $db->table('tbl_ta')
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
                        <h3>Daftar Rombongan Kelas</h3>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4">
                        <div class="input-group-append float-right">
                            <div class="tombol text-center">
                                <button class="btn btn-circle" data-toggle="modal" data-target="#tambah"> <i class="fa-solid fa-circle-plus fa-3x" style="color: #74C0FC;"></i></button>
                                <p style="color:#74C0FC">Tambah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Rombongan Belajar</h3>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered" id="example2">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Kelas</th>
                                    <th class="text-center">Nama Wali Kelas</th>
                                    <th class="text-center">Jumlah Peserta Didik</th>
                                    <th class="text-center">Tingkat</th>

                                    <th class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $no=1;
                                foreach ($grupkelas->getResult() as $row) {  
                                                                        
                                    $kls = $row->kelas;
                                    $walas = $row->nama_guru;
                                    $jumlah = $row->jumlah;
                                ?>
                                    <tr>
                                        <td><?=$no++;?></td>
                                        <td><?= $kls ?> </td>
                                        <td><?= $walas ?> </td>
                                         <td> <strong><?= $jumlah ?></strong> </td>
                                        <td><a href="" class="btn btn-danger" data-toggle="modal" data-target="#edit<?=$kelas['id_kelas']?>"><i class="fas fa-pencil-alt"></i></a></td>
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

<table>
  <thead>
        <tr>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jumlah Siswa</th>
            <th>Jumlah SiswaAksi</th>
        </tr>
    </thead>
    <tbody>
    <tbody>
                   
                
    </tbody>
</table>








<div class="col-md-12">

</div>




<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?= form_open('kelas/add') ?>
                <div class="form-group">
                    <label for="">Nama Kelas</label>
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="form-group">
                    <label for="">Wali Kelas</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">Pilih Guru</option>
                        <?php foreach ($guru as $key => $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php  } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Tingkat</label>
                    <select name="id_tingkat" id="" class="form-control">
                        <option value="">Pilih Tingkat</option>
                        <?php foreach ($tingkat as $key => $value) { ?>
                            <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                        <?php  } ?>
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>



<?php foreach ($kelas as $key => $value) { ?>
    <div class="modal fade" id="edit<?= $value['id_kelas'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog ">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Rombel</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <?= form_open('kelas/edit/' . $value['id_kelas']); ?>
                    <div class="form-group">
                        <label for="">Nama Kelas</label>
                        <input type="text" class="form-control" name="kelas" value="<?= $value['kelas'] ?>">
                    </div>
                    <div class="form-group">
                        <label for="">Wali Kelas</label>
                        <select name="id_guru" id="" class="form-control">
                            <option value="">Pilih Guru</option>
                            <?php foreach ($guru as $key => $value) { ?>
                                <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Tingkat</label>
                        <select name="id_tingkat" id="" class="form-control">
                            <option value="">Pilih Tingkat</option>
                            <?php foreach ($tingkat as $key => $value) { ?>
                                <option value="<?= $value['id_tingkat'] ?>"><?= $value['tingkat'] ?></option>
                            <?php  } ?>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary pull-left">Simpan</button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
<?php } ?>

<?= $this->endSection() ?>