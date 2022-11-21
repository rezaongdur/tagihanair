<div class="row">
    <div class="col-md-6 col-sm-6">
        <div class="panel panel-info">
            <div class="panel-heading">
                <b>Laporan Tagihan</b>
            </div>
            <div class="panel-body"> 

            <form action="./report/laporan_tagihan.php" method="post" enctype="multipart/form-data" target="_blank">
             <div class="form-group">
                    <label>Laporan Bulan</label>   
                    <select name="bln1" class="form-control" required>
                        <option value=""> Pilih Bulan</option>
                <?php
                        // ambil data dari database
                        $query = "select * from tb_bulan";
                        $hasil = mysqli_query($koneksi, $query);
                        while ($row = mysqli_fetch_array($hasil)) {
                        ?>
                        <option value="<?php echo $row['id_bulan'] ?>"> <?php echo $row['nama_bulan'] ?></option>
                        <?php
                        }
                        ?>
                    </div>
                </select>
             </div>
                    <button type="submit" class="btn btn-primary" name="btnCetak" target="_blank">Cetak</button>

            </form>
            </div>
            <div class="panel-footer">
                Panel Footer
            </div>
        </div>
    </div>
</div>