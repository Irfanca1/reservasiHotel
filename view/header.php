<?php
session_start();

require_once "function/koneksi.php";

if (isset($_SESSION['login'])) {
    if ($_SESSION['role'] == "user") {
        echo "<script>window.location.replace('user/')</script>";
    }
    // else if ($_SESSION['role'] == "admin") {
    //     echo "<script>window.location.replace('admin/')</script>";
    // }
} else {
    unset($_SESSION['login']);
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
                    <a class="nav-link text-light" href="register.php">Register</a>
                    <a class="nav-link text-light" href="login.php">Login</a>
                </div>
            </div>
        </div>
    </nav>

    <main>