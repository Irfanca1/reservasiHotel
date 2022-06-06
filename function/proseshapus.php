<!DOCTYPE html>
<html>

<head>
    <title></title>
    <script type="text/javascript" src="../lib/sweet.js"></script>
</head>

<body>
    <?php

    include "koneksi.php";
    $id    = $_GET['id'];

    $sql2 = mysqli_query($conn, "DELETE FROM stokkamar WHERE idkamar='$id'");
    $sql = mysqli_query($conn, "DELETE FROM kamar WHERE idkamar='$id'");

    echo "<script>swal({
    type: 'success',
    title: 'Data Kamar Berhasil Di Hapus!',
    showConfirmButton: false,
    backdrop: 'rgba(0,0,123,0.5)',
  });
  window.setTimeout(function(){
      window.location.replace('../admin2/lihatkamar');
   } ,1500);</script>";
    ?>
</body>

</html>