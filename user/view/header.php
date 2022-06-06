<?php
session_start();

require_once '../function/koneksi.php';

if ($_SESSION['role'] != 'user') {
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
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- BOOTSTRAP CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Pemesanan Kamar Pada Hotel Aston</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            overflow-x: hidden;
        }

        .navbar,
        .footer {
            background-color: rgb(2, 2, 34);
        }

        .footer img {
            width: 125px;
        }

        .footer ul {
            list-style: none;
        }

        .footer .copyright {
            height: 50px;
        }

        .alert {
            background: #e44e4e;
            color: white;
            padding: 10px;
            text-align: center;
            border: 1px solid #b32929;
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand ms-3 text-light fw-bold" href="#">LOGO</a>
            <button class="navbar-toggler text-light" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav text-light">
                    <a class="nav-link active text-light" aria-current="page" href="index.php">Home</a>
                    <a class="nav-link text-light" href="kamar.php">Kamar</a>
                    <a class="nav-link text-light" href="fasilitas.php">Fasilitas</a>
                </div>
            </div>
            <a class="nav-link text-light float-end"><?= $nama; ?></a>
            <div class="vertikal" style="width: 0px; height: 35px; border-left: 1px white solid;"></div>
            <a class="nav-link text-light float-end" href="logout.php">Logout</a>
        </div>
    </nav>

    <main>