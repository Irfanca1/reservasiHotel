<?php
$conn = mysqli_connect("localhost", "root", "", "hotel2");

// Check Connection 
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function registrasi($data)
{
    global $conn;

    $username = strtolower(stripslashes($data["username"]));
    $email    = $data["email"];
    $nama     = strtoupper(stripslashes($data["nama"]));
    $alamat   = $data["alamat"];
    $telepon  = $data["telepon"];
    $password = $data["password"];
    $password2 = $data["password2"];

    // Cek Username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM tamu WHERE username='$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('USERNAME SUDAH TERDAFTAR!')
              </script>";
        return false;
    }

    // Cek konfirmasi password
    if ($password != $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // Tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO tamu(username, email, nama, alamat, telepon, password) 
    VALUES('$username', '$email', '$nama', '$alamat', '$telepon', '$password')");

    return mysqli_affected_rows($conn);
}

function cari($keyword)
{
    $query = "SELECT * FROM pembayaran
				WHERE
			  nama LIKE '%$keyword%' OR
			  idpesan LIKE '%$keyword%' OR
			  norek LIKE '%$keyword%'
			";
    return query($query);
}
