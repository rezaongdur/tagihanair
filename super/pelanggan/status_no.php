<?php
if(isset($_GET['kode'])){
    $sql_ver = "UPDATE tb_pelanggan SET status='Non Aktif' WHERE id_pelanggan='".$_GET['kode']."'";
    $query_ver = mysqli_query($koneksi, $sql_ver);

            if ($query_ver) {
                echo "<script>alert('Non Aktif Pelanggan Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
            }else{
                echo "<script>alert('Non Aktif Pelanggan Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
            }
        }

?>