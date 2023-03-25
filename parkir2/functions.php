<?php
    
    $koneksi = mysqli_connect("localhost", "root", "", "parkir");

    function query($query){
        global $koneksi;
        $result = mysqli_query($koneksi, $query);
        $rows =[];
        while($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    function tambahAkun($data){
        global $koneksi;
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        $result = mysqli_query($koneksi, "INSERT INTO pengguna (fname,lname,email,phone,password) values ('$fname', '$lname', '$email', ' $phone', '$password')");
        
        return mysqli_affected_rows($koneksi);
    }

    function tambahData($data){
        global $koneksi;
        $id = $_POST["id"];
        $lantai = $_POST["lantai"];
        $nama_slot = $_POST["nama_slot"];
        $plat = $_POST["plat"];
        $kedatangan = $_POST["kedatangan"];
        
        $date = strtotime($kedatangan);
        $date = date('l, jS \of F Y \a\t h:i:s A', $date);

        
        $query = "INSERT INTO detail_booking VALUES ('','user_1','$nama_slot', '$lantai', '$plat','$date','Unavailable')";
        $query2 = "UPDATE slot_parkir SET statusS = 'Unavailable' WHERE nama_slot = '$nama_slot' ";
        $result = mysqli_query($koneksi, $query);
        $result2 = mysqli_query($koneksi, $query2);
        

        
        // $result2 = mysqli_query($koneksi, "UPDATE slot_parkir SET statusS = 'Unavailable' WHERE nama_slot = '$nama_slot' ");
        
        return mysqli_affected_rows($koneksi);
    }

    function checkIn($data){
        global $koneksi;
        $id = $_POST["id"];
        // $coba = $_POST["coba"];
        var_dump($id);
        // var_dump($coba);
        $query = "UPDATE detail_booking SET statusB = 'Check-In' WHERE id = $id";
        $result = mysqli_query($koneksi, $query);

        return mysqli_affected_rows($koneksi);
    }

    function cancel($data){
        global $koneksi;
        $id = $_POST["id"];
        $nama_slot = $_POST["nama_slot"];
        $query = "UPDATE detail_booking SET statusB = 'Cancel' WHERE id = $id";
        $query2 = "UPDATE slot_parkir SET statusS = 'Available' WHERE nama_slot = '$nama_slot' ";
        $result = mysqli_query($koneksi, $query);
        $result2 = mysqli_query($koneksi, $query2);
        return mysqli_affected_rows($koneksi);
    }

    function checkOut($data){
        global $koneksi;
        $id = $_POST["id"];
        $nama_slot = $_POST["nama_slot"];
        $query = "UPDATE detail_booking SET statusB = 'Available' WHERE id = $id";
        $query2 = "UPDATE slot_parkir SET statusS = 'Available' WHERE nama_slot = '$nama_slot' ";
        $result = mysqli_query($koneksi, $query);
        $result2 = mysqli_query($koneksi, $query2);
        return mysqli_affected_rows($koneksi);
    }

    if(isset($_POST['lantai']) && isset($_POST['id']) && isset($_POST['plat']) && isset($_POST['kedatangan'])){
        // $lantai = $_POST["lantai"];
        // $id = $_POST["id"];
        // $plat = $_POST["plat"];
        // $kedatangan = $_POST["kedatangan"];
        // $statusB = $_POST["statusB"];

        // $fname = $_POST["fname"];
        // $lname = $_POST["lname"];
        // $email = $_POST["email"];
        // $phone = $_POST["phone"];
        // $password = $_POST["password"];

        // echo $id;

        // $koneksi = mysqli_connect("localhost","root",'',"parkir");
        // //  select , insert, delete , update
        // // UPDATE nama_tabel SET namakolom='?',namakolom2 ='?' WHERE nama_kolom = '?'
        // // DELETE FROM nama_tabel WHERE nama_kolom = ''?
        // // $insert_nomor = mysqli_query($koneksi,"INSERT INTO detail_booking (lantai, id) VALUES ('$lantai','$nomor') where id is select max(id) from detail_booking ");

        // $insert_data = mysqli_query($koneksi,"INSERT INTO detail_booking (id_pengguna,id,plat,kedatangan,statusB) values ('user_1','$id','$plat','$kedatangan','Unavailable')");
        // header("location:check-in.php");
    } else if (isset($_POST['statusB'])){
        
        $statusB = $_POST["statusB"];
        if($statusB == "Check-Out"){
            $koneksi = mysqli_connect("localhost","root",'',"parkir");
            // $ids = "SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1";
            // $insert_data  = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='N' where id = 1");
            $updatestatus = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='Available' where id = (SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1)");
            header("location:lantai1.php");
        } else if($statusB == "Check-In"){
            $koneksi = mysqli_connect("localhost","root",'',"parkir");
            // $ids = "SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1";
            // $insert_data  = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='N' where id = 1");
            $updatestatus = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='Check-In' where id = (SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1)");
            header("location:check-out.php");
        } else {
            $koneksi = mysqli_connect("localhost","root",'',"parkir");
            // $ids = "SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1";
            // $insert_data  = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='N' where id = 1");
            $updatestatus = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='Cancel' where id = (SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1)");
            header("location:lantai1.php");
        }
       
    } else if (isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['password'])){
        $fname = $_POST["fname"];
        $lname = $_POST["lname"];
        $email = $_POST["email"];
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        $koneksi = mysqli_connect("localhost","root",'',"parkir");
        $insert_data_pengguna = mysqli_query($koneksi, "INSERT INTO pengguna (fname,lname,email,phone,password) values ('$fname', '$lname', '$email', ' $phone', '$password')");
        header("location:login.php");
    }
    

    // $insert_status = mysqli_query($koneksi, "UPDATE detail_booking set statusB ='N' where id = 1");
    // $insert_status = mysqli_query($koneksi, "INSERT INTO detail_booking (lantai,id,plat,kedatangan) values ('anjay','anjay','anjay','anjay')");
    // header("location:check-out.php");
    // $ids = mysqli_query($koneksi, "SELECT id FROM detail_booking ORDER BY id DESC LIMIT 1");
    // $updatestatus = mysqli_query($koneksi, "UPDATE detail_booking set status ='N' where id = '$ids'");


    /*
    WHERE , ORDER, LIMIT ,dll
    $sql = mysqli_query($koneksi,"SELECT * FROM detail_booking ");
    while($row = mysqli_fetch_assoc($sql)){
        echo "$row[plat]";
    }
    */

    // if(isset($_POST['check-out'])){
    //     // $id = $_POST['id'];
    //     $id = mysqli_query($koneksi, "SELECT * FROM detail_booking WHERE id = (select MAX('id') FROM detail_booking)")
    //     echo $id;
    //     // $plat = $_POST['plat'];
    //     $updatestatus = mysqli_query($koneksi, "UPDATE detail_booking set status ='N' WHERE id = '$id' ");
    // }
    


    // $sql = mysqli_query($koneksi,"SELECT id,lantai,id,plat,kedatangan FROM detail_booking");

    // if($result->num_rows >0){
    //     while($row = mysqli_fetch_assoc($sql)){
    //         echo "<tr><td>". $row["id"] . "<tr><td>" . $row["lantai"] . "<tr><td>" . $row["id"] . "<tr><td>" . $row["plat"] . "<tr><td>" . $row["kedatangan"] . "<tr><td>";
    //     }
    //     echo "</table>";
    // } else {
    //     echo "0 result"; 
    // }
    // $koneksi-> close();
?>