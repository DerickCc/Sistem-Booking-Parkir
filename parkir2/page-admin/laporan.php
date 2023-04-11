<?php include "../function.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-admin/head.php" ?>

<body class="sb-nav-fixed">
    
    <?php include "../component-admin/navbar.php" ?>

    <div id="layoutSidenav">
        
        <?php include "../component-admin/sidebar.php"?>

        <div id="layoutSidenav_content">
            <div class="row">
                <h3>Laporan</h3>
                <div class="card col-11 mx-auto">
                    <div class="card-body">
                        <div class="row my-4">
                            <div class="col-4">
                                <h5>Generate Data Lokasi</h5>
                            </div>
                            <div class="col-8">
                                <a href="pdflokasi.php" class="btn btn-success" role="button" target="_blank">Generate</a>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4">
                                <h5>Generate Data Detail Lokasi</h5>
                            </div>
                            <div class="col-8">
                                <a href="pdfdetaillokasi.php" class="btn btn-success" role="button" target="_blank">Generate</a>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4">
                                <h5>Generate Data Booking</h5>
                            </div>
                            <div class="col-8">
                                <a href="pdfbooking.php" class="btn btn-success" role="button" target="_blank">Generate</a>
                            </div>
                        </div>
                        <div class="row my-4">
                            <div class="col-4">
                                <h5>Generate Data Pengguna</h5>
                            </div>
                            <div class="col-8">
                                <a href="pdfpengguna.php" class="btn btn-success" role="button" target="_blank">Generate</a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>    
        </div>
    </div>

    <!-- <button type="button" class="btn btn-danger my-1" data-bs-toggle="modal" data-bs-target="#yesCancel">Cancel</button>
    <div class="modal fade" id="yesCancel" aria-labelledby="yesCancel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h4 class="modal-title">Cancel Booking</h4>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Anda yakin ingin meng-cancel booking ini?</h5>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="cancelBooking" value="cancelBooking">Yakin</button>
                    <button class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div> -->
    
    <?php include "../component-user/script.php"?>
</body>
</html>