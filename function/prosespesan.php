<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>

    <?php
    include "koneksi.php";
    $tglPesan  = $_POST["tglpesan"];
    $jamexpire = $_POST['jamexpire'];
    $tipe      = $_POST['tipe'];
    $idkamar   = $_POST['idkamar'];
    $harga     = $_POST['harga'];
    $jumlah    = $_POST['jumlah'];
    $nama      = $_POST['nama'];
    $idtamu    = $_POST['idtamu'];
    $alamat    = $_POST['alamat'];
    $telepon   = $_POST['telepon'];
    $tglcekin  = $_POST['tglcekin'];
    $tglcekout = $_POST['tglcekout'];
    $lama      = $_POST['lama'];
    $total     = $_POST['total'];

    $sql = mysqli_query($conn, "INSERT INTO pemesanan(tglpesan, batasbayar, idkamar, tipe, harga, jumlah, idtamu, nama, alamat, telepon, tglmasuk, tglkeluar, lamahari, totalbayar, status) 
    VALUES('$tglPesan', '$jamexpire', '$idkamar', '$tipe', '$harga', '$jumlah', '$idtamu', '$nama', '$alamat', '$telepon', '$tglcekin', '$tglcekout', '$lama', '$total', 'Pending...')");


    $sqlStok = mysqli_query($conn, "SELECT * FROM stokkamar WHERE idkamar=$idkamar");
    $data    = $sqlStok->fetch_assoc();
    $stok    = $data['stok'];
    $hitung  = $stok - $jumlah;
    $sqlUpdate = mysqli_query($conn, "UPDATE stokkamar SET stok='$hitung' WHERE idkamar='$idkamar'");

    echo "<script>swal({
        type: 'success',
        title: 'Pemesanan Kamar Terkirim',
        showConfirmButton: false,
        backdrop: 'rgba(0,0,123,0.5)',
      });
      window.setTimeout(function(){
          window.location.replace('../user/datapesanan');
       } ,1500);</script>";
    ?>

</body>

</html>