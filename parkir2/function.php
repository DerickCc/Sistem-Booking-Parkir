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

    $update = mysqli_query($conn, "UPDATE pengguna SET 
    nama_depan='$nama_depan', 
    nama_belakang='$nama_belakang', 
    email='$email', 
    no_telp='$no_telp',
    password='$password' WHERE id_pengguna = '$id_pengguna'");

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


?>