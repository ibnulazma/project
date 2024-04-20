<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Absen</title>
    <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-5/assets/css/login-5.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
</head>

<body>



    <section class="p-3 p-md-4 p-xl-5">
        <div class="container">
            <div class="card border-light-subtle shadow-sm">
                <div class="row g-0">
                    <div class="col-12 col-md-6 text-bg-primary">
                        <div class="d-flex align-items-center justify-content-center h-100">
                            <div class="col-10 col-xl-8 py-3 text-center">
                                <i class="fas fa-qrcode fa-2x"></i>
                                <h5>Live Attandance</h5>
                                <hr class="border-primary-subtle mb-4">
                                <h1 id="jam"></h1>
                                <h5 class="mb-4"><?= date('d F Y') ?></h5>
                                <button class="btn btn-dark">Masuk</button>
                                <button class="btn btn-dark">Keluar</button>
                                <p class="lead m-0">Silahkan pilih tombol untuk melakukan scan barcode</p>
                                <div class="ket" style="margin-top: 20px;">
                                    <h5><a href="<?= base_url('admin') ?>" class="text-white"><i class="fa fa-arrow-circle-left"></i> Kembali ke dashboard</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="card-body p-3 p-md-4 p-xl-5">
                            <div class="row">
                                <div class="col-12">
                                    <div class="mb-2">
                                        <h3>Scan Barcode</h3>
                                        <!-- <div class="pilihkamera">
                                            <select id="pilihKamera" style="max-width:400px">
                                            </select>
                                        </div> -->

                                        <?php

                                        $errors = session()->getFlashdata('errors');
                                        ?>
                                        <?php if (session()->getFlashdata('pesan')) {
                                            echo '<div class="alert alert-success" role="alert">';
                                            echo  session()->getFlashdata('pesan');
                                            echo ' </div>';
                                        } elseif (session()->getFlashdata('error')) {
                                            echo '<div class="alert alert-danger" role="alert">';
                                            echo '<small>';
                                            echo session()->getFlashdata('error');
                                            echo '</small>';
                                            echo ' </div>';
                                        } ?>
                                        <div class="video">
                                            <video id="preview" style="width:100%;  height:200px;align-items:center"></video>
                                        </div>
                                        <!-- <input type="text" class="form-control" id="hasilscan"> -->
                                        <form action="<?= base_url('presensi/scan') ?>" method="post">
                                            <input type="text" class="form-control" name="nisn" id="text" style="width: 100%;">
                                        </form>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <hr class="mt-5 mb-4 border-secondary-subtle">
                                        <div class="d-flex gap-2 gap-md-4 flex-column flex-md-row justify-content-md-end">
                                            <table class="table table-striped table-sm">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">#</th>
                                                        <th scope="col">NISN</th>
                                                        <th scope="col">Jam Masuk</th>
                                                        <th scope="col">Status</th>
                                                    </tr>
                                                </thead>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- <script type="text/javascript" src="https://unpkg.com/@zxing/library@latest"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script> -->

    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/2.1.10/vue.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/webrtc-adapter/3.3.3/adapter.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <!-- 
    <script>
        let selectedDeviceId = null;
        const codeReader = new ZXing.BrowserMultiFormatReader();
        const sourceSelect = $("#pilihKamera");

        $(document).on('change', '#pilihKamera', function() {
            selectedDeviceId = $(this).val();
            if (codeReader) {
                codeReader.reset()
                initScanner()
            }
        })

        function initScanner() {
            codeReader
                .listVideoInputDevices()
                .then(videoInputDevices => {
                    videoInputDevices.forEach(device =>
                        console.log(`${device.label}, ${device.deviceId}`)
                    );

                    if (videoInputDevices.length > 0) {

                        if (selectedDeviceId == null) {
                            if (videoInputDevices.length > 1) {
                                selectedDeviceId = videoInputDevices[1].deviceId
                            } else {
                                selectedDeviceId = videoInputDevices[0].deviceId
                            }
                        }


                        if (videoInputDevices.length >= 1) {
                            sourceSelect.html('');
                            videoInputDevices.forEach((element) => {
                                const sourceOption = document.createElement('option')
                                sourceOption.text = element.label
                                sourceOption.value = element.deviceId
                                if (element.deviceId == selectedDeviceId) {
                                    sourceOption.selected = 'selected';
                                }
                                sourceSelect.append(sourceOption)
                            })

                        }

                        codeReader
                            .decodeOnceFromVideoDevice(selectedDeviceId, 'previewKamera')
                            .then(result => {

                                //hasil scan
                                console.log(result.text)
                                $("#hasilscan").val(result.text);

                                if (codeReader) {
                                    codeReader.reset()
                                }
                            })
                            .catch(err => console.error(err));

                    } else {
                        alert("Camera not found!")
                    }
                })
                .catch(err => console.error(err));
        }


        if (navigator.mediaDevices) {


            initScanner()


        } else {
            alert('Cannot access camera.');
        }
    </script> -->


    <!-- Scanner -->
    <script>
        let scanner = new Instascan.Scanner({
            video: document.getElementById('preview')
        });
        Instascan.Camera.getCameras().then(function(cameras) {
            if (cameras.length > 0) {
                scanner.start(cameras[0]);
            } else {
                alert('No cameras found.');
            }
        }).catch(function(e) {
            console.error(e);
        });
        scanner.addListener('scan', function(c) {
            document.getElementById('text').value = c;
            document.forms[0].submit();
        });
    </script>


    <!-- Jam -->
    <script type="text/javascript">
        window.onload = function() {
            jam();
        }

        function jam() {
            var e = document.getElementById('jam'),
                d = new Date(),
                h, m, s;
            h = d.getHours();
            m = set(d.getMinutes());
            s = set(d.getSeconds());

            e.innerHTML = h + ':' + m;

            setTimeout('jam()', 1000);
        }

        function set(e) {
            e = e < 10 ? '0' + e : e;
            return e;
        }
    </script>



    <script>
        window.setTimeout(function() {
            $(".alert").fadeTo(500, 0).slideDown(500, function() {
                $(this).remove();
            });
        }, 2000);
    </script>

</body>

</html>