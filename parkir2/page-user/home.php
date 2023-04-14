<?php include "../function.php";?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-user/head.php" ?>

<body class="sb-nav-fixed">
    
    <?php include "../component-user/navbar.php" ?>

    <div id="layoutSidenav">
        
        <?php include "../component-user/sidebar.php"?>

        <div id="layoutSidenav_content">
            <div class="row mt-3 ml-2">
                <div class="col-5">
                    <!-- Card Selamat datang -->
                    <div class="row mt-0">
                        <div class="card">
                            <div class="card-body ml-3">
                                <div class="card-title">
                                    <h4 class="font-weight-bold">Hi, selamat datang <?= ucwords($nama_depan);?><i class="fa-solid fa-hand-peace ml-1" style="color: #ffb000;"></i></h4>
                                </div>
                                <div class="card-text mt-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <a type="button" class="btn btn-danger mt-1" style="width: 45px">
                                                <i class="fa fa-calendar"></i>
                                            </a>   
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Tanggal</b></span><br/>
                                            <span><?php echo date("d F Y"); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-1">
                                            <a href="topup.php" type="button" class="btn btn-info mt-1" style="width: 45px">
                                                <i class="fa fa-credit-card"></i>
                                            </a>
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Saldo E-money</b></span><br/>
                                            <span><?= "Rp " . number_format($e_money, 2, ",", ".");?></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Book -->
                    <div class="row">
                        <div class="col-6 pl-0 pr-1">
                            <div class="card" style="background: #E2FFE0">
                                <div class="card-body text-center">
                                    <div class="card-title">
                                        <h5>Booking Parkir</h5>
                                        <a type="button" href="booking.php" class="btn btn-success mt-2">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pr-0 pl-1">
                            <div class="card" style="background: #FFFEE0">
                                <div class="card-body text-center">
                                    <div class="card-title">
                                        <h5>Lihat Riwayat Booking</h5>
                                        <a type="button" href="berlangsung.php" class="btn btn-warning mt-2">Riwayat</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>

                    <!-- Pusat Layanan -->
                    <div class="row">
                        <div class="card">
                            <div class="card-body ml-3">
                                <div class="card-title">
                                    <h4>Pusat Layanan</h4>
                                </div>
                                <div class="card-text mt-3">
                                    <div class="row">
                                        <div class="col-1">
                                            <a type="button" class="btn btn-primary mt-1" style="width: 45px">
                                                <i class="fab fa-facebook fa-lg"></i>
                                            </a>   
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Facebook</b></span><br/>
                                            <span>E-Parkir Medan</span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-1">
                                            <a type="button" class="btn btn-dark mt-1" style="width: 45px">
                                                <i class="fab fa-instagram fa-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Instagram</b></span><br/>
                                            <span>e_parkir_mdn</span>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-1">
                                            <a type="button" class="btn btn-success mt-1" style="width: 45px">
                                                <i class="fab fa-whatsapp fa-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Whatsapp</b></span><br/>
                                            <span>0812-1212-0000</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Carousel mall rekomendasi -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="card-title mb-3">
                                <h4>Rekomendasi Mall di Medan</h4>
                            </div>
                            <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
                                <div class="carousel-indicators">
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                    <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                </div>
                                <div class="carousel-inner rounded">
                                    <div class="carousel-item active">
                                        <div style="background: black;">
                                            <img src="../img/sunplaza.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Sun Plaza">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <h5>Sun Plaza</h5>
                                            <p>Sun Plaza sudah terkenal sejak dulu dan sampai sekarang masih tetap ramai dikunjungi</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background: black;">
                                            <img src="../img/centrepoint.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Centre Point">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <h5>Centre Point</h5>
                                            <p>Mall yang satu ini sering dijadikan sebagi tempat untuk berbagai bazzar menarik.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background: black;">
                                            <img src="../img/delipark.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Delipark">
                                        </div>
                                        <div class="carousel-caption">
                                            <h5>Delipark</h5>
                                            <p>Salah satu mall terbaru di kota Medan, memiliki toko-toko branded dan taman yang keren di dalam mall.</p>
                                        </div>
                                    </div>
                                </div>
                                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </button>
                                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>             
            </div>
        </div>
        
    </div>
    
    <?php include "../component-user/script.php"?>
</body>
</html>