<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "parkir");

// //cek login terdaftar apa tidak
// if(isset($_POST['login'])){
//     $nama = $_POST['nama'];
//     $password = $_POST['password'];
    
// //cek database
//     $cekdatabase = mysqli_query($koneksi,"Select * from login where nama='$nama' and password='$password'");
//     //hitung jumlah data
//     $hitung = mysqli_num_rows($cekdatabase);
//     if($hitung>0){
//         $_SESSION['log']='True';
//         header('location:home.html');
//     }
//     else{
//         header('location:login.php');
//     };
    
// };

// if(!isset($_SESSION['log'])){

// } else {
//     header('location:home.html');
// }
$was_validated = "";
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $email = $_POST["email"];
    $password = $_POST["password"];

    
    $hsl = mysqli_query($conn, "SELECT * FROM pengguna WHERE email = '$email' AND password = '$password' LIMIT 1");
    
    $jmlhRow = mysqli_affected_rows($conn);
    $row = mysqli_fetch_assoc($hsl);

    if($jmlhRow > 0){ 
        if($row["email"] == $email && $row["password"] == $password){
            $_SESSION['id_pengguna'] = $row['id_pengguna'];
            $_SESSION['role'] = $row['role'];

            if($row['role'] == 0){
                header("location: page-user/home.php");
            } else if($row['role'] == 1) {
                header("location: page-admin/data-lokasi.php");
            }
        } 
    } else {
        $cek = false;
        $was_validated = "was-validated";
    }
}
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>E-Parkir</title>
        
        <meta name="description" content="">
        <meta name="author" content="">

        <!-- Custom fonts for this template-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            overflow: hidden;
        }
        .bg-theme, .btn-theme{
            background: #194184;
        }
    </style>

    <body>
            <nav class="sb-topnav navbar navbar-expand navbar-dark bg-theme">
                <a class="navbar-brand" href="login.php">E-Parkir</a>
            </nav>
            
                <div class="row justify-content-center">

                    <div class="col-xl-10 col-lg-12 col-md-9">
                    <?php
                        if(empty($_REQUEST['status'])){
                            echo "";
                        }
                        elseif($_REQUEST['status'] == 1){
                            echo '
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <i class="fa-solid fa-circle-check mr-2"></i> 
                                Akun berhasil dibuat.
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>';
                        }
                    ?>

                        <div class="card o-hidden border-0 shadow-lg mt-5">
                            <div class="card-body p-0">
                                <!-- Nested Row within Card Body -->
                                <div class="row">
                                    <div class="col-lg-6 d-none d-lg-block">
                                        <img src="img/carpark.jpg" alt="Parking Image" width="610px" height="610px">
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="p-5">
                                            <div class="text-center">
                                                <p class="h4 text-gray-900 mb-4 font-weight-bold">Welcome!</p>
                                            </div>
                                            <!-- action="<?php// echo $_SERVER['PHP_SELF']; ?>"  -->
                                            <form method="post" class="user needs-validation">
                                                <div class="form-group <?= $was_validated;?>">
                                                    <label for="email" class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control form-control-user" required id="email" placeholder="Email" style="border-radius: 7px;">
                                                    <div class="invalid-feedback">Mohon meng-input email Anda</div>
                                                </div>
                                                <div class="form-group <?= $was_validated;?>">
                                                    <label class="form-label" for="password">Password</label>
                                                    <input type="password" name="password" class="form-control form-control-user" required id="password"  placeholder="Password" style="border-radius: 7px;">
                                                    <div class="invalid-feedback">Mohon meng-input password Anda</div>
                                                    <?php
                                                        if(isset($cek)){
                                                            echo 
                                                            "<div class='alert alert-danger alert-dismissible fade show mt-3' role='alert'>
                                                                <i class='fa-solid fa-circle-xmark mr-2'></i> Email atau password Anda salah!
                                                                <button type='button' class='btn-close' data-bs-dismiss='alert'></button>
                                                            </div>";
                                                        }
                                                    ?>
                                                </div>
                                                <button type="submit" name="login" class="btn btn-primary py-2 w-100 mt-3" style="border-radius: 5px;">Login</button>
                                            </form>
                                            <hr>
                                            <div class="text-center">
                                                <a class="small" href="register.php">Tidak memiliki akun? Buat Akun!</a>
                                            </div>
                                        </div>
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
