<?php

require_once "view/header.php";

if (isset($_POST['ok'])) {
    $in   = $_POST['checkIn'];
    $out  = $_POST['checkOut'];
    $type = $_POST['hargaType'];

    $sql  = mysqli_query($conn, "SELECT * FROM kamar WHERE tipe='$type'");
    $data = $sql->fetch_assoc();
    $idkamar   = isset($data['idkamar']) ? $data['idkamar'] : '-';
    $typeKamar = isset($data['tipe']) ? $data['tipe'] : '-';
    $jumlah    = isset($data['jumlah']) ? $data['jumlah'] : '-';
    $gambar    = isset($data['gambar']) ? $data['gambar'] : '-';
    $harga     = isset($data['harga']) ? $data['harga'] : '-';
    $hargaN    = number_format($harga, 0, ',', '.');

    $sql2  = mysqli_query($conn, "SELECT * FROM stokkamar WHERE tipe='$type'");
    $data2 = $sql2->fetch_assoc();
    $stok2 = isset($data2['stok']) ? $data2['stok'] : '0';
}

date_default_timezone_set("Asia/Jakarta");

$today = new DateTime();
$tglPesan = $today->format('Y-m-d H:i:s') . PHP_EOL;
$today->add(new DateInterval('PT5H'));
$jam = $today->format('Y-m-d H:i:s') . PHP_EOL;


if (isset($_POST['klik'])) {
    $ambil = $_GET['id'];

    $sql = mysqli_query($conn, "SELECT * FROM kamar WHERE idkamar='$ambil'");
    $dataKamar = $sql->fetch_assoc();
    $idkamar2  = isset($dataKamar['idkamar']) ? $dataKamar['idkamar'] : '-';
    $tipe      = isset($dataKamar['tipe']) ? $dataKamar['tipe'] : '-';
    $jumlah2   = isset($dataKamar['jumlah']) ? $dataKamar['jumlah'] : '-';
    $harga2    = isset($dataKamar['harga']) ? $dataKamar['harga'] : '-';
    $gambar    = isset($dataKamar['gambar']) ? $dataKamar['gambar'] : '-';
    $hargaX    = number_format($harga2, 0, ',', '.');

    $sql3 = mysqli_query($conn, "SELECT * FROM stokkamar WHERE idkamar='$ambil'");
    $dataStokKamar = $sql3->fetch_assoc();
    $stok = isset($dataStokKamar['stok']) ? $dataStokKamar['stok'] : '-';
}
?>

<script type="text/javascript">
    function hitung() {
        var jumlahstok = parseFloat(document.cekstok.stok.value);
        var jumlahpesan = parseFloat(document.cekstok.jumlah.value);
        var harga = parseFloat(document.cekstok.harga.value);

        //date_default_timezone_set("Asia/Makassar");
        var tglsekarang = new Date();
        var dd = tglsekarang.getDate();
        var mm = tglsekarang.getMonth() + 1;
        var yy = tglsekarang.getFullYear();
        if (dd < 10) {
            dd = '0' + dd;
        }
        if (mm < 10) {
            mm = '0' + mm;
        }
        tglsekarang = dd + '/' + mm + '/' + yy;

        var tglin = document.cekstok.tglcekin.value;
        var tglout = document.cekstok.tglcekout.value;

        //var tglin2 = date('Y-m-d H:i:s', tglin);

        var tglcin = tglin.split('-');
        var tglcout = tglout.split('-');
        var tglcekk = tglsekarang.split('-');

        var objektgl = new Date();

        var tglmasuk = objektgl.setFullYear(tglcin[0], tglcin[1], tglcin[2]);
        var tglkeluar = objektgl.setFullYear(tglcout[0], tglcout[1], tglcout[2]);
        var cektgl = objektgl.setFullYear(tglcekk[0], tglcekk[1], tglcekk[2]);

        var selisih = (tglkeluar - tglmasuk) / (60 * 60 * 24 * 1000);

        var cek = (tglmasuk - cektgl) / (60 * 60 * 24 * 1000);

        if (jumlahpesan > jumlahstok) {
            alert("Maaf.. Stok Kamar Tidak Cukup");
            document.cekstok.jumlah.value = "Pilih";
            document.cekstok.total.value = "";
        } else {

            document.cekstok.lama.value = selisih;
            var hitungharga = harga * jumlahpesan * selisih;
            // var reverse = hitungharga.toString().split('').reverse().join(''),
            //     ribuan = reverse.match(/\d{1,3}/g);
            // ribuan = ribuan.join('.').split('').reverse().join('');
            document.cekstok.total.value = hitungharga;
            if ((selisih || hitungharga || cek) < 0) {
                alert("Pilih Tanggal Dengan Benar!!!");
                document.cekstok.lama.value = 0;
                document.cekstok.total.value = 0;
            }
        }
    }
</script>
<center>
    <div id="imglog">
        <p><br>>>Pesan Kamar<br>&nbsp;</p>
    </div>
    <div id="pemesanan">

        <div id="pesankamar2">
            <?php
            if (isset($_POST['ok'])) {
            ?>
                <form method="post" action="../function/prosespesan" name="cekstok" enctype="multipart/form-data">
                    <table width="380px">
                        <tr align="center">
                            <td colspan="2" style="width:300px;"><img src="../images/<?= $gambar; ?>" width='200px' height='150px' style="border:5px solid #B40301; margin-bottom: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td>
                                <input type="hidden" name="tglpesan" readonly="true" value="<?= $tglPesan; ?>">
                                <input type="hidden" name="jamexpire" readonly="true" value="<?= $jam; ?>">

                                <input type="text" name="tipe" readonly="true" value="<?= $typeKamar; ?>">
                                <input type="hidden" name="idkamar" readonly="true" value="<?= $idkamar; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga / Malam</td>
                            <td><input type="text" readonly="true" value="<?= "Rp. " . $hargaN; ?>">
                                <input type="hidden" name="harga" readonly="true" value="<?= $harga; ?>">
                                <input type="hidden" name="stok" readonly="true" value="<?= $stok2; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar</td>
                            <td>
                                <select name="jumlah" onchange="hitung()" required="required" style="font-weight: bold; border: 2px solid #B40301">
                                    <option>-Pilih-</option>
                                    <script>
                                        for (var i = 1; i <= 50; i++) {
                                            document.write("<option>" + i + "</option>");
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><input type="text" name="nama" value="<?php echo $nama ?>">
                                <input type="hidden" name="idtamu" readonly="true" value="<?= $id ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><input type="text" name="telepon" value="<?= $telepon; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-In</td>
                            <td><input type="date" value="<?php echo $in ?>" min="<?php echo date('d-m-Y') ?>" required="required" onchange="hitung()" name="tglcekin" style="font-family: arial"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-Out</td>
                            <td><input type="date" value="<?php echo $out ?>" required="required" onchange="hitung()" name="tglcekout" style="font-family: arial"></td>
                        </tr>
                        <tr>
                            <td>Lama Menginap</td>
                            <td><input type="text" name="lama" onchange="hitung()" readonly="true" style="width: 100px;"> Malam</td>
                        </tr>
                        <tr>
                            <td>Total Biaya</td>
                            <td><input type="text" name="total" onchange="hitung()" readonly="true"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="mt-3" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:5px;border:2px solid #B40301;">Pesan Kamar</button></td>
                        </tr>
                    </table>
                </form>
            <?php
            }

            if (isset($_POST['klik'])) {
            ?>

                <form method="post" action="../function/prosespesan" name="cekstok" enctype="multipart/form-data">
                    <table width="380px">
                        <tr align="center">
                            <td colspan="2" style="width:300px;"><img src="../images/<?php echo $gambar ?>" width='200px' height='150px' style="border:5px solid #B40301; margin-bottom: 30px;"></td>
                        </tr>
                        <tr>
                            <td>Tipe Kamar</td>
                            <td>
                                <input type="hidden" name="tglpesan" readonly="true" value="<?php echo $tglPesan ?>">
                                <input type="hidden" name="jamexpire" readonly="true" value="<?php echo $jam ?>">

                                <input type="text" name="tipe" readonly="true" value="<?php echo $tipe ?>">
                                <input type="hidden" name="idkamar" readonly="true" value="<?php echo $idkamar2 ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Harga / Malam</td>
                            <td><input type="text" readonly="true" value="<?= "Rp. " . $hargaX; ?>">
                                <input type="hidden" name="harga" readonly="true" value="<?= $harga2; ?>">
                                <input type="hidden" name="stok" readonly="true" value="<?= $stok; ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Jumlah Kamar</td>
                            <td>
                                <select name="jumlah" onchange="hitung()" required="required" style="font-weight: bold; border: 2px solid #B40301">
                                    <option>Pilih</option>
                                    <script>
                                        for (var i = 1; i <= 50; i++) {
                                            document.write("<option>" + i + "</option>");
                                        }
                                    </script>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Nama Lengkap</td>
                            <td><input type="text" name="nama" value="<?php echo $nama ?>">
                                <input type="hidden" name="idtamu" readonly="true" value="<?= $id ?>">
                            </td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td><input type="text" name="alamat" value="<?= $alamat; ?>"></td>
                        </tr>
                        <tr>
                            <td>No. Telepon</td>
                            <td><input type="text" name="telepon" value="<?= $telepon; ?>"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-In</td>
                            <td><input type="date" min="<?php echo date('d-m-Y') ?>" required="required" onchange="hitung()" name="tglcekin" style="font-family: arial"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Check-Out</td>
                            <td><input type="date" required="required" onchange="hitung()" name="tglcekout" style="font-family: arial"></td>
                        </tr>
                        <tr>
                            <td>Lama Menginap</td>
                            <td><input type="text" name="lama" onchange="hitung()" readonly="true" style="width: 100px;"> Malam</td>
                        </tr>
                        <tr>
                            <td>Total Biaya</td>
                            <td><input type="text" name="total" onchange="hitung()" readonly="true"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="mt-3" style="width:100px;background:#B40301; color:white;font-weight:bold;padding:5px;border:2px solid #B40301;">Pesan Kamar</button></td>
                        </tr>
                    </table>
                </form>
            <?php
            }
            ?>

        </div>