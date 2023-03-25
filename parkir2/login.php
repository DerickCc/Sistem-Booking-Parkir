<?php
session_start();
require 'functions.php';


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
?>

<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Booking Parkir Sun Plaza</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
        <link rel="stylesheet" href="css/stylederick.css">
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <style>
        body{
            background: goldenrod;
            overflow: hidden;
        }
    </style>
    <body>
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="login.php">E-Parkir Sun Plaza</a>
        </nav>
        <div class="col12 slogan">
            <h1 class="text-center pt-5 mt-5">Males Nyari Parkir? Booking Aja</h1>
        </div>
        <section class="mid">
            <div class="login">
                <h1 class="text-center mb-4 ">Login</h1>
                <form class="needs-validaiton">
                    <div class="form-group mb-3 was-validated">
                        <label class="form-label" for="email" >Email</label>
                        <input class="form-control" type="email" name="email" id="email" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Mohon mengisi email Anda
                        </div> 
                    </div>
                    <div class="form-group mb-3 was-validated">
                        <label class="form-label" for="password">Password</label>
                        <input class="form-control" type="password" name="password" id="password" autocomplete="off" required>
                        <div class="invalid-feedback">
                            Mohon mengisi password Anda
                        </div> 
                    </div>
                    <div class="sign-up mb-3">
                        <p>No Account? <a href="sign-up.php">Sign Up</a></p>
                    </div>
                    
                        <a href="home.html" class="btn btn-success w-100 mb-1">Login</a>
                        <!-- <button class="btn btn-success w-100 mb-1" name="login" >Login</button> -->
                </form>
            </div>
        </section>
        


        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </body>
</html>