<!DOCTYPE html>
<html>

<head>
  <title></title>
  <script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>

  <?php
  include "koneksi.php";
  $idpesan = $_POST['txtid'];
  $nama = $_POST['txtnama'];
  $jumlah = $_POST['txtjumlah'];
  $bank = $_POST['txtbank'];
  $norek = $_POST['txtnorek'];
  $namarek = $_POST['txtnamarek'];

  $namaFile = $_FILES['gambar']['name'];
  $ukuranFile = $_FILES['gambar']['size'];
  $error = $_FILES['gambar']['error'];
  $tmpName = $_FILES['gambar']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar = explode('.', $namaFile);
  $ekstensiGambar = strtolower(end($ekstensiGambar));
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
			  </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru = uniqid();
  $namaFileBaru .= '.';
  $namaFileBaru .= $ekstensiGambar;

  //$sqlsimpan = mysqli_query($conn, "INSERT INTO pembayaran(idpesan, nama, jumlah, bank, norek, namarek, gambar) VALUES('$idpesan', '$nama', '$jumlah', '$bank', '$norek', '$namarek', '$namaFileBaru')");

  move_uploaded_file($tmpName, '../images/' . $namaFileBaru);



  $namaFile2 = $_FILES['gambar2']['name'];
  $ukuranFile2 = $_FILES['gambar2']['size'];
  $error2 = $_FILES['gambar2']['error'];
  $tmpName2 = $_FILES['gambar2']['tmp_name'];

  // cek apakah tidak ada gambar yang diupload
  if ($error === 4) {
    echo "<script>
				alert('pilih gambar terlebih dahulu!');
			  </script>";
    return false;
  }

  // cek apakah yang diupload adalah gambar
  $ekstensiGambarValid2 = ['jpg', 'jpeg', 'png'];
  $ekstensiGambar2 = explode('.', $namaFile);
  $ekstensiGambar2 = strtolower(end($ekstensiGambar2));
  if (!in_array($ekstensiGambar, $ekstensiGambarValid2)) {
    echo "<script>
				alert('yang anda upload bukan gambar!');
			  </script>";
    return false;
  }

  // cek jika ukurannya terlalu besar
  if ($ukuranFile2 > 1000000) {
    echo "<script>
				alert('ukuran gambar terlalu besar!');
			  </script>";
    return false;
  }

  // lolos pengecekan, gambar siap diupload
  // generate nama gambar baru
  $namaFileBaru2 = uniqid();
  $namaFileBaru2 .= '.';
  $namaFileBaru2 .= $ekstensiGambar;

  $sqlsimpan2 = mysqli_query($conn, "INSERT INTO pembayaran(idpesan, nama, jumlah, bank, norek, namarek, gambar, gambar2) VALUES('$idpesan', '$nama', '$jumlah', '$bank', '$norek', '$namarek', '$namaFileBaru', '$namaFileBaru2')");

  move_uploaded_file($tmpName2, '../images/' . $namaFileBaru2);

  // return $namaFileBaru;

  echo "<script>swal({
	  	type: 'success',
	  	title: 'Konfirmasi Pembayaran Terkirim!',
	  	showConfirmButton: false,
	  	backdrop: 'rgba(0,0,123,0.5)',
		});
		window.setTimeout(function(){
			window.location.replace('../user/datapesanan');
 		} ,1500);</script>";
  ?>

</body>

</html>