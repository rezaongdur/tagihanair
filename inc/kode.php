<?php
//kode 5 digit
  
$carikode = mysqli_query($koneksi,"SELECT id_pakai FROM tb_pakai order by id_pakai desc limit 1");
$datakode = mysqli_fetch_array($carikode);
$kode = $datakode['id_pakai'];
$urut = substr($kode, 6);
$tambah = (int) $urut + 1;

         if (strlen($tambah) == 1){
             $format = date('Ym')."0000".$tambah;
                 }else if (strlen($tambah) == 2){
                 $format = date('Ym')."000".$tambah;
                     }else if (strlen($tambah) == 3){
                     $format = date('Ym')."00".$tambah;
                         }else if (strlen($tambah) == 4){
                         $format = date('Ym')."0".$tambah;
                             }else (strlen($tambah) == 5){
                             $format = date('Ym').$tambah
                                }
                        
?>