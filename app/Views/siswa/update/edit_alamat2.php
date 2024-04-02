<?= $this->extend('template/template-edit') ?>
<?= $this->section('content') ?>




<form id="quickForm" method="post" action="">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="exampleInputAlamat">Alamat</label>
                </div>
                <div class=" col-sm-8">
                    <input type="text" class="form-control " name="alamat" id="exampleInputAlamat">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="exampleInputRT">RT</label>
                </div>
                <div class="col-sm-8">
                    <input type="text" class="form-control" name="rt" id="exampleInputRT">
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-4">
                    <label for="exampleInputRW">RW</label>
                </div>
                <div class="col-sm-8">
                    <input type="number" class="form-control " name="rt" id="exampleInputRW">
                </div>
            </div>
            <div class=" form-group row">
                <div class="col-sm-4">
                    <label for="exampleInputProvinsi">Provinsi</label>
                </div>
                <div class="col-sm-8">
                    <select name="provinsi" class="form-control select2bs4 " style="width: 100%;" id="provinsi">
                        <option value="">--Pilih Provinsi--</option>
                        <?php foreach ($provinsi as $row) { ?>
                            <option value="<?= $row['id_provinsi'] ?>"><?= $row['prov_name'] ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Kab/Kota</label>
                </div>
                <div class="col-sm-8">
                    <select name="kabupaten" class="form-control select2bs4" style="width: 100%;" id="kabupaten">
                    </select>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Kecamatan</label>
                </div>
                <div class="col-sm-8">
                    <select name="kecamatan" class="form-control select2bs4" style="width: 100%;" id="kecamatan">
                    </select>

                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Desa</label>
                </div>
                <div class="col-sm-8">
                    <select name="desa" class="form-control select2bs4" style="width: 100%;" id="desa">
                    </select>

                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-4">
                    <label for="">Kode Pos</label>
                </div>
                <div class="col-sm-8">
                    <input type="number" class="form-control" name="kodepos">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary w-100">Simpan</button>
    </div>
</form>




<script src="<?= base_url() ?>/AdminLTE/plugins/jquery-validation/jquery.validate.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/jquery-validation/additional-methods.min.js"></script>

<script>
    $(function() {
        $.validator.setDefaults({
            submitHandler: function() {
                alert("Form successful submitted!");
            }
        });
        $('#quickForm').validate({
            rules: {
                alamat: {
                    required: true,
                },
                rt: {
                    required: true,
                    maxlength: 3
                },
                rw: {
                    required: true,
                    maxlength: 3
                },
                provinsi: {
                    required: true,

                },
                kabupaten: {
                    required: true,

                },
                kecamatan: {
                    required: true,
                },
                desa: {
                    required: true,

                },
                kodedepos: {
                    required: true,
                    maxlength: 5
                },
            },
            messages: {
                alamat: {
                    required: "Isikan alamat sesuai domisili",
                },
                rt: {
                    required: "Silahkan isikan RT",
                    maxlength: "Masukkan 3 karakter angka"
                },
                rw: {
                    required: "Silahkan isikan RW",
                    maxlength: "Masukkan 3 karakter angka"
                },
                provinsi: {
                    required: "Silahkan pilih provinsi",
                },
                kabupaten: {
                    required: "Silahkan pilih provinsi",
                },
                kecamatan: {
                    required: "Silahkan pilih provinsi",
                },
                desa: {
                    required: "Silahkan pilih provinsi",
                },
                kodepos: {
                    required: "Silahkan isikan kode pos",
                    maxlength: "Masukkan 5 karakter angka"
                },

            },
            errorElement: 'span',
            errorPlacement: function(error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function(element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
</script>


<?= $this->endSection() ?>