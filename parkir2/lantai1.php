<?php
    session_start();
    require 'functions.php';

    $dataParkir = query("SELECT * FROM slot_parkir WHERE lantai = 1");

    if ( isset($_POST["book"])){
        if(!empty($_POST['lantai']) && !empty($_POST['id']) && !empty($_POST['plat']) && !empty($_POST['kedatangan'])){
            if(tambahData($_POST) > 0){
                echo "berhsail";
                header("Location:check-in.php");
            } else {
                echo "gagal";
                header("Location:lantai1.php");
            }
        }
    } 
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>E-Parkir Sun Plaza</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" href="css/stylederick.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="home.html">E-Parkir Sun Plaza</a>
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
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                            <a class="nav-link" href="home.html">
                                <div class="ikon"><img src="img/home-white.svg"></div>
                                &nbsp;&nbsp;Beranda
                            </a>

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="ikon"><img src="img/booking-white.svg"></div>
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
                                <div class="ikon"><img src="img/history-white.svg"></div>
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
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Booking Parkir</h1>
                      
                        <div class="card mb-4">
                            <div class="card-header">
                                Tempat: <span class="jelas"><a href="https://www.google.com/search?q=sun%20plaza&oq=Sun+p&aqs=chrome.0.0i131i355i433i512j46i131i175i199i433i512j0i512j69i57j46i175i199i512j0i512j69i60l2.1395j0j7&sourceid=chrome&ie=UTF-8&newwindow=1&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=ALiCzsa4-3IDbdC4INwTth_K3ZrNNCdb8A:1669460970096&rflfq=1&num=10&rldimm=17628865813867731586&lqi=CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ&ved=2ahUKEwiq49rg2sv7AhX_CLcAHVF5BLUQvS56BAgJEAE&sa=X&rlst=f#rlfi=hd:;si:17628865813867731586,l,CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ;mv:[[3.5841524,98.6725819],[3.5809189,98.667999]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2">Sun Plaza</a></span>
                            </div>
                            <div class="card-body">
                            
                                <form action="" method="post">

                                  
                                    <div class="row">
                                            <label>Lantai:</label>
                                            <input type="hidden" name="lantai" value="1">
                                            <input type="text" placeholder="Lantai 1" name="lantai" value="1" class="form-control form-control-sm" readonly>
                                    </div>
                                    
                                        <div class="row">
                                            <div class="bg-white shadow-lg rounded p-5">
                                                <div class="btn-group-toggle" data-toggle="buttons">
                                                    <div class="row d-flex justify-content-center">
                                                        <!-- A1-A5 -->
                                                        <?php 
                                                            $i = 1;
                                                            foreach( $dataParkir as $row): 
                                                                
                                                                if($row["statusS"] == "Available"){
                                                                    $color = "success";
                                                                    $tombol = "active";
                                                                } else {
                                                                    $color = "danger";
                                                                    $tombol = "disabled";
                                                                }
                                                                if($i <= 5){
                                                        ?>  
                                                                    <div class="card text-white bg-<?= $color; ?> text-center mx-4" style="height: 250px; width: 170px;">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title text-bg-dark mb-4"><?= $row["nama_slot"]; ?></h5>
                                                                            <h6 class="card-subtitle m-2 text-white"><?= $row["statusS"]; ?></h6>

                                                                            <?php 
                                                                                if($row["statusS"] == "Available"):
                                                                            ?>
                                                                                    <div class="btn btn-primary mt-5 pt-3 px-4">
                                                                                        <input type="hidden" name="id" value="<?= $row["id_slot"]; ?>" >
                                                                                        <input type="radio" name="nama_slot" value="<?= $row["nama_slot"]; ?>" id="<?= $row["nama_slot"]; ?>" style="display:none;">
                                                                                        <label for="<?= $row["nama_slot"]; ?>">Book</label>
                                                                                        <!-- <button type="submit" name="id" value="<?php //$row["nama_slot"]; ?>" id="<?php // $row["nama_slot"]; ?>" class="btn btn-primary mt-5 pt-3 py-3 px-4 active" class="warna-tombol">Book</button> -->
                                                                                    </div>
                                                                            <?php else :?>
                                                                                    <a href="#" class="btn btn-primary disabled mt-5 py-3 px-4">Book</a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                        <?php   
                                                                    
                                                                }
                                                                $i++;                                            
                                                            endforeach;
                                                        ?>
                                                    </div>
                                                    
                                                    <div class="row d-flex justify-content-center">
                                                        <!-- A6-A10 -->
                                                        <?php 
                                                            $i = 1;
                                                            foreach( $dataParkir as $row): 
                                                                
                                                                if($row["statusS"] == "Available"){
                                                                    $color = "success";
                                                                    $tombol = "active";
                                                                } else {
                                                                    $color = "danger";
                                                                    $tombol = "disabled";
                                                                }
                                                                if($i > 5){
                                                        ?>  
                                                                    <div class="card text-white bg-<?= $color; ?> text-center mx-4" style="height: 250px; width: 170px;">
                                                                        <div class="card-body">
                                                                            <h5 class="card-title text-bg-dark mb-4"><?= $row["nama_slot"]; ?></h5>
                                                                            <h6 class="card-subtitle m-2 text-white"><?= $row["statusS"]; ?></h6>

                                                                            <?php 
                                                                                if($row["statusS"] == "Available"):
                                                                            ?>
                                                                                    <div class="btn btn-primary mt-5 pt-3 px-4">
                                                                                        <input type="hidden" name="id"value="<?= $row["id_slot"]; ?>">
                                                                                        <input type="radio" name="nama_slot" value="<?= $row["nama_slot"]; ?>" id="<?= $row["nama_slot"]; ?>" style="display:none;" >
                                                                                        <label for="<?= $row["nama_slot"]; ?>">Book</label>
                                                                                        <!-- <button type="submit" name="id" value="<?php //$row["nama_slot"]; ?>" id="<?php // $row["nama_slot"]; ?>" class="btn btn-primary mt-5 pt-3 py-3 px-4 active" class="warna-tombol">Book</button> -->
                                                                                    </div>
                                                                            <?php else :?>
                                                                                    <a href="#" class="btn btn-primary disabled mt-5 py-3 px-4">Book</a>
                                                                            <?php endif; ?>
                                                                        </div>
                                                                    </div>
                                                                    
                                                        <?php   
                                                                    
                                                                }
                                                                $i++;                                            
                                                            endforeach;
                                                        ?>
                                                    </div>
                                                    
                                                </div>      
                                            </div>
                                        </div>
                                  
                                    <div class="row">
                                        Nomor Plat Kendaraan:
                                        <input type="text" class="form-control form-control-sm" name="plat" placeholder="BK 123 AA" autocomplete="off" required>
                                        <label for="wkt">Waktu Kedatangan:</label>
                                        <input type="datetime-local"  id="wktdtg" name="kedatangan" class="form-control form-control-sm" required>  
                                    </div>
                                    <div class="row">
                                        <a href="check-in.php">
                                            <button type="submit" class="btn btn-primary" name="book">
                                                Booking Tempat Parkir
                                            </button>
                                        </a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                   
                </main>
               
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