<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_info WHERE id_info='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Buat Info</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <input type='hidden' class="form-control" name="id_info" value="<?php echo $data_cek['id_info']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Isi Info</label>
                        <textarea class="form-control" name="isi_info" rows="5" value="<?php echo $data_cek['isi_info']; ?>" required></textarea>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Simpan" class="btn btn-success" >
                        <a href="?halaman=info_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
    $sql_ubah = "UPDATE tb_info SET
        isi_info='".$_POST['isi_info']."'
        WHERE id_info='".$_POST['id_info']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=info_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=info_tampil'>";
    }

    //selesai proses ubah
}

?>