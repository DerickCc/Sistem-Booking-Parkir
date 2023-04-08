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
                <!-- Alert -->
                <div class="col-10 mx-auto px-0">
                <?php
                    if(empty($_REQUEST['status'])){
                        echo "";
                    }
                    elseif($_REQUEST['status']){
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-check mr-2"></i>';
                            if($_REQUEST['status']==1){
                                echo "Anda telah berhasil Check-Out.";
                            }
                            elseif($_REQUEST['status']==2){
                                echo "Pembayaran berhasil dilakukan.";
                            }
                            echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                    elseif($_REQUEST['status'] == 0){
                        echo "
                        <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                            <i class='fa-solid fa-circle-xmark mr-2'></i> Error!
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                ?>
                </div>
                <?php
                $selectTanggal = mysqli_query($conn, "SELECT tanggal FROM booking 
                                                      WHERE (status_booking = 'Finish' OR status_booking = 'Cancel') AND id_pengguna = '$id_pengguna' GROUP BY tanggal ORDER BY tanggal DESC");
                if(mysqli_num_rows($selectTanggal) == 0){
                ?>
                <div class="card col-6 mx-auto mt-5 text-center">
                    <div class="card-body">
                        <div class="col-12">
                            <img src="../img/no-booking-found.png" class="img-fluid" alt="No Booking Found">
                        </div>
                        <h5 class="font-weight-bold">Belum ada riwayat booking.</h5>
                    </div>
                </div>
                <?php
                }
                else{
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
                            $selectBooking = mysqli_query($conn, "SELECT b.id_booking, b.id_slot, b.no_plat, b.waktu_masuk, b.durasi, b.biaya, 
                                                                        b.metode_bayar, b.status_booking, dl.nama_slot, l.nama_lokasi, l.tarif, l.alamat, p.e_money
                                                                  FROM booking AS b 
                                                                  INNER JOIN detail_lokasi AS dl ON b.id_slot = dl.id_slot
                                                                  INNER JOIN lokasi AS l ON dl.id_lokasi = l.id_lokasi
                                                                  INNER JOIN pengguna AS p ON b.id_pengguna = p.id_pengguna
                                                                  WHERE b.tanggal = '$tanggal' AND (b.status_booking = 'Finish' OR b.status_booking = 'Cancel') AND b.id_pengguna = '$id_pengguna' 
                                                                  ORDER BY b.waktu_masuk DESC");
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
                                                <h5><span class="badge badge-danger p-2">Cancel</span></h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3" />
                            <?php
                                }
                                elseif($row2['status_booking']=='Finish' && $row2['metode_bayar']!=NULL){
                            ?>
                                <div class="row mt-0">
                                    <div class="col-1 bg-success d-flex align-items-center justify-content-center">
                            
                                        <i class="fa-sharp fa-solid fa-flag-checkered fa-3x" style="color: white;"></i>
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
                                                <h5><span class="badge badge-success p-2"><?= "Rp " . number_format($row2['biaya'], 2, ",", ".");?></span></h5>
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
                                else{
                            ?>
                                <div class="row mt-0">
                                    <div class="col-1 bg-primary d-flex align-items-center justify-content-center">
                                        <i class="fa-sharp fa-solid fa-money-bills fa-2x" style="color: white;"></i>
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
                                    <div class="col-3">
                                        <div class="row">
                                            <button type="button" class="btn btn-primary my-1 mt-4" data-bs-toggle="modal" data-bs-target="#modalBayar<?= $row2['id_booking'];?>">Bayar</button>
                                            <span class="text-center font-weight-bold border"><?= "Rp " . number_format($row2['biaya'], 2, ",", ".");?></span>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mb-3" />

                                <div class="modal fade" id="modalBayar<?= $row2['id_booking'];?>" aria-labelledby="modalBayar" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-primary py-1 pt-3">
                                                <div class="col-11 text-white">
                                                    <h4 class="font-weight-bold">Pembayaran Parkir</h4>
                                                </div>
                                                <div class="col-1">
                                                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                            </div>
                                            <form method="POST">
                                                <div class="modal-body">
                                                    <div class="row mb-0 mt-0">
                                                        <div class="col-12">
                                                            <h4 class="font-weight-bold"><?= $row2['nama_lokasi'];?></h4>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-7">
                                                                Tarif:
                                                            </div>
                                                            <div class="col-5">
                                                                <?= "Rp " . number_format($row2['tarif'], 2, ",", ".");?> / jam
                                                            </div>
                                                        </div>
                                                        <div class="row mb-1">
                                                            <div class="col-7">
                                                                Durasi Parkir:
                                                            </div>
                                                            <div class="col-5">
                                                                <?= $row2['durasi'];?>
                                                            </div>
                                                            <hr class="mt-4">
                                                        </div>
                                                        <div class="row mt-0">
                                                            <div class="col-7">
                                                                <b>Biaya Parkir:</b>
                                                            </div>
                                                            <div class="col-5">
                                                                <b><?= "Rp " . number_format($row2['biaya'], 2, ",", ".");?></b>
                                                            </div>
                                                        </div>
                                                        <div class="row mb-0">
                                                            <div class="col-7">
                                                                <b>Metode Pembayaran:</b>
                                                            </div>
                                                            <div class="col-5">
                                                                <input type="number" name="id_booking" value="<?= $row2['id_booking'];?>" hidden>
                                                                <input type="number" name="id_pengguna" value="<?= $id_pengguna;?>" hidden>
                                                                <input type="number" name="e_money" value="<?= $row2['e_money'];?>" hidden>
                                                                <input type="number" name="biaya" value="<?= $row2['biaya'];?>" hidden>
                                                                <select class="form-select" name="metode_bayar" required>
                                                                    <option value="Cash">Cash</option>
                                                                    <?php 
                                                                        if($row2['e_money'] > $row2['biaya']){
                                                                            echo '<option value="E-money">E-money</option>';
                                                                        }
                                                                        else{
                                                                            echo '<option value="E-money" disabled>E-money</option>';
                                                                        }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal-footer d-flex justify-content-center">
                                                    <button class="btn btn-success mx-3 px-5" name="bayarParkir" value="bayarParkir">Bayar</button>
                                                    <button class="btn btn-danger mx-3 px-5" data-bs-dismiss="modal">Batal</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                }
                            }
                            ?>
                        </div>
                    </div>
                <?php
                    }
                }
                ?>
            </div>    
        </div>
    </div>

    <?php include "../component-user/script.php"?>
</body>
</html>