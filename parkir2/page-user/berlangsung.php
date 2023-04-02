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
                $selectTanggal = mysqli_query($conn, "SELECT tanggal FROM booking WHERE (status_booking = 'Booked' OR status_booking = 'Parked') AND id_pengguna = '1'");
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
                        $selectBooking = mysqli_query($conn, "SELECT id_pengguna, id_slot, no_plat, waktu_masuk FROM booking 
                                                              WHERE tanggal = '$tanggal' AND (status_booking = 'Booked' OR status_booking = 'Parked') AND id_pengguna = '1' ");
                        while($row2=mysqli_fetch_assoc($selectBooking)){
                        ?>
                        <div class="row mt-0">
                            <div class="col-1 bg-dark d-flex align-items-center justify-content-center">
                                <i class="fa-solid fa-square-parking fa-3x" style="color: white;"></i>
                            </div>
                            <div class="col-8">
                                <div class="row">
                                    <div class="col-12">
                                        <h5><b>Sun Plaza</b></h5>
                                    </div>
                                    <div class="col-12">
                                        Alamat: Jalan anu anu anu
                                    </div>
                                    <div class="col-12">
                                        Jam Kedatangan: <?= $row2['waktu_masuk'];?> WIB
                                    </div>
                                    <div class="col-12">
                                        Plat: <?= $row2['no_plat'];?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-3 d-flex align-items-center justify-content-center">
                                <div class="row">
                                    <button class="btn btn-success my-1" name="checkInBooking">Check-In</button>
                                    <button class="btn btn-danger my-1" name="cancelBooking">Cancel</button>
                                </div>
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