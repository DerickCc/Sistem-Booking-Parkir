<?php include "../function.php";?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-user/head.php" ?>

<body class="sb-nav-fixed">
    
    <?php include "../component-user/navbar.php" ?>

    <div id="layoutSidenav">
        
        <?php include "../component-user/sidebar.php"?>

        <div id="layoutSidenav_content">
            <div class="row">
                <div class="col-10 mx-auto my-3 px-0">
                <?php
                    if(empty($_REQUEST['status'])){
                        echo "";
                    }
                    elseif($_REQUEST['status'] == 1){
                        echo '
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <i class="fa-solid fa-circle-check mr-2"></i> 
                            Top-Up berhasil!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>';
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
                <div class="card col-10 mx-auto px-0">
                    <div class="card-header py-0 pt-3 pb-2 bg-theme text-white">
                        <h3 class="text-center">Top-Up</h3>
                    </div>
                    <form method="POST">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12">
                                    <p class="fs-5 text-center">Saldo E-money: <b><?= "Rp " . number_format($e_money, 2, ",", ".");?></b></p>  
                                </div>
                                <div class="col-5 mx-auto">
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            Nominal Top-Up
                                        </div>
                                        <div class="col-6">
                                            <input type="number" class="form-control" name="nominal" step="1000" required>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            Metode Pembayaran
                                        </div>
                                        <div class="col-6">
                                            <select class="form-select" name="metode_topup" required>
                                                <option value="BCA">BCA</option>
                                                <option value="Mandiri">Mandiri</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="row mt-4">
                                        <div class="col-6">
                                            No. Kartu
                                        </div>
                                        <div class="col-6">
                                            <input type="text" class="form-control" name="no_kartu" required
                                            pattern="[0-9]{4} [0-9]{4} [0-9]{4} [0-9]{4}" maxlength=19>
                                            <span class="small text-muted">Format: xxxx xxxx xxxx</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer text-center">
                            <button class="btn btn-success w-25" name="topUp">Top-Up</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        
    </div>
    
    <?php include "../component-user/script.php"?>
</body>
</html>