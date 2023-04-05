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
                <div class="col-10 mx-auto my-2">
                    <h3>Telah Selesai</h3>
                </div>
                <?php
                $selectTanggal = mysqli_query($conn, "SELECT tanggal FROM booking WHERE (status_booking = 'Finish' OR status_booking = 'Cancel') AND id_pengguna = '1' GROUP BY tanggal");
                while($row1=mysqli_fetch_assoc($selectTanggal)){
                    $tanggal = $row1['tanggal'];
                ?>
                <div class="card col-10 mx-auto mb-4 px-0">
                    <div class="card-header bg-theme py-0">
                        <div class="card-title mt-3 text-white">
                            <h5 class="font-weight-bold"><?= $tanggal;?></h5>
                        </div>
                    </div>
                    <div class="card-body">
                        <?php
                        $selectBooking = mysqli_query($conn, "SELECT b.id_booking, b.id_pengguna, b.id_slot, b.no_plat, b.waktu_masuk, b.durasi, b.biaya, b.metode_bayar, b.status_booking, dl.nama_slot, l.nama_lokasi, l.alamat 
                                                              FROM booking AS b 
                                                              INNER JOIN detail_lokasi AS dl ON b.id_slot = dl.id_slot
                                                              INNER JOIN lokasi AS l ON dl.id_lokasi = l.id_lokasi
                                                              WHERE b.tanggal = '$tanggal' AND (b.status_booking = 'Finish' OR b.status_booking = 'Cancel') AND b.id_pengguna = '1' ");
                        while($row2=mysqli_fetch_assoc($selectBooking)){
                            if($row2['status_booking']=='Cancel'){
                        ?>
                            <div class="row mt-0 bg-cancel text-muted">
                                <div class="col-1 bg-danger d-flex align-items-center justify-content-center">
                                    <i class="fa-regular fa-rectangle-xmark fa-3x" style="color: white;"></i>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <span class="h5 mr-5 font-weight-bold"><?= $row2['nama_lokasi'];?></span>
                                            <span class="h6 font-weight-bold"><?= $row2['waktu_masuk'];?></span>
                                        </div>
                                        <div class="col-12">
                                            <b>Slot:</b> <?= $row2['nama_slot'];?>
                                        </div>
                                        <div class="col-12">
                                            <b>Durasi:</b> -
                                        </div>
                                        <div class="col-12">
                                            <b>No. Plat:</b> <?= $row2['no_plat'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5><span class="badge badge-pill badge-danger">Cancel</span></h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-3" />
                        <?php
                            }
                            else{
                        ?>
                            <div class="row mt-0">
                                <div class="col-1 bg-success d-flex align-items-center justify-content-center">
                                    <i class="fa-solid fa-square-parking fa-3x" style="color: white;"></i>
                                </div>
                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-12 mb-2">
                                            <span class="h5 mr-5 font-weight-bold"><?= $row2['nama_lokasi'];?></span>
                                            <span class="h6 font-weight-bold"><?= $row2['waktu_masuk'];?></span>
                                        </div>
                                        <div class="col-12">
                                            <b>Slot:</b> <?= $row2['nama_slot'];?>
                                        </div>
                                        <div class="col-12">
                                            <b>Durasi Parkir:</b> <?= $row2['durasi'];?>
                                        </div>
                                        <div class="col-12">
                                            <b>No. Plat:</b> <?= $row2['no_plat'];?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3 d-flex align-items-center">
                                    <div class="row">
                                        <div class="col-12">
                                            <h5><span class="badge badge-pill badge-success"><?= "Rp " . number_format($row2['biaya'], 2, ",", ".");?></span></h5>
                                        </div>
                                        <div class="col-12">
                                            <?php
                                            if($row2['metode_bayar'] == 'Cash'){
                                                echo '<i class="fa-solid fa-money-check-dollar mr-2"></i>Cash';
                                            }
                                            else{
                                                echo '<i class="fa-solid fa-credit-card mr-2"></i>E-money';
                                            }
                                            ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr class="mb-3" />
                        <?php        
                            }
                        }
                        ?>
                    </div>
                </div>
                <?php
                }
                ?>
            </div>    
        </div>
    </div>


    
    <?php include "../component-user/script.php"?>
</body>
</html>