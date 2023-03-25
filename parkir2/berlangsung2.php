<?php
    require 'functions.php';

    if( isset($_POST["cancel"])){ 
        cancel($_POST);
        header("Location:lantai1.php");
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
        <link rel="stylesheet" href="css/stylederick.css">
        <link rel="stylesheet" href="css/style2.css">
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
                        <h1 class="mt-4">Sedang Berlangsung</h1>
                        <!-- <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Sun Plaza</li>
                        </ol> -->
                        <!-- <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-area mr-1"></i>
                                        Area Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header">
                                        <i class="fas fa-chart-bar mr-1"></i>
                                        Bar Chart Example
                                    </div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div> -->

                            
                        <?php 
                            $query = "SELECT * FROM detail_booking WHERE statusB = 'Unavailable'";
                            // $query = "SELECT * FROM detail_booking WHERE statusB = 'aa' ";
                            $result = query($query);
                            $buttonAktif = "";
                            $i = 1;
                            if( mysqli_affected_rows($koneksi) >0 ):
                                foreach($result as $row): 
                        ?>
                                    <div class="card mb-4">
                                        <div class="card-header">
                                            Tempat: <span class="jelas"><a href="https://www.google.com/search?q=sun%20plaza&oq=Sun+p&aqs=chrome.0.0i131i355i433i512j46i131i175i199i433i512j0i512j69i57j46i175i199i512j0i512j69i60l2.1395j0j7&sourceid=chrome&ie=UTF-8&newwindow=1&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=ALiCzsa4-3IDbdC4INwTth_K3ZrNNCdb8A:1669460970096&rflfq=1&num=10&rldimm=17628865813867731586&lqi=CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ&ved=2ahUKEwiq49rg2sv7AhX_CLcAHVF5BLUQvS56BAgJEAE&sa=X&rlst=f#rlfi=hd:;si:17628865813867731586,l,CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ;mv:[[3.5841524,98.6725819],[3.5809189,98.667999]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2">Sun Plaza</a></span>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table width="100%">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>ID Pengguna</th>
                                                            <th>Nama Slot</th>
                                                            <th>Lantai</th>
                                                            <th>Plat Kendaraan</th>
                                                            <th>Waktu Kedatangan</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                            <tr>
                                                                <td> <span class='jelas'><?= $row["id"]; ?></span></td>
                                                                <td> <span class='jelas'><?= $row["id_pengguna"]; ?></span></td>
                                                                <td> <span class='jelas'><?= $row["nama_slot"]; ?></span></td>
                                                                <td> <span class='jelas'><?= $row["lantai"]; ?></span></td>
                                                                <td> <span class='jelas'><?= $row["plat"]; ?></span></td>
                                                                <td> <span class='jelas'><?= $row["kedatangan"]; ?></span><td>
                                                                <?php
                                                                    $id_booking = $row["id"];
                                                                    $nama_slot = $row["nama_slot"];
                                                                    
                                                                ?>
                                                                
                                                                    <td>
                                                                        <form action="check-out.php" method="post">
                                                                            <input type="hidden" name="id" value="<?= $id_booking;?>">
                                                                            <input type="hidden" name="nama_slot" value="<?= $nama_slot;?>">
                                                                            
                                                                            <!-- <div class="btn-group-vertical" role="group" aria-label="Vertical button">
                                                                                <button type="submit" class="btn btn-primary mb-3 px-3 rounded" name="in">Check-In</button>
                                                                                <button type="submit" class="btn btn-primary px-3 rounded" name="cancel">Cancel</button>
                                                                            </div> -->
                                                                            <!-- <div class="btn-group-vertical" role="group" aria-label="Vertical button"> -->
                                                                                <!-- <a href="check-out.php?idBook=<?php //$id_booking; ?>"> <button type="submit" class="btn btn-primary" name="in" <?php //$buttonAktif; ?> >Check-In</button> </a> -->

                                                                            <!-- <button type="submit" name="ini"><a href="check-out.php?idBook=<?php// echo "$id_booking" ; ?>">Button  di luar</a></button> -->
                                                                            <!-- Id ada tp gk bs akses ke database -->

                                                                            <button type="submit" name="in" class="btn btn-primary">Check-In</button>
                                                                            
                                                                            
                                                                            <!-- <a href="check-out.php?idBook=<?php// echo"$id_booking"; ?>"><button name="in">Button di dlm</button></a> -->
                                                                            <!-- Bs akses ke database tp gk bs tampil apa2 -->
                                                                            <button type="submit" class="btn btn-primary " name="cancel" <?= $buttonAktif; ?> >Cancel</button>
                                  
                                                                        </form>
                                                                        
                                                                    </td>
                                                                
                                                            </tr>
                                                        
                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>

                            
                            <?php
                                endforeach;
                            else:
                            ?>
                                <div class="card mb-4">
                                    <div class="card-header">
                                        Tempat: <span class="jelas"><a href="https://www.google.com/search?q=sun%20plaza&oq=Sun+p&aqs=chrome.0.0i131i355i433i512j46i131i175i199i433i512j0i512j69i57j46i175i199i512j0i512j69i60l2.1395j0j7&sourceid=chrome&ie=UTF-8&newwindow=1&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=ALiCzsa4-3IDbdC4INwTth_K3ZrNNCdb8A:1669460970096&rflfq=1&num=10&rldimm=17628865813867731586&lqi=CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ&ved=2ahUKEwiq49rg2sv7AhX_CLcAHVF5BLUQvS56BAgJEAE&sa=X&rlst=f#rlfi=hd:;si:17628865813867731586,l,CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ;mv:[[3.5841524,98.6725819],[3.5809189,98.667999]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2">Sun Plaza</a></span>
                                    </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table width="100%">
                                                <thead>
                                                    <tr>
                                                        <th>ID</th>
                                                        <th>ID Pengguna</th>
                                                        <th>Nama Slot</th>
                                                        <th>Lantai</th>
                                                        <th>Plat Kendaraan</th>
                                                        <th>Waktu Kedatangan</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td colspan="6" class="text-center pt-3"><span class="jelas">Tidak ada slot parkir yang sedang <u>berlangsung</u></span></td>
                                                        <td>
                                                            
                                                            <!-- <div class="btn-group-vertical" role="group" aria-label="Vertical button">
                                                                <button type="submit" class="btn btn-primary mb-3 px-3 rounded" name="in">Check-In</button>
                                                                <button type="submit" class="btn btn-primary px-3 rounded" name="cancel">Cancel</button>
                                                            </div> -->
                                                            <!-- <div class="btn-group-vertical" role="group" aria-label="Vertical button"> -->
                                                                <button type="submit" class="btn btn-primary " name="in" disabled >Check-In</button>
                                                                <button type="submit" class="btn btn-primary " name="cancel" disabled >Cancel</button>
                                                            <!-- </div> -->
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            <?php endif;?>
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
    </body>
</html>
