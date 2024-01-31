<?php include("header.php") ?>

<div class="container1">
    <h1>Data Obat</h1>
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
        $sql1 = "delete from data_obat where id = '$id'";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Berhasil hapus data";
        }
    }
    ?>

    <p>
        <a href="data_obat_input.php">
            <input type="button" class="btn btn-primary" value="Buat Data Baru" />
        </a>
    </p>

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
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="col-1">#</th>
                <th>Kode Barang</th>
                <th>Nama Obat</th>
                <th>Jumlah Stok</th>
                <th class="col-2">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sqltambahan = "";
            $per_data_obat = 5;
            if ($katakunci != '') {
                $array_katakunci = explode(" ", $katakunci);
                for ($x = 0; $x < count($array_katakunci); $x++) {
                    $sqlcari[] = "(kode_barang like '%" . $array_katakunci[$x] . "%' or nama_barang like '%" . $array_katakunci[$x] . "%' or nama_barang like '%" . $array_katakunci[$x] . "%')";
                }
                $sqltambahan = "where " . implode(" or ", $sqlcari);
            }
            $sql1 = "select * from data_obat $sqltambahan";
            $page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
            $mulai = ($page > 1) ? ($page * $per_data_obat) - $per_data_obat : 0;
            $q1 = mysqli_query($koneksi, $sql1);
            $total = mysqli_num_rows($q1);
            $pages = ceil($total / $per_data_obat);
            $nomor = $mulai + 1;
            $sql1 = $sql1 . " order by id desc limit $mulai,$per_data_obat";
            $q1 = mysqli_query($koneksi, $sql1);
            while ($r1 = mysqli_fetch_array($q1)) {
                ?>
                <tr>
                    <!-- <a href="data_obat_lengkap.php" onclick="find()"> -->
                    <td>
                        <?php echo $nomor++ ?>
                    </td>
                    <td>
                        <?php echo $r1['kode_barang'] ?>
                    </td>
                    <td>
                        <?php echo $r1['nama_barang'] ?>
                    </td>
                    <td>
                        <?php echo $r1['jumlah_stok'] ?>
                    </td>
                    <td>
                        <a href="data_obat_lengkap.php?id=<?php echo $r1['id'] ?>">
                            <span class="badge bg-info text-dark">Read</span>
                        </a>
                        <a href="data_obat_input.php?id=<?php echo $r1['id'] ?>">
                            <span class="badge bg-warning text-dark">Edit</span>
                        </a>
                        <a href="data_obat.php?op=delete&id=<?php echo $r1['id'] ?>"
                            onclick="return confirm('Apakah Anda yakin mau hapus data ini?')">
                            <span class="badge bg-danger">Delete</span>
                        </a>
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
                        href="data_obat.php?katakunci=<?php echo $katakunci ?>&cari=<?php echo $cari ?>&page=<?php echo $i ?>">
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