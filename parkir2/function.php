<?php 
session_start();

$conn = mysqli_connect("localhost", "root", "", "parkir");

$id_pengguna = NULL;
if(isset($_SESSION['id_pengguna'])){
    $id_pengguna = $_SESSION['id_pengguna'];
}
else{
    die('Anda Tidak Memiliki Akses!');
}

$selectE_Money = mysqli_query($conn, "SELECT nama_depan, nama_belakang, email, no_telp, password, e_money FROM pengguna WHERE id_pengguna = '$id_pengguna'");
$row = mysqli_fetch_row($selectE_Money);
$nama_depan = $row[0];
$nama_belakang = $row[1];
$email = $row[2];
$no_telp = $row[3];
$password = $row[4];
$e_money = $row[5];

//data-pengguna
//tambah pengguna
if(isset($_POST['tambahPengguna'])){
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];
    $e_money = $_POST['e_money'];
    $role = $_POST['role'];

    $insert = mysqli_query($conn, "INSERT INTO pengguna VALUES ('', '$nama_depan', '$nama_belakang', '$email', '$no_telp', '$e_money', '$password', '$role' )");

    if($insert){
        header('location:data-pengguna.php?status=1');
    }
    else{
        header('location:data-pengguna.php?status=0');
    }
}

//edit pengguna
if(isset($_POST['editPengguna'])){
    $id_pengguna = $_POST['id_pengguna'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];
    $e_money = $_POST['e_money'];
    $role = $_POST['role'];

    $update = mysqli_query($conn, "UPDATE pengguna SET 
    nama_depan='$nama_depan', 
    nama_belakang='$nama_belakang', 
    email='$email', 
    no_telp='$no_telp',
    e_money='$e_money',
    password='$password',
    role='$role' WHERE id_pengguna = '$id_pengguna'");

    if($update){
        header('location:data-pengguna.php?status=2');
    }
    else{
        header('location:data-pengguna.php?status=0');
    }
}

//hapus pengguna
if(isset($_POST['hapusPengguna'])){
    $id_pengguna = $_POST['id_pengguna'];

    $delete = mysqli_query($conn, "DELETE FROM pengguna WHERE id_pengguna = '$id_pengguna'");

    if($delete){
        header('location:data-pengguna.php?status=3');
    }
    else{
        header('location:data-pengguna.php?status=0');
    }
}

//cari pengguna
if(isset($_POST['cariNamaPengguna'])){
    $nama_pengguna = $_POST['nama_pengguna'];  
    header('location:data-pengguna.php?nama_pengguna=' . $nama_pengguna);
}
//--------------------------------------------------------------------------------//

//data-lokasi
//tambah lokasi
if(isset($_POST['tambahLokasi'])){
    $nama_lokasi = $_POST['nama_lokasi'];
    $alamat = $_POST['alamat'];
    $tipe = $_POST['tipe'];
    $tarif = $_POST['tarif'];

    $insert = mysqli_query($conn, "INSERT INTO lokasi VALUES('', '$nama_lokasi', '$alamat', '$tipe', '$tarif')");

    if($insert){
        header('location:data-lokasi.php?status=1');
    }
    else{
        header('location:data-lokasi.php?status=0');
    }
}

//edit lokasi
if(isset($_POST['editLokasi'])){
    $id_lokasi = $_POST['id_lokasi'];
    $nama_lokasi = $_POST['nama_lokasi'];
    $alamat = $_POST['alamat'];
    $tipe = $_POST['tipe'];
    $tarif = $_POST['tarif'];

    $update = mysqli_query($conn, "UPDATE lokasi SET
    nama_lokasi='$nama_lokasi',
    alamat='$alamat',
    tipe='$tipe',
    tarif='$tarif' WHERE id_lokasi='$id_lokasi'");

    if($update){
        header('location:data-lokasi.php?status=2');
    }
    else{
        header('location:data-lokasi.php?status=0');
    }
}

//hapus lokasi
if(isset($_POST['hapusLokasi'])){
    $id_lokasi = $_POST['id_lokasi'];

    // $delete = mysqli_query($conn, "DELETE lokasi, detail_lokasi 
    //                                FROM lokasi INNER JOIN detail_lokasi ON lokasi.id_lokasi = detail_lokasi.id_lokasi 
    //                                WHERE lokasi.id_lokasi = '$id_lokasi'");
    $delete = mysqli_query($conn, "DELETE FROM lokasi WHERE id_lokasi = '$id_lokasi'");

    if($delete){
        header('location:data-lokasi.php?status=3');
    }
    else{
        header('location:data-lokasi.php?status=0');
    }
}

//cari lokasi
if(isset($_POST['cariNamaLokasi'])){
    $nama_lokasi = $_POST['nama_lokasi'];  
    header('location:data-lokasi.php?nama_lokasi=' . $nama_lokasi);
}
//--------------------------------------------------------------------------------//

//detail-lokasi
//tambah slot
if(isset($_POST['tambahSlot'])){
    $id_lokasi = $_POST['id_lokasi'];
    $nama_slot = $_POST['nama_slot'];
    $status_slot = $_POST['status_slot'];
    $lantai = $_POST['lantai'];

    $insert = mysqli_query($conn, "INSERT INTO detail_lokasi VALUES ('', '$id_lokasi', '$nama_slot', '$status_slot', '$lantai')");

    if($insert){
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=1');
    }
    else{
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=0');
    }
}

//edit Slot
if(isset($_POST['editSlot'])){
    $id_lokasi = $_POST['id_lokasi'];
    $id_slot = $_POST['id_slot'];
    $nama_slot = $_POST['nama_slot'];
    $status_slot = $_POST['status_slot'];
    $lantai = $_POST['lantai'];

    $update = mysqli_query($conn, "UPDATE detail_lokasi SET
    nama_slot='$nama_slot',
    status_slot='$status_slot',
    lantai='$lantai' WHERE id_slot='$id_slot'");

    if($update){
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=2');
    }
    else{
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=0');
    }
}

//hapus Slot
if(isset($_POST['hapusSlot'])){
    $id_lokasi = $_POST['id_lokasi'];
    $id_slot = $_POST['id_slot'];

    $delete = mysqli_query($conn, "DELETE FROM detail_lokasi WHERE id_slot = '$id_slot'");

    if($delete){
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=3');
    }
    else{
        header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&status=0');
    }
}

//cari slot
if(isset($_POST['cariNamaSlot'])){
    $id_lokasi = $_POST['id_lokasi'];  
    $nama_slot = $_POST['nama_slot'];  
    header('location:detail-lokasi.php?id_lokasi='.$id_lokasi.'&nama_slot=' . $nama_slot);
}

//--------------------------------------------------------------------------------//
// PENGGUNA

//profile
//simpan profile
if(isset($_POST['simpanProfile'])){
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $password = $_POST['password'];

    $update = mysqli_query($conn, "UPDATE pengguna SET 
    nama_depan='$nama_depan', 
    nama_belakang='$nama_belakang', 
    email='$email', 
    no_telp='$no_telp',
    password='$password' WHERE id_pengguna = '$id_pengguna'");

    if($update){
        header('location:profile.php?status=1');
    }
    else{
        header('location:profile.php?status=0');
    }
}

//topup
if(isset($_POST['topUp'])){
    $nominal = $_POST['nominal'];

    $update = mysqli_query($conn, "UPDATE pengguna SET e_money = $e_money + $nominal WHERE id_pengguna = '$id_pengguna'");

    if($update){
        header('location:topup.php?status=1');
    }
    else{
        header('location:topup.php?status=0');
    }
}

//booking
//cari slot
if(isset($_POST['cariLokasi'])){
    $nama_lokasi = $_POST['nama_lokasi'];  
    header('location:booking.php?nama_lokasi=' . $nama_lokasi);
}

//book parkir
if(isset($_POST['bookParkir'])){ 
    // $id_pengguna = $_POST['id_pengguna'];
    // $id_pengguna = 1;
    $id_slot = $_POST['id_slot'];
    $no_plat = $_POST['no_plat'];
    $tanggal = $_POST['tanggal'];
    $waktu_masuk = $_POST['waktu_masuk'];

    $insert = mysqli_query($conn, "INSERT INTO booking VALUES ('', '$id_pengguna', '$id_slot','$no_plat', '$tanggal', '$waktu_masuk', '', '', '', '', 'Booked')");
    $update = mysqli_query($conn, "UPDATE detail_lokasi SET status_slot = 'Unavailable' WHERE id_slot = '$id_slot'");

    if($insert && $update){
        header('location:berlangsung.php');
    }
    else{
        header('location:booking.php?status=0');
    }
}

//berlangsung
//check-In booking
if(isset($_POST['checkInBooking'])){
    $id_booking = $_POST['id_booking'];
    
    $update = mysqli_query($conn, "UPDATE booking SET status_booking = 'Parked' WHERE id_booking = '$id_booking'");

    if($update){
        header('location:berlangsung.php?status=1');
    }
    else{
        header('location:berlangsung.php?status=0');
    }
}

//cancel booking
if(isset($_POST['cancelBooking'])){
    $id_booking = $_POST['id_booking'];
    $id_slot = $_POST['id_slot'];
    
    $update = mysqli_query($conn, "UPDATE booking SET status_booking = 'Cancel', waktu_keluar = NULL, durasi = NULL, metode_bayar = NULL
                                   WHERE id_booking = '$id_booking'");
    $update2 = mysqli_query($conn, "UPDATE detail_lokasi SET status_slot = 'Available' WHERE id_slot = '$id_slot'");

    if($update && $update2){
        header('location:berlangsung.php?status=2');
    }
    else{
        header('location:berlangsung.php?status=0');
    }
}

//check-Out booking
if(isset($_POST['checkOutBooking'])){
    $id_booking = $_POST['id_booking'];
    $id_slot = $_POST['id_slot'];
    $tarif = $_POST['tarif'];
    $waktu_masuk = $_POST['waktu_masuk'];

    date_default_timezone_set ("Asia/Jakarta");
    $waktu_keluar = date("H:i");

    $jam = (int)substr($waktu_keluar,0,2) - (int)substr($waktu_masuk,0,2);
    $menit = (int)substr($waktu_keluar,-2) - (int)substr($waktu_masuk,-2);
    $durasi = $jam . " jam " . $menit . " menit";
    // echo $time_out - $time_in;
    if($menit>0){
        $biaya = ($jam + 1) * $tarif ;
    }
    else{
        $biaya = $jam * $tarif;
    }
    
    $update = mysqli_query($conn, "UPDATE booking SET status_booking = 'Finish', waktu_keluar = '$waktu_keluar', biaya = $biaya, durasi = '$durasi' WHERE id_booking = '$id_booking'");
    $update2 = mysqli_query($conn, "UPDATE detail_lokasi SET status_slot = 'Available' WHERE id_slot = '$id_slot'");

    if($update && $update2){
        header('location:selesai.php?status=1');
    }
    else{
        header('location:berlangsung.php?status=0');
    }
}

//Selesai
//bayar Parkir
if(isset($_POST['bayarParkir'])){
    $id_booking = $_POST['id_booking'];
    // $id_pengguna = $_POST['id_pengguna'];
    $metode_bayar = $_POST['metode_bayar'];
    $e_money = $_POST['e_money'];
    $biaya = $_POST['biaya'];

    $update = mysqli_query($conn, "UPDATE booking SET metode_bayar = '$metode_bayar' WHERE id_booking = '$id_booking'");
    $update2 = NULL;

    if($metode_bayar == 'E-money'){
        $update2 = mysqli_query($conn, "UPDATE pengguna SET e_money = $e_money - $biaya WHERE id_pengguna = '$id_pengguna'");
    }

    header('location:selesai.php?status=2');
}

?>