<?php include("header.php") ?>

<?php
$kode_barang = "";
$nama_barang = "";
$pabrik = "";
$kategori = "";
$kemasan = "";
$lemari = "";
$jumlah_stok = "";
$obat_generik = "";
$tanggal_kedaluarsa = "";
$error = "";
$sukses = "";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    $id = "";
}

if ($id != "") {
    $sql1 = "select * from data_obat where id = '$id'";
    $q1 = mysqli_query($koneksi, $sql1);
    $r1 = mysqli_fetch_array($q1);
    $kode_barang = $r1['kode_barang'];
    $nama_barang = $r1['nama_barang'];
    $pabrik = $r1['pabrik'];
    $kategori = $r1['kategori'];
    $kemasan = $r1['kemasan'];
    $lemari = $r1['lemari'];
    $jumlah_stok = $r1['jumlah_stok'];
    $obat_generik = $r1['obat_generik'];
    $tanggal_kedaluarsa = $r1['tanggal_kedaluarsa'];



    if ($nama_barang == '') {
        $error = "Data tidak ditemukan!";
    }
}

if (isset($_POST['simpan'])) {
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $pabrik = $_POST['pabrik'];
    $kategori = $_POST['kategori'];
    $kemasan = $_POST['kemasan'];
    $lemari = $_POST['lemari'];
    $jumlah_stok = $_POST['jumlah_stok'];
    $obat_generik = $_POST['obat_generik'];
    $tanggal_kedaluarsa = date('Y-m-d', strtotime($_POST['tanggal_kedaluarsa']));


    if (
        $kode_barang == '' or $nama_barang == '' or $pabrik == '' or $kategori == ''
        or $kemasan == '' or $lemari == '' or $jumlah_stok == '' or $obat_generik == '' or $tanggal_kedaluarsa == ''
    ) {
        $error = "Silahkan Masukkan Semua Data Dalam Form Ini!";
    }
    if ($tanggal_kedaluarsa >= 'tanggal_isi=now()') {
        $error = "Ada Obat yang Sudah Kedaluarsa! Silahkan Di Cek Kembali!";
    }

    if (empty($error)) {
        if ($id != "") {
            $sql1 = "update data_obat set kode_barang = '$kode_barang', nama_barang = '$nama_barang', pabrik = '$pabrik', kategori = '$kategori', 
            kemasan = '$kemasan', lemari = '$lemari', jumlah_stok = '$jumlah_stok', obat_generik = '$obat_generik', tanggal_kedaluarsa = '$tanggal_kedaluarsa', tanggal_isi=now() where id = '$id'";
        } else {
            $sql1 = "insert into data_obat(kode_barang,nama_barang,pabrik,kategori,kemasan,lemari,jumlah_stok,obat_generik,tanggal_kedaluarsa) 
            values ('$kode_barang','$nama_barang','$pabrik','$kategori','$kemasan','$lemari','$jumlah_stok','$obat_generik','$tanggal_kedaluarsa')";
        }
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil memasukkan data";
        } else {
            $error = "Gagal memasukkan data";
        }
    }
}

?>

<div class="container1">
    <h1>Input Data Obat</h1>
    <div class="mb-3 row">
        <a href="data_obat.php">
            <h5>
                << Kembali ke halaman Data Obat</h5>
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
        <div class="mb-3 row" id="baris-kode-barang">
            <label for="kode_barang" class="col-sm-2 col-form-label">Kode Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="kode_barang" value="<?php echo $kode_barang ?>"
                    name="kode_barang">
            </div>
        </div>
        <div class="mb-3 row" id="baris-nama-barang">
            <label for="nama_barang" class="col-sm-2 col-form-label">Nama Barang</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nama_barang" value="<?php echo $nama_barang ?>"
                    name="nama_barang">
            </div>
        </div>
        <div class="mb-3 row" id="baris-pabrik">
            <label for="pabrik" class="col-sm-2 col-form-label">Pabrik</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="pabrik" value="<?php echo $pabrik ?>" name="pabrik">
            </div>
        </div>
        <div class="mb-3 row" id="baris-kategori">
            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
            <div class="col-sm-10">
                <select name="kategori" id="kategori" class="form-control">
                    <option value="">-- kategori --</option>
                    <option value="Obat Bebas Terbatas">Obat Bebas Terbatas</option>
                    <option value="Obat Bebas">Obat Bebas</option>
                    <option value="Obat Keras">Obat Keras</option>
                    <option value="Obat Wajib Apotek">Obat Wajib Apotek</option>
                    <option value="Obat Golongan Narkotika">Obat Golongan Narkotika</option>
                    <option value="Obat Psikotropika">Obat Psikotropika</option>
                    <option value="Obat Herbal">Obat Herbal</option>
                </select>
                <!-- <input type="text" class="form-control" id="kategori" value="<?php echo $kategori ?>" name="kategori"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-kemasan">
            <label for="kemasan" class="col-sm-2 col-form-label">Kemasan</label>
            <div class="col-sm-10">
                <select name="kemasan" id="kemasan" class="form-control">
                    <option value="">-- Kemasan --</option>
                    <option value="Botol">Botol</option>
                    <option value="Pil">Pil</option>
                    <option value="Tablet">Tablet</option>
                </select>
            </div>
        </div>
        <div class="mb-3 row" id="baris-lemari">
            <label for="lemari" class="col-sm-2 col-form-label">Lemari</label>
            <div class="col-sm-10">
                <select name="lemari" id="lemari" class="form-control">
                    <option value="">-- Lemari --</option>
                    <option value="RI-1">RI-1</option>
                    <option value="RI-2">RI-2</option>
                    <option value="RI-3">RI-3</option>
                    <option value="RJ-1">RI-4</option>
                    <option value="RJ-2">RI-5</option>
                    <option value="RJ-3">RI-6</option>
                </select>
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

                <!-- <input type="text" class="form-control" id="jumlah_stok" value="<?php echo $jumlah_stok ?>" name="jumlah_stok"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row">
            <label for="obat_generik" class="col-sm-2 col-form-label">Obat Generik</label>
            <div class="col-sm-10">
                <select name="obat_generik" id="obat_generik" class="form-control">
                    <option value="">-- Apakah ini Obat Generik? --</option>
                    <option value="Ya">Ya</option>
                    <option value="Tidak">Tidak</option>
                </select>
                <!-- <input type="text" class="form-control" id="obat_generik" value="<?php echo $obat_generik ?>" name="obat_generik"> -->
                <!-- <input name="" id="" cols="30" rows="10"></input> -->
            </div>
        </div>
        <div class="mb-3 row" id="baris-tgl-kedaluarsa">
            <label for="tanggal_kedaluarsa" class="col-sm-2 col-form-label">Tanggal Kedaluarsa
                (bulan/tanggal/tahun)</label>
            <div class="col-sm-10">
                <input type="date" class="form-control" name="tanggal_kedaluarsa">
                <!-- <input type="text" class="form-control" id="tanggal_kedaluarsa" value="" name="tanggal_kedaluarsa"> -->
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