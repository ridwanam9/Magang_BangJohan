<?php include("header.php") ?>

<div class="container1">
    <h1>Data Pasien</h1>
    <div class="mb-3 row">
        <a href="agd.php">
            <h5>
                << Kembali ke halaman Asesmen Gawat Darurat</h5>
        </a>
    </div>
</div>

<div class="container2">
    <?php
    $sukses = "";
    $katakunci = (isset($_GET['katakunci'])) ? $_GET['katakunci'] : "";
    if (isset($_GET['op'])) {
        $op = $_GET['op'];
    } else {
        $op = "";
    }
    if ($op == 'delete') {
        $id = $_GET['id'];
        $sql1 = "delete from data_pasien where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        }
    }
    ?>

    <br>
    
    <!-- <p>
        <a href="data_pasien_input.php">
            <input type="button" class="btn btn-primary" value="Buat Data Baru" />
        </a>
    </p> -->

    <?php
    if ($sukses) {
        ?>
        <div class="alert alert-primary" role="alert">
            <?php echo $sukses ?>
        </div>
        <?php
    }
    ?>
    <form class="row g-3" method="get">
        <div class="col-auto">
            <input type="text" class="form-control" placeholder="Masukkan Kata Kunci" name="katakunci"
                value="<?php echo $katakunci ?>" />
        </div>
        <div class="col-auto">
            <input type="submit" name="cari" value="Cari Tulisan" class="btn btn-secondary" />
        </div>
    </form>

    <br>
    
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th>Nama Lengkap</th>
                <th>Alamat</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "";
            $per_data_pasien = 10;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(nama like '%" . $array_katakunci[$x] . "%' or alamat like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan = "where " . implode(" or ", $sqlcari);
            }
            // $sql1 = "select * from data_pasien join data_obat $sqltambahan";
            // $sql1 = "select data_pasien.nama, data_pasien.alamat, data_obat.nama_barang, data_obat.jumlah_stok from data_pasien join data_obat on data_pasien.id = data_obat.id $sqltambahan";
            $sql1 = "select * from data_pasien $sqltambahan";
            // $sql2 = "select * from data_obat $sqltambahan";
            // $sql3 = "select * from agd $sqltambahan";
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $mulai = ($page > 1) ? ($page * $per_data_pasien) - $per_data_pasien : 0;
            $q1 = mysqli_query($koneksi, $sql1);
            // $q2 = mysqli_query($koneksi, $sql2);
            // $q3 = mysqli_query($koneksi, $sql3);
            $total = mysqli_num_rows($q1);
            $pages = ceil($total / $per_data_pasien);
            $nomor = $mulai + 1;
            $sql1 = $sql1 . " order by id desc limit $mulai,$per_data_pasien";
            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <tr>
                    <!-- <a href="data_pasien_lengkap.php" onclick="find()"> -->
                    <td>
                        <?php echo $nomor++ ?>
                    </td>
                    <td>
                        <?php echo $r1['nama'] ?>
                    </td>
                    <td>
                        <?php echo $r1['alamat'] ?>
                    </td>
                    <td>
                        <!-- <a href="data_pasien_lengkap.php?id=">
                            <span class="badge bg-info text-dark">Read</span>
                        </a>
                        <a href="data_pasien_input.php?id=">
                            <span class="badge bg-warning text-dark">Edit</span>
                        </a> -->
                        <a href="agd_input.php?id=<?php echo $r1['id'] ?>">
                        <span class="badge bg-success">Tambah Data</span>
                        </a>
                        <!-- <a href="data_pasien.php?op=delete&id="
                            onclick="return confirm('Apakah Anda yakin mau hapus data ini?')">
                            <span class="badge bg-danger">Delete</span>
                        </a> -->
                    </td>
                    <!-- </a> -->
                </tr>
                <?php
            }
            ?>
        </tbody>
    </table>

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $cari = isset($_GET['cari']) ? $_GET['cari'] : "";
            for ($i = 1; $i <= $pages; $i++) {
                ?>
                <li class="page-item">
                    <a class="page-link"
                        href="agd_data_pasien.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>">
                        <?php echo $i ?>
                    </a>
                </li>
                <?php
            }
            ?>
        </ul>
    </nav>

</div>

<?php include("footer.php") ?>