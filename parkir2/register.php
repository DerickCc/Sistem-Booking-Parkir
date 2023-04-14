<?php
$conn = mysqli_connect("localhost", "root", "", "parkir");

$was_validated = "";

if(isset($_POST["register"])){
    $email = $_POST['email'];
    $cekEmail = mysqli_query($conn, "SELECT email FROM pengguna WHERE email = '$email'");
    if(mysqli_num_rows($cekEmail) == 0){
        if($_POST["password"] == $_POST["cpass"]){
            $nama_depan = $_POST['nama_depan'];
            $nama_belakang = $_POST['nama_belakang'];
            $no_telp = $_POST['no_telp'];
            $password = $_POST['password'];

            $insert = mysqli_query($conn, "INSERT INTO pengguna VALUES ('', '$nama_depan', '$nama_belakang', '$email', '$no_telp', '', '$password', '')");

            if($insert){
                header("Location: login.php?status=1");
            } else {
                header("Location: register.php");
            }
        } else {
            $sama = false;
            $was_validated = "was-validated";
        }
    }
    else{
        header("Location: register.php?status=400");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>E-Parkir</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link rel="stylesheet" href="../css/stylederick.css">
    <link href="css/styles.css" rel="stylesheet" />
    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
</head>
<style>
    body{
        background: #F5F5F5;
    }
    .bg-theme, .btn-theme{
        background: #194184;
    }
</style>

<body>
    <nav class="sb-topnav navbar navbar-expand navbar-dark bg-theme">
        <a class="navbar-brand" href="login.php">E-Parkir</a>
    </nav>
    <div class="container">
        <div class="col-8 mx-auto my-3 px-0">
        <?php
            if(empty($_REQUEST['status'])){
                echo "";
            }
            elseif($_REQUEST['status'] == 400){
                echo '
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="fa-solid fa-circle-xmark mr-2"></i>
                    Mohon menggunakan email yang belum terdaftar!
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        ?>
        </div>
        <div class="card col-8 o-hidden border-0 shadow-lg mt-4 mx-auto">
            <div class="card-body col-12 p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="m-3">
                            <div class="text-center">
                                <p class="h4 text-gray-900 mb-4 font-weight-bold my-5">Buat Akun!</p>
                            </div>
                            <form class="user" method="post">
                                <div class="form-group row <?= $was_validated;?>">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="nama_depan" class="form-label">Nama Depan</label>
                                        <input type="text" name="nama_depan" class="form-control form-control-user" id="nama_depan" required
                                        style="border-radius: 7px;" placeholder="Nama Depan"> 
                                        <div class="invalid-feedback">Mohon meng-input nama depan dan belakang Anda</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="nama_belakang" class="form-label">Nama Belakang</label>
                                        <input type="text" name="nama_belakang" class="form-control form-control-user" id="nama_belakang" required
                                        style="border-radius: 7px;" placeholder="Nama Belakang">
                                    </div>
                                </div>

                                <div class="form-group <?= $was_validated;?>">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" class="form-control form-control-user" id="email" required
                                    style="border-radius: 7px;" placeholder="Email">
                                    <div class="invalid-feedback">Mohon meng-input email Anda</div>
                                </div>
                                <div class="form-group <?= $was_validated;?>">
                                    <label for="no_telp" class="form-label">No. Telepon</label>
                                    <input type="text" name="no_telp" class="form-control form-control-user" id="no_telp" required pattern="[0-9]+" minlength=10 maxlength=12
                                    style="border-radius: 7px;" placeholder="No. Telepon">
                                    <div class="invalid-feedback">Mohon meng-input no. telepon Anda</div>
                                </div>
                                <div class="form-group row <?= $was_validated;?>">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" name="password" class="form-control form-control-user" required
                                        style="border-radius: 7px;" id="password" placeholder="Password">
                                        <div class="invalid-feedback">Mohon meng-input password dan konfirmasi password</div>
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="cpass" class="form-label">Konfirmasi Password</label>
                                        <input type="password" name="cpass" class="form-control form-control-user" required
                                        style="border-radius: 7px;" id="cpass" placeholder="Konfirmasi Password">
                                    </div>
                                    <div class="fw-900 text-center">
                                        <?php 
                                            if(isset($sama)){
                                                echo 
                                                "<div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
                                                    <i class='fa-solid fa-circle-xmark mr-2'></i> Konfirmasi Password tidak sesuai!
                                                    <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                </div>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <button type="submit" name="register" class="btn btn-primary py-2 w-100 mt-3" style="border-radius: 5px;">Daftar</button>
                            </form>
                            <div class="text-center my-3">
                                <a class="small" href="login.php">Sudah memiliki akun? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</body>

</html>