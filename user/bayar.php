<?php
require_once "view/header.php";

$ambilx = $_GET['id'];

$sqlx = mysqli_query($conn, "SELECT * FROM pemesanan WHERE idpesan='$ambilx'");
$datax = $sqlx->fetch_assoc();
$idpesan = $datax['idpesan'];
$nama = $datax['nama'];
$total = $datax['totalbayar'];

?>

<div id="imglog">
	<p><br>>>Konfirmasi Pembayaran<br>&nbsp;</p>
</div>
<center>

	<div class="datapesan" style="background: rgba(0,123,123,0.6);padding: 10px;">

		<div style="width: 60%;background: rgba(0,0,123,0.6);padding: 10px;">

			<form method="post" action="../function/prosesbayar.php" enctype="multipart/form-data">
				<table style="width: 90%;padding: 10px;margin: 10px;">
					<caption style="color: white;">Konfirmasi Pembayaran</caption>
					<tr>
						<td>ID Pemesanan</td>
						<td><input type="text" readonly="readonly" required="required" name="txtid" value="<?php echo $idpesan ?>"></td>
					</tr>
					<tr>
						<td>Nama Lengkap</td>
						<td><input type="text" readonly="readonly" required="required" name="txtnama" value="<?php echo $nama ?>"></td>
					</tr>
					<tr>
						<td>Jumlah Bayar</td>
						<td><input type="text" readonly="readonly" required="required" name="txtjumlah" value="<?php echo $total ?>"></td>
					</tr>
					<tr>
						<td>Bank</td>
						<td>
							<select name="txtbank" required="required" style="font-weight: bold">
								<option hidden="hidden">-Pilih Bank-</option>
								<option>Mandiri</option>
								<option>BCA</option>
								<option>BNI</option>
								<option>BRI</option>
							</select>
						</td>
					</tr>
					<tr>
						<td>No. rekening</td>
						<td><input type="text" required="required" name="txtnorek"></td>
					</tr>
					<tr>
						<td>Nama Pemilik Rekening</td>
						<td><input type="text" required="required" name="txtnamarek"></td>
					</tr>
					<tr>
						<td>Upload Bukti Transfer</td>
						<td><input type="file" name="gambar" id="gambar" required="required"></td>
					</tr>
					<tr>
						<td>Upload Bukti 2</td>
						<td><input type="file" name="gambar2" id="gambar2" required="required"></td>
					</tr>
				</table>
				<input type="submit" name="submit" value="Kirim" id="tombol" class="text-dark">
			</form>
		</div>
</center>
</div>
</aside>