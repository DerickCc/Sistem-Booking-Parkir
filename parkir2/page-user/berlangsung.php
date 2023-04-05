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
                    <h3>Sedang Berlangsung</h3>
                </div>
                <?php
                $selectTanggal = mysqli_query($conn, "SELECT tanggal FROM booking WHERE (status_booking = 'Booked' OR status_booking = 'Parked') AND id_pengguna = '1' GROUP BY tanggal");
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
                        $selectBooking = mysqli_query($conn, "SELECT b.id_booking, b.id_pengguna, b.id_slot, b.no_plat, b.waktu_masuk, b.status_booking, dl.nama_slot, l.nama_lokasi, l.alamat, l.tarif
                                                              FROM booking AS b 
                                                              INNER JOIN detail_lokasi AS dl ON b.id_slot = dl.id_slot
                                                              INNER JOIN lokasi AS l ON dl.id_lokasi = l.id_lokasi
                                                              WHERE b.tanggal = '$tanggal' AND (b.status_booking = 'Booked' OR b.status_booking = 'Parked') AND b.id_pengguna = '1' ");
                        while($row2=mysqli_fetch_assoc($selectBooking)){
                            $id_booking = $row2['id_booking'];
                            $pBgColor =  $row2['status_booking'] == 'Booked'? 'bg-info' : 'bg-warning';
                            $pColor =  $row2['status_booking'] == 'Booked'? 'white' : 'black';
                        ?>
                        <div class="row mt-0">
                            <div class="col-1 <?= $pBgColor;?> d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-square-parking fa-3x" style="color: <?= $pColor;?>;"></i>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12 mb-2">
                                        <h5><b><?= $row2['nama_lokasi'];?></b></h5>
                                    </div>
                                    <div class="col-12">
                                        <b>Alamat:</b> <?= $row2['alamat'];?>
                                    </div>
                                    <div class="col-12">
                                        <b>Slot:</b> <?= $row2['nama_slot'];?>
                                    </div>
                                    <div class="col-12">
                                        <b>Waktu Kedatangan:</b> <?= $row2['waktu_masuk'];?> WIB
                                    </div>
                                    <div class="col-12">
                                        <b>No. Plat:</b> <?= $row2['no_plat'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <form method="POST">
                                    <div class="row">
                                        <input type="number" name="id_booking" value="<?= $id_booking;?>" hidden>
                                        <input type="number" name="id_slot" value="<?= $row2['id_slot'];?>" hidden> 
                                        <input type="number" name="tarif" value="<?= $row2['tarif'];?>" hidden> 
                                        <input type="text" name="waktu_masuk" value="<?= $row2['waktu_masuk'];?>" hidden> 
                                        <?php 
                                        if($row2['status_booking'] == 'Booked'){
                                            echo ' 
                                            <button class="btn btn-info my-1" name="checkInBooking">Check-In</button>
                                            <button type="button" class="btn btn-danger my-1" data-bs-toggle="modal" data-bs-target="#yesCancel'. $id_booking.'">Cancel</button>
                                            
                                            <div class="modal fade" id="yesCancel'. $id_booking.'" aria-labelledby="yesCancel" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-info text-white">
                                                            <h4 class="modal-title">Cancel Booking</h4>
                                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Anda yakin ingin meng-cancel booking ini?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="cancelBooking" value="cancelBooking">Yakin</button>
                                                            <button class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                        else{
                                            echo '
                                            <button type="button" class="btn btn-warning my-1 font-weight-bold" data-bs-toggle="modal" data-bs-target="#yesCheckOut'. $id_booking.'">Check-Out</button>
                                            
                                            <div class="modal fade" id="yesCheckOut'. $id_booking.'" aria-labelledby="yesCheckOut" aria-hidden="true">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-warning">
                                                            <h4 class="modal-title">Check Out</h4>
                                                            <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <h5>Anda yakin ingin melakukan check-out?</h5>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn-success" name="checkOutBooking" value="checkOutBooking">Yakin</button>
                                                            <button class="btn btn-danger" data-bs-dismiss="modal">Tidak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                        }
                                        ?>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr class="mb-3" />
                        <?php
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