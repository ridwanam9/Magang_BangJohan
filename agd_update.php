<?php include("header.php") ?>

<?php
$nama = "";
$alamat = "";
$golongan_darah = "";
$bentuk_pernapasan = "";
$tipe_pernapasan = "";
$gerakan_dada = "";
$pembuluh_nadi = "";
$pembuluh_kulit = "";
$pembuluh_akral = "";
$bibir_lidah = "";
$konjungtiva = "";
$disabilitas = "";
$diagnosa = "";
$nama_barang = "";
$jumlah_stok = "";
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
    $sql2 = "select * from data_obat";
    $q2 = mysqli_query($koneksi, $sql2);
    $r2 = mysqli_fetch_array($q2);
    $sql3 = "select * from agd where id = '$id'";
    $q3 = mysqli_query($koneksi, $sql3);
    $r3 = mysqli_fetch_array($q3);
    $nama = $r1['nama'];
    $alamat = $r1['alamat'];
    $nama_barang = $r2['nama_barang'];
    $jumlah_stok = $r2['jumlah_stok'];
    // $kemasan = $r1['kemasan'];
    // $lemari = $r1['lemari'];
    // $jumlah_stok = $r1['jumlah_stok'];
    // $obat_generik = $r1['obat_generik'];
    // $tanggal_kedaluarsa = $r1['tanggal_kedaluarsa'];



    if ($nama == '') {
        $error = "Data tidak ditemukan!";
    }
}

if (isset($_POST['simpan'])) {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $golongan_darah = $_POST['golongan_darah'];
    $bentuk_pernapasan = $_POST['bentuk_pernapasan'];
    $gerakan_dada = $_POST['gerakan_dada'];
    $tipe_pernapasan = $_POST['tipe_pernapasan'];
    $pembuluh_nadi = $_POST['pembuluh_nadi'];
    $pembuluh_kulit = $_POST['pembuluh_kulit'];
    $pembuluh_akral = $_POST['pembuluh_akral'];
    $bibir_lidah = $_POST['bibir_lidah'];
    $konjungtiva = $_POST['konjungtiva'];
    $disabilitas = $_POST['disabilitas'];
    $diagnosa = $_POST['diagnosa'];
    $nama_barang = $_POST['nama_barang'];
    $jumlah_stok = $_POST['jumlah_stok'];


    if (
        $golongan_darah == '' or $bentuk_pernapasan == '' or $gerakan_dada == '' or $tipe_pernapasan == '' or $pembuluh_nadi == '' 
        or $pembuluh_kulit == '' or $pembuluh_akral == '' or $disabilitas == '' or $bibir_lidah == '' or $konjungtiva == '' or $diagnosa == ''
    ) {
        $error = "Silahkan Masukkan Semua Data Dalam Form Ini!";
    }
    // if ($tanggal_kedaluarsa >= 'tanggal_isi=now()') {
    //     $error = "Ada Obat yang Sudah Kedaluarsa! Silahkan Di Cek Kembali!";
    // }

    if (empty($error)) {
        if ($id != "") {
            $sql1 = "update agd set nama = '$nama', alamat = '$alamat', golongan_darah = '$golongan_darah', bentuk_pernapasan = '$bentuk_pernapasan', tipe_pernapasan = '$tipe_pernapasan', gerakan_dada = '$gerakan_dada', pembuluh_nadi = '$pembuluh_nadi',
            pembuluh_kulit = '$pembuluh_kulit', pembuluh_akral = '$pembuluh_akral', disabilitas = '$disabilitas', bibir_lidah = '$bibir_lidah', konjungtiva = '$konjungtiva', diagnosa = '$diagnosa', nama_barang = '$nama_barang', jumlah_stok = '$jumlah_stok' tanggal_isi=now() where id = '$id'";
        } else {
            $sql1 = "insert into agd(nama,alamat,golongan_darah,bentuk_pernapasan,gerakan_dada,tipe_pernapasan,pembuluh_nadi,pembuluh_kulit,pembuluh_akral,disabilitas,bibir_lidah,konjungtiva,diagnosa,nama_barang,jumlah_stok) 
            values ('$nama','$alamat','$golongan_darah','$bentuk_pernapasan','$gerakan_dada','$tipe_pernapasan','$pembuluh_nadi','$pembuluh_kulit','$pembuluh_akral','$disabilitas','$bibir_lidah','$konjungtiva','$diagnosa','$nama_barang','$jumlah_stok')";        
        }
        $q3 = mysqli_query($koneksi, $sql3);
        if ($q3) {
            $sukses = "Berhasil memasukkan data";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
}

?>

<div class="container1">
    <h1>Input Data Asesmen Gawat Darurat</h1>
    <div class="mb-3 row">
        <a href="agd.php">
            <h5>
                << Kembali ke halaman Asesmen Gawat Darurat</h5>
        </a>
    </div>

</div>

<div class="container2">
    <?php
    if ($error) {
        ?>
        <div class="alert alert-danger" role="alert">
            <?php echo $error ?>
        </div>
        <?php
    }
    ?>
    <?php
    if ($sukses) {
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
    }
    ?>

    <!-- <script>
        const plus = document.querySelector(".plus"),
            minus = document.querySelector(".plus"),
            hitung = document.querySelector(".hitung");

        let a = 0;

        plus.addEventListener("click", () => {
            a++;
            a = (a < 10) ? "0" + a : a;
            hitung.innerHTML = a;
            console.log(a);
        })

        minus.addEventListener("click", () => {
            if (a > 0) {
                a--;
                a = (a < 10) ? "0" + a : a;
                hitung.innerHTML = a;
            }
        })
    </script> -->

    <form action="" method="post">
    <div class="mb-3 row" id="baris-nama">
            <label for="nama" class="col-sm-2 col-form-label">Nama Lengkap:</label>
            <div class="col-sm-10">
                <?php echo $nama ?>
                <input type="hidden" class="form-control" id="nama" value="<?php echo $nama ?>" name="nama">
            </div>
        </div>
        <div class="mb-3 row" id="baris-alamat">
            <label for="alamat" class="col-sm-2 col-form-label">Alamat Lengkap:</label>
            <div class="col-sm-10">
                <?php echo $alamat ?>
                <input type="hidden" class="form-control" id="alamat" value="<?php echo $alamat ?>" name="alamat">
                <!-- <textarea name="alamat" class="form-control"></textarea> -->
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-golongan-darah">
            <label for="golongan_darah" class="col-sm-2 col-form-label">Golongan Darah</label>
            <div class="col-sm-10">
                <select name="golongan_darah" id="golongan_darah" class="form-control">
                    <option value="">-- Golongan Darah --</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select>
                <!-- <input type="text" class="form-control" id="golongan_darah" value="<?php echo $golongan_darah ?>"
                    name="golongan_darah"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-bentuk-pernapasan">
            <label for="bentuk_pernapasan" class="col-sm-2 col-form-label">Bentuk Pernapasan</label>
            <div class="col-sm-10">
                <select name="bentuk_pernapasan" id="bentuk_pernapasan" class="form-control">
                    <option value="">-- Bentuk Pernapasan --</option>
                    <option value="Reguler">Reguler</option>
                    <option value="Irreguler">Irreguler</option>
                    <option value="Spontan">Spontan</option>
                    <option value="Tidak Spontan">Tidak Spontan</option>
                </select>
                <!-- <input type="text" class="form-control" id="bentuk_pernapasan" value="<?php echo $bentuk_pernapasan ?>"
                    name="bentuk_pernapasan"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-tipe-pernapasan">
            <label for="tipe_pernapasan" class="col-sm-2 col-form-label">Tipe Pernapasan</label>
            <div class="col-sm-10">
                <select name="tipe_pernapasan" id="tipe_pernapasan" class="form-control">
                    <option value="">-- Tipe Pernapasan --</option>
                    <option value="Normal">Normal</option>
                    <option value="Apneustik">Apneustik</option>
                    <option value="Hipoventilasi">Hipoventilasi</option>
                    <option value="Takipneu">Takipneu</option>
                    <option value="Brandipneu">Brandipneu</option>
                    <option value="Biot">Biot</option>
                    <option value="Cheyne Stoke">Cheyne Stoke</option>
                </select>
                <!-- <input type="text" class="form-control" id="tipe_pernapasan" value="<?php echo $tipe_pernapasan ?>" name="tipe_pernapasan"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-gerakan-dada">
            <label for="gerakan_dada" class="col-sm-2 col-form-label">Gerakan Dada</label>
            <div class="col-sm-10">
                <select name="gerakan_dada" id="gerakan_dada" class="form-control">
                    <option value="">-- Gerakan Dada --</option>
                    <option value="Simetris">Simetris</option>
                    <option value="Asimetris">Asimetris</option>
                </select>
                <!-- <input type="text" class="form-control" id="gerakan_dada" value="<?php echo $gerakan_dada ?>"
                    name="gerakan_dada"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-pembuluh-nadi">
            <label for="pembuluh_nadi" class="col-sm-2 col-form-label">Pembuluh Nadi</label>
            <div class="col-sm-10">
                <select name="pembuluh_nadi" id="pembuluh_nadi" class="form-control">
                    <option value="">-- Pembuluh Nadi --</option>
                    <option value="Kuat">Kuat</option>
                    <option value="Lemah">Lemah</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row" id="baris-pembuluh_kulit">
            <label for="pembuluh_kulit" class="col-sm-2 col-form-label">Pembuluh Kulit</label>
            <div class="col-sm-10">
                <select name="pembuluh_kulit" id="pembuluh_kulit" class="form-control">
                    <option value="">-- Pembuluh Kulit --</option>
                    <option value="Normal">Normal</option>
                    <option value="Pucat">Pucat</option>
                    <option value="Berkeringat">Berkeringat</option>
                    <option value="Jaundice">Jaundice</option>
                    <option value="Cyanosis">Cyanosis</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row">
            <label for="pembuluh_akral" class="col-sm-2 col-form-label">Pembuluh Akral</label>
            <div class="col-sm-10">
                <select name="pembuluh_akral" id="pembuluh_akral" class="form-control">
                    <option value="">-- Pembuluh Akral --</option>
                    <option value="Hangat">Hangat</option>
                    <option value="Dingin">Dingin</option>
                    <option value="Kering">Kering</option>
                    <option value="Basah">Basah</option>
                </select>
                <!-- <input type="text" class="form-control" id="pembuluh_akral" value="<?php echo $pembuluh_akral ?>"
                    name="pembuluh_akral"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-bibir-lidah">
            <label for="bibir_lidah" class="col-sm-2 col-form-label">Bibir/Lidah</label>
            <div class="col-sm-10">
                <select name="bibir_lidah" id="bibir_lidah" class="form-control">
                    <option value="">-- Bibir/Lidah --</option>
                    <option value="Sianosis">Sianosis</option>
                    <option value="Tidak Sianosis">Tidak Sianosis</option>
                </select>
                <!-- <input type="date" class="form-control" name="bibir_lidah"> -->
                <!-- <input type="text" class="form-control" id="bibir_lidah" value="" name="bibir_lidah"> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-konjungtiva">
            <label for="konjungtiva" class="col-sm-2 col-form-label">Konjungtiva</label>
            <div class="col-sm-10">
                <select name="konjungtiva" id="Konjungtiva" class="form-control">
                    <option value="">-- Konjungtiva --</option>
                    <option value="Normal">Normal</option>
                    <option value="Pucat">Pucat</option>
                    <option value="Pink">Pink</option>
                </select>
                <!-- <input type="date" class="form-control" name="bibir_lidah"> -->
                <!-- <input type="text" class="form-control" id="bibir_lidah" value="" name="bibir_lidah"> -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="disabilitas" class="col-sm-2 col-form-label">Disabilitas</label>
            <div class="col-sm-10">
                <select name="disabilitas" id="disabilitas" class="form-control">
                    <option value="">-- Apakah ia Disabilitas? --</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                <!-- <input type="text" class="form-control" id="disabilitas" value="<?php echo $disabilitas ?>" name="disabilitas"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="diagnosa" class="col-sm-2 col-form-label">Diagnosa</label>
            <div class="col-sm-10">
                <textarea name="diagnosa" class="form-control" id="summernote"><?php echo $diagnosa ?></textarea>
                <!-- <textarea name="" id="" cols="30" rows="10"></textarea> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-nama-barang">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang:</label>
            <div class="col-sm-10">
                <select name="nama_barang" id="nama_barang" class="form-control">
                    <option value="">-- Pilih obat yang diperlukan --</option>
                    <?php
                    while($r2 = mysqli_fetch_array($q2)){
                        ?>
                        <option value=""><?php echo $r2['nama_barang']?></option>
                        <?php
                    }
                    ?>
                </select>
                <!-- <input type="text" class="form-control" id="nama_barang" value="" name="nama_barang"> -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="jumlah_stok" class="col-sm-2 col-form-label">Jumlah Stok</label>
            <div class="col-sm-10">
                <!-- <div class="jumlah_stok">
                    <input type="number" name="jumlah_stok" id="jumlah_stok" value="1" min="1" />
                </div> -->
                <div class="jumlah_stok" id="jumlah_stok">
                    <span class="minus">-</span>
                    <input class="jumlah_stok" name="jumlah_stok" id="jumlah_stok" type="text" value="1" min="1" />
                    <span class="plus">+</span>
                </div>

                <!-- <input type="text" class="form-control" id="jumlah_stok" value="" name="jumlah_stok"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row">
            <div class="col-sm-2"></div>
            <div class="col-sm-10">
                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
            </div>
        </div>
        <!-- <div class="mb-3 row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
            <input type="password" class="form-control" id="inputPassword">
        </div>
    </div> -->
    </form>
</div>

<?php include("footer.php") ?>