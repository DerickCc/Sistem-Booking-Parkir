<?php include "../function.php" ?>

<!DOCTYPE html>
<html lang="en">

<?php include "../component-admin/head.php" ?>

<body class="sb-nav-fixed">

    <?php include "../component-admin/navbar.php" ?>

    <div id="layoutSidenav">

        <?php include "../component-admin/sidebar.php" ?>
        
        <div id="layoutSidenav_content">
            <div class="row">
                <h3>Lokasi</h3>
                <div class="card col-12 mx-auto">
                    <div class="card-header">
                        <div class="card-title mt-2">
                            <div class="row">
                                <div class="col-7">
                                    <span class="title">Daftar Lokasi</span>
                                </div>
                                <div class="col-3">
                                    <form method="POST">
                                        <div class="input-group">
                                            <input type="search" id="nama_lokasi" name="nama_lokasi" class="form-control" placeholder="Cari Lokasi" autocomplete="off"/>
                                            <button name="cariNamaLokasi" class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahLokasi">Tambah Lokasi</button>
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
                                        echo "Data Lokasi Berhasil Ditambahkan.";
                                    }
                                    elseif($_REQUEST['status']==2){
                                        echo "Data Lokasi Berhasil Diedit.";
                                    }
                                    else{
                                        echo "Data Lokasi Berhasil Dihapus";
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
                                    <th>Foto Lokasi</th>
                                    <th>Nama Lokasi</th>
                                    <th style="width: 300px;">Alamat</th>
                                    <th>Jam Operasional</th>
                                    <th>Tipe</th>
                                    <th>Tarif / jam</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nama_lokasi = empty($_REQUEST['nama_lokasi']) ? "" : $_REQUEST['nama_lokasi'];
                                $selectLokasi = mysqli_query($conn, "SELECT * FROM lokasi WHERE nama_lokasi LIKE '%$nama_lokasi%'");
                                while($row = mysqli_fetch_assoc($selectLokasi)){
                                ?>
                                <tr>
                                    <td class="align-middle"><?= $row['id_lokasi'];?></td>
                                    <td class="align-middle"><img src="../img/location/<?= $row['foto_lokasi'];?>" style="width: 100px;"></td>
                                    <td class="align-middle"><?= $row['nama_lokasi'];?></td>
                                    <td class="align-middle"><?= $row['alamat'];?></td>
                                    <td class="align-middle"><?= $row['jam_operasional'];?></td>
                                    <td class="align-middle"><?= ucwords($row['tipe']);?></td>
                                    <td class="align-middle"><?= "Rp " . number_format($row['tarif'], 2, ",", ".");?></td>
                                    <td class="align-middle text-center">
                                        <!-- detail -->
                                        <a role="button" class="btn btn-primary" href="detail-lokasi.php?id_lokasi=<?= $row['id_lokasi'];?>">
                                            <i class="fa-solid fa-folder-open"></i>
                                        </a>

                                        <!-- edit -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editLokasi<?= $row['id_lokasi'];?>">
                                            <i class="fa-regular fa-pen-to-square fa-lg" style="color: #fff"></i>
                                        </button>

                                        <!-- upload -->
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#uploadLokasi<?= $row['id_lokasi'];?>">  
                                            <i class="fa-solid fa-image fa-lg" style="color: #fff"></i>
                                        </button>

                                        <!-- hapus -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusLokasi<?= $row['id_lokasi'];?>">
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

    <!-- modal tambah lokasi -->
    <div class="modal fade" id="tambahLokasi" aria-labelledby="tambahLokasi" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Tambah Lokasi</h4>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama_lokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lokasi" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat" rows="2" autocomplete="off" required></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jam_operasional" class="col-sm-4 col-form-label">Jam Operasional</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jam_operasional" autocomplete="off" required
                                pattern="[0-2][0-9]:[0-5][0-9]-[0-2][0-9]:[0-5][0-9]" maxlength=11>
                                <span class="small text-muted">Format: xx:xx-yy:yy</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="tipe" required>
                                    <option selected value="gedung">Gedung</option>
                                    <option value="jalanan">Jalanan</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tarif" class="col-sm-4 col-form-label">Tarif</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tarif" min="1000" max="10000" step="1000" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="foto_lokasi" class="col-sm-4 col-form-label">Foto Lokasi</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="foto_lokasi" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahLokasi" value="tambahLokasi">Tambah</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- nyari id lokasi yg ingin diedit / dihapus-->
    <?php
    $selectLokasi = mysqli_query($conn, "SELECT * FROM lokasi");
    while($row=mysqli_fetch_assoc($selectLokasi)){
    ?>
    <!-- modal edit lokasi -->
    <div class="modal fade" id="editLokasi<?= $row['id_lokasi'];?>" aria-labelledby="editLokasi" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-warning text-white">
                        <h4 class="modal-title">Edit Lokasi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="id_lokasi" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_lokasi" value="<?= $row['id_lokasi'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_lokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lokasi" value="<?= $row['nama_lokasi'];?>" autocomplete="off" required>
                            </div>
                        </div> 
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat" rows="2" autocomplete="off" required><?= $row['alamat'];?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jam_operasional" class="col-sm-4 col-form-label">Jam Operasional</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jam_operasional" value="<?= $row['jam_operasional'];?>" autocomplete="off" required
                                pattern="[0-2][0-9]:[0-5][0-9]-[0-2][0-9]:[0-5][0-9]" maxlength=11>
                                <span class="small text-muted">Format: xx:xx-yy:yy</span>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                            <div class="col-sm-8">
                                <select class="form-select" name="tipe" required>
                                    <?php 
                                    if($row['tipe'] == 'gedung'){
                                        echo "<option selected value='gedung'>Gedung</option>
                                        <option value='jalanan'>Jalanan</option>";
                                    }
                                    else{
                                        echo "<option value='gedung'>Gedung</option>
                                        <option selected value='jalanan'>Jalanan</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tarif" class="col-sm-4 col-form-label">Tarif</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tarif" value="<?= $row['tarif'];?>"
                                min="1000" max="10000" step="1000" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="editLokasi" value="editLokasi">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal upload foto lokasi -->
    <div class="modal fade" id="uploadLokasi<?= $row['id_lokasi'];?>" aria-labelledby="uploadLokasi" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST" enctype="multipart/form-data">
                    <div class="modal-header bg-info text-white">
                        <h4 class="modal-title">Upload Foto Lokasi</h4>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <input type="text" class="form-control" name="id_lokasi" value="<?= $row['id_lokasi'];?>" hidden>
                        <div class="mb-3 row">
                            <label for="foto_lokasi" class="col-sm-4 col-form-label">Foto Lokasi</label>
                            <div class="col-sm-8">
                                <input type="file" class="form-control" name="foto_lokasi" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="uploadLokasi" value="uploadLokasi">Upload</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal hapus lokasi -->
    <div class="modal fade" id="hapusLokasi<?= $row['id_lokasi'];?>" aria-labelledby="hapusLokasi" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title">Hapus Lokasi</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="id_lokasi" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_lokasi" value="<?= $row['id_lokasi'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_lokasi" class="col-sm-4 col-form-label">Nama Lokasi</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_lokasi" value="<?= $row['nama_lokasi'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <textarea class="form-control" name="alamat" rows="2" readonly><?= $row['alamat'];?></textarea>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jam_operasional" class="col-sm-4 col-form-label">Jam Operasional</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="jam_operasional" value="<?= $row['jam_operasional'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tipe" class="col-sm-4 col-form-label">Tipe</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="tipe" value="<?= $row['tipe'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="tarif" class="col-sm-4 col-form-label">Tarif</label>
                            <div class="col-sm-8">
                                <input type="number" class="form-control" name="tarif" value="<?= $row['tarif'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6 class="mx-5 my-3 pr-3">Anda yakin ingin menghapus <?= $row['nama_lokasi'];?> dari daftar lokasi?</h6>
                        <button type="submit" class="btn btn-success" name="hapusLokasi" value="hapusLokasi">Hapus</button>
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