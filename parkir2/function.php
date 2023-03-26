<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "parkir");

//tambah pengguna
if(isset($_POST['tambahPengguna'])){
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];

    $insert = mysqli_query($conn, "INSERT INTO pengguna VALUES ('', '$nama_depan', '$nama_belakang', '$email', '$no_telp', '$password')");

    if($insert){
        header('location:data-pengguna.php');
    }
    else{
        echo $mysqli_error($conn);
    }
}

?>