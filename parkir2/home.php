<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Parkir Sun Plaza</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link href="css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/style2.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    *{
        font-family: Arial;
    }
    body{
        background: #E9E9E9;
    }
    .card{
        box-shadow: 11px 10px 20px 0px rgba(0,0,0,0.1);
        -webkit-box-shadow: 11px 10px 20px 0px rgba(0,0,0,0.1);
        -moz-box-shadow: 11px 10px 20px 0px rgba(0,0,0,0.1);
    }
</style>
<body class="sb-nav-fixed">
    <nav class="sb-topnav navbar navbar-expand navbar-light bg-light">
        <a class="navbar-brand" href="home.php">E-Parkir</a>
        <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        <!-- Navbar Search-->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
            <div class="input-group">
                <!-- <input class="form-control" type="text" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" /> -->
                <!-- <div class="input-group-append">
                    <button class="btn btn-primary" type="button"><i class="fas fa-search"></i></button>
                </div> -->
            </div>
        </form>
        <!-- Navbar-->
        <ul class="navbar-nav ml-auto ml-md-0">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                    <!-- <a class="dropdown-item" href="#">Settings</a> -->
                    <!-- <a class="dropdown-item" href="#">Activity Log</a> -->
                    <!-- <div class="dropdown-divider"></div> -->
                    <a class="dropdown-item" href="login.php">Logout</a>
                </div>
            </li>
        </ul>
    </nav>
    <div id="layoutSidenav">
        <div id="layoutSidenav_nav">
            <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
                <div class="sb-sidenav-menu">
                    <div class="nav">
                        <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                        <a class="nav-link" href="home.php">
                            <div class="ikon"><img src="img/home.svg"></div>
                            &nbsp;&nbsp;Beranda
                        </a>

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="ikon"><img src="img/booking.svg"></div>
                            &nbsp;&nbsp;Booking E-Parkir
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts1" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="lantai1.php">Lantai 1 </a>
                                <a class="nav-link" href="lantai2.php">Lantai 2</a>
                                <a class="nav-link" href="lantai3.php">Lantai 3</a>
                            </nav>
                        </div>
                        
                        <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                            <div class="ikon"><img src="img/history.svg"></div>
                            &nbsp;&nbsp;Riwayat Booking
                            <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                        </a>
                        <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                            <nav class="sb-sidenav-menu-nested nav">
                                <a class="nav-link" href="berlangsung.php">Sedang Berlangsung</a>
                                <a class="nav-link" href="selesai.php">Telah Selesai</a>
                                <a class="nav-link" href="cancel.php">Cancel</a>
                            </nav>
                        </div>            
                    </div>
                </div>
                <div class="sb-sidenav-footer">
                    <div class="small">Logged in as:</div>
                    user1@gmail.com
                </div>
            </nav>
        </div>
        <div id="layoutSidenav_content">
            <div class="row mt-3">
                
                <div class="col-5">
                    <!-- Card Selamat datang -->
                    <div class="row mt-0">
                        <div class="card">
                            <div class="card-body ml-3">
                                <div class="card-title">
                                    <h4>Hi, Selamat Datang ~NamaDepan~ <i class="fa-solid fa-hand-peace ml-1" style="color: #ffb000;"></i></h4>
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
                                            <span><?php echo date("d F Y", ); ?></span>
                                        </div>
                                        
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-1">
                                            <a type="button" class="btn btn-info mt-1" style="width: 45px">
                                                <i class="fa fa-credit-card"></i>
                                            </a>
                                        </div>
                                        <div class="col-8 ml-4">
                                            <span><b>Saldo E-money</b></span><br/>
                                            <span>Rp 1.000.000,00</span>
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
                                        <a type="button" class="btn btn-success mt-2">Book</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pr-0 pl-1">
                            <div class="card" style="background: #FFFEE0">
                                <div class="card-body text-center">
                                    <div class="card-title">
                                        <h5>Lihat Riwayat Booking</h5>
                                        <a type="button" class="btn btn-warning mt-2">Riwayat</a>
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
                                            <span>E-Parkir</span>
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
                                            <span>e_parkir</span>
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
                
                <!-- Card mall rekomendasi -->
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
                                            <img src="img/sunplaza.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Sun Plaza">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <h5>Sun Plaza</h5>
                                            <p>Sun Plaza sudah terkenal sejak dulu dan sampai sekarang masih tetap ramai dikunjungi</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background: black;">
                                            <img src="img/centrepoint.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Centre Point">
                                        </div>
                                        
                                        <div class="carousel-caption">
                                            <h5>Centre Point</h5>
                                            <p>Mall yang satu ini sering dijadikan sebagi tempat untuk berbagai bazzar menarik.</p>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div style="background: black;">
                                            <img src="img/delipark.jpg" class="d-block w-100" style="opacity: 0.7;" alt="Delipark">
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
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>