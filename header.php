<?php
session_start();
if ($_SESSION['admin_username'] == '') {
    header("location:login.php");
    exit();
}
include_once("test/test_koneksi.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="fontawesome-free-5.15.1-web/css/all.css">
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script> -->


    <title>Document</title>

    <!--Google Fonts-->
    <!-- <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@400;500;700&display=swap" rel="stylesheet"> -->

    <!-- Link stylesheet -->
    <link rel="stylesheet" href="design/design.css">
    <link rel="stylesheet" href="design/summernote-image-list.css">
    <script src="design/script.js"></script>
    <script src="design/summernote-image-list.min.js"></script>

    <style>
        .image-list-content .col-lg-3 {
            width: 100%;
        }

        .image-list-content img {
            float: left;
            width: 20%;
        }

        .image-list-content p {
            float: left;
            padding-left: 20px;
        }

        .image-list-item {
            padding: 10px 0px 10px 0px;
        }

        body {
            background-color: powderblue;
        }

        div.container1 {
            /* margin-left: 80px;
            width: 100%;
            max-width: 600px;
            margin: auto;
            padding: 15px; */
            margin-top: 10px;
            margin-left: 20px;
            width: 100%;
            text-align: center;
        }

        #tombol-biru {
            margin-left: 50px;
            /* margin-bottom: 50px; */
        }

        #medkit {}

        span {
            cursor: pointer;
        }

        label {
            font-size: 20px;
            font-weight: bold;
        }

        div.jumlah_stok {
            margin-top: 10px;
            height: 50px;
            width: 250px;
            background: #fff;
            border-radius: 4px;
            justify-content: center;
            vertical-align: middle;
        }

        .jumlah_stok span, .jumlah_stok input{
            width: 207px;
            justify-content: center;
            text-align: center;
            font-size: 30px;
            font-weight: bold;
        }

        /* .jumlah_stok input.hitung{
            font-size: 20px;
            border-right: 2px solid rgba(0, 0, 0, 5);
            border-left: 2px solid rgba(0, 0, 0, 5);
        } */

        input.hitung{
            justify-content: center;
        }

        /* #jumlah_stok:hover{
            background: #c9c0a6;
            color: #fff;
        } */

        /* .number {
            margin: 0px;
        } */

        /* .minus,
        .plus {
            width: 20px;
            height: 20px;
            background: #f2f2f2;
            border-radius: 4px;
            padding: -5px 5px 5px 5px;
            border: 1px solid #ddd;
            display: inline-block;
            vertical-align: middle;
            text-align: center;
        } */

        /* #hitung {
            height: 34px;
            width: 100px;
            text-align: center;
            font-size: 20px;
            border: 1px solid #ddd;
            border-radius: 4px;
            display: inline-block;
            vertical-align: middle;
        } */

        div.container2 {
            margin-left: 80px;
            margin-right: 40px;
        }

        div.container3 {
            color: brown;
        }

        footer {
            margin-bottom: 20px;
        }
    </style>

</head>

<body>
    <div class="gambar">
        <a href="index.php">
            <img src="image/rs-pku-muhammadiyah-yogyakarta.png" alt="" width="250px" height="45px">
        </a>
    </div>
    <div class="nama-admin">
        <b>
            <?php echo $_SESSION['admin_username'] ?>
        </b>
    </div>
    <header id="myHeader">

    </header>
    <div class="sidebar" id="mySidebar">
        <a href="index.php">
            <i class="fa fa-home"></i>
            <span class="sidebar-name">Beranda</span>
        </a>
        <a href="agd.php">
            <i class="fa fa-folder"></i>
            <span class="sidebar-name">Asesmen Gawat Darurat</span>
        </a>
        <a href="data_pasien.php">
            <i class="fa fa-user"></i>
            <span class="sidebar-name">&nbsp;Data Pasien</span>
        </a>
        <a href="data_obat.php">
            <i class="fa fa-medkit" id="medkit"></i>
            <span class="sidebar-name">Data Obat</span>
        </a>
        <a href="pembayaran.php">
            <i class="fa fa-dollar"></i>
            <span class="sidebar-name">&nbsp;&nbsp;Pembayaran</span>
        </a>
        <a href="pengaturan.php">
            <i class="fa fa-cog"></i>
            <span class="sidebar-name">Pengaturan</span>
        </a>
        <a href="logout.php">
            <i class="fa fa-sign-out"></i>
            <span class="sidebar-name">Logout</span>
        </a>
    </div>
    <main>