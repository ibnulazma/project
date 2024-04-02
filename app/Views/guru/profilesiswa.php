<?= $this->extend('template/template-backend-siswa') ?>
<?= $this->section('content') ?>





<?php if ($siswa['status_daftar'] == 0) { ?>
    <div class="col-md-12">
        <div class="alert alert-danger">
            <span> STATUS DATA : SILAHKAN UNTUK MELENGKAPI DATA</span>
        </div>
    </div>

<?php } else if ($siswa['status_daftar'] == 1) { ?>
    <div class="col-md-12">
        <div class="alert alert-warning">
            <span> STATUS DATA : BELUM VERIFIKASI</span>
        </div>
    </div>
<?php } else { ?>
    <div class="col-md-12">
        <div class="alert alert-info">
            <span> STATUS DATA : SUDAH TERVERIFIKASI</span>
        </div>
    </div>
<?php } ?>



<?php
$errors = session()->getFlashdata('errors');
?>

<?php if ($siswa['status_daftar'] == 0) { ?>

    <div class="col-md-12">
        <div class="card card-outline card-danger">
            <div class="card-header">
                <h5>Biodata Peserta Didik</h5>
            </div>
            <div class="card-body">
                <?php
                $errors = session()->getFlashdata('errors');
                ?>

                <?php echo form_open('siswa/edit/' . $siswa['id_siswa']); ?>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control " value="<?= $siswa['nik'] ?>" name="nik" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">NISN</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nisn'] ?>" name="nisn" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nama_lengkap'] ?>" name="nama_lengkap" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">TTL </label>
                            <div class="col-sm-5 mb-2">
                                <input type="text" class="form-control" value="<?= $siswa['tempat_lahir'] ?>" name="tempat_lahir" readonly>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" value="<?= $siswa['tanggal_lahir'] ?>" name="tanggal_lahir" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['jenis_kelamin'] ?>" name="jenis_kelamin" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?> " value="<?= $siswa['alamat'] ?>" name="alamat">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('alamat'); ?>
                                </div>
                            </div>

                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">RT/RW </label>
                            <div class="col-sm-5 mb-2">
                                <input type="text" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['rt'] ?>" name="rt" placeholder="RT">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('rt'); ?>
                                </div>
                            </div>
                            <div class="col-sm-5">
                                <input type="text" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['rw'] ?>" name="rw" placeholder="RW">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('rw'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Desa/Kel</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('desa')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['desa'] ?>" name="desa">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('desa'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Kecamatan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['kecamatan'] ?>" name="kecamatan">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('kecamatan'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Kabupaten</label>
                            <div class="col-sm-10">
                                <select name="kabupaten" id="" class="form-control select2bs4 <?= ($validation->hasError('kabupaten')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Pilih Kabupaten--</option>
                                    <option value="kelapa dua">Kelapa Dua</option>
                                    <option value="legok">legok</option>
                                </select>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('kabupaten'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Provinsi</label>
                            <div class="col-sm-10">

                                <select name="provinsi" id="" class="form-control select2bs4 <?= ($validation->hasError('provinsi')) ? 'is-invalid' : ''; ?>">
                                    <option value="">--Pilih Provinsi--</option>
                                    <option value="banten">banten</option>
                                </select>
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('provinsi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Telepon/Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control  <?= ($validation->hasError('no_telp')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['no_telp'] ?>" name="no_telp">
                            </div>
                            <div class=" invalid-feedback">
                                <?= $validation->getError('no_telp'); ?>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Cita-cita</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control  <?= ($validation->hasError('cita_cita')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['cita_cita'] ?>" name="cita_cita">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('cita_cita'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Hobi</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('hobi')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['hobi'] ?>" name="hobi">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('hobi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Anak ke</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('anak_ke')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['anak_ke'] ?>" name="anak_ke">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('anak_ke'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Berat Badan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('berat')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['berat'] ?>" name="berat">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('berat'); ?>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Tinggi Badan</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control <?= ($validation->hasError('tinggi')) ? 'is-invalid' : ''; ?>" value="<?= $siswa['tinggi'] ?>" name="tinggi">
                                <div class=" invalid-feedback">
                                    <?= $validation->getError('tinggi'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">No Seri Ijazah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['seri_ijazah'] ?>" name="seri_ijazah">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">File Ijazah</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Foto</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control">
                            </div>
                        </div>
                    </div>

                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-danger btn-block"> Simpan</button>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>
    </div>
<?php } else if ($siswa['status_daftar'] == 1) { ?>
    <div class="col-md-12">
        <div class="card">

            <div class="card-body">
                <div class="text-center">
                    <i class="fa-solid fa-spinner text-warning  fa-10x fa-spin-pulse fa-spin-reverse mb-4"></i>
                    <h3 class="text-warning"><strong>DATA ANDA SEDANG KAMI VERIFIKASI</strong> </h3>
                </div>

            </div>

        </div>
    </div>

<?php } else if ($siswa['status_daftar'] == 2) { ?>
    <div class="col-md-6">
        <div class="card ">
            <div class="card-body">
                <table class="table table-bordered">

                    <tr>
                        <td colspan="3" class="bg-info">Biodata </td>

                    </tr>
                    <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $siswa['nama_lengkap'] ?></td>
                    </tr>
                    <tr>
                        <td>TTL</td>
                        <td>:</td>
                        <td></i> <?= $siswa['tempat_lahir'] ?> , <?= $siswa['tanggal_lahir'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $siswa['alamat'] ?>, RT <?= $siswa['rt'] ?> RW <?= $siswa['rw'] ?></td>
                    </tr>
                    <tr>
                        <td>Desa</td>
                        <td>:</td>
                        <td><?= $siswa['desa'] ?></td>
                    </tr>
                    <tr>
                        <td>Kecamatan</td>
                        <td>:</td>
                        <td><?= $siswa['kecamatan'] ?></td>
                    </tr>
                    <tr>
                        <td>Kabupaten</td>
                        <td>:</td>
                        <td><?= $siswa['kabupaten'] ?></td>
                    </tr>
                    <tr>
                        <td>Provinsi</td>
                        <td>:</td>
                        <td><?= $siswa['provinsi'] ?></td>
                    </tr>
                    <tr>
                        <td>Telepon/Hp</td>
                        <td>:</td>
                        <td><?= $siswa['no_telp'] ?></td>
                    </tr>


                </table>

            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card ">
            <div class="card-body">
                <img src="" alt="">
            </div>
        </div>
    </div>

<?php } ?>






<?= $this->endSection() ?>