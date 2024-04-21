<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>


<?= form_open('siswa/update_alamat/' . $siswa['id_siswa'], ['class' => 'formsimpan']) ?>

<div class="row">
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Alamat</label>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control <?= ($validation->hasError('alamat')) ? 'is-invalid' : ''; ?>" name="alamat" id="alamat">
                <div class="invalid-feedback">
                    <?= $validation->getError('alamat'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">RT</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('rt')) ? 'is-invalid' : ''; ?>" name="rt" id="rt">
                <div class="invalid-feedback">
                    <?= $validation->getError('rt'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">RW</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('rw')) ? 'is-invalid' : ''; ?>" name="rw" id="rw">
                <div class="invalid-feedback ">
                    <?= $validation->getError('rw'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Provinsi</label>
            </div>
            <div class="col-sm-8">
                <select name="provinsi" class="form-control select2bs4 <?= ($validation->hasError('provinsi')) ? 'is-invalid' : ''; ?> " style="width: 100%;" id="provinsi" value="<?= old('provinsi') ?>">
                    <option value="">--Pilih Provinsi--</option>
                    <?php foreach ($provinsi as $row) { ?>
                        <option value="<?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                    <?php } ?>
                </select>
                <div class="invalid-feedback">
                    <?= $validation->getError('provinsi'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Kab/Kota</label>
            </div>
            <div class="col-sm-8">
                <select name="kabupaten" class="form-control select2bs4 <?= ($validation->hasError('kabupaten')) ? 'is-invalid' : ''; ?>" style="width: 100%;" id="kabupaten" value="<?= old('kebupaten') ?>">
                </select>
                <div class=" invalid-feedback">
                    <?= $validation->getError('kabupaten'); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Kecamatan</label>
            </div>
            <div class="col-sm-8">
                <select name="kecamatan" class="form-control select2bs4 <?= ($validation->hasError('kecamatan')) ? 'is-invalid' : ''; ?>" style="width: 100%;" id="kecamatan" value="<?= old('kecamatan') ?>">
                </select>
                <div class=" invalid-feedback">
                    <?= $validation->getError('kecamatan'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Desa</label>
            </div>
            <div class="col-sm-8">
                <select name="desa" class="form-control select2bs4 <?= ($validation->hasError('desa')) ? 'is-invalid' : ''; ?>" style="width: 100%;" id="desa" value="<?= old('desa') ?>">
                </select>
                <div class=" invalid-feedback">
                    <?= $validation->getError('desa'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Kode Pos</label>
            </div>
            <div class="col-sm-8">
                <input type="number" class="form-control <?= ($validation->hasError('kodepos')) ? 'is-invalid' : ''; ?>" name="kodepos" value="<?= old('kodepos') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('kodepos'); ?>
                </div>
            </div>
        </div>
    </div>

</div>
<button type="submit" class="btn btn-primary w-100 tombolSimpan">Simpan</button>
<?= form_open() ?>


<!-- <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script> -->
<!-- 
<script>
    $(document).ready(function() {
        $('.formsimpan').submit(function(e) {
            e.preventDefault();

            $.ajax({
                type: "post",
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "json",
                beforeSend: function() {
                    $('.tombolSimpan').prop('disabled', true);
                    $('.tombolSimpan').html('Silahkan Tunggu');
                },
                complete: function() {
                    $('.tombolSimpan').prop('disabled', false);
                    $('.tombolSimpan').html('Simpan');
                },
                success: function(response) {
                    if (response.error) {
                        let data = response.error;
                        if (data.errorAlamat) {
                            $('#alamat').addClass('is-invalid');
                            $('.errorAlamat').html(data.errorAlamat);
                        } else {
                            $('#alamat').removeClass('is-invalid');
                            $('#alamat').addClass('is-valid');
                        }

                        if (data.errorRT) {
                            $('#rt').addClass('is-invalid');
                            $('.errorRT').html(data.errorRT);
                        } else {
                            $('#rt').removeClass('is-invalid');
                            $('#rt').addClass('is-valid');
                        }
                        if (data.errorRW) {
                            $('#rw').addClass('is-invalid');
                            $('.errorRW').html(data.errorRW);
                        } else {
                            $('#rw').removeClass('is-invalid');
                            $('#rw').addClass('is-valid');
                        }

                        if (data.errorProvinsi) {
                            $('#provinsi').addClass('is-invalid');
                            $('.errorProvinsi').html(data.errorProvinsi);
                        } else {
                            $('#provinsi').removeClass('is-invalid');
                            $('#provinsi').addClass('is-valid');
                        }
                        if (data.errorKabupaten) {
                            $('#kabupaten').addClass('is-invalid');
                            $('.errorKabupaten').html(data.errorKabupaten);
                        } else {
                            $('#kabupaten').removeClass('is-invalid');
                            $('#kabupaten').addClass('is-valid');
                        }
                        if (data.errorKecamatan) {
                            $('#kecamatan').addClass('is-invalid');
                            $('.errorKecamatan').html(data.errorKecamatan);
                        } else {
                            $('#kecamatan').removeClass('is-invalid');
                            $('#kecamatan').addClass('is-valid');
                        }
                        if (data.errorDesa) {
                            $('#rw').addClass('is-invalid');
                            $('.errorDesa').html(data.errorDesa);
                        } else {
                            $('#desa').removeClass('is-invalid');
                            $('#desa').addClass('is-valid');
                        }
                        if (data.errorKodpos) {
                            $('#rw').addClass('is-invalid');
                            $('.errorDesa').html(data.errorDesa);
                        } else {
                            $('#desa').removeClass('is-invalid');
                            $('#desa').addClass('is-valid');
                        }
                    }
                },
                error: function(xhr, thrownError) {
                    alert(xhr.status + "\n" + xhr.responseText + "\n" + thrownError);
                }
            });
            return false;

        });
    });
</script> -->














<?= $this->endSection() ?>