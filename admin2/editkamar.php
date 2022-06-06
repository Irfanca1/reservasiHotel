<?php require_once "view/sidebar.php"; ?>

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <div id="content">
        <?php require_once "view/header.php"; ?>
        <!-- Begin Page Content -->
        <div class="container-fluid">
            <?php
            require_once "../function/koneksi.php";
            $ambilId = $_GET['id'];
            $sql = mysqli_query($conn, "SELECT * FROM kamar WHERE idkamar='$ambilId'");
            $data  = $sql->fetch_assoc();
            $id    = $data['idkamar'];
            $tipe  = $data['tipe'];
            $harga = $data['harga'];
            $gambar = $data['gambar'];

            $sql2 = mysqli_query($conn, "SELECT * FROM stokkamar WHERE idkamar='$ambilId'");
            $data2 = $sql2->fetch_assoc();
            $stok = $data2['stok'];
            ?>
            <!-- Page Heading -->
            <h1 class="h3 mb-4 text-gray-800 text-center">EDIT KAMAR</h1>
            <form method="POST" action="../function/prosesedit.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Id Kamar</label>
                    <input type="text" name="id" class="form-control" id="exampleInputText1" aria-describedby="textHelp" value="<?= $id; ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputText1" class="form-label">Tipe Kamar</label>
                    <input type="text" name="txtTipe" class="form-control" id="exampleInputText1" aria-describedby="textHelp" value="<?= $tipe; ?>">
                </div>
                <div class=" mb-3">
                    <label for="exampleInputText1" class="form-label">Harga</label>
                    <input type="text" name="txtHarga" class="form-control" id="exampleInputText1" value="<?= $harga; ?>">
                </div>
                <div class=" mb-3">
                    <label for="exampleInputText1" class="form-label">Stok</label>
                    <input type="text" name="txtStok" class="form-control" id="exampleInputText1" value="<?= $stok; ?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Foto Tipe Kamar</label>
                    <input type="file" name="fileGambar" id="fileGambar" class="form-control mb-2">
                    <img src="../images/<?= $gambar; ?>" width="200px" alt="">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
        <!-- /.container-fluid -->
    </div>

    <?php require_once "view/footer.php"; ?>

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

<!-- BOOTSTRAP JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<!-- Custom scripts for all pages-->
<script src="js/sb-admin-2.min.js"></script>

</body>

</html>