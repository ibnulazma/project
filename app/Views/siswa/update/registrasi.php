<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>


<?= form_open('siswa/update_registrasi/' . $siswa['id_siswa']) ?>


<div class="row">
    <div class="col-md-12">
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Hobi</label>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control <?= ($validation->hasError('hobi')) ? 'is-invalid' : ''; ?>" name="hobi" value="<?= old('hobi') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('hobi'); ?>
                </div>
            </div>
        </div>

        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Cita-cita</label>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control <?= ($validation->hasError('cita_cita')) ? 'is-invalid' : ''; ?>" name="cita_cita" value="<?= old('cita_cita') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('cita_cita'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Telpon/Wa Anak</label>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control <?= ($validation->hasError('telp_anak')) ? 'is-invalid' : ''; ?>" name="telp_anak" value="<?= old('seri_ijazah') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('telp_anak'); ?>
                </div>
            </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-4">
                <label for="">Seri Ijazah</label>
            </div>
            <div class="col-sm-8">
                <input type="text" class="form-control <?= ($validation->hasError('seri_ijazah')) ? 'is-invalid' : ''; ?>" name="seri_ijazah" value="<?= old('seri_ijazah') ?>">
                <div class="invalid-feedback">
                    <?= $validation->getError('seri_ijazah'); ?>
                </div>
            </div>
        </div>
    </div>
</div>

<button type="submit" class="btn btn-primary w-100">Simpan</button>
<?= form_close() ?>






<script>
    function opsi(value) {
        var st = $("#dropdown").val();
        if (st == "Sudah Meninggal") {
            document.getElementById("dipilih").disabled = true;
        } else {
            document.getElementById("dipilih").disabled = false;
        }
    }
</script>
<?= $this->endSection() ?>