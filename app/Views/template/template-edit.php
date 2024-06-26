<!DOCTYPE html>
<html lang="en">

<head>

    <?= $this->include('template/header') ?>

</head>

<style>

</style>


<body class="hold-transition sidebar-mini layout-fixed text-sm">
    <div class="wrapper">

        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <?= $this->include('template/nav') ?>
        </nav>
        <aside class="main-sidebar sidebar-light-primary elevation-4">
            <?= $this->include('template/sidebar') ?>
        </aside>
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0"><?= $subtitle ?></h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active"><?= $subtitle ?></li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

            <section class="content">
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header">
                            <nav class="navigasi">
                                <ul class="">
                                    <li class=" mb-2 <?= $nav == 'alamat' ? 'aktip' : '' ?>">Alamat Domisili</li>
                                    <li class="mb-2 <?= $nav == 'orangtua' ? 'aktip' : '' ?>">Orang Tua</li>
                                    <li class="mb-2 <?= $nav == 'periodik' ? 'aktip' : '' ?>">Periodik</li>
                                    <li class="mb-2 <?= $nav == 'registrasi' ? 'aktip' : '' ?>">Registrasi</li>
                                    <li class="mb-2 <?= $nav == 'berkas' ? 'aktip' : '' ?>">Upload Berkas</li>
                                </ul>
                            </nav>
                        </div>
                        <div class="card-body">
                            <?= $this->renderSection('content') ?>
                        </div>
                    </div>

                </div>
            </section>
        </div>
        <footer class="main-footer">
            <strong>Design by IbnulWafa</strong> @SIAKADINKA <?= date('Y') ?>
        </footer>
    </div>


    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.js?v=3.2.0"></script>



    <script src="<?= base_url() ?>/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
    <!-- Bootstrap4 Duallistbox -->
    <script src="<?= base_url() ?>/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/moment/moment.min.js"></script>
    <script src="<?= base_url() ?>/AdminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>

    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2').select2()

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
            $('[data-mask]').inputmask()
        })
    </script>

    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>
    <script>
        $(document).ready(function() {
            $("#provinsi").change(function() {
                var id_kabupaten = $("#provinsi").val();
                $.ajax({
                    type: 'GET',
                    url: '<?= base_url('Siswa/dataKabupaten') ?>/' + id_kabupaten,
                    success: function(html) {
                        $("#kabupaten").html(html);
                    }
                });
            });
        });
    </script>

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

</body>

</html>