<?php
if(isset($_GET['kode'])){
    $sql_ver = "UPDATE tb_pelanggan SET status='Aktif' WHERE id_pelanggan='".$_GET['kode']."'";
    $query_ver = mysqli_query($koneksi, $sql_ver);

            if ($query_ver) {
                echo "<script>alert('Aktifkan Pelanggan Berhasil')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
            }else{
                echo "<script>alert('Aktifkan Pelanggan Gagal')</script>";
                echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
            }
        }

?>