<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_layanan WHERE id_layanan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Layanan</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    <div class="form-group">
                        <input type='hidden' class="form-control" name="id_layanan" value="<?php echo $data_cek['id_layanan']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input class="form-control" name="nama_layanan" value="<?php echo $data_cek['layanan']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Tarif Per Meter</label>
                        <input class="form-control" name="tarif" value="<?php echo $data_cek['tarif']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=layanan_tampil" title="Kembali" class="btn btn-default">Batal</a>
                    </div>

            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php

if (isset ($_POST['Ubah'])){
    //mulai proses ubah
    $sql_ubah = "UPDATE tb_layanan SET
        layanan='".$_POST['nama_layanan']."',
        tarif='".$_POST['tarif']."'
        WHERE id_layanan='".$_POST['id_layanan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=layanan_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=layanan_tampil'>";
    }

    //selesai proses ubah
}

?>