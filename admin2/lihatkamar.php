<?php include "view/sidebar.php"; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <?php include "view/header.php"; ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="card-sec">
                <div class="container">
                    <div class="row mt-5 card-wrapper">
                        <div class="row mt-5">
                            <div class="col-12">
                                <h2 class="text-center">DATA KAMAR</h2>
                                <p class="text-center">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Voluptate, rem.</p>
                            </div>
                        </div>

                        <?php
                        $sql = mysqli_query($conn, "SELECT * FROM kamar");
                        while ($data = $sql->fetch_assoc()) {
                            $id     = $data['idkamar'];
                            $tipe   = $data['tipe'];
                            $jumlah = $data['jumlah'];
                            $harga  = $data['harga'];
                            $gambar = $data['gambar'];
                            $angka  = number_format($harga, 0, ',', '.');

                            $sql2 = mysqli_query($conn, "SELECT * FROM stokkamar WHERE idkamar='$id'");
                            while ($data2 = $sql2->fetch_assoc()) {
                                $stok = $data2['stok'];

                        ?>
                                <!-- card content -->
                                <div class="col-md-5 card-gap">
                                    <div class="card-content">
                                        <div class="image-card">
                                            <img src="../images/<?= $gambar; ?>" class="" alt="Room 1">
                                        </div>
                                        <div class="content-card">
                                            <h4><?= $tipe; ?></h4>
                                            <hr />
                                            <p class="text-1">
                                                Lorem ipsum dolor sit <br />
                                                delur ate si lilu
                                            </p>
                                            <p class="text-price">Rp. <?= $angka; ?></p>
                                            <p class="text-2">Tersedia <?= $stok; ?> Kamar</p>
                                            <a href="editkamar?id=<?= $id; ?>"><button name="edit" class="btn-detail btn-warning">Edit</button></a>
                                            <a href="../function/proseshapus?id=<?= $id; ?>" onclick="return confirm('APAKAH ANDA YAKIN INGIN MENGHAPUS..?')"><button type="submit" name="hapus" class="btn-pesan btn-danger">Hapus</button></a>
                                        </div>
                                    </div>
                                </div>

                        <?php
                            }
                        }
                        ?>

                    </div>
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