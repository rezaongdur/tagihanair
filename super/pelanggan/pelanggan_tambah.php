<?php
include "inc/koneksi.php";  
?>

<div >
    <div class="panel-heading">
        <b>Tambah Pelanggan</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">
                    
                    <div class="form-group">
                        <label>ID</label>
                        <input class="form-control" name="id_pelanggan" />
                    </div>
                    
                    <div class="form-group">
                        <label>Nama Pelanggan</label>
                        <input class="form-control" name="nama_pelanggan" />
                    </div>

                    <div class="form-group">
                        <label>Alamat</label>
                        <input class="form-control" name="alamat" />
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input class="form-control" name="no_hp" />
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
                        ?>
                        <option value="<?php echo $row['id_layanan'] ?>"><?php echo $row['layanan'] ?>| <?php echo rupiah($row['tarif']); ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" required/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input class="form-control" name="password" required/>
                    </div>

                    <div>
                        <input type="submit" name="Simpan" value="Simpan" class="button button4" >
                        <a href="?halaman=pelanggan_tampil" title="Kembali" class="button button3">Batal</a>
                    </div>
            </div>
            </form>
        </div>

    </div>
</div>
</div>


<?php

    if (isset ($_POST['Simpan'])){
        //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pelanggan (id_pelanggan,nama_pelanggan,alamat,no_hp,id_layanan) VALUES (
        '".$_POST['id_pelanggan']."',
        '".$_POST['nama_pelanggan']."',
        '".$_POST['alamat']."',
        '".$_POST['no_hp']."',
        '".$_POST['id_layanan']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);

        $sql_simpan_1 = "INSERT INTO tb_user (nama_user,username,password,level,no_hp,no_rek) VALUES (
            '".$_POST['nama_pelanggan']."',
            '".$_POST['username']."',
            '".$_POST['password']."',
            'Pelanggan',
            '".$_POST['no_hp']."',
            '".$_POST['id_pelanggan']."')";
            $query_simpan_1 = mysqli_query($koneksi, $sql_simpan_1);

        if ($query_simpan && $query_simpan_1) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pelanggan_tampil'>";
        }
        //selesai proses simpan data
        }
    

?>