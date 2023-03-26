<?php require "../function.php" ?>

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
                                    <div class="input-group">
                                        <input type="search" id="searchLokasi" name= "searchLokasi" class="form-control" placeholder="Cari Pengguna"/>
                                        <button id="btnSearchLokasi" class="btn btn-success" type="button">
                                            <i class="fas fa-search"></i>
                                        </button>     
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#tambahPengguna">Tambah Pengguna</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
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
                                <tr>
                                    <td>1</td>
                                    <td>Johansenius</td>
                                    <td>Arifynies</td>
                                    <td>johansen.arifin@gmail.com</td>
                                    <td>082365478912</td>
                                    <td>GGabis123</td>
                                    <td class="text-center opsi">
                                        <!-- detail -->
                                        <!-- <button type="button" class="btn btn-primary">
                                            <i class="far fa-file-alt fa-lg"></i>
                                        </button> -->

                                        <!-- edit -->
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#editPengguna">
                                            <i class="fa-regular fa-pen-to-square fa-lg" style="color: #fff"></i>
                                        </button>

                                        <!-- delete -->
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletePengguna">
                                            <i class="far fa-trash-alt fa-lg"></i>
                                        </button>
                                    </td>
                                </tr>     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal tambah pengguna -->
    <div class="modal fade" id="tambahPengguna" tabindex="-1" aria-labelledby="tambahPengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Tambah Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST">
                    <div class="modal-body">
                        <div class="mb-3 row">
                            <label for="namaDepan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_depan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaBelakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_belakang" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="noTelp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telp" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="noTelp" class="col-sm-4 col-form-label">Password</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="password" required>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success" name="tambahPengguna" value="tambahPengguna">Simpan</button>
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- modal edit pengguna -->
    <div class="modal fade" id="editPengguna" tabindex="-1" aria-labelledby="editPengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="idPengguna" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="id_pengguna" value="1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaDepan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_depan" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaBelakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="nama_belakang" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" class="form-control" name="email" required>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="noTelp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" name="no_telp" required>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success" name="editPengguna" value="editPengguna">Simpan</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>

    <!-- modal delete pengguna -->
    <div class="modal fade" id="deletePengguna" tabindex="-1" aria-labelledby="deletePengguna" aria-hidden="true">
         <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Hapus Pengguna</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="">
                        <div class="mb-3 row">
                            <label for="idPengguna" class="col-sm-4 col-form-label">ID</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="id_pengguna" value="1">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaDepan" class="col-sm-4 col-form-label">Nama Depan</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="nama_depan" value="Johansenius">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="namaBelakang" class="col-sm-4 col-form-label">Nama Belakang</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="nama_belakang" value="Arifynies">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="email" class="col-sm-4 col-form-label">Email</label>
                            <div class="col-sm-8">
                                <input type="email" readonly class="form-control" name="email" value="johansen.arifin@gmail.com">
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="noTelp" class="col-sm-4 col-form-label">No. Telepon</label>
                            <div class="col-sm-8">
                                <input type="text" readonly class="form-control" name="no_telp" value="082365478912">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <h6 class="mx-5 my-3 pr-3">Anda yakin ingin menghapus data pengguna ini?</h6>
                    <button type="submit" class="btn btn-success" name="hapusPengguna" value="hapusPengguna">Hapus</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Batal</button>
                </div>
            </div>
        </div>
    </div>
    
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