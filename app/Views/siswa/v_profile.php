<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row">
        <div class="col-md-12">
            <div class="nav-align-top">
                <ul class="nav nav-pills flex-column flex-md-row mb-4">
                    <li class="nav-item"><a class="nav-link active" href=""><i class="bx bx-sm bx-user me-1_5"></i> Account</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="bx bx-sm bx-bell me-1_5"></i> Notifications</a></li>
                    <li class="nav-item"><a class="nav-link" href=""><i class="bx bx-sm bx-link-alt me-1_5"></i> Connections</a></li>
                </ul>
            </div>
            <div class="card mb-4">
                <div class="card-body">
                    <div class="d-flex align-items-start align-items-sm-center gap-4 pb-4 border-bottom">
                        <?php
                        $gender = "L";
                        if ($gender == $siswa['jenis_kelamin']) { ?>
                            <img src="<?= base_url('foto/muslim.png') ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <?php } else { ?>
                            <img src="<?= base_url('foto/woman.png') ?>" alt="user-avatar" class="d-block w-px-100 h-px-100 rounded" id="uploadedAvatar" />
                        <?php } ?>
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-4 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden accept="image/png, image/jpeg" />
                            </label>
                            <button type="button" class="btn btn-outline-secondary account-image-reset mb-4">
                                <i class="bx bx-reset d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Reset</span>
                            </button>

                            <div>Allowed JPG, GIF or PNG. Max size of 800K</div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-4">
                    <form id="" method="POST" onsubmit="return false">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="namaLengkap" class="form-label">Nama Lengkap</label>
                                    <input class="form-control" type="text" id="namaLengkap" name="nama_siswa" value="<?= $siswa['nama_siswa'] ?>" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="jk" class="form-label">Jenis Kelamin</label>
                                    <select name="" id="" class="form-select">

                                        <?php if ($siswa['jenis_kelamin'] == 'L') {
                                            echo  "<option value='L' selected>Laki-laki</option>";
                                        } else {
                                            echo  "<option value='L'>Laki-laki</option>";
                                        }

                                        if ($siswa['jenis_kelamin'] == 'P') {
                                            echo  "<option value='P' selected>Perempuan</option>";
                                        } else {
                                            echo  "<option value='P'>Laki-Perempuan</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="nisn" class="form-label">Nisn</label>
                                    <input class="form-control" type="text" id="nisn" name="nisn" value="<?= $siswa['nisn'] ?>" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="nik" class="form-label">NIK</label>
                                    <input class="form-control" type="text" id="nik" name="nik" value="<?= $siswa['nik'] ?>" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="no_kk" class="form-label">Nomor Kartu Keluarga</label>
                                    <input class="form-control" type="text" id="no_kk" name="no_kk" value="<?= $siswa['no_kk'] ?>" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="tempatLahir" class="form-label">Tempat Lahir</label>
                                    <input class="form-control" type="text" id="tempatLahir" name="tempat_lahir" value="<?= $siswa['tempat_lahir'] ?>" autofocus />
                                </div>
                                <div class="mb-3">
                                    <label for="date" class="form-label">Tanggal Lahir</label>
                                    <input class="form-control date" type="text" name="tanggal_lahir" id="date" value="<?= $siswa['tanggal_lahir'] ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">E-mail</label>
                                    <input class="form-control" type="text" id="email" name="email" value="<?= $siswa['email'] ?>" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="telp_anak" class="form-label">No Telp</label>
                                    <input type="text" class="form-control" id="telp_anak" name="telp_anak" value="<?= $siswa['telp_anak'] ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="<?= $siswa['alamat'] ?>" />
                                </div>
                                <div class="mb-3">
                                    <label for="state" class="form-label">Provinsi</label>
                                    <select name="provinsi" id="provinsi" class="form-select">
                                        <option value="">Pilih Provinsi</option>
                                        <?php foreach ($provinsi as $key => $prov) { ?>
                                            <option value=" <?= $prov['id_provinsi'] ?>"><?= $prov['prov_name'] ?></option>

                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="kabupaten" class="form-label">Kabupaten</label>
                                    <select name="kabupaten" id="kabupaten" class="form-select">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="zipCode" class="form-label">Kecamatan</label>
                                    <select name="kecamatan" id="kecamatan" class="form-select">
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="zipCode" class="form-label">Kecamatan</label>
                                    <select name="desa" id="desa" class="form-select">
                                    </select>
                                </div>

                            </div>
                            <div class="mt-6">
                                <button type="submit" class="btn btn-primary me-3">Save changes</button>
                                <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                            </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="card">
            <h5 class="card-header">Biodata Orang Tua</h5>
        </div>
    </div>
</div>









<script src="<?= base_url() ?>/template/assets/vendor/libs/jquery/jquery.js"></script>
<!-- <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script> -->


<script>
    $(document).ready(function() {
        $("#kabupaten").change(function() {
            var id_kecamatan = $("#kabupaten").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Siswa/dataKecamatan') ?>/' + id_kecamatan,
                success: function(html) {
                    $("#kecamatan").html(html);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kecamatan").change(function() {
            var id_desa = $("#kecamatan").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Siswa/dataDesa') ?>/' + id_desa,
                success: function(html) {
                    $("#desa").html(html);
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kecamatan").change(function() {
            var id_desa = $("#kecamatan").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Siswa/dataDesa') ?>/' + id_desa,
                success: function(html) {
                    $("#desa").html(html);
                }
            });
        });
    });
</script>

<?= $this->endSection() ?>