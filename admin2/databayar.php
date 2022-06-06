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
            <h1 class="h3 mb-4 text-gray-800 mt-5">Data Pembayaran</h1>
            <div id="kanan">
                <?php
                if (isset($_GET['keyword'])) {
                    $cari = $_GET['keyword'];
                    echo "<b>Hasil pencarian : " . $cari . "</b><br>";
                }
                ?>
                <table class="table table-striped mt-3">
                    <thead>
                        <tr>
                            <th scope="col">Kode</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Jumlah</th>
                            <th scope="col">Bank</th>
                            <th scope="col">No Rekening</th>
                            <th scope="col">Nama Pemilik Rekening</th>
                            <th scope="col">Bukti Pembayaran</th>
                            <th scope="col">Bukti Lain</th>
                        </tr>
                    </thead>
                    <?php
                    require_once "../function/koneksi.php";
                    // tombol cari ditekan
                    if (isset($_GET["keyword"])) {
                        $cari = $_GET["keyword"];
                        $data = mysqli_query($conn, "SELECT * FROM pembayaran WHERE 
                        nama LIKE '%$cari%' OR
                        idpesan LIKE '%$cari%' OR
                        norek LIKE '%$cari%' OR
                        namarek LIKE '%$cari%'");
                    } else {
                        $data = mysqli_query($conn, "SELECT * FROM pembayaran");
                    }
                    while ($row = mysqli_fetch_assoc($data)) {
                        $id      = $row['idpesan'];
                        $nama    = $row['nama'];
                        $jumlah  = $row['jumlah'];
                        $bank    = $row['bank'];
                        $norek   = $row['norek'];
                        $namarek = $row['namarek'];
                        $gambar  = $row['gambar'];
                        $gambar2 = $row['gambar2'];

                    ?>
                        <tbody>
                            <tr>
                                <th scope="row"><?= $id; ?></th>
                                <td><?= $nama; ?></td>
                                <td><?= $jumlah; ?></td>
                                <td><?= $bank; ?></td>
                                <td><?= $norek; ?></td>
                                <td><?= $namarek; ?></td>
                                <td><a href="../images/<?= $gambar; ?>" target="_blank"><img src="../images/<?= $gambar; ?>" alt="Bukti" width="100ox" width="50px"></a></td>
                                <td><a href="../images/<?= $gambar2; ?>" target="_blank"><img src="../images/<?= $gambar2; ?>" alt="Bukti" width="100ox" width="50px"></a></td>
                            </tr>
                        </tbody>
                    <?php
                    }
                    ?>
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