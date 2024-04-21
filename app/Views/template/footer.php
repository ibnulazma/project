<footer class="main-footer">
    <strong>Design by IbnulWafa</strong> @SIAKADINKA <?= date('Y') ?>
</footer>
</div>




<script src="<?= base_url() ?>/AdminLTE/plugins/jquery/jquery.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/jquery-ui/jquery-ui.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/sparklines/sparkline.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/jquery-knob/jquery.knob.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/summernote/summernote-bs4.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>

<script src="<?= base_url() ?>/AdminLTE/dist/js/adminlte.js?v=3.2.0"></script>





<script src="<?= base_url() ?>/AdminLTE/plugins/select2/js/select2.full.min.js"></script>
<!-- Bootstrap4 Duallistbox -->
<script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
<!-- InputMask -->
<script src="<?= base_url() ?>/AdminLTE/plugins/moment/moment.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/inputmask/jquery.inputmask.min.js"></script>
<!-- date-range-picker -->
<script src="<?= base_url() ?>/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- bootstrap color picker -->
<script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="<?= base_url() ?>/AdminLTE/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Bootstrap Switch -->
<script src="<?= base_url() ?>/AdminLTE/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<!-- BS-Stepper -->

<!-- dropzonejs -->
<script src="<?= base_url() ?>/AdminLTE/plugins/dropzone/min/dropzone.min.js"></script>

<!-- AkhirForm -->

<script src="<?= base_url() ?>/AdminLTE/plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>

<!-- dataTables -->

<script src="<?= base_url() ?>/AdminLTE/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>/AdminLTE/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- Validation -->
<script src="<?= base_url() ?>/AdminLTE/plugins/bs-stepper/js/bs-stepper.min.js"></script>

<!-- Sweet Alert -->

<script src="<?= base_url() ?>/AdminLTE/plugins/sweetalert2/sweetalert2.all.min.js"></script>
<!-- Validasi Form -->

<script src="<?= base_url() ?>/AdminLTE/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>


<script>
    $(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox({
                alwaysShowClose: true
            });
        });

    })
</script>








<script>
    const swal = $('.swal').data('swal');
    if (swal) {
        Swal.fire({
            title: 'Data Berhasil',
            text: swal,
            icon: 'success'
        })
    }

    $(document).on('click', '.btn-hapus', function(e) {
        e.preventDefault();
        const href = $(this).attr('href');

        Swal.fire({
            title: 'Apakah anda yakin akan dihapus',
            text: "Data Akan Hilang",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Hapus'
        }).then((result) => {
            if (result.value) {
                document.location.href = href;
            }
        })
    })
</script>



<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- DatTables -->

<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["excel", "pdf", "print"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": false,
            "autoWidth": true,
            "responsive": true,
        });
        $('#tbl_peserta').DataTable({
            // "order": [],
            "processing": true,
            "serverSide": true,
            "searching": true,
            "ordering": true,
            "ajax": {
                "url": "<?= base_url('Datatables/data_siswa'); ?>",
                "type": "POST",
                // "data": {
                //     "csrf_test_name": $('.input[name=csrf_test_name]').val()
                // },
                // "data": function(data) {
                //     data.jenis_kelamin = $('#Jk').val();
                //     // data.csrf_test_name = $('.input[name=csrf_test_name]').val();
                // }
            },
            "columnDefs": [{
                "targets": [0],
                "orderable": false
            }]
        });
        // $('#Jk').change(function() {
        //     table.draw();
        // });
    });
</script>

<script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })

        $('#datemask3').inputmask('yyyy/mm/dd', {
            'placeholder': 'yyyy/mmmm/dd'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date picker

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })


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
    $(function() {
        bsCustomFileInput.init();
    });
</script>


<script>
    $(document).ready(function() {
        $("#provinsi").change(function() {
            var id_kabupaten = $("#provinsi").val();
            $.ajax({
                type: 'GET',
                url: '<?= base_url('Peserta/dataKabupaten') ?>/' + id_kabupaten,
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
                url: '<?= base_url('Peserta/dataKecamatan') ?>/' + id_kecamatan,
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
                url: '<?= base_url('Peserta/dataDesa') ?>/' + id_desa,
                success: function(html) {
                    $("#desa").html(html);
                }
            });
        });
    });
</script>