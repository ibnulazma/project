<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="content-header">
    <div class="container-fluid mt-4">
        <div class="row text-sm">
            <div class="col-lg-4">
                <div class=" card">
                    <div class="card-body box-profile">
                        <div class="text-center">
                            <?php if ($siswa['foto_siswa'] == null) { ?>
                                <?php
                                $gender = "L";
                                if ($gender == $siswa['jenis_kelamin']) { ?>

                                    <img class="img-profil" src="<?= base_url('foto/muslim.png') ?>" id="profileDisplay" onClick="triggerClick()" id="profileDisplay">
                                    <input type="file" name="foto_siswa" onChange="displayImage(this)" id="profileImage" class="form-control" style="display:none">

                                <?php } else { ?>
                                    <img class=" img-profil" src="<?= base_url('foto/woman.png') ?>" alt="User profile picture" onClick="triggerClick()" id="profileDisplay">
                                    <input type="file" name="foto_siswa" onChange="displayImage(this)" id="profileImage" class="form-control" style="display:none">
                                <?php  } ?>

                            <?php  } else { ?>
                                <img class="img-profil" src="<?= base_url('foto_siswa/' . $siswa['foto_siswa']) ?>" alt="User profile picture" onClick="triggerClick()" id="profileDisplay">
                                <input type="file" name="foto_siswa" onChange="displayImage(this)" id="profileImage" class="form-control" style="display:none">
                            <?php    } ?>

                        </div>
                        <h3 class="profile-username text-center"><?= $siswa['nama_siswa'] ?></h3>
                        <p class="text-muted text-center">(<?= $siswa['nisn'] ?> / <?= $siswa['nis'] ?>)</p>
                        <?php if ($siswa['status_daftar'] == 1) { ?>
                            <div class="tombol text-center">
                                <p class="badge badge-danger">Belum Aktif</p>
                            </div>
                        <?php } elseif ($siswa['status_daftar'] == 2) { ?>
                            <div class="tombol text-center">
                                <p class="badge badge-info">Verifikasi</p>
                            </div>
                        <?php } elseif ($siswa['status_daftar'] == 3) { ?>
                            <div class="tombol text-center">
                                <p class="badge badge-success">Aktif</p>
                            </div>
                        <?php } ?>
                    </div>
                    <!-- <div class="card-footer">
                <div class="row">
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">ijazah</p>
                            <span class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</span>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">akte</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                    <div class="col-sm-4 col-4 border-right">
                        <div class="description-block">
                            <p class="description-header">kk</p>
                            <p class="badge bg-danger"><i class="fa-solid fa-circle-xmark"></i> belum</p>
                        </div>
                    </div>
                </div>
            </div> -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <strong>IDENTITAS</strong>
                        </h5>
                    </div>
                    <div class="card-body">
                        <ul class="list-group  mb-3">
                            <li class="list-group-item">
                                <span>TTL: <?= $siswa['tempat_lahir'] ?>, <?= $siswa['tanggal_lahir'] ?> </span>
                            </li>
                            <li class="list-group-item">
                                <span>NIK : <?= $siswa['nik'] ?> </span>
                            </li>
                            <li class="list-group-item">
                                <span>NISN : <?= $siswa['nisn'] ?> </span>
                            </li>
                            <li class="list-group-item">
                                <span>NIS : <?= $siswa['nis'] ?> </span>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            Rekam Didik
                        </h5>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Semester</th>
                                    <th>Kelas</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($datadidik as $key => $value) { ?>
                                    <tr>
                                        <td><?= $value['ta'] ?> <?= $value['semester'] ?></td>
                                        <td><?= $value['kelas'] ?> <?= $value['nama_guru'] ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <strong>ALAMAT</strong>
                        </h5>
                        <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#alamat"><i class="fas fa-edit"></i> </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">

                                    <li class="list-group-item">
                                        <span> Alamat: <?= $siswa['alamat'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span> RT/ RW: <?= $siswa['rt'] ?>/<?= $siswa['rw'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        <span> Desa/Kel: <?= $siswa['desa'] ?> </span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Kec: <?= $siswa['nama_kecamatan'] ?> </span>
                                    </li>
                                    <li class="list-group-item">
                                        <span> Kab/Kota: <?= $siswa['city_name'] ?> </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title">
                            <strong>DATA ORANG TUA</strong>
                        </h5>
                        <button class="btn btn-danger btn-sm float-right" data-toggle="modal" data-target="#orangtua"><i class="fas fa-edit"></i> </button>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Nama Ayah: <?= $siswa['nama_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        NIK Ayah: <?= $siswa['nik_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Tahun Lahir: <?= $siswa['tahun_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Pendidikan : <?= $siswa['didik_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Pekerjaan : <?= $siswa['kerja_ayah'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Penghasilan : <?= $siswa['hasil_ayah'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">

                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Nama Ibu: <?= $siswa['nama_ibu'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        NIK Ibu: <?= $siswa['nik_ibu'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Tahun Lahir: <?= $siswa['tahun_ibu'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Pendidikan : <?= $siswa['didik_ibu'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Pekerjaan : <?= $siswa['kerja_ibu'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Penghasilan : <?= $siswa['hasil_ibu'] ?></span>
                                    </li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <h5><strong>DATA PERIODIK</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Berat Badan : <?= $siswa['berat'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Tinggi Badan : <?= $siswa['tinggi'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Lingkar Kepala : <?= $siswa['lingkar'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Jumlah Saudara : <?= $siswa['jml_saudara'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Transportasi : <?= $siswa['transportasi'] ?></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <h5><strong>DATA REGISTRASI</strong></h5>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <span> Jenis Pendaftaran: Siswa Baru</span>
                                    </li>
                                    <li class="list-group-item">
                                        Hobi: <?= $siswa['hobi'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        Cita-cita: <?= $siswa['cita_cita'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        No Telp : <?= $siswa['telp_anak'] ?></span>
                                    </li>
                                    <li class="list-group-item">
                                        No Seri Ijazah : <?= $siswa['seri_ijazah'] ?></span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>




<!-- ModalAlamat -->
<div class="modal fade" id="alamat" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Alamat</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<!--OranTua -->
<div class="modal fade" id="orangtua" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="staticBackdropLabel">Edit Orang Tua</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Understood</button>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection() ?>