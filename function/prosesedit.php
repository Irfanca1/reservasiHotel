<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>
    <?php

    include "koneksi.php";
    $id    = $_POST['id'];
    $tipe  = $_POST['txtTipe'];
    $harga = $_POST['txtHarga'];
    $stok  = $_POST['txtStok'];
    $gambar = $_FILES['fileGambar']['name'];

    // $namaFile   = $_FILES['fileGambar']['name'];
    // $ukuranFile = $_FILES['fileGambar']['size'];
    // $error      = $_FILES['fileGambar']['error'];
    // $tmpName    = $_FILES['fileGambar']['tmp_name'];

    // // cek apakah tidak ada gambar yang diupload
    // if ($error === 4) {
    //     echo "<script>
    // 			alert('pilih gambar terlebih dahulu!');
    //             window.location.replace('../admin2/lihatkamar');
    // 		  </script>";
    //     return false;
    // }

    // // cek apakah yang diupload adalah gambar
    // $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    // $ekstensiGambar      = explode('.', $namaFile);
    // $ekstensiGambar      = strtolower(end($ekstensiGambar));
    // if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    //     echo "<script>
    // 			alert('yang anda upload bukan gambar!');
    //             window.location.replace('../admin2/lihatkamar');
    // 		  </script>";
    //     return false;
    // }

    // // cek jika ukurannya terlalu besar
    // if ($ukuranFile > 1000000) {
    //     echo "<script>
    // 			alert('ukuran gambar terlalu besar!');
    //             window.location.replace('../admin2/lihatkamar');
    // 		  </script>";
    //     return false;
    // }

    // // lolos pengecekan, gambar siap diupload
    // // generate nama gambar baru
    // $namaFileBaru = uniqid();
    // $namaFileBaru .= '.';
    // $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($_FILES['fileGambar']['name'], '../images/' . $gambar);

    if (!empty($gambar)) {
        $sqlsimpan = mysqli_query($conn, "UPDATE kamar SET idkamar='$id', tipe='$tipe', harga='$harga', gambar='$gambar' WHERE idkamar='$id'");
        $sqlsimpan2 = mysqli_query($conn, "UPDATE stokkamar SET stok='$stok' WHERE idkamar='$id'");
    } else if (empty($gambar)) {
        $sqlsimpan = mysqli_query($conn, "UPDATE kamar SET idkamar='$id', tipe='$tipe', harga='$harga' WHERE idkamar='$id'");
        $sqlsimpan2 = mysqli_query($conn, "UPDATE stokkamar SET stok='$stok' WHERE idkamar='$id'");
    }

    echo "<script>swal({
    type: 'success',
    title: 'Data Kamar Berhasil Di Edit!',
    showConfirmButton: false,
    backdrop: 'rgba(0,0,123,0.5)',
  });
  window.setTimeout(function(){
      window.location.replace('../admin2/lihatkamar');
   } ,1500);</script>";
    ?>
</body>

</html>