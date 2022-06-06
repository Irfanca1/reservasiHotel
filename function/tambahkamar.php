<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>
    <?php
    include "koneksi.php";

    $id    = $_POST['txtId'];
    $tipe  = $_POST['txtTipe'];
    $harga = $_POST['txtHarga'];
    $stok  = $_POST['txtStok'];

    $namaFile   = $_FILES['fileGambar']['name'];
    $ukuranFile = $_FILES['fileGambar']['size'];
    $error      = $_FILES['fileGambar']['error'];
    $tmpName    = $_FILES['fileGambar']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
        echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar      = explode('.', $namaFile);
    $ekstensiGambar      = strtolower(end($ekstensiGambar));
    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
        return false;
    }

    // cek jika ukurannya terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
				alert('ukuran gambar terlalu besar!');
                window.location.replace('../admin2/tambahkamar');
			  </script>";
        return false;
    }

    // lolos pengecekan, gambar siap diupload
    // generate nama gambar baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    $sqlsimpan = mysqli_query($conn, "INSERT INTO kamar(idkamar, tipe, harga, gambar) VALUES('$id', '$tipe', '$harga', '$namaFileBaru')");
    $sqlsimpan = mysqli_query($conn, "INSERT INTO stokkamar(idkamar, tipe, stok) VALUES('$id', '$tipe', '$stok')");

    move_uploaded_file($tmpName, '../images/' . $namaFileBaru);

    echo "<script>swal({
    type: 'success',
    title: 'Penambahan Data Kamar Berhasil!',
    showConfirmButton: false,
    backdrop: 'rgba(0,0,123,0.5)',
  });
  window.setTimeout(function(){
      window.location.replace('../admin2/lihatkamar');
   } ,1500);</script>";
    ?>
</body>

</html>