<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>





<div class="row mb-3">
    <div class="col-md-4 mb-3">
        <?= form_open_multipart('siswa/ijazah/' . $siswa['id_siswa']) ?>
        <div class="form-group">
            <label for="exampleInputFile">Ijazah</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="ijazah">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        <?= form_close() ?>

        <img src="<?= base_url('ijazah/' . $siswa['ijazah']) ?>" alt="" width="200px">
    </div>
    <div class="col-md-4 mb-3">
        <?= form_open_multipart('siswa/upload_kk/' . $siswa['id_siswa']) ?>
        <div class="form-group">
            <label for="exampleInputFile">Kartu Keluarga</label>
            <div class="input-group">
                <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile" name="kartu_keluarga">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Upload</button>
        </div>
        <?= form_close() ?>

        <img src="<?= base_url('kartu_keluarga/' . $siswa['kartu_keluarga']) ?>" alt="" width="200px">
    </div>
</div>
<?= form_open('siswa/status_daftar/' . $siswa['id_siswa']) ?>
<div class="form-group">
    <div class="form-check">
        <input class="form-check-input <?= ($validation->hasError('status_daftar')) ? 'is-invalid' : ''; ?>" type="checkbox" value="2" id="invalidCheck" name="status_daftar">
        <label class="form-check-label " for="invalidCheck">
            Dengan ini saya menyatakan bahwa data saya yang input sudah benar .
        </label>
        <div class="invalid-feedback">
            <p> <?= $validation->getError('status_daftar'); ?></p>
        </div>
    </div>
    <button type="submit" class="btn btn-primary w-100">Submit</button>
</div>
<?= form_close() ?>


<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<script>
    $(function() {
        bsCustomFileInput.init();
    });
</script>


<?= $this->endSection() ?>