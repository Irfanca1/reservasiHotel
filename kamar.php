<?php
require_once('view/header.php');
?>

<!-- Link CSS -->
<div>
  <link rel="stylesheet" href="./css/rooms.css">
</div>
<!-- end link css -->

<div class="card-sec">
  <div class="container">
    <div class="row mt-5 card-wrapper">
      <div class="row mt-5">
        <div class="col-12">
          <h2 class="text-center">PILIHAN KAMAR</h2>
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
                <img src="images/<?= $gambar; ?>" alt="Room" />
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
                <button type="button" class="btn-detail btn-warning">Detail</button>
                <a href="user/pemesanan.php"><button type="button" name="pesanKamar" class="btn-pesan btn-success">Pesan</button></a>
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

<?php
require_once('view/footer.php');
?>