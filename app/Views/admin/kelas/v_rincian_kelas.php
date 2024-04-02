<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<!-- Main content -->


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
                        <h3>Data Siswa Kelas <?= $kelas['kelas'] ?></h3>
                        <h5>Wali Kelas : <b><?= $kelas['nama_guru'] ?></h5>
                        <p class="text-muted">Tahun Pelajaran <b>Aktif</b> <?= $ta['ta'] ?> Semester <b> <?= $ta['semester'] ?></b></p>
                    </div>
                    <div class="col-lg-4 float-right">
                        <div class="input-group-append ">
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


                <select name="ap" class="form-control" id="">
                    <option>Silahkan Pilih Menu Unduh</option>
                </select>

                <div class="card card-primary mt-4">
                    <div class="card-body">
                        <table class="table table-bordered mt-5" id="example2" width="100%">
                            <thead>
                                <tr class="bg-primary">
                                    <th class="text-center" width="10%">#</th>
                                    <th class="text-center" width="20%">NISN</th>
                                    <th>Nama Peserta Didik</th>
                                    <th width="20%">JK</th>
                                    <th width="20%" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($datasiswa as $key => $value) { ?>
                                    <tr>
                                        <td class="text-center"><?= $no++ ?></td>
                                        <td class="text-center"><?= $value['nisn'] ?></td>
                                        <td><?= $value['nama_siswa'] ?></td>
                                        <td><?= $value['jenis_kelamin'] ?></td>
                                        <td>
                                            <div class="text-center">
                                                <a href="<?= base_url('kelas/bukuinduk/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-info "><i class=" fas fa-book"></i></a>
                                                <a href="<?= base_url('kelas/halamansiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm btn-success "><i class="fa-solid fa-file"></i> </a>
                                                <a href="<?= base_url('kelas/biodatasiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm bg-black "><i class="fa-solid fa-address-card"></i> </a>
                                                <a href="<?= base_url('kelas/labelsiswa/' .  $value['nisn']) ?>" target="_blank" class="btn btn-sm bg-pink "><i class="fa-solid fa-tag"></i> </a>
                                                <a href="<?= base_url('kelas/hapusanggota/' . $value['nisn']) ?>" target="_blank" class="btn btn-danger btn-sm"><i class="fas fa-trash"></i></a>
                                            </div>
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







<div class="col-md-12">

</div>


<!-- ModalTambah -->

<div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= form_open('kelas/tambahanggota/' . $kelas['id_kelas']) ?>
            <div class="modal-body">
                <table class="table table-bordered" id="example1">
                    <thead>
                        <tr>
                            <th><input type="checkbox"></th>
                            <th>Nama Siswa</th>
                            <th>NISN</th>
                            <th>Tingkat</th>
                            <th>Jenis Kelamin</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $db     = \Config\Database::connect();

                        $ta = $db->table('tbl_ta')
                            ->where('status', '1')
                            ->get()->getRowArray();
                        foreach ($tidakpunya as $key => $value) { ?>

                            <?php if ($kelas['id_tingkat'] == $value['id_tingkat']) { ?>
                                <tr>
                                    <td><input type="checkbox" name="nisn[]" value="<?= $value['nisn'] ?>"></td>
                                    <td><?= $value['nama_siswa'] ?></td>
                                    <td><?= $value['nisn'] ?></td>
                                    <td><?= $value['tingkat'] ?></td>
                                    <td><?= $value['jenis_kelamin'] ?></td>
                                    <input type="hidden" name="id_kelas[]" value="<?= $kelas['id_kelas'] ?>">
                                    <input type="hidden" name="id_ta[]" value="<?= $ta['id_ta'] ?>">
                                </tr>
                            <?php } ?>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-warning "><i fas fa-upload></i> Tambah</button>
            </div>
            <?= form_close() ?>
        </div>
    </div>
</div>

<div class="modal fade" id="upload" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Upload Nilai P3MP</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <a href="<?= base_url('kelas/printexcel/' . $kelas['id_kelas']) ?>" class="btn btn-outline-success btn-lg"> <i class="fas fa-file-excel mr-2"></i> Download Template</a>


                <?= form_open_multipart('kelas/upload/') ?>
                <div class="form-group mt-4">
                    <label for="exampleInputFile">
                        <h5>Upload Nilai</h5>
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
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</div>
<!-- ModalHapus -->



<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>

<script>
    const $select = $('select[name="ap"]');
    const opts = [{
            'value': '<?= base_url('kelas/halaman/' . $kelas['id_kelas']) ?>',
            'text': 'Halaman Depan'
        },
        {
            'value': '<?= base_url('kelas/label/' . $kelas['id_kelas']) ?>',
            'text': 'Label'
        },
        {
            'value': '<?= base_url('kelas/print/' . $kelas['id_kelas']) ?>',
            'text': 'Print Biodata'
        },
        {
            'value': '<?= base_url('kelas/ledger/' . $kelas['id_kelas']) ?>',
            'text': 'Leger'
        }
    ];

    opts.forEach(function(obj) {
        $("<option />", {
            value: obj.value,
            text: obj.text
        }).appendTo($select)
    });

    $select.on("change", function() {
        window.location = this.value;
    });
</script>

<!-- AkhirBukuInduk -->



<?= $this->endSection() ?>