<?php
$nomor_parkir = $_POST["nomor_parkir"];

$date = date("y-M-d H:i:s");
echo "<table>";
$koneksi = mysqli_connect("localhost","root",'',"parkir");

// $insert_data = mysqli_query($koneksi,"INSERT INTO detail_booking values ('','$lantai','$nomor_parkir','$plat','$kedatangan')");
// header("location:check-in.php");

$insert_nomor = mysqli_query($koneksi,"INSERT INTO detail_booking (nomor_parkir) VALUES ('$nomor') where id is select max(id) from detail_booking ");
// $sql = mysqli_query($koneksi,"SELECT * FROM detail_booking ");
// while($row = mysqli_fetch_assoc($sql)){
//     echo "<tr><td>$row[plat]</td><td>$row[kedatangan]</td></tr>";
// }
?>
</table>
Nomor Parkir <?php echo $date; ?><br>
Plat <input type="text" ><br>
Plat <input type="text" ><br>
Plat <input type="text" > <button></button>