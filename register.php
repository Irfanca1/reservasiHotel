<?php
require_once('view/header.php');

require_once 'function/koneksi.php';

if (isset($_POST["submit"])) {

    if (registrasi($_POST) > 0) {
        echo "<script>
				alert('user baru berhasil ditambahkan!');
			  </script>";
    } else {
        echo mysqli_error($conn);
    }
}
?>
<div>
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</div>

<div class="container">

    <div class="card o-hidden border-0 shadow-lg my-5">
        <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
                <div class="col-lg-5 d-none d-lg-block" style="background-image: url('images/regis-img.jpg'); background-size:cover; background-position:center;"></div>
                <div class="col-lg-7">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Create an Account!</h1>
                        </div>
                        <form class="user" action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" name="nama" placeholder="Fullname">
                                <input type="hidden" name="idtamu">
                            </div>
                            <div class="form-group">
                                <input type="email" class="form-control form-control-user" id="exampleInputEmail" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" name="alamat" placeholder="Alamat">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" name="username" placeholder="Username">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleFirstName" name="telepon" placeholder="No Telepon">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password" placeholder="Password">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" name="password2" placeholder="Repeat Password">
                            </div>
                            <input type="submit" name="submit" class="btn btn-primary btn-user btn-block" value="Register Account">
                            <hr>
                        </form>
                        <div class="text-center">
                            <a class="small" href="login.php">Already have an account? Login!</a>
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