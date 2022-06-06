<?php
require_once "view/header.php";
?>

<aside style="height: auto; margin-bottom: 5px;">
    <center>
        <div id="imglog">

            <p><br>>>Data Pemesanan Kamar<br>&nbsp;</p>
        </div>

        <div id="rekening" style="width: 60%; height: 200px;">
            <h1>Rekening Hotel Horison</h1>
            <table style="width: 98%;">
                <tr style="text-align: center; border: 2px solid #B40301">
                    <td><img src="../gambar/mandiri.png" align="left" width="200px" height="150px"></td>
                    <td style="color: #B40301; border-right: 2px solid #B40301;">0000-00-000000-000</td>
                    <td><img src="../gambar/bca.jpg" align="left" width="200px" height="150px"></td>
                    <td style="color: #B40301;" ;>1111-11-111111-111</td>
                </tr>
                <tr style="text-align: center; border: 2px solid #B40301">
                    <td><img src="../gambar/bni.png" align="left" width="200px" height="150px"></td>
                    <td style="color: #B40301; border-right: 2px solid #B40301">2222-22-222222-222</td>
                    <td><img src="../gambar/bri.png" align="left" width="200px" height="150px"></td>
                    <td style="color: #B40301;">3333-33-333333-333</td>
                </tr>
            </table>
        </div>

        <div id="pemesanan">
            <?php
            require_once "../function/koneksi.php";
            $sql = mysqli_query($conn, "SELECT * FROM pemesanan WHERE idtamu = $ambil ORDER BY idpesan DESC");
            while ($data = $sql->fetch_assoc()) {
                $idpesan    = $data['idpesan'];
                $tglpesan   = $data['tglpesan'];
                $batasbayar = $data['batasbayar'];
                $idkamar    = $data['idkamar'];
                $tipe       = $data['tipe'];
                $harga      = $data['harga'];
                $jumlah     = $data['jumlah'];
                $idtamu     = $data['idtamu'];
                $namax      = $data['nama'];
                $alamat     = $data['alamat'];
                $telepon    = $data['telepon'];
                $tglmasuk   = $data['tglmasuk'];
                $tglkeluar  = $data['tglkeluar'];
                $lamahari   = $data['lamahari'];
                $totalbayar = $data['totalbayar'];
                $status     = $data['status'];

                $tglpesann = date('d/m/Y', strtotime($tglpesan));
                $tglmasukk = date('d/m/Y', strtotime($tglmasuk));
                $tglkeluarr = date('d/m/Y', strtotime($tglkeluar));
                $batasbayarr = date('d/m/Y', strtotime($batasbayar));
                $batasjam = date('H:i:s', strtotime($batasbayar));

                $hargaa = number_format($harga, 0, ",", ".");
                $angka = number_format($totalbayar, 0, ",", ".");

            ?>
                <div id="pesankamar" style="margin-top: 200px;">
                    <table width="300px">
                        <tr align="border-right">
                            <td colspan="2">Kode Transaksi : <?= $idpesan ?>
                                <input type="hidden" name="idd" value="<?= $idpesan ?>">
                            </td>
                        </tr>
                        <tr align="border-right">

                            <td colspan="2">
                                <?php
                                $sqly = mysqli_query($conn, "SELECT * FROM kamar WHERE idkamar=$idkamar");
                                while ($datay = $sqly->fetch_assoc()) {
                                    $gambary = $datay['gambar'];
                                ?>
                                    <img src="../images/<?= $gambary ?>" width='120px' height='120px' style="margin-left: 30px;border:2px solid #B40301;">
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Pemesanan</td>
                            <td><?= $tglpesann ?></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td><?= $tipe ?></td>
                        </tr>
                        <tr>
                            <td>Harga / Hari</td>
                            <td>Rp. <?= $hargaa ?></td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar</td>
                            <td><?= $jumlah ?></td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><?= $namax ?>
                                <input type="hidden" name="namax" value="<?= $namax ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><?= $alamat ?></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><?= $telepon ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-In</td>
                            <td><?= $tglmasukk ?></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-Out</td>
                            <td><?= $tglkeluarr ?></td>
                        </tr>
                        <tr>
                            <td>Lama Menginap</td>
                            <td><?= $lamahari ?> Hari</td>
                        </tr>
                        <tr style="background: #B40301;" align="center">
                            <td style="color: white">Total Bayar</td>
                            <td style="color: white">Rp. <?= $angka ?>
                                <input type="hidden" name="total" value="<?= $totalbayar ?>">
                            </td>
                        </tr>
                        <tr>
                            <?php
                            if ($status == "Berhasil..") {
                                echo '<td colspan="2" align="center" style="background: green;color: white;">Status Transaksi :';
                            } else if ($status == "Pending...") {
                                echo '<td colspan="2" align="center" style="background: blue;color: white;">Status Transaksi :';
                            } else {
                                echo '<td colspan="2" align="center" style="background: black;color: white;">Status Transaksi :';
                            }
                            date_default_timezone_set("Asia/Makassar");
                            $tglsekarang = date('Y-m-d H:i:s');
                            if ($tglsekarang > $batasbayar) {
                                echo "Dibatalkan";
                                $updatestatus = mysqli_query($conn, "UPDATE pemesanan SET status='Dibatalkan' WHERE idpesan=$idpesan");
                            } else {
                                echo $status;
                                if ($status == "Pending...") {

                                    $sqly = mysqli_query($conn, "SELECT * FROM pembayaran WHERE idpesan='$idpesan'");
                                    $datay = $sqly->fetch_assoc();
                                    $idbayar = isset($datay['idpesan']) ? $datay['idpesan'] : '-';
                                    if ($idbayar == $idpesan) {
                                        echo "<br><p style='background: yellow; color: black'>Menunggu Verifikasi Pembayaran</p>";
                                    } else {
                                        echo "<br>Menunggu Proses Pembayaran<br>
							<p style='background:#B40301;'>Segera Lakukan Pembayaran Sebelum :</p>
							<p style='background:#B40301;'>Tanggal : $batasbayarr <br>Jam : $batasjam</p>
							Jika Tidak Transaksi Anda Dibatalkan<br>";
                            ?>
                                        <a href="bayar.php?id=<?= $idpesan ?>"><button id="bbayar" style="width:150px;background:yellow;color:black;font-weight:bold;padding:4px;border:2px solid white; margin-bottom: 3px;">Konfirmasi Pembayaran</button></a>
                            <?php
                                    }
                                }
                            }


                            ?>
                            </td>
                        </tr>
                    </table>

                </div>
            <?php
            }
            ?>
    </center>
    </div>
</aside>