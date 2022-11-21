<?php
include 'koneksi.php';

 $output = '';  
 if(isset($_POST["id_pelanggan"])) {  
        $sql = "select max(akhir) as awal from tb_pakai where id_pelanggan= '".$_POST["id_pelanggan"]."'";
        $hasil = mysqli_query($koneksi, $sql);  
        while($row = mysqli_fetch_array($hasil)) {  
            $output .= $row["awal"];
        }  
        echo $output;  
    }

?>

