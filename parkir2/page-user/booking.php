<?php include "../function.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-user/head.php" ?>

<body class="sb-nav-fixed">
    
    <?php include "../component-user/navbar.php" ?>

    <div id="layoutSidenav">
        
        <?php include "../component-user/sidebar.php"?>

        <div id="layoutSidenav_content">
            <div class="row">
                <!-- search -->
                <div class="card col-9 mx-auto mt-2 mb-3 px-0">
                    <div style="background: black">
                        <img src="../img/city.jpg" class="card-img-top w-100" style="opacity: 0.6; height: 300px;" alt="...">
                    </div>
                    <div class="card-img-overlay text-center text-white">
                        <h3 class="mt-5 pt-2">Mau Ke Mana Hari Ini?</h3>
                        <div class="input-group col-6 mt-4 mx-auto">
                            <input type="search" id="nama_lokasi" name= "nama_lokasi" class="form-control" placeholder="Cari Lokasi" autocomplete="off"/>
                            <button name="cariNamaLokasi" class="btn btn-theme" type="submit">
                                <i class="fas fa-search" style="color: white"></i>
                            </button> 
                        </div>
                    </div>
                </div>

                <!-- hasil search lokasi -->
                <div class="card col-9 mx-auto px-0 mb-3">
                    <div class="card-header text-white bg-theme py-0 pt-2">
                        <h4>Centre Point</h4>
                    </div>
                    <div class="card-body py-0 py-2">
                        <div class="row my-0">
                            <div class="col-10">
                                <b class="mr-1">Alamat</b>: Jalan Anu nomor anu
                            </div>
                            <div class="col-2">
                                <b>Rp4.000,00 / jam</b>
                            </div>
                            <div class="col-12">
                                <b class="mr-4">Tipe</b>: Gedung
                            </div>
                        </div>
                    </div>
                </div>

                <!-- rekomen -->
                <div class="card-group col-9 mt-2 mx-auto px-0">
                    <div class="card col-4 px-0 mr-2">
                        <img src="../img/city.jpg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Asia Mega Mas</b></h5>
                            <span>Salah satu tempat kuliner Medan yang populer di semua kalangan. Tempat ini terkenal akan makanan-makanan Chinese yang tidak halal dan mengandung babi.</span>
                        </div>
                    </div>
                    <div class="card col-4 px-0 mx-2">
                        <img src="../img/city.jpg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Cemara Asri</b></h5>
                            <span>Komplek besar ini memiliki fasilitas dan hiburan yang lengkap, mulai dari kolam renang, lapangan basket, sekolah, tempat beribadah, tempat makan, bahkan hotel juga ada.</span>
                        </div>
                    </div>
                    <div class="card col-4 px-0 ml-2">
                        <img src="../img/city.jpg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Metropawlis</b></h5>
                            <span>Metropawlis adalah cafe anjing, dimana Anda dapat makan sekaligus bermain dengan anjing-anjing lucu di sana. Pilihan makanan juga beragam dan tidak kalah enak dengan cafe-cafe lainnya.</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include "../component-user/script.php"?>
</body>
</html>