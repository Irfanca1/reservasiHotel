<?php include "view/sidebar.php"; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include "view/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <form class="d-flex" role="search" method="GET">
                <input class="form-control me-2" name="keyword" type="text" placeholder="Search" aria-label="Search" autocomplete="off">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
            <!-- Page Heading -->
            <h3 class="mb-4 text-gray-800 text-center mt-3">Transaksi Batal</h3>
            <div id="kanan">
                <?php
                if (isset($_GET['keyword'])) {
                    $cari = $_GET['keyword'];
                    echo "<b>Hasil pencarian : " . $cari . "</b><br>";
                }
                ?>
                <a href="../function/cetaklaporanbatal.php"><button type="button" class="btn btn-dark mt-3 mb-3"><i class="bi bi-printer me-2"></i>Cetak Laporan</button></a>
                <table class="table table-sm mt-3">
                    <thead class="table-success">
                        <tr style="font-size: 14px;" class="text-center">
                            <th scope="col">Kode</th>
                            <th scope="col">Tanggal Pesan</th>
                            <th scope="col">Tipe</th>
                            <th scope="col">Harga</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Telepon</th>
                            <th scope="col">Check In</th>
                            <th scope="col">Check Out</th>
                            <th scope="col">Lama Menginap</th>
                            <th scope="col">Total</th>
                        </tr>
                    </thead>
                    <?php
                    require_once "../function/koneksi.php";
                    if (isset($_GET["keyword"])) {
                        $cari = $_GET["keyword"];
                        $data = mysqli_query($conn, "SELECT * FROM pemesanan WHERE 
                        status='Dibatalkan..' AND 
                        nama LIKE '%$cari%'");
                    } else {
                        $data = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status='Dibatalkan..'");
                    }
                    while ($row = mysqli_fetch_assoc($data)) {
                        $id = $row['idpesan'];
                        $tglpesan = $row['tglpesan'];
                        $batasbayar = $row['batasbayar'];
                        $tipe = $row['tipe'];
                        $harga = $row['harga'];
                        $jumlah = $row['jumlah'];
                        $nama = $row['nama'];
                        $alamat = $row['alamat'];
                        $tglmasuk = $row['tglmasuk'];
                        $tglkeluar = $row['tglkeluar'];
                        $lama = $row['lamahari'];
                        $total = $row['totalbayar'];
                        $status = $row['status'];

                        $totalFormat = number_format($total, 0, ',', '.');
                        $hargaFormat = number_format($harga, 0, ',', '.');
                        $tglpesann = date('d/m/Y', strtotime($tglpesan));
                        $tglmasukk = date('d/m/Y', strtotime($tglmasuk));
                        $tglkeluarr = date('d/m/Y', strtotime($tglkeluar));
                        $batasjam = date('H:i:s', strtotime($batasbayar));
                    ?>
                        <tbody>
                            <tr style="font-size: 12px;">
                                <th scope="row"><?= $id; ?></th>
                                <td><?= $tglpesann; ?></td>
                                <td><?= $tipe; ?></td>
                                <td>Rp. <?= $hargaFormat; ?></td>
                                <td><?= $jumlah; ?></td>
                                <td><?= $nama; ?></td>
                                <td><?= $alamat; ?></td>
                                <td><?= $telepon; ?></td>
                                <td><?= $tglmasukk; ?></td>
                                <td><?= $tglkeluarr; ?></td>
                                <td><?= $lama; ?></td>
                                <td>Rp. <?= $totalFormat; ?></td>
                            </tr>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- End of Main Content -->

    <?php include "view/footer.php"; ?>

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>