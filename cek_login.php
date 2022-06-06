<?php
// Mengaktifkan session pada php 
session_start();

// Menghubungkan php dengan koneksi database
include 'function/koneksi.php';

if (isset($_POST['login'])) {
    // Menangkap data yang dikiran dari form login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql   = mysqli_query($conn, "SELECT * FROM tamu WHERE username='$username'");
    // $data  = $sql->fetch_assoc();
    $login = mysqli_query($conn, "SELECT * FROM tamu WHERE username='$username'");
    $cek   = mysqli_num_rows($login);


    if ($cek > 0) {
        $data = mysqli_fetch_assoc($login);

        if (password_verify($password, $data["password"])) {
            $_SESSION['login'] = $data['idtamu'];

            if ($data['role'] === "admin") {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = "admin";
                header("location:admin2/index.php");
            } else if ($data['role'] === "user") {
                $_SESSION['username'] = $username;
                $_SESSION['role'] = "user";
                header("location:user/index.php");
            }
            exit;
        } else {
            header("location:login.php?pesan=gagal");
        }
    } else {
        header("location:login.php?pesan=usertidakada");
    }
}
