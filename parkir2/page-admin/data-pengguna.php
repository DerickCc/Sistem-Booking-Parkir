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
                <h3>Pengguna</h3>
                <div class="card">
                    <div class="card-header">
                        <div class="card-title mt-2">
                            <div class="row">
                                <div class="col-7">
                                    <span class="title">Daftar Pengguna</span>
                                </div>
                                <div class="col-3">
                                    <form method="POST">
                                        <div class="input-group">
                                            <input type="search" id="nama_pengguna" name= "nama_pengguna" class="form-control" placeholder="Cari Nama Pengguna" autocomplete="off"/>
                                            <button name="cariNamaPengguna" class="btn btn-success" type="submit">
                                                <i class="fas fa-search"></i>
                                            </button> 
                                        </div>
                                    </form>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahPengguna">Tambah Pengguna</button>
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
                                        echo "Data Pengguna Berhasil Ditambahkan.";
                                    }
                                    elseif($_REQUEST['status']==2){
                                        echo "Data Pengguna Berhasil Diedit.";
                                    }
                                    else{
                                        echo "Data Pengguna Berhasil Dihapus";
                                    }
                                    echo "<button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                </div>";
                            }
                            elseif($_REQUEST['status']==0){
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
                                    <th>Nama Depan</th>
                                    <th>Nama Belakang</th>
                                    <th>Email</th>
                                    <th>No. Telepon</th>
                                    <th>Password</th>
                                    <th class="text-center">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $nama_pengguna = empty($_REQUEST['nama_pengguna']) ? "" : $_REQUEST['nama_pengguna'];
                                $selectPengguna = mysqli_query($conn, "SELECT * FROM pengguna WHERE CONCAT(nama_depan, ' ', nama_belakang) LIKE '%$nama_pengguna%'");
                                while($row = mysqli_fetch_assoc($selectPengguna)){
                                ?>
                                <tr>
                                    <td><?= $row['id_pengguna'];?></td>
                                    <td><?= $row['nama_depan'];?></td>
                                    <td><?= $row['nama_belakang'];?></td>
                                    <td><?= $row['email'];?></td>
                                    <td><?= $row['no_telp'];?></td>
                                    <td><?= $row['password'];?></td>
                                    <td class="text-center opsi">
                                        <!-- detail -->
                                        <!-- <button type="button" class="btn btn-primary">
                                            <i class="far fa-file-alt fa-lg"></i>
                                        </button> -->

                                        <!-- edit -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPengguna<?= $row['id_pengguna'];?>">
                                            <i class="fa-regular fa-pen-to-square fa-lg" style="color: #fff"></i>
                                        </button>

                                        <!-- hapus -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#hapusPengguna<?= $row['id_pengguna'];?>">
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

    <!-- modal tambah pengguna -->
    <div class="modal fade" id="tambahPengguna" aria-labelledby="tambahPengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-success text-white">
                        <h4 class="modal-title">Tambah Pengguna</h4>
                        <button type="reset" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="nama_depan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_depan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_belakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_belakang" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email"autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_telp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telp" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahPengguna" value="tambahPengguna">Tambah</button>
                        <button type="reset" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- nyari id pengguna yg ingin diedit / dihapus-->
    <?php
    $selectPengguna = mysqli_query($conn, "SELECT * FROM pengguna");
    while($row=mysqli_fetch_assoc($selectPengguna)){
    ?>
    <!-- modal edit pengguna -->
    <div class="modal fade" id="editPengguna<?= $row['id_pengguna'];?>" aria-labelledby="editPengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-warning text-white">
                        <h4 class="modal-title">Edit Pengguna</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="id_pengguna" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_pengguna" value="<?= $row['id_pengguna'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_depan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_depan" value="<?= $row['nama_depan'];?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_belakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_belakang" value="<?= $row['nama_belakang'];?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="<?= $row['email'];?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_telp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telp" value="<?= $row['no_telp'];?>" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" value="<?= $row['password'];?>" autocomplete="off" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="editPengguna" value="editPengguna">Edit</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal hapus pengguna -->
    <div class="modal fade" id="hapusPengguna<?= $row['id_pengguna'];?>" aria-labelledby="hapusPengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form method="POST">
                    <div class="modal-header bg-danger text-white">
                        <h4 class="modal-title">Hapus Pengguna</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="id_pengguna" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="id_pengguna" value="<?= $row['id_pengguna'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_depan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_depan" value="<?= $row['nama_depan'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="nama_belakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_belakang" value="<?= $row['nama_belakang'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" value="<?= $row['email'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="no_telp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telp" value="<?= $row['no_telp'];?>" readonly>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="password" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" value="<?= $row['password'];?>" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <h6 class="mx-5 my-3 pr-3">Anda yakin ingin menghapus data pengguna ini?</h6>
                        <button type="submit" class="btn btn-success" name="hapusPengguna" value="hapusPengguna">Hapus</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php
    }
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/chart-area-demo.js"></script>
    <script src="assets/demo/chart-bar-demo.js"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
    <script src="assets/demo/datatables-demo.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
</body>
</html>