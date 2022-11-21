<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_pelanggan WHERE id_pelanggan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Pelanggan</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <label>No. Rekening</label>
                        <input class="form-control" name="id_pelanggan" value="<?php echo $data_cek['id_pelanggan']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input class="form-control" name="nama_pelanggan" value="<?php echo $data_cek['nama_pelanggan']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" value="<?php echo $data_cek['alamat']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Layanan</label>
                        <select name="id_layanan" id="id_layanan" class="form-control" required>
                        <option value="">-- Pilih Layanan --</option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_layanan";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {

                        //mengecek data yang dipilih sebelumnya
                        ?>
                        <option value="<?php echo $row['id_layanan'] ?>" <?=$data_cek['id_layanan'] == $row['id_layanan'] ? "selected" : null ?>>
                        <?php echo $row['layanan'] ?>| <?php echo $row['tarif'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="button button3" >
                        <a href="?halaman=pelanggan_tampil" title="Kembali" class="button button4">Batal</a>
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
    $sql_ubah = "UPDATE tb_pelanggan SET
        nama_pelanggan='".$_POST['nama_pelanggan']."',
        alamat='".$_POST['alamat']."',
        no_hp='".$_POST['no_hp']."',
        id_layanan='".$_POST['id_layanan']."'
        WHERE id_pelanggan='".$_POST['id_pelanggan']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
    }

    //selesai proses ubah
}

?>