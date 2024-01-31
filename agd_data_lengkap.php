<?php include("header.php") ?>

<?php
$nama = "";
$nik = "";
$kota_lahir = "";
$tanggal_lahir = "";
$alamat = "";
$jenis_kelamin = "";
$no_hp = "";
$diagnosa = "";
$namaortu = "";
$nohportu = "";
$alamatortu = "";
$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from data_pasien where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $nama = $r1['nama'];
    $nik = $r1['nik'];
    $kota_lahir = $r1['kota_lahir'];
    $tanggal_lahir = $r1['tanggal_lahir'];
    $alamat = $r1['alamat'];
    $jenis_kelamin = $r1['jenis_kelamin'];
    $no_hp = $r1['no_hp'];
    $diagnosa = $r1['diagnosa'];
    $namaortu = $r1['namaortu'];
    $alamatortu = $r1['alamatortu'];
    $nohportu = $r1['nohportu'];


    if ($nik == '') {
        $error = "Data tidak ditemukan!";
    }
}

// if (isset($_POST['simpan'])) {
//     $nama = $_POST['nama'];
//     $nik = $_POST['nik'];
//     $kota_lahir = $_POST['kota_lahir'];
//     $tanggal_lahir = date('Y-m-d', strtotime($_POST['tanggal_lahir']));
//     $alamat = $_POST['alamat'];
//     $jenis_kelamin = $_POST['jenis_kelamin'];
//     $no_hp = $_POST['no_hp'];
//     $diagnosa = $_POST['diagnosa'];
//     $namaortu = $_POST['namaortu'];
//     $alamatortu = $_POST['alamatortu'];
//     $nohportu = $_POST['nohportu']; 


//     if (
//         $nama == '' or $nik == '' or $kota_lahir == '' or $tanggal_lahir == '' or $alamat == ''
//         or $jenis_kelamin == '' or $no_hp == '' or $diagnosa == ''
//     ) {
//         $error = "Silahkan Masukkan Semua Data Dalam Form Ini!";
//     }

//     if (empty($error)) {
//         if ($id != "") {
//             $sql1 = "update data_pasien set nama = '$nama', nik = '$nik', kota_lahir = '$kota_lahir', tanggal_lahir = '$tanggal_lahir', 
//             alamat = '$alamat', jenis_kelamin = '$jenis_kelamin', no_hp = '$no_hp', diagnosa = '$diagnosa', namaortu = '$namaortu', nohportu = '$nohportu', alamatortu = '$alamatortu', tanggal_isi=now() where id = '$id'";
//         } else {
//             $sql1 = "insert into data_pasien(nama,nik,kota_lahir,tanggal_lahir,alamat,jenis_kelamin,no_hp,diagnosa,namaortu,nohportu,alamatortu) 
//             values ('$nama','$nik','$kota_lahir','$tanggal_lahir','$alamat','$jenis_kelamin','$no_hp','$diagnosa','$namaortu','$nohportu','$alamatortu')";
//         }
//         $q1 = mysqli_query($koneksi, $sql1);
//         if ($q1) {
//             $sukses = "Berhasil memasukkan data";
//         } else {
//             $error = "Gagal memasukkan data";
//         }
//     }
// }

?>

<div class="container1">
    <h1>Data Pasien Lengkap</h1>
    <div class="mb-3 row">
        <a href="data_pasien.php">
            <h5>
                << Kembali ke halaman Data Pasien</h5>
        </a>
    </div>
</div>

<div class="container2">
    <p>
        <a href="data_pasien_input.php?id=<?php echo $r1['id'] ?>">
            <input type="button" class="btn btn-primary" value="Edit Data" />
        </a>
    </p>

    <form action="" method="post">
        <div class="mb-3 row" id="baris-nama">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap:</label>
            <div class="col-sm-10">
                <?php echo $nama ?>
                <!-- <input type="text" class="form-control" id="nama" value="" name="nama"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-nik">
            <label for="nik" class="col-sm-2 col-form-label">NIK:</label>
            <div class="col-sm-10">
                <?php echo $nik ?>
                <!-- <input type="text" class="form-control" id="nik" value="" name="nik"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-tempat-lahir">
            <label for="kota_lahir" class="col-sm-2 col-form-label">Kota Lahir:</label>
            <div class="col-sm-10">
                <?php echo $kota_lahir ?>
                <!-- <input type="text" class="form-control" id="kota_lahir" value="" name="kota_lahir"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-tanggal-lahir">
            <label for="tanggal_lahir" class="col-sm-2 col-form-label">Tanggal Lahir (tahun-bulan-tanggal):</label>
            <div class="col-sm-10">
                <?php echo $tanggal_lahir ?>
                <!-- <input type="date" class="form-control" name="tanggal_lahir"> -->
                <!-- <input type="text" class="form-control" id="tanggal_lahir" value="" name="tanggal_lahir"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-alamat">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap:</label>
            <div class="col-sm-10">
                <?php echo $alamat ?>
                <!-- <textarea name="alamat" class="form-control"></textarea> -->
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-jenis_kelamin">
            <label for="jenis_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin:</label>
            <div class="col-sm-10">
                <?php echo $jenis_kelamin ?>
                <!-- <input type="radio" name="jenis_kelamin" value="Laki-Laki">&nbsp;Laki-Laki
                &nbsp;
                <input type="radio" name="jenis_kelamin" value="Perempuan">&nbsp;Perempuan -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-no_hp">
            <label for="no_hp" class="col-sm-2 col-form-label">No HP:</label>
            <div class="col-sm-10">
                <?php echo $no_hp ?>
                <!-- <input type="text" class="form-control" id="no_hp" value="" name="no_hp"> -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa:</label>
            <div class="col-sm-10">
                <?php echo $diagnosa ?>
                <!-- <textarea name="diagnosa" class="form-control" id="summernote"></textarea> -->
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            </div>
        </div>

        <br>
        <center>
            <hr color="grey" width="90%">
            <div class="container3">
                <h5>OPSIONAL</h5>
            </div>
            <hr color="grey" width="90%">
        </center>

        <div class="container1">
            <h1>Info Keluarga yang Bisa Dihubungi</h1>
        </div>

        <br>

        <div class="mb-3 row" id="baris-nama-ortu">
            <label for="namaortu" class="col-sm-2 col-form-label">Nama Orangtua:</label>
            <div class="col-sm-10">
                <?php echo $namaortu ?>
                <!-- <input type="text" class="form-control" id="namaortu" value="" name="namaortu"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-alamatortu">
            <label for="alamatortu" class="col-sm-2 col-form-label">Alamat Orangtua:</label>
            <div class="col-sm-10">
                <?php echo $alamatortu ?>
                <!-- <textarea name="alamatortu" class="form-control"></textarea> -->
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-nohportu">
            <label for="nohportu" class="col-sm-2 col-form-label">No HP Orangtua:</label>
            <div class="col-sm-10">
                <?php echo $nohportu ?>
                <!-- <input type="text" class="form-control" id="nohportu" value="" name="nohportu"> -->
            </div>
        </div>
        <!-- <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
            </div>
        </div> -->
        <!-- <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword">
        </div>
    </div> -->
    </form>
</div>

<?php include("footer.php") ?>