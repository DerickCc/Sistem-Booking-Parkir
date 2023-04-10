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
                <!-- search -->
                <div class="card col-10 mx-auto mt-2 mb-3 px-0">
                    <div style="background: black">
                        <img src="../img/city.jpg" class="card-img-top w-100" style="opacity: 0.6; height: 300px;" alt="...">
                    </div>
                    <div class="card-img-overlay text-center text-white">
                        <h3 class="mt-5 pt-2">Mau Ke Mana Hari Ini?</h3>
                        <form method="POST">
                            <div class="input-group col-6 mt-4 mx-auto">
                                <input type="search" id="nama_lokasi" name= "nama_lokasi" class="form-control" placeholder="Cari Lokasi" autocomplete="off"/>
                                <button name="cariLokasi" class="btn btn-theme" type="submit">
                                    <i class="fas fa-search" style="color: white"></i>
                                </button> 
                            </div>
                        </form>
                    </div>
                </div>

                <!-- hasil search lokasi -->
                <?php
                $nama_lokasi = empty($_REQUEST['nama_lokasi']) ? '....' : $_REQUEST['nama_lokasi'];
                $selectLokasi = mysqli_query($conn, "SELECT * FROM lokasi WHERE nama_lokasi LIKE '%$nama_lokasi%' OR alamat LIKE '%$nama_lokasi%'");
                if(mysqli_num_rows($selectLokasi) == 0 && !empty($_REQUEST['nama_lokasi'])){
                ?>
                <div class="col-10 mx-auto px-0">
                    <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <i class='fa-solid fa-circle-xmark mr-2'></i> Tidak ada lokasi yang ditemukan.
                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                    </div>
                </div>
                <?php
                }
                while($row=mysqli_fetch_assoc($selectLokasi)){
                    $cekSlot = mysqli_query($conn, "SELECT id_slot FROM detail_lokasi WHERE id_lokasi = ".$row['id_lokasi']." AND status_slot = 'Available'");
                    $hide = "";
                    $link = "book-link";
                    $bg = "bg-theme";
                    $opacity = 1;
                    if(mysqli_num_rows($cekSlot) == 0){
                        $hide = "hidden";
                        $link = "";
                        $bg = "bg-secondary";
                        $opacity = 0.7;
                    }
                ?>
                <div class="card col-10 mx-auto px-0 mb-3 <?= $link;?>" style="opacity: <?= $opacity;?>">
                    <div class="card-header text-white <?= $bg;?> py-0 pt-2">
                        <h5><?= $row['nama_lokasi'];?></h5>
                    </div>
                    <div class="card-body py-0 py-2">
                        <div class="row my-0">
                            <div class="col-10">
                                <b class="mr-1">Alamat</b>: <?= $row['alamat'];?>
                            </div>
                            <div class="col-2">
                                <b><?= "Rp " . number_format($row['tarif'], 2, ",", ".");?> / jam</b>
                            </div>
                            <div class="col-12">
                                <b class="mr-4">Tipe</b>: <?= ucwords($row['tipe']);?>
                            </div>
                        </div>
                        <a href="#" class="stretched-link" data-bs-toggle="modal" data-bs-target="#book<?= $row['id_lokasi']?>" <?= $hide;?>></a>
                    </div>
                </div>
                <?php
                }
                ?>

                <!-- rekomen -->
                <div class="card-group col-10 mt-2 mx-auto px-0">
                    <div class="card col-4 px-0 mr-2">
                        <img src="../img/semarang.jpg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Semarang</b></h5>
                            <span>Salah satu tempat kuliner Medan yang populer di semua kalangan. Tempat ini terkenal akan makanan-makanan Chinese yang tidak halal dan mengandung babi.</span>
                        </div>
                    </div>
                    <div class="card col-4 px-0 mx-2">
                        <img src="../img/vihara.jpg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Vihara Maitreya</b></h5>
                            <span>Jarang beribadah? Merasa dosa sudah terlalu menumpuk? Bagi umat Buddha, Anda bisa kunjungi Vihara Maitreya yang terletak di dalam Komplek Cemara Asri ini. Ibadah di sini sekali, dijamin auto suci.</span>
                        </div>
                    </div>
                    <div class="card col-4 px-0 ml-2">
                        <img src="../img/metropawllys.jpeg" class="card-img-top w-100" style="height: 200px;" alt="...">
                        <div class="card-body text-center">
                            <h5><b>Metropawllys</b></h5>
                            <span>Metropawllys adalah cafe anjing, dimana Anda dapat makan sekaligus bermain dengan anjing-anjing lucu di sana. Pilihan makananny juga beragam dan tidak kalah enak dengan cafe-cafe lainnya, ada makanan khusus untuk anjing juga lohh.</span>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <!-- Modal booking parkir -->
    <?php
    $nama_lokasi = empty($_REQUEST['nama_lokasi']) ? '....' : $_REQUEST['nama_lokasi'];
    $selectLokasi = mysqli_query($conn, "SELECT * FROM lokasi WHERE nama_lokasi LIKE '%$nama_lokasi%' OR alamat LIKE '%$nama_lokasi%'");
    while($row=mysqli_fetch_assoc($selectLokasi)){
        $id_lokasi = $row['id_lokasi'];
    ?>
    <div class="modal fade" id="book<?= $id_lokasi;?>" aria-labelledby="book" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-theme text-white">
                        <h4 class="modal-title"><i class="fa-solid fa-receipt mr-3"></i>Booking Parkir</h4>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <h3 class="font-weight-bold"><?= $row['nama_lokasi'];?></h3>
                        </div>

                        <?php
                        // if($row['tipe'] == 'gedung'){
                        ?>
                        <!-- <div class="mb-3 row">
                            <label for="id_slot" class="col-sm-5 col-form-label">Lantai</label>
                            <div class="col-sm-7">
                                <select class="form-select" id="lantai" required>
                                    <?php
                                    // $selectLantai = mysqli_query($conn, "SELECT lantai FROM detail_lokasi WHERE id_lokasi='$id_lokasi' AND status_slot = 'Available' GROUP BY lantai ORDER BY lantai");
                                    // while($row=mysqli_fetch_assoc($selectLantai)){
                                    ?>
                                    <option value="<?= $row['lantai'];?>"> <?= $row['lantai'];?> </option>
                                    <?php
                                    // };
                                    ?>
                                </select>
                            </div>
                        </div> -->
                        <?php
                        // }
                        ?>

                        <div class="mb-3 row">
                            <label for="id_slot" class="col-sm-5 col-form-label">Slot</label>
                            <div class="col-sm-7">
                                <select class="form-select" name="id_slot" required>
                                    <?php
                                    $selectSlot = mysqli_query($conn, "SELECT id_slot, nama_slot FROM detail_lokasi WHERE id_lokasi='$id_lokasi' AND status_slot = 'Available'");
                                    while($row=mysqli_fetch_assoc($selectSlot)){
                                    ?>
                                    <option value="<?= $row['id_slot'];?>"> <?= $row['nama_slot'];?> </option>
                                    <?php
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_plat" class="col-sm-5 col-form-label">No Plat</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="no_plat" autocomplete="off" required
                                pattern="[A-Z]{1,2} [0-9]{1,4} [A-Z]{1,3}">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tanggal" class="col-sm-5 col-form-label">Tanggal</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="tanggal" value="<?= date("d F Y")?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="waktu_masuk" class="col-sm-5 col-form-label">Waktu Kedatangan</label>
                            <div class="col-sm-7">
                                <input type="time" class="form-control" name="waktu_masuk" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="bookParkir" value="bookParkir">Book</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

    <?php include "../component-user/script.php"?>
</body>
</html>