<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="widtd=device-widtd, initial-scale=1.0">
    <title>Print Halaman Depan</title>
</head>



<style>
    .content {

        margin-right: 20px;
    }



    .judul {
        font-size: 18pt;
        text-align: center;
        margin-bottom: 85%;
    }

    .isi {
        font-size: 12pt;
        margin-bottom: 5px;
    }



    table {
        margin-left: 50px;
        font-size: 12pt;
        /* margin-bottom: 50%; */
        /* width: 100%; */

    }

    .tabel2 {
        width: 100%;
        line-height: 1.8em;
    }

    /* tr {
        margin-bottom: 50px;
    } */

    .titik {
        width: 50%;
    }

    .block {
        font-weight: bold;
    }

    .left {
        margin-left: 50px;
    }

    .foto {

        width: 90px;
        height: 119px;
        margin-top: 50px;
        margin-left: 50px;

        float: left;
    }

    .ukuran {
        text-align: center;
    }



    .peserta {
        align-items: center;
        text-align: center;
        font-size: 14pt;
        border: 1px solid black;
        width: 9cm;
        height: 3cm;
        padding: 5px;
    }

    .peserta .nama {
        text-decoration: underline;


    }
</style>

<body>


    <div class="peserta">
        <h5 class="nama"> <?= $label['nama_siswa'] ?></h5>
        <h5> <?= $label['nisn'] ?>/<?= $label['nis'] ?></h5>



    </div>

</body>

</html>