<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select t.id_tagihan,p.id_pelanggan, p.nama_pelanggan, k.id_pakai, k.tahun, k.awal, k.akhir, k.pakai, b.nama_bulan, t.status , k.berkas, j.layanan, j.tarif
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_bulan b on k.bulan=b.id_bulan
                                    inner join tb_layanan j on j.id_layanan=p.id_layanan
                                    where t.id_tagihan='".$_GET['kode']."'";
                                    
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }
?>


<div >
    <div class="panel-heading">
        <b>Tambah Pemakaian</b>
    </div>
    <div class="panel-body">
        <div class="row">
            <div class="col-md-12">
                <form method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>ID Pemakaian</label>
                        <input class="form-control" type="text" name="id_pakai" value="<?php echo $data_cek['id_pakai']; ?>" />
                    </div>

                    <div class="form-group">
                        <label>Pelanggan</label>
                        <select name="id_pelanggan" id="id_pelanggan" class="form-control" >
                        <option value=""><?php echo $data_cek['nama_pelanggan']; ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Bulan</label>
                        <select name="id_bulan" id="id_bulan" class="form-control" >
                        <option value=""><?php echo $data_cek['nama_bulan']; ?></option>
                        <?php
                        // ambil data dari database
                        $query = "select * from tb_bulan order by id_bulan asc";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['id_bulan'] ?>"> <?php echo $row['nama_bulan'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>

                    <div class="form-group">
                        <label>Tahun</label>
                        <input class="form-control" name="tahun" placeholder="Masukkan tahun"
                        value="<?php echo $data_cek['tahun']; ?>"/>
                    </div>

                    <div class="form-group">
                        <label>Meteran Bulan Lalu</label>
                        <input type="text" name="awal" id="awal" class="form-control" value="<?php echo $data_cek['awal']; ?>">
                    </div>

                    <div class="form-group">
                        <label>Meteran Bulan Ini</label>
                        <input type="text" name="akhir" id="akhir" class="form-control" value="<?php echo $data_cek['akhir']; ?>">
                    </div>

                    <div class="form-group mb-0">
                        <label>Pemakaian (Bulan Ini - Bulan lalu)</label>
                        <input type="text" name="total" id="total" class="form-control" value="<?php echo $data_cek['pakai']; ?>">
                    </div>
                    <div class="form-group">
                        <label>Foto Meteran</label> </br>
                        <center><img src="uploads/<?php echo $data_cek['berkas']; ?>" width="470" height="450" />

                        
                    </div>

                    <div class="form-group mb-0">
                        <select name="tarif" id="tarif" class="form-control" >
                            <label>Foto Bukti</label>
                        <option value=""><?php echo $data_cek['layanan']; ?> - Rp. <?php echo $data_cek['tarif']; ?><?php
                        // ambil data dari database
                        $query = "select * from tb_layanan";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($dat = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $dat['id_layanan'] ?>"><?php echo $dat['layanan'] ?>| <?php echo $dat['tarif']; ?></option>
                        <?php
                        }
                        ?>
                        </select>
                        

                        
                    </div>

                    <div class="form-group mb-0">
                        <input type="hidden" name="harga" id="harga" class="form-control"  readonly="">
                    </div>
                    
                    <!-- <div>
                        <a href="?halaman=pakai_tampil"><button class="fa "></button> type="submit" name="" value="Kembali" class="btn btn-success" ></a>
                        
                    </div> -->
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
    if (isset ($_POST['Simpan'])){
            $berkas =  $_FILES['berkas']['name'];
            $file_name = $_FILES['berkas']['name'];
            $file_tmp = $_FILES['berkas']['tmp_name'];
            if($file_name!=''){
            move_uploaded_file($file_tmp,"uploads/".$file_name);
        }
        //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pakai (id_pakai, id_pelanggan, bulan, tahun, awal, akhir, pakai,berkas) VALUES (
            '".$_POST['id_pakai']."',
            '".$_POST['id_pelanggan']."',
            '".$_POST['id_bulan']."',
            '".$_POST['tahun']."',
            '".$_POST['awal']."',
            '".$_POST['akhir']."',
            '".$_POST['total']."',
        '".$berkas."');";
        $sql_simpan .= "INSERT INTO tb_tagihan (id_pakai, tagihan) VALUES (
            '".$_POST['id_pakai']."',
            '".$_POST['harga']."')";   
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);
        
        mysqli_close($koneksi);

        if ($query_simpan)
        {
            echo "<script>
                    Swal.fire({title: 'Simpan Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?halaman=pakai_tampil';
                        }})</script>";
        }else{
            echo "<script>
                    Swal.fire({title: 'Simpan Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?halaman=pakai_tambah';
                        }})</script>";
        }
        //selesai proses simpan data
        }
        
    
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  

<script src="jquery.min.js"></script>  
<script>
    $(document).ready(function(){  
        $('#id_pelanggan').change(function(){  
            var id_pelanggan = $(this).val();  
            $.ajax({  
                url:"super/pakai/proses-ajax.php",  
                method:"POST",  
                data:{id_pelanggan:id_pelanggan},  
                success:function(data){  
                    $('#awal').val(data);  
                }  
            });  
        });  
    }); 
</script>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<!-- <script type="text/javascript" src="jquery-3.4.1.min.js"></script> -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#akhir, #awal").keyup(function() {
            var awal  = $("#awal").val();
            var akhir = $("#akhir").val();
            var total = parseInt(akhir) - parseInt(awal);
            $("#total").val(total);

            var tarif = $("#tarif").val();
            var harga = parseInt(total) * parseInt(tarif);
            $("#harga").val(harga);
        });
    });
</script>     