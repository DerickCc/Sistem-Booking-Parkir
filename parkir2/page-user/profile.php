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
                            Perubahan berhasil disimpan.
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
                <div class="card col-10 mx-auto ">
                    <div class="card-header py-0 pt-3 pb-2">
                        <h3>Profile</h3>
                    </div>
                    <div class="card-body">
                        <form method="POST">
                            <div class="row">
                                <div class="col-4">
                                    <div class="row justify-content-center">
                                        <img src="../img/user.png" class="img-fluid w-75 mb-5" alt="Profile Picture">
                                        <div class="col-9 text-center">
                                            <?php
                                            $readonly = "readonly";
                                            $hidden = "";
                                            if(isset($_POST['editProfile'])){
                                                $readonly = "";
                                                $hidden = "hidden";
                                                echo '
                                                <button class="btn btn-success w-50" name="simpanProfile">Simpan</button>';
                                            }
                                            ?>
                                            <button class="btn btn-warning w-50" name="editProfile" <?= $hidden;?>>Edit Profile</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-8">
                                    <div class="row">
                                        <div class="col-11 mb-2">
                                            <label for="nama_depan" class="form-label">Nama Depan</label>
                                            <input type="text" class="form-control" name="nama_depan" value="<?= $nama_depan;?>" <?= $readonly;?>>
                                        </div>
                                        <div class="col-11 mb-2">
                                            <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                            <input type="text" class="form-control" name="nama_belakang" value="<?= $nama_belakang;?>" <?= $readonly;?>>
                                        </div>
                                        <div class="col-11 mb-2">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" class="form-control" name="email" value="<?= $email;?>" <?= $readonly;?>>
                                        </div>
                                        <div class="col-11 mb-2">
                                            <label for="no_telp" class="form-label">No. Telepon</label>
                                            <input type="text" class="form-control" name="no_telp" value="<?= $no_telp;?>" <?= $readonly;?>
                                            pattern="[0-9]+" maxlength=12 minlength=10>
                                        </div>
                                        <div class="col-11 mb-2">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" class="form-control" name="password" value="<?= $password;?>" <?= $readonly;?>>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>    
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    
    <?php include "../component-user/script.php"?>
</body>
</html>