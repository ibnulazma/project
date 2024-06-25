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






<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>



<script>
    function triggerClick(e) {
        document.querySelector('#profileImage').click();
    }

    function displayImage(e) {
        if (e.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.querySelector('#profileDisplay').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(e.files[0]);
        }
    }
</script>










<?= $this->endSection() ?>