<?php
include "inc/koneksi.php";  
?>
<style>
form {
	border-color: blue;
	lighting-color: blue;
	color: black;
	lighting-color: black;
	border-color: black;
}	

div {
	color: black;
}
label {
	color: black;
	
}

</style>
<div >
	<div class="panel-heading">
		<b>Tambah Pengguna</b>
	</div>
	<div class="panel-body">
		<div class="row">
			<div class="col-md-12">
				<form method="POST">

					<div class="form-group">
						<label>Nama lengkap</label>
						<input class="form-control" name="nama_user" placeholder="Masukkan nama pengguna" />
					</div>

					<div class="form-group">
						<label>Username</label>
						<input class="form-control" name="username" placeholder="Masukkan username pengguna" />
					</div>

					<div class="form-group">
						<label>Password</label>
						<input class="form-control" name="password" placeholder="Masukkan password pengguna" />
					</div>

					<div class="form-group">
						<label>Level</label>
						<select name="level" id="level" class="form-control" required>
							<option value="">-- Pilih Level --</option>
							<option>Pelanggan</option>
							<option>Operator</option>
							<option>Administrator</option>
						</select>
					</div>

					<div class="form-group">
						<label>No. HP</label>
						<input class="form-control" name="no_hp" placeholder="Masukkan no. hp pengguna" />
					</div>

					<div class="form-group">
						<label>No. Rekening</label>
						<input class="form-control" name="no_rek" placeholder="Khusus pelanggan | Masukkan no rekening" />
					</div>

					<div>
						<input type="submit" name="Simpan" value="Simpan" class="btn btn-success">
						<a href="?halaman=pengguna_tampil" title="Kembali" class="btn btn-default">Batal</a>
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
        $sql_simpan = "INSERT INTO tb_user (nama_user,username,password,level,no_hp,no_rek) VALUES (
        '".$_POST['nama_user']."',
        '".$_POST['username']."',
        '".$_POST['password']."',
        '".$_POST['level']."',
        '".$_POST['no_hp']."',
        '".$_POST['no_rek']."')";
        $query_simpan = mysqli_query($koneksi, $sql_simpan);
        if ($query_simpan) {
            echo "<script>alert('Simpan Berhasil')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=pengguna_tampil'>";
           
        }else{
            echo "<script>alert('Simpan Gagal')</script>";
            echo "<meta http-equiv='refresh' content='0; url=?halaman=pengguna_tampil'>";
        }
        //selesai proses simpan data
        }
    

