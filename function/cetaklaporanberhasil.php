<?php
require_once "koneksi.php";

require_once("../fpdf184/fpdf.php");

$query  = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status='Berhasil..'");
$pdf = new FPDF('L', 'cm', 'A4');

$pdf->SetMargins(0.5, 1, 1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial', 'B', 12);
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 14);
$pdf->Cell(30, 0.7, "LAPORAN TRANSAKSI PEMESANAN BATAL", 0, 10, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 10);
$pdf->Cell(5, 0.7, "Print On : " . date("D-d/m/Y"), 0, 0, 'C');
$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(1, 0.8, 'NO', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TANGGAL PESAN', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'TIPE', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'HARGA', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'JUMLAH', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'NAMA', 1, 0, 'C');
$pdf->Cell(4.5, 0.8, 'ALAMAT', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TELEPON', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TANGGAL MASUK', 1, 0, 'C');
$pdf->Cell(3, 0.8, 'TANGGAL KELUAR', 1, 0, 'C');
$pdf->Cell(2, 0.8, 'TOTAL', 1, 0, 'C');
$pdf->SetFont('Arial', '', 8);
$pdf->ln();
$no = 1;
# PANGGIL TABLE PEMESANAN DARI DATABASE 
$query = mysqli_query($conn, "SELECT * FROM pemesanan WHERE status='Berhasil..'");
while ($row = mysqli_fetch_assoc($query)) {
    # QUERY TABEL YANG INGIN DITAMPILKAN
    $harga = $row['harga'];
    $total = $row['totalbayar'];
    $totalFormat = number_format($total, 0, ',', '.');
    $hargaFormat = number_format($harga, 0, ',', '.');
    $pdf->Cell(1, 0.8, $no, 1, 0, 'L');
    $pdf->Cell(3, 0.8, $row['tglpesan'], 1, 0, 'L');
    $pdf->Cell(2, 0.8, $row['tipe'], 1, 0, 'L');
    $pdf->Cell(2, 0.8, "Rp. " . $hargaFormat, 1, 0, 'L');
    $pdf->Cell(2, 0.8, $row['jumlah'], 1, 0, 'L');
    $pdf->Cell(3, 0.8, $row['nama'], 1, 0, 'L');
    $pdf->Cell(4.5, 0.8, $row['alamat'], 1, 0, 'L');
    $pdf->Cell(3, 0.8, $row['telepon'], 1, 0, 'L');
    $pdf->Cell(3, 0.8, $row['tglmasuk'], 1, 0, 'L');
    $pdf->Cell(3, 0.8, $row['tglkeluar'], 1, 0, 'L');
    $pdf->Cell(2, 0.8, "Rp. " . $totalFormat, 1, 0, 'L');

    $no++;
    $pdf->ln();
}

$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(40.5, 0.7, "Approve", 0, 10, 'C');

$pdf->ln(1);
$pdf->SetFont('Arial', 'B', 9);
$pdf->Cell(40.5, 0.7, "Technical Name", 0, 10, 'C');
# NAMA FILE KETIKA DI PRINT
$pdf->Output("laporan_berhasil.pdf", "I");
// $sql = $query->fetch_assoc();
// $data = array();
// while ($sql) {
//     array_push($data, $sql);
// }

// # SETTING JUDUL LAPORAN DAN HEADER TABEL
// $judul = "LAPORAN DATA PEMESANAN HOTEL TRANSAKSI SUKSES";
// $header = array(
//     array("label" => "TANGGAL PESAN", "length" => "30", "align" => "C"),
//     array("label" => "ID KAMAR", "length" => "10", "align" => "C"),
//     array("label" => "TIPE", "length" => "30", "align" => "C"),
//     array("label" => "HARGA", "length" => "30", "align" => "C"),
//     array("label" => "JUMLAH", "length" => "30", "align" => "C"),
//     array("label" => "NAMA", "length" => "50", "align" => "C"),
//     array("label" => "ALAMAT", "length" => "80", "align" => "C"),
//     array("label" => "NO TELEPON", "length" => "30", "align" => "C"),
//     array("label" => "TANGGAL MASUK", "length" => "30", "align" => "C"),
//     array("label" => "TANGGAL KELUAR", "length" => "30", "align" => "C"),
//     array("label" => "LAMA MENGINAP", "length" => "30", "align" => "C"),
//     array("label" => "TOTAL", "length" => "30", "align" => "C"),
// );

// # SERTAKAN LIBRARY FPDF DAN BENTUK OBJEK
// $pdf = new FPDF();
// $pdf->AddPage();

// # TAMPILKAN JUDUL LAPORAN
// $pdf->SetFont('Arial', '', '12');
// $pdf->SetFillColor(163, 231, 92);
// $pdf->SetTextColor(255);
// $pdf->SetDrawColor(128, 0, 0);
// foreach ($header as $kolom) {
//     $pdf->Cell($kolom['length'], 5, $kolom['label'], 1, 0, $kolom['align'], true);
// }
// $pdf->ln;

// # TAMPILKAN DATA TABELNYA 
// $pdf->SetFillColor(244, 235, 255);
// $pdf->SetTextColor(0);
// $pdf->SetFont('');
// $fill = false;
// foreach ($data as $baris) {
//     $i = 0;
//     foreach ($baris as $cell) {
//         $pdf->cell($header[$i]['length'], 5, $cell, 1, '0', $kolom['align'], $fill);
//         $i++;
//     }
//     $fill = !$fill;
//     $pdf->ln();
// }

// # OUTPUT FILE PDF
// $pdf->Output();
