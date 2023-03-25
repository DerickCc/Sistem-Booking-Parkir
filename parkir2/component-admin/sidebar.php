<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <!-- <div class="sb-sidenav-menu-heading">Core</div> -->
                <a class="nav-link" href="home.php">
                    <div class="ikon"><img src="img/home.svg"></div>
                    &nbsp;&nbsp;Data Lokasi
                </a>

                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts1" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="ikon"><img src="img/booking.svg"></div>
                    &nbsp;&nbsp;Data Pengguna
                </a>
                
                <!-- <div class="sb-sidenav-menu-heading">Interface</div> -->
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts2" aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="ikon"><img src="img/history.svg"></div>
                    &nbsp;&nbsp;Laporan
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts2" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="berlangsung.php">Laporan Keuangan</a>
                        <a class="nav-link" href="selesai.php">Laporan Ini</a>
                        <a class="nav-link" href="cancel.php">Laporan Anu</a>
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