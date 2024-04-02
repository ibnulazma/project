<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->
<div class="container">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Data Rombongan Kelas <?= $kelas['kelas'] ?></h3>
                <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
            </div>
            <div class="card-body">
                <table class="table table">

                    <tr>
                        <th width="100px">Wali Kelas</th>
                        <td width="20px">:</td>
                        <td><?= $kelas['nama_guru'] ?></td>
                        <th width="200px">Tahun Pelajaran</th>
                        <td width="20px">:</td>
                        <td><?= $kelas['ta'] ?></td>

                    </tr>
                    <tr>
                        <th width="50px">Kelas</th>
                        <td width="30px">:</td>
                        <td><?= $kelas['kelas'] ?> ()</td>

                        <th>Semester </th>
                        <td width="20px">:</td>
                        <td><?= $kelas['semester'] ?></td>
                    </tr>


                </table>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title"> Daftar Jadwal Pelajaran Kelas <?= $kelas['kelas'] ?></h3>
                <!-- <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a> -->
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Mapel</th>
                            <th>Guru</th>
                            <th>Hari</th>
                            <th>Waktu</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($jadwal as $value) { ?>

                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['kode_mapel'] ?></td>
                                <td><?= $value['nama_guru'] ?></td>
                                <td><?= $value['hari'] ?></td>
                                <td><?= $value['waktu'] ?></td>
                                <td>
                                    <a href="">Edit</a>
                                    <a href="">Hapus</a>
                                </td>
                            </tr>

                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- ModalTambah -->
<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('jadwal/add/' . $kelas['id_kelas']) ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kode Mapel</label>
                    <select name="id_mapel" id="" class="form-control">
                        <option value="">--Pilih Kode Mapel</option>
                        <?php foreach ($mapel as $value) { ?>
                            <option value="<?= $value['id_mapel'] ?>"><?= $value['kode_mapel'] ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Guru Mapel</label>
                    <select name="id_guru" id="" class="form-control">
                        <option value="">--Pilih Guru</option>
                        <?php foreach ($guru as $value) { ?>
                            <option value="<?= $value['id_guru'] ?>"><?= $value['nama_guru'] ?></option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="">Hari</label>
                    <select name="hari" id="" class="form-control">
                        <option value="Senin">Senin</option>
                        <option value="Selasa">Selasa</option>
                        <option value="Rabu">Rabu</option>
                        <option value="Kamis">Kamis</option>
                        <option value="Jum'at">Jum'at</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Waktu</label>
                    <input type="text" class="form-control" name="waktu">
                </div>
                <div class="form-group">
                    <input type="hidden" class="form-control" name="id_kelas" value="<?= $kelas['id_kelas'] ?>">
                    <input type="hidden" class="form-control" name="id_ta" value="<?= $ta['id_ta'] ?>">
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left">Simpan</button>
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>

<!-- ModalHapus -->




<!-- Edit -->



<?= $this->endSection() ?>