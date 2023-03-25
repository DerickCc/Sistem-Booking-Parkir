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
            <a class="navbar-brand" href="index.html">E-Parkir Sun Plaza</a>
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
                        <a class="dropdown-item" href="login.html">Logout</a>
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
                            <a class="nav-link" href="index.html">
                                <div class="ikon"><img src="img/booking-white.svg"></div>
                                &nbsp;&nbsp;Booking E-Parkir
                            </a>
                            <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                                <div class="ikon"><img src="img/history-white.svg"></div>
                                &nbsp;&nbsp;Riwayat Booking
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="berlangsung.php">Sedang Berlangsung</a>
                                    <a class="nav-link" href="selesai.php">Telah Selesai</a>
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
                        <--/div> -->
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
                        <div class="card mb-4">
                            <div class="card-header">
                                Tempat: <span class="jelas"><a href="https://www.google.com/search?q=sun%20plaza&oq=Sun+p&aqs=chrome.0.0i131i355i433i512j46i131i175i199i433i512j0i512j69i57j46i175i199i512j0i512j69i60l2.1395j0j7&sourceid=chrome&ie=UTF-8&newwindow=1&tbs=lf:1,lf_ui:2&tbm=lcl&sxsrf=ALiCzsa4-3IDbdC4INwTth_K3ZrNNCdb8A:1669460970096&rflfq=1&num=10&rldimm=17628865813867731586&lqi=CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ&ved=2ahUKEwiq49rg2sv7AhX_CLcAHVF5BLUQvS56BAgJEAE&sa=X&rlst=f#rlfi=hd:;si:17628865813867731586,l,CglzdW4gcGxhemFIjPLInLyBgIAIWhsQABABGAAYASIJc3VuIHBsYXphKgYIAhAAEAGSAQ9zaG9wcGluZ19jZW50ZXKaASNDaFpEU1VoTk1HOW5TMFZKUTBGblNVUlBhVTl0UmtwbkVBRQ;mv:[[3.5841524,98.6725819],[3.5809189,98.667999]];tbs:lrf:!1m4!1u3!2m2!3m1!1e1!1m4!1u2!2m2!2m1!1e1!2m1!1e2!2m1!1e3!3sIAE,lf:1,lf_ui:2">Sun Plaza</a></span>
                            </div>
                            <div class="card-body">
                                <!-- <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </thead>
                                        <tfoot>
                                            <tr>
                                                <th>Name</th>
                                                <th>Position</th>
                                                <th>Office</th>
                                                <th>Age</th>
                                                <th>Start date</th>
                                                <th>Salary</th>
                                            </tr>
                                        </tfoot>
                                        <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>System Architect</td>
                                                <td>Edinburgh</td>
                                                <td>61</td>
                                                <td>2011/04/25</td>
                                                <td>$320,800</td>
                                            </tr>
                                        
                                        </tbody>
                                    </table>
                                </div> -->
                                <form action="functions.php" method="post">

                                    <div class="dropdown mt-4">
                                        <button class="btn btn-dark shadow-sm dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown">
                                            Lantai 1
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a class="dropdown-item" href="lantai/lantai1.php" name="lantai" value="1">Lantai 1</a></li>
                                            <li><a class="dropdown-item" href="lantai/lantai2.php" name="lantai" value="2">Lantai 2</a></li>
                                            <li><a class="dropdown-item" href="lantai/lantai3.php" name="lantai" value="3">Lantai 3</a></li>
                                        </ul>
                                    </div>
                                </form>
                                    <!-- <div class="row">
                                            <label>Lantai:</label>
                                            <select name="lantai" class="form-control form-control-sm" required>
                                                <option value="1" required><a href=""></a> </option>
                                                <option value="2" required>2</option>
                                                <option value="3" required>3</option>
                                                <option value="4" required>4</option>
                                                <option value="5" required>5</option>
                                            </select>
                                    </div> -->
                                    
                                        <!-- <div class="row">
                                            <div class="bg-white shadow-lg rounded p-5">
                                                <div class="row d-flex justify-content-center">
                                                    Available
                                                    <div class="card text-white bg-success text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-dark mb-4">P1</h5>
                                                            <h6 class="card-subtitle m-2 text-white">Available</h6>
                                                            <button class="btn btn-primary mt-5" value="P1" name="nomor_parkir">Book</button>
                                                            <form action="functions.php" method="POST">
                                                                <input type="text" style="display:none;" value="P1" name="nomor_parkir">
                                                                <button class="btn btn-primary mt-5" type="submit">Book</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                   Unavailable
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P2</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P3</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P4</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-success text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-dark mb-4">P5</h5>
                                                            <h6 class="card-subtitle m-2 text-white">Available</h6>
                                                            <button class="btn btn-primary mt-5" value="P5" name="nomor_parkir">Book</button>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row my-4">
                                                    <hr class="mt-3">
                                                </div>
                                                <div class="row d-flex justify-content-center">
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P6</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P7</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-success text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-dark mb-4">P8</h5>
                                                            <h6 class="card-subtitle m-2 text-white">Available</h6>
                                                            <input type="radio" class="btn btn-primary mt-5" value="P8" name="nomor_parkir">P8
                                                            <div class="btn btn-primary mt-5">
                                                                <input type="radio" name="nomor_parkir" value="P8" id="P8" style="display:none;">
                                                                <label for="P8">Book</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P9</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                    <div class="card text-white bg-danger text-center mx-4" style="height: 250px; width: 170px;">
                                                        <div class="card-body">
                                                            <h5 class="card-title text-bg-secondary mb-4">P10</h5>
                                                            <h6 class="card-subtitle m-2 text-black">Unavailable</h6>
                                                            <a href="#" class="btn btn-secondary disabled mt-5">Book</a>
                                                        </div>
                                                    </div>
                                                </div>       
                                            </div>
                                        </div> -->
                                        <div class="row">
                                            <?php
                                                if(!isset($_GET['nomor_parkir'])){
                                                    // header("location: index.html");
                                                    exit();
                                                } 
                                                $nomor_parkir = $_GET['nomor_parkir'];
                                                // $url = "page1.php?username=". $username;
                                                echo "Hello $nomor_parkir, do you want to go to?";
                                            ?>
                                        </div>
                                        
                                    <div class="row">
                                        Lantai: 
                                        <input type="text" class="form-control form-control-sm" name="lantai" placeholder="" readonly>
                                        Nomor Parkir: 
                                        <input type="text" class="form-control form-control-sm" name="nomor_parkir" placeholder="05" readonly>
                                        Nomor Plat Kendaraan:
                                        <input type="text" class="form-control form-control-sm" name="plat" placeholder="BK 123 AA" autocomplete="off" required>
                                        <label for="wkt">Waktu Kedatangan:</label>
                                        <input type="datetime-local"  id="wktdtg" name="kedatangan" class="form-control form-control-sm">            
                                    </div>
                                    <div class="row">
                                        <a href="check-in.php">
                                            <button type="submit" class="btn btn-primary">
                                                Booking Tempat Parkir
                                            </button>
                                        </a>
                                    </div>
                                
                            </div>
                        </div>
                    </div>
                    <!-- <div class="bg-img"><img src="img/logosun.png" alt="sun logo"></div> -->
                </main>
                <!-- <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2020</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer> -->
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
