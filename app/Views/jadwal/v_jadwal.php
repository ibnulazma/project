<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->

<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Rombongan Belajar</h3>
            <a class="btn btn-primary btn-xs float-right" data-toggle="modal" data-target="#tambah"> <i class="fas fa-plus"></i> Tambah</a>
        </div>
        <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th class="text-center">No</th>
                        <th class="text-center">Kelas</th>
                        <th class="text-center">Nama Wali Kelas</th>
                        <th class="text-center">Tahun Pelajaran</th>
                        <th class="text-center">Semester</th>
                        <th class="text-center">Jadwal</th>

                    </tr>
                </thead>
                <tbody>

                    <?php

                    $no = 1;
                    foreach ($kelas as $key => $value) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class="text-center"><?= $value['kelas'] ?></td>
                            <td class="text-center"><?= $value['nama_guru'] ?></td>
                            <td class="text-center"></td>
                            <td class="text-center"></td>
                            <td class="text-center">
                                <a href="<?= base_url('jadwal/detailjadwal/' . $value['id_kelas']) ?>" class="btn btn-primary btn-sm"> <i class="fas fa-calendar"></i></a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- ModalTambah -->


<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <?php echo form_open('kelas/add') ?>
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah kelas</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Kelas</label>
                    <input type="text" class="form-control" name="kelas">
                </div>
                <div class="form-group">
                    <label for="">Kelas</label>

                </div>

                <div class="form-group">
                    <label for="">Pilih Tahun Ajaran</label>
                    <select name="" class="form-control" id="">

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


<!-- ModalHapus -->




<!-- Edit -->



<?= $this->endSection() ?>