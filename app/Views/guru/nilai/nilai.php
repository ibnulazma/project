<?= $this->extend('template/template-backend') ?>
<?= $this->section('content') ?>

<style>
    .tabel {
        width: 150%;
        text-align: center;


    }

    .tabel th {
        align-items: center;
    }

    td .siswa {
        background: red;
    }
</style>
<div class="row">
    <div class="col-md-5">
        <?= form_open_multipart('nilai/upload') ?>
        <div class="form-group">
            <div class="input-group">
                <input type="file" class="form-control" name="fileimport" id="exampleInputFile">
                <div class="input-group-append">
                    <button class="input-group-text bg-primary" type="submit">Upload</button>
                </div>
            </div>
        </div>
        <?= form_close() ?>
    </div>

    <div class="col-md-7">
        <div class="input-group-append">
            <a href="<?= base_url('nilai/printrapot') ?>" target="_blank" class="input-group-text bg-danger btn-sm mb-3" id="delete-selected"> <i class="fas fa-print mr-2"></i> Print All</a>
        </div>

    </div>
</div>
<div class="card text-sm">
    <div class="card-body">

        <div class="table-responsive" height="500px">
            <table class="table table-bordered tabel">
                <thead class="bg-primary">
                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2" width="20%" class="siswa">Nama Siswa</th>
                        <th rowspan="2">NISN</th>
                        <th colspan="16">Mata Pelajaran</th>
                        <th rowspan="2">Jumlah</th>
                    </tr>
                    <tr>
                        <th>PAI</th>
                        <th>PKN</th>
                        <th>B.IND</th>
                        <th>MTK</th>
                        <th>IPA</th>
                        <th>IPS</th>
                        <th>B.INGG</th>
                        <th>SBK</th>
                        <th>PJOK</th>
                        <th>PRKY</th>
                        <th>TIK</th>
                        <th>MHD</th>
                        <th>TJWD</th>
                        <th>TRJM</th>
                        <th>FQIH</th>
                        <th>BTQ</th>
                    </tr>
                </thead>
                <tbody class="text-center">

                    <?php $no = 1;
                    foreach ($nilai as $key => $value) { ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $value['nama_siswa'] ?></td>
                            <td><?= $value['nisn'] ?></td>
                            <td><?= $value['pai'] ?></td>
                            <td><?= $value['pkn'] ?></td>
                            <td><?= $value['indo'] ?></td>
                            <td><?= $value['mtk'] ?></td>
                            <td><?= $value['ipa'] ?></td>
                            <td><?= $value['ips'] ?></td>
                            <td><?= $value['inggris'] ?></td>
                            <td><?= $value['sbk'] ?></td>
                            <td><?= $value['pjok'] ?></td>
                            <td><?= $value['prky'] ?></td>
                            <td><?= $value['tik'] ?></td>
                            <td><?= $value['mhd'] ?></td>
                            <td><?= $value['tjwd'] ?></td>
                            <td><?= $value['trjmh'] ?></td>
                            <td><?= $value['fiqih'] ?></td>
                            <td><?= $value['btq'] ?></td>
                            <td>


                            </td>
                        <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>















































<?= $this->endSection() ?>