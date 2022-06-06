<?php
require_once('view/header.php');
?>
<!-- Link CSS -->
<div>
    <link rel="stylesheet" href="./css/home.css">
</div>
<!-- end link css -->
<script type="text/javascript">
    function pilih() {
        let type = document.opsi.tipe.value;
        let teks = document.getElementById('select').options[document.getElementById('select').selectedIndex].text;
        document.opsi.harga.value = type;
        document.opsi.hargaType.value = teks;

    }
</script>
<!-- ISI CONTENT -->
<h1>INI ADALAH HALAMA USER LOGIN</h1>
<a href="logout.php">LOGOUT</a>
<div id="carouselExampleDark" class="carousel carousel-dark slide mb-5 mt-5" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleDark" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
            <img src="images/yayaq-destination-ptj2xDWxEJU-unsplash.jpg" class="m-auto d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-light fw-bold">First slide label</h5>
                <p class="text-light fw-bold">Some representative placeholder content for the first slide.</p>
            </div>
        </div>
        <div class="carousel-item" data-bs-interval="2000">
            <img src="images/mar-ko-pQ5hSOrkYgE-unsplash.jpg" class="m-auto d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-light fw-bold">Second slide label</h5>
                <p class="text-light fw-bold">Some representative placeholder content for the second slide.</p>
            </div>
        </div>
        <div class="carousel-item">
            <img src="images/smartworks-coworking-E7Tzh2TTS6c-unsplash.jpg" class="m-auto d-block w-50" alt="...">
            <div class="carousel-caption d-none d-md-block">
                <h5 class="text-light fw-bold">Third slide label</h5>
                <p class="text-light fw-bold">Some representative placeholder content for the third slide.</p>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="prev">
        <span class="carousel-control-prev-icon text-light" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleDark" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

<div id="reservasi">
    <p class="text-center fs-3 fw-bold text-light">Reservation</p>
    <form action="" method="POST" name="opsi">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col" class="text-center text-light">Tanggal Booking</th>
                    <th scope="col" class="text-center text-light">Check-In</th>
                    <th scope="col" class="text-center text-light">Check-Out</th>
                    <th scope="col" class="text-center text-light">Type</th>
                    <th scope="col" class="text-center text-light">Harga/Malam</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="text-center">
                        <input type="text" placeholder="<?= date('d-m-Y'); ?>" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" disabled>
                    </td>
                    <td class="text-center">
                        <input type="date" name="checkIn" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </td>
                    <td class="text-center">
                        <input type="date" name="checkOut" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
                    </td>
                    <td class="text-center">
                        <select class="type form-select" name="tipe" id="select" onchange="pilih()" required aria-label="Default select example">
                            <option selected disabled>-Pilih-</option>
                            <option value="Rp.410.000">Superior</option>
                            <option value="Rp.450.000">Deluxe</option>
                            <option value="Rp.700.000">Junior Suite</option>
                            <option value="Rp.1.200.000">Executive</option>
                        </select>
                    </td>
                    <td class="text-center">
                        <input type="text" name="harga" class="form-control" aria-describedby="inputGroup-sizing-default" disabled onchange="pilih()">
                        <input type="hidden" name="hargaType" class="form-control" aria-describedby="inputGroup-sizing-default" onchange="pilih()">
                    </td>
                    <td class="text-center">
                        <button type="submit" name="ok" id="tombol" class="btn btn-success">Pesan</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>
<section>
    <p class="text-center text-dark fs-3 fw-bold mt-3">About Us</p>
    <div class="row">
        <div class="col-6 content-about">
            <p class="text-dark">
                Untuk pelancong bisnis dan liburan yang canggih dan berpengalaman, yang menghargai
                kualitas dan menginginkan hotel yang ramah dan mudah diakses, Kami menyediakan
                fasilitas yang nyaman dan layanan yang dipersonalisasi.
            </p><br>
            <p class="text-dark">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis debitis dolorum sapiente ducimus doloribus
                magnam minus at commodi, necessitatibus quos accusantium deserunt dolores vel voluptates voluptatibus numquam? Non,
                illum deserunt.
            </p>
            <p class="text-dark">
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Quis debitis dolorum sapiente ducimus doloribus
                magnam minus at commodi, necessitatibus quos accusantium deserunt dolores vel voluptates voluptatibus numquam? Non,
                illum deserunt.
            </p>
        </div>
    </div>
</section>


<?php
require_once('view/footer.php');
?>