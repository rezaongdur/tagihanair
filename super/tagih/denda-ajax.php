<?php
    $koneksi = new mysqli ("localhost","root","","db_air");

  $outputt = ''; 
    if(isset($_POST['kode'])){
        $sql_cek = "select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status, k.tahun, k.pakai, b.nama_bulan, t.denda, b.no_bln, k.tgl_tegihan, DATE_FORMAt(tgl_jth_tempo,'%m') as tgl_jth_tempo, if(b.no_bln < tgl_jth_tempo, "10000","0") as denda
        from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
        inner join tb_tagihan t on k.id_pakai=t.id_pakai
        inner join tb_bulan b on k.bulan=b.id_bulan
        where  t.id_tagihan='".$_POST['id_tagihan']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
         while($data_cek = mysqli_fetch_array($query_cek)) {  
            $outputt .= $data_cek["denda"];
        }  
        echo $outputt;  
    }  
?>