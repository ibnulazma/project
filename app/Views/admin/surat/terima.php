<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>



<h5>Surat Penerimaan PD Pindahan</h5>
<div class="row">
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="form-group">
                        <label for="">Nama Lengkap</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">NISN</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tempat</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tanggal Lahir</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Alamat Lengkap</label>
                        <textarea name="" class="form-control" cols="30" rows="5"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ayah</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Nama Ibu</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Sekolah Asal</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">No Surat Keluar</label>
                        <input type="text" class="form-control">
                    </div>
                    <button class="btn btn-primary"> Simpan</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Lengkap</th>
                            <th>NISN</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>





<?= $this->endSection() ?>