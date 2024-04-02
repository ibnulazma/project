<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>


<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="nama_guru" value=" <?= $data['nama_guru'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Gelar Pendidikan</label>
                                <select name="gelar" id="" class="form-control">
                                    <option value="Pilih Gelar">Pilih Gelar</option>
                                    <option value="S.Pd">S.Pd</option>
                                    <option value="S.Pd">S.Ag</option>
                                    <option value="S.E">S.E</option>
                                    <option value="S.H">S.H</option>
                                    <option value="S.Sos">S.H</option>
                                    <option value="S.">S.H</option>
                                    <option value="S.Hut">S.Hut</option>
                                    <option value="S.Pd.I">S.Pd.I</option>
                                    <option value="M.A">M.A</option>
                                    <option value="M.Pd">M.Pd</option>
                                    <option value="M.Ag">M.Ag</option>
                                    <option value="M.M">M.M</option>
                                    <option value="M.Sc">M.Sc</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Tempat Lahir</label>
                                <input type="text" class="form-control" name="tmpt_lahir" value="<?= $data['tmpt_lahir'] ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="tgl_lahir" value="<?= $data['tgl_lahir'] ?>">
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">NUPTK</label>
                                <input type="text" class="form-control" name="nuptk" value=<?= $data['nuptk'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Email Aktif</label>
                                <input type="text" class="form-control" name="email" value=<?= $data['email'] ?>>
                            </div>
                            <div class="form-group">
                                <label for="">Telp</label>
                                <input type="text" class="form-control" name="email" value=<?= $data['telp_guru'] ?>>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>










<?= $this->endSection() ?>