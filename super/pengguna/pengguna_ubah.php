<?php

    if(isset($_GET['kode'])){
        $sql_cek = "SELECT * FROM tb_user WHERE id_user='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div class="panel panel-info">
    <div class="panel-heading">
        <b>Ubah Pengguna</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST">

                    <div class="form-group">
                        <input type='hidden' class="form-control" name="id_user" value="<?php echo $data_cek['id_user']; ?>" readonly/>
                    </div>

                    <div class="form-group">
                        <label>Nama lengkap</label>
                        <input class="form-control" name="nama_user" value="<?php echo $data_cek['nama_user']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Username</label>
                        <input class="form-control" name="username" value="<?php echo $data_cek['username']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" name="password" id="pass" value="<?php echo $data_cek['password']; ?>"/>
                        <input id="mybutton" onclick="change()" type="checkbox" class="form-checkbox"> Lihat Password
                    </div>

                    <div class="form-group">
                    <label>Level</label>
                    <select name="level" id="level" class="form-control" required>
                    <option value="">-- Pilih Level --</option>
                        <?php
                            //menhecek data yg dipilih sebelumnya
                            if ($data_cek['level'] == "Pelanggan") echo "<option value='Pelanggan' selected>Pelanggan</option>";
                            else echo "<option value='Pelanggan'>Pelanggan</option>";
                            
                            if ($data_cek['level'] == "Operator") echo "<option value='Operator' selected>Operator</option>";
                            else echo "<option value='Operator'>Operator</option>";
                    
                            if ($data_cek['level'] == "Administrator") echo "<option value='Administrator' selected>Administrator</option>";
                            else echo "<option value='Administrator'>Administrator</option>";
        
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>No. HP</label>
                        <input class="form-control" name="no_hp" value="<?php echo $data_cek['no_hp']; ?>"/>
                    </div>

                    <div>
                        <input type="submit" name="Ubah" value="Ubah" class="btn btn-success" >
                        <a href="?halaman=pengguna_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
    $sql_ubah = "UPDATE tb_user SET
        nama_user='".$_POST['nama_user']."',
        username='".$_POST['username']."',
        password='".$_POST['password']."',
        level='".$_POST['level']."',
        no_hp='".$_POST['no_hp']."'
        WHERE id_user='".$_POST['id_user']."'";
    $query_ubah = mysqli_query($koneksi, $sql_ubah);
    if ($query_ubah) {
        echo "<script>alert('Ubah Berhasil')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pengguna_tampil'>";
    }else{
        echo "<script>alert('Ubah Gagal')</script>";
        echo "<meta http-equiv='refresh' content='0; url=index.php?halaman=pengguna_tampil'>";
    }

    //selesai proses ubah
}

?>

 <script type="text/javascript">
         function change()
         {
            var x = document.getElementById('pass').type;
 
            if (x == 'password')
            {
               document.getElementById('pass').type = 'text';
               document.getElementById('mybutton').innerHTML;
            }
            else
            {
               document.getElementById('pass').type = 'password';
               document.getElementById('mybutton').innerHTML;
            }
         }
      </script>