<?php
include 'koneksi.php';

 $output2 = '';  
 if(isset($_POST["id_bulan"])) {  
        $sqll = "select if(b.no_bln < t.tgl_jth_tempo, '10000','0') as denda
                            from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                            inner join tb_tagihan t on k.id_pakai=t.id_pakai
                            inner join tb_bulan b on k.bulan=b.id_bulan 
                            where k.bulan= '".$_POST['id_bulan']."' and p.id_pelanggan= '".$_POST["id_pelanggan"]."'"   ;
        $hasill = mysqli_query($koneksi, $sqll);  
        while($roww = mysqli_fetch_array($hasill)) {  
            $output2 .= $roww["denda"];
        }  
        echo $output2;  
    }

?>

