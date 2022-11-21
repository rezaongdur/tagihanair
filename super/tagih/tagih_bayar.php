<?php

    if(isset($_GET['kode'])){
        $sql_cek = "select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status, k.tahun, k.pakai, b.nama_bulan, t.denda, b.no_bln, k.tgl_tegihan, DATE_FORMAt(tgl_jth_tempo,'%m') as tgl_jth_tempo, t.abodemen, if(b.no_bln < t.tgl_jth_tempo, '10000','0') as denda
        from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
        inner join tb_tagihan t on k.id_pakai=t.id_pakai
        inner join tb_bulan b on k.bulan=b.id_bulan
        where t.id_tagihan='".$_GET['kode']."'";
        $query_cek = mysqli_query($koneksi, $sql_cek);
        $data_cek = mysqli_fetch_array($query_cek,MYSQLI_BOTH);
    }

    $tanggal = date("Y-m-d");
    $tgl_jth_tempo = date("Y-m-15");

    // if(isset($_GET['kode'])){
    //     $sql_check = "select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status, k.tahun, k.pakai, b.nama_bulan, t.denda, b.no_bln, DATE_FORMAt(tgl_jth_tempo,'%m') as tgl_jth_tempo
    //     inner join tb_tagihan t on k.id_pakai=t.id_pakai
    //     inner join tb_bulan b on k.bulan=b.id_bulan
    //     where t.id_tagihan='".$_GET['kode']."'";
    //     $query_check = mysqli_query($koneksi, $sql_check);
    //     $data_check = mysqli_fetch_array($query_check,MYSQLI_BOTH);
    // }

?>
<style>
h3 {
    background-blend-mode: lighten;
  color: white;
  border: black;
}
tbody {
    color: black;
    background-color: transparent;
    border: black;
}
label {
    color: white;   
    font-size: small;
}
input {
    color: black;   
    font-size: small;
}

.button {
  display: inline-block;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: 1px;
  
  
  border: 1px;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: red}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  }
.button1 {padding: 12px 28px;background-color: orange;}
.button2 {padding: 12px 28px;background-color: blue;}

p {outline-color:red; outline-style: dashed;}
</style>
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3><b>Tagihan Pelanggan</b></h3>
                    </div>
                        <div class="panel-body">
                        
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    
                                    <tbody>
                                    <br>
                                        <tr>
                                            <td>ID | Nama Pelanggan</td>                                          
                                            <td width="80%">: <?php echo $data_cek['id_pelanggan'];?> - <?php echo $data_cek['nama_pelanggan'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Bulan | Tahun</td>
                                            <td>: <?php echo $data_cek['nama_bulan'];?> - <?php echo $data_cek['tahun'];?></td>
                                        </tr>
                                        <tr>
                                            <td>Tanggal Tagihan </td>
                                            <td>: <?php echo $data_cek['tgl_tegihan'];?> </td>
                                        </tr>
                                        <tr>
                                            <td>Pemakaian</td>
                                            <td>: <?php echo $data_cek['pakai'];?> M<sup> 3</sup></td>
                                        </tr>
                                        
                                        <tr>
                                            <td>Status</td>
                                            <td>:
                                            <?php $warna = $data_cek['status']  ?>
                                            <?php if ($warna == 'Belum Bayar') { ?>
                                                <span class="label label-danger">Belum Bayar</span>
                                            <?php } elseif ($warna == 'Lunas') { ?> 
                                                <span class="label label-primary">Lunas</span>
                                            </td>
                                            <?php } ?>
                                        </tr>

                                        <tr>
                                            <td>Abodemen</td>
                                            <td>:
                                            <?php echo rupiah($data_cek['abodemen']); ?>
                                            </td>
                                            
                                        </tr>
                                        <tr>
                                            <td>Tagihan</td>
                                            <td>: <?php echo rupiah($data_cek['tagihan']); ?></td>
                                        </tr>
                                        <tr>
                                            <td>Denda</td>
                                            <td>: 
                                                <?php echo rupiah($data_cek['denda']); ?>


                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Tagihan</td>
                                            <td>: <b> 
                                                <?php 
                                                $jmltag = $data_cek['tagihan'];
                                                $adm = $data_cek['abodemen'];
                                                if($jmltag > $adm) {
                                                    echo rupiah($data_cek['denda']+$data_cek['tagihan']);
                                                } else {
                                                    echo rupiah($data_cek['denda']+$data_cek['tagihan']+$data_cek['abodemen']);
                                                    
                                                }
                                                ?></b></td>
                                        </tr>

                                    </tbody>

                                </table></div>
                            </div><br>
                        </div>
                        
                        <p>
                        <div class="panel-heading">
                            <div class="panel-heading">
                                <h3><b>Pembayaran Tagihan</b></h3>
                            </div>
                            <div class="panel-body">
                                <form method="POST">
                                    <?php $status = $data_cek['status']  ?>
                                    <?php if ($status == 'Belum Bayar') { ?>

                                    <div class="form-group">
                                        <input type='hidden' class="form-control" name="id_tagihan" value="<?php echo $data_cek['id_tagihan']; ?>" readonly/>
                                    </div>

                                    <div class="form-group">
                                        <input type='hidden' class="form-control" name="tagih" id="tagih" value="<?php echo $data_cek['tagihan']; ?>" readonly/>
                                    </div>
                                    <div class="form-group">
                                        <input type='hidden' class="form-control" name="denda" id="denda" value="<?php echo $data_cek['denda']; ?>" readonly/>
                                    </div>
                                    
                                        
                                    <div class="form-group">
                                        <label>Uang Pembayaran</label>
                                        <input type='text' class="form-control" name="bayar" id="bayar" placeholder="Uang pembayaran" >
                                    </div>

                                       

                                    <div class="form-group">
                                        <label>Uang Kembalian</label>
                                        <input type='text' class="form-control" name="kembali" id="kembali" required />
                                    </div>
                                        

                                    <div class="form-group">
                                        <label>Bukti Pembayaran</label>
                                        <input type="file" class="form-control" id="berkas" name="berkas" >
                                    </div>

                                        
                                    <div>
                                        <input type="submit" name="Bayar" value="Bayar" class="button button2">
                                        <a href="?halaman=tagih_tampil" title="Kembali" class="button button1">Batal</a>
                                        
                                        <?php }elseif ($status == 'Lunas') { ?>
                                        <a href="./report/cetak_pembayaran.php?id_tagihan=<?php echo $data_cek['id_tagihan']; ?>" target=" _blank" title="Cetak Struk" class="btn btn-success"><i class="glyphicon glyphicon-print"></i> Cetak Struk</a>   
                                        <a href="?halaman=lunas_tampil" title="Pembayaran Lunas" class="btn btn-default">Tagihan Lunas</a>
                                    </div>
                                    <?php } ?>
                                </form>
                            </div>
                        </div>
                        </p>
                </div>


    <?php
    if (isset ($_POST['Bayar'])){
            $berkas =  $_FILES['berkas']['name'];
            $file_name = $_FILES['berkas']['name'];
            $file_tmp = $_FILES['berkas']['tmp_name'];
            if($file_name!=''){
            move_uploaded_file($file_tmp,"uploads/".$file_name);
        }
        //mulai proses simpan data
        $sql_simpan = "INSERT INTO tb_pembayaran (id_tagihan, tgl_bayar, uang_bayar, kembali, berkas, denda) VALUES (
            '".$_POST['id_tagihan']."',
            '".$tanggal."',
            '".$_POST['bayar']."',
            '".$_POST['kembali']."',
            '".$_POST['berkas']."',
            '".$_POST['denda']."');";
        $sql_simpan .= "UPDATE tb_tagihan SET
            status='Lunas'
            WHERE id_tagihan='".$_POST['id_tagihan']."'";
        $query_simpan = mysqli_multi_query($koneksi, $sql_simpan);

        mysqli_close($koneksi);

        if ($query_simpan)
        {
            echo "<script>
                    Swal.fire({title: 'Pembayaran Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?halaman=tagih_bayar&kode=".$_POST['id_tagihan']."';
                        }})</script>";
        }else{
            echo "<script>
                    Swal.fire({title: 'Pembayaran Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                    }).then((result) => {
                        if (result.value) {
                            window.location = 'index.php?halaman=tagih_bayar&kode=".$_POST['id_tagihan']."';
                        }})</script>";
        }
        //selesai proses simpan data
        }
    
?>

<!-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script> -->
<script type="text/javascript" src="assets/js/jquery-3.4.1.min.js" > </script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#tagih, #bayar").keyup(function() {
            var tagih  = $("#tagih").val();
            var bayar = $("#bayar").val();
            var kembali = parseInt(bayar) - parseInt(tagih);
            $("#kembali").val(kembali);

        });
    });
</script>

<script type="text/javascript">
    $(document).ready(function() {
        $("#tagih, #bayar").keyup(function() {
            var tagih  = $("#tagih").val();
            var bayar = $("#bayar").val();
            var kembali = parseInt(bayar) - parseInt(tagih);
            $("#kembali").val(kembali);

        });
    });
</script>

