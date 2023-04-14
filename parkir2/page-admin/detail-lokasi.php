<?php 
include "../function.php";
$id_lokasi = $_REQUEST['id_lokasi'];
$selectNamaLokasi = mysqli_query($conn, "SELECT nama_lokasi FROM lokasi WHERE id_lokasi='$id_lokasi'");
$res = mysqli_fetch_row($selectNamaLokasi);
$namaLokasi = $res[0];
?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-admin/head.php"?>

<body class="sb-nav-fixed">

    <?php include "../component-admin/navbar.php"?>

    <div id="layoutSidenav">

        <?php include "../component-admin/sidebar.php"?>

        <div id="layoutSidenav_content">
            <div class="row">
                <h3><?= $namaLokasi;?></h3>
                <div class="card col-11 mx-auto">
                    <div class="card-header">
                        <div class="card-title mt-2">
                            <div class="row">
                                <div class="col-7 d-flex align-items-center">
                                    <a href="data-lokasi.php"><i class="fa-solid fa-arrow-left fa-lg" style="color: #000000;"></i></a>
                                    <span class="ml-3 title">Detail Lokasi</span>
                                </div>
                                <div class="col-3">
                                    <form method="POST">
                                        <div class="input-group">
                                            <input type="number" id="id_lokasi" name="id_lokasi" class="form-control" value="<?= $id_lokasi;?>" hidden/>
                                            <input type="search" id="nama_slot" name="nama_slot" class="form-control" placeholder="Cari Nama Slot" autocomplete="off"/>
                                            <button name="cariNamaSlot" class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahSlot">Tambah Slot</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <!-- Alert -->
                        <?php
                            if(empty($_REQUEST['status'])){
                                echo "";
                            }
                            elseif($_REQUEST['status']){
                                echo "
                                <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                    <i class='fa-solid fa-circle-check mr-2'></i>";
                                    if($_REQUEST['status']==1){
                                        echo "Data Slot Berhasil Ditambahkan.";
                                    }
                                    elseif($_REQUEST['status']==2){
                                        echo "Data Slot Berhasil Diedit.";
                                    }
                                    else{
                                        echo "Data Slot Berhasil Dihapus";
                                    }
                                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            elseif($_REQUEST['status']==400){
                                echo "
                                <div class='alert alert-danger alert-dismissible fade show' role='alert'>
                                    <i class='fa-solid fa-circle-xmark mr-2'></i> Error!
                                    <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                        ?>
                    
                        <table class="table table-striped table-hover">
                            <thead class="bg-dark text-white">
                                <tr>
                                    <th>ID</th>
                                    <th>Nama Slot</th>
                                    <th>Status</th>
                                    <th>Lantai</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nama_slot = empty($_REQUEST['nama_slot']) ? "" : $_REQUEST['nama_slot'];
                                $selectSlot = mysqli_query($conn, "SELECT * FROM detail_lokasi WHERE nama_slot LIKE '%$nama_slot%' AND id_lokasi='$id_lokasi'");
                                while($row = mysqli_fetch_assoc($selectSlot)){
                                ?>
                                <tr>
                                    <td><?= $row['id_slot'];?></td>
                                    <td><?= $row['nama_slot'];?></td>
                                    <td><?= ucwords($row['status_slot']);?></td>
                                    <td><?= $row['lantai'];?></td>
                                    <td class="text-center opsi">
                                        <!-- edit -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editSlot<?= $row['id_slot'];?>">
                                            <i class="fa-regular fa-pen-to-square fa-lg" style="color: #fff"></i>
                                        </button>

                                        <!-- hapus -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusSlot<?= $row['id_slot'];?>">
                                            <i class="far fa-trash-alt fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>
                                <?php 
                                } 
                                ?>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- modal tambah slot -->
    <div class="modal fade" id="tambahSlot" aria-labelledby="tambahSlot" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Tambah Slot</h4>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" class="form-control" name="id_lokasi" value="<?= $id_lokasi?>" hidden>
                        <div class="mb-3 row">
                            <label for="nama_slot" class="col-sm-4 col-form-label">Nama Slot</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_slot" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status_slot" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_slot" value="Available" readonly>
                            </div>
                        </div>
                        <?php
                        $selectTipeLokasi = mysqli_query($conn, "SELECT tipe FROM lokasi WHERE id_lokasi='$id_lokasi'");
                        $row = mysqli_fetch_row($selectTipeLokasi);
                        $tipeLokasi = $row[0];
                        if($tipeLokasi == 'gedung'){
                            echo '
                            <div class="mb-3 row">
                                <label for="lantai" class="col-sm-4 col-form-label">Lantai</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="lantai" min="1" max="30" autocomplete="off" required>
                                </div>
                            </div>';
                        }
                        else{
                            echo '
                            <div class="mb-3 row">
                                <label for="lantai" class="col-sm-4 col-form-label">Lantai</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="lantai" value="1" readonly>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahSlot" value="tambahSlot">Tambah</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- nyari id slot yg ingin diedit / dihapus-->
    <?php
    $selectSlot = mysqli_query($conn, "SELECT * FROM detail_lokasi WHERE id_lokasi='$id_lokasi'");
    while($row = mysqli_fetch_assoc($selectSlot)){
    ?>
    <!-- modal edit slot -->
    <div class="modal fade" id="editSlot<?= $row['id_slot'];?>" aria-labelledby="editSlot" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-warning text-white">
                        <h4 class="modal-title">Edit Slot</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" class="form-control" name="id_lokasi" value="<?= $id_lokasi;?>" hidden>
                        <div class="mb-3 row">
                            <label for="id_slot" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_slot" value="<?= $row['id_slot'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_slot" class="col-sm-4 col-form-label">Nama Slot</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_slot" value="<?= $row['nama_slot'];?>" autocomplete="off" required>
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="status_slot" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="status_slot" required>
                                    <?php 
                                    if($row['status_slot'] == 'Available'){
                                        echo "<option selected value='Available'>Available</option>
                                        <option value='Unavailable'>Unavailable</option>";
                                    }
                                    else{
                                        echo "<option value='Available'>Available</option>
                                        <option selected value='Unavailable'>Unavailable</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <?php
                        $selectTipeLokasi = mysqli_query($conn, "SELECT tipe FROM lokasi WHERE id_lokasi='$id_lokasi'");
                        $res = mysqli_fetch_row($selectTipeLokasi);
                        $tipeLokasi = $res[0];
                        if($tipeLokasi == 'gedung'){
                            echo '
                            <div class="mb-3 row">
                                <label for="lantai" class="col-sm-4 col-form-label">Lantai</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="lantai" value="'.$row['lantai'].'" min="1" max="30" autocomplete="off" required>
                                </div>
                            </div>';
                        }
                        else{
                            echo '
                            <div class="mb-3 row">
                                <label for="lantai" class="col-sm-4 col-form-label">Lantai</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" name="lantai" value="1" readonly>
                                </div>
                            </div>';
                        }
                        ?>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="editSlot" value="editSlot">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal hapus slot -->
    <div class="modal fade" id="hapusSlot<?= $row['id_slot'];?>" aria-labelledby="hapusSlot" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title">Hapus Slot</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="number" class="form-control" name="id_lokasi" value="<?= $id_lokasi?>" hidden>
                        <div class="mb-3 row">
                            <label for="id_slot" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_slot" value="<?= $row['id_slot'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_slot" class="col-sm-4 col-form-label">Nama Slot</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_slot" value="<?= $row['nama_slot'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="status_slot" class="col-sm-4 col-form-label">Status</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="status_slot" value="<?= $row['status_slot'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="lantai" class="col-sm-4 col-form-label">Lantai</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="lantai" value="<?= $row['lantai'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6 class="mx-5 my-3 pr-3">Anda yakin ingin menghapus <?= $row['nama_slot'];?> dari daftar slot?</h6>
                        <button type="submit" class="btn btn-success" name="hapusSlot" value="hapusSlot">Hapus</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>

<?php include "../component-admin/script.php"?>
</body>
</html>