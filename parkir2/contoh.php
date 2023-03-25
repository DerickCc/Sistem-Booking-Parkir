
        <?php
        $koneksi = mysqli_connect("localhost","root","","parkir");
        $sql_dataparkir = mysqli_query($koneksi,"SELECT * FROM slot_parkir ORDER by  id ASC"); // DESC (ORDER by auntuk mengurutkan utrutkan bedasarkan lantai atau pengguanan WHERE)
        while($row = mysqli_fetch_assoc($sql_dataparkir)){
            if($row["statusS"] == "Available"){
                $color = "green";
            }
            else{
                $color ="red";
            }
            echo "<x style='background-color:$color;margin-left:3px;'>$row[id]$row[statusS]</x>";
        }
        ?>