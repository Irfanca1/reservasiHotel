<?php
session_start();

require_once '../function/koneksi.php';

if ($_SESSION['role'] != 'admin') {
?>
    <html>

    <head>
        <title></title>
        <script type="text/javascript" src="../lib/sweet.js"></script>
    </head>

    <body>
        <script>
            swal({
                title: 'Oops...?',
                text: 'Silahkan Login Terlebih Dahulu!',
                showConfirmButton: false,
                type: 'warning',
                backdrop: 'rgba(123,0,0,1)',
            });
            window.setTimeout(function() {
                window.location.replace('../');
            }, 2000);
        </script>;
    </body>

    </html>
<?php
}


$ambil    = $_SESSION['login'];
$sql      = mysqli_query($conn, "SELECT * FROM tamu WHERE idtamu='$ambil'");
$data     = $sql->fetch_assoc();
$id       = isset($data['idtamu']) ? $data['idtamu'] : '-';
$username = isset($data['username']) ? $data['username'] : '-';
$role     = isset($data['role']) ? $data['role'] : '-';
$email    = isset($data['email']) ? $data['email'] : '-';
$nama     = isset($data['nama']) ? $data['nama'] : '-';
$alamat   = isset($data['alamat']) ? $data['alamat'] : '-';
$telepon  = isset($data['telepon']) ? $data['telepon'] : '-';
$password = isset($data['password']) ? $data['password'] : '-';
$foto     = isset($data['foto']) ? $data['foto'] : '-';

$bts = 22;
$nmak = strlen($nama);
if ($nmak > $bts) {
    $nm = substr($nama, 0, $bts) . '...';
} else {
    $nm = $nama;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Hotel | Admin </title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
    <!-- Custom styles for this template-->
    <link href="./css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./css/rooms.css">


</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">NAMA Hotel</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="./index.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <!-- <div class="sidebar-heading"> -->

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-bed"></i>
                    <span>Kamar</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./lihatkamar.php">Lihat Kamar</a>
                        <a class="collapse-item" href="./tambahkamar.php">Tambah Kamar</a>
                        <a class="collapse-item" href="cards.html">Tipe Kamar</a>
                    </div>
                </div>
            </li>

            <!-- Check IN / Out -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-key"></i>
                    <span>Transaksi</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./databayar.php">Data Pembayaran</a>
                        <a class="collapse-item" href="./konfirmasipesanan.php">Konfirmasi Pesanan</a>
                        <a class="collapse-item" href="./transaksibatal.php">Transaksi Batal</a>
                        <a class="collapse-item" href="./transaksiberhasil.php">Transaksi Berhasil</a>
                    </div>
                </div>
            </li>


            <!-- Room Services -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                    <i class="fas fa-fw fa-dolly-flatbed"></i>
                    <span>Room Services</span>
                </a>
                <div id="collapseThree" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">Pesan Layanan / Produk</a>
                        <a class="collapse-item" href="cards.html">Pembersihan Kamar</a>
                    </div>
                </div>
            </li>


            <!-- Layanan -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                    <i class="fas fa-fw fa-utensils"></i>
                    <span>Layanan</span>
                </a>
                <div id="collapseFour" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">Lihat Layanan</a>
                        <a class="collapse-item" href="cards.html">Tambah Layanan</a>
                        <a class="collapse-item" href="cards.html">Kategori Layanan</a>
                    </div>
                </div>
            </li>

            <!-- Buku Tamu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                    <i class="fas fa-fw fa-book"></i>
                    <span>Buku Tamu</span>
                </a>
                <div id="collapseFive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="buttons.html">Lihat Buku Tamu</a>
                    </div>
                </div>
            </li>



            <!-- User Manager -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapse6" aria-expanded="true" aria-controls="collapse6">
                    <i class="fas fa-fw fa-user"></i>
                    <span>User Manager</span>
                </a>
                <div id="collapse6" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="./datapengguna.php">Lihat Pengguna User</a>
                        <a class="collapse-item" href="./datapenggunaadmin.php">Lihat Pengguna Admin</a>
                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->