<?php
require_once('view/header.php');
?>
<div>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <style>
        .bg-login {
            background-image: url('images/login-img.jpg');
            background-size: cover;
            background-position: center;
        }
    </style>
</div>
<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    } else if ($_GET['pesan'] == "usertidakada") {
        echo "<div class='alert'>User tidak ditemukan !</div>";
    }
}
?>
<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
                                </div>
                                <form class="user" method="POST" enctype="multipart/form-data" action="cek_login.php">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" name="username" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password" id="exampleInputPassword" placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <input type="checkbox" name="remember" id="remember">
                                        <label for="remember">Remember me</label>
                                    </div>
                                    <input type="submit" value="LOGIN" name="login" class="btn btn-primary btn-user btn-block">
                                </form>
                                <hr>
                                <div class="text-center">
                                    <a class="small" href="register.php">Create an Account!</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<?php
require_once('view/footer.php');
?>