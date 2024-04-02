<?= $this->extend('template/template-backend-siswa') ?>
<?= $this->section('content') ?>


<?php if ($siswa['status_daftar'] == 0) { ?>
    <div class="col-md-12">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h5>Biodata Orang Tua</h5>
            </div>
            <?= form_open('siswa/editortu/' . $siswa['id_siswa']); ?>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama Ayah</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nama_ayah'] ?>" name="nama_ayah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Tahun Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['tahun_ayah'] ?>" name="tahun_ayah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nik_ayah'] ?>" name="nik_ayah" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                                <select name="didik_ayah" id="" class="form-control" required>
                                    <option value="">Pilih Pendidikan</option>
                                    <?php foreach ($pendidikan as $key => $value) { ?>
                                        <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ayah'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <select name="kerja_ayah" id="" class="form-control" required>
                                    <option value="">Pilih Pekerjaan</option>
                                    <?php foreach ($pekerjaan as $key => $value) { ?>
                                        <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ayah'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Penghasilan</label>
                            <div class="col-sm-10">
                                <select name="hasil_ayah" id="" class="form-control" required>
                                    <option value="">Pilih Penghasilan</option>
                                    <?php foreach ($penghasilan as $key => $value) { ?>
                                        <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ayah'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Telepon/Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['telp_ayah'] ?>" name="telp_ayah" required>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Nama Ibu</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nama_ibu'] ?>" name="nama_ibu" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Tahun Lahir</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['tahun_ibu'] ?>" name="tahun_ibu" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">NIK</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['nik_ibu'] ?>" name="nik_ibu" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Pendidikan</label>
                            <div class="col-sm-10">
                                <select name="didik_ibu" id="" class="form-control" required>
                                    <option value="">Pilih Pendidikan</option>
                                    <?php foreach ($pendidikan as $key => $value) { ?>
                                        <option value="<?= $value['pendidikan'] ?>" <?= $siswa['didik_ibu'] == $value['pendidikan'] ? 'selected' : '' ?>> <?= $value['pendidikan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Pekerjaan</label>
                            <div class="col-sm-10">
                                <select name="kerja_ibu" id="" class="form-control" required>
                                    <option value="">Pilih Pekerjaan</option>
                                    <?php foreach ($pekerjaan as $key => $value) { ?>
                                        <option value="<?= $value['pekerjaan'] ?>" <?= $siswa['kerja_ibu'] == $value['pekerjaan'] ? 'selected' : '' ?>> <?= $value['pekerjaan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Penghasilan</label>
                            <div class="col-sm-10">
                                <select name="hasil_ibu" id="" class="form-control" required>
                                    <option value="">Pilih Penghasilan</option>
                                    <?php foreach ($penghasilan as $key => $value) { ?>
                                        <option value="<?= $value['penghasilan'] ?>" <?= $siswa['hasil_ibu'] == $value['penghasilan'] ? 'selected' : '' ?>> <?= $value['penghasilan'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Telepon/Hp</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="<?= $siswa['telp_ibu'] ?>" name="telp_ibu" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <button type="submit" class="btn btn-warning"> Submit</button>
                </div>
            </div>
        </div>

        <?php echo form_close() ?>
    </div>
<?php } ?>



<?= $this->endSection() ?>