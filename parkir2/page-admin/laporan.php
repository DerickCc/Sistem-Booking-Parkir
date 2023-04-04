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
                    <form action="post" action="pdf.php"></form>
                    <Button type="submit">Generate Booking</Button>
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