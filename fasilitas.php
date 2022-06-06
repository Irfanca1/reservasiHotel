<?php
require_once('view/header.php');
?>

<!-- css modal -->

<style>
    /* The Modal (background) */
    .modal {
        display: none;
        /* Hidden by default */
        position: fixed;
        /* Stay in place */
        z-index: 1;
        /* Sit on top */
        left: 0;
        top: 0;
        width: 100%;
        /* Full width */
        height: 100%;
        /* Full height */
        overflow: hidden;
        /* Enable scroll if needed */
        background-color: rgb(0, 0, 0);
        /* Fallback color */
        background-color: rgba(0, 0, 0, 0.4);
        /* Black w/ opacity */
    }

    /* Modal Content/Box */
    .modal-content {
        background-color: #fefefe;
        margin: 5% auto;
        /* 15% from the top and centered */
        padding: 20px;
        border: 1px solid #888;
        width: 80%;
        /* Could be more or less, depending on screen size */
    }

    /* The Close Button */
    .close {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
    }

    .close:hover,
    .close:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
    }

    #myBtn {
        border: none;
    }
</style>



<!-- link css -->
<div>
    <link rel="stylesheet" href="./css/fasilitas.css">
    <link rel="stylesheet" href="./lib/lightbox.min.css">
    <script src="./lib/lightbox.js"></script>
    <script src="./lib/lightbox-plus-jquery.min.js"></script>
</div>








<!-- Isi Content -->
<div class="hero-page">
    <div class="container">
    </div>
</div>

<div class="page-fasilitas">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 content-ex">
                <h2 class="text-center">INFINITY HOTEL </h2>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Eaque cumque incidunt ullam est esse provident reiciendis sequi ipsa at temporibus. Dicta quas quidem doloribus nisi quis in aspernatur ratione adipisci. Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam maiores aut atque nostrum perferendis dicta, blanditiis mollitia, quisquam aliquam nulla, voluptates sint! Placeat non id dicta obcaecati? Vel, beatae minus.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/wifi.png">
                <h5>Wifi</h5>
                <p>Lorem ipsum dolor, consectetur adipisicing.</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/salad.png">
                <h5>24h Restaurant</h5>
                <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Explicabo, maiores autem</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/meeting.png">
                <h5>Meeting Room</h5>
                <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Dignissimos?</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/smoking.png">
                <h5>Smoking Area</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Repellat modi enim recusandae blanditiis.</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/swiming.png">
                <h5>Swiming Pool</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing.</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/bath.png">
                <h5>Bath Room</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolorem!</p>
            </div>
            <div class="col-md-3 fasilitas-content">
                <img src="images/icon/phone.png">
                <h5>Telephone</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur, dolorem.</p>
            </div>
        </div>
    </div>
</div>

<div class="page-gallery">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center">GALLERY</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 p-3 gallery-img">
                <a href="images/lobby.jpg" data-lightbox="gallery">
                    <img src="images/lobby.jpg" alt="#" style="width: 400px; height: 300px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-12 p-3 gallery-img">
                <a href="images/eat.jpg" data-lightbox="gallery">
                    <img src="images/eat.jpg" alt="#" style="width: 400px; height: 300px;">
                </a>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 col-sm-12 p-3 gallery-img">
                <a href="images/meet.jpg" data-lightbox="eat">
                    <img src="images/meet.jpg" alt="#" style="width: 400px; height: 300px;">
                </a>
            </div>
            <div class="col-md-6 col-sm-12 p-3 gallery-img">
                <a href="images/swim.jpg" data-lightbox="eat">
                    <img src="images/swim.jpg" alt="#" style="width: 400px; height: 300px;">
                </a>
            </div>
        </div>
    </div>
</div>







<?php
require_once('view/footer.php');
?>