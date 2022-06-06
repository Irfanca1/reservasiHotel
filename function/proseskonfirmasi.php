<?php
require_once "koneksi.php";
$ambil = $_GET['id'];

$sql = mysqli_query($conn, "SELECT * FROM pemesanan WHERE idpesan = $ambil");
while ($row = $sql->fetch_assoc()) {
    $idpesan = $row['idpesan'];

    $sqlupdate = mysqli_query($conn, "UPDATE pemesanan SET status='Berhasil..' WHERE idpesan=$idpesan");
    echo "<script>alert('Transaksi Berhasil!');document.location.href='../admin2/transaksiberhasil';</script>";
}
