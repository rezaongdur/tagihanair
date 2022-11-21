<?php
$data_nama_lengkap = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];
?>
<div class="row row-group m-0">
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h6 class="text-white mb-0"> 
                  <?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_pelanggan) from tb_pelanggan where status='Aktif'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]." Pelanggan Aktif";
                    }
                    ?> 
                    <span class="float-right"><i class="zmdi zmdi-accounts-outline"></i></span></h6>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <h6><p class="mb-0 text-white small-font">
                  	<?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_pelanggan) from tb_pelanggan where status='Non Aktif'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]." Pelanggan Tidak Aktif";
                    }
                    ?><span class="float-right"><i class="zmdi zmdi-mood-bad"></i></span></h6>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h6 class="text-white mb-0"> 
					<?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_tagihan) from tb_tagihan where status='Belum Bayar'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]." Tagihan Belum Bayar";
                    }
                    ?>
                  	<span class="float-right"><i class="fa fa-usd"></i></span>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">
					<?php // menghitung
                    $sql_hitung = "SELECT COUNT(id_tagihan) from tb_tagihan where status='Lunas'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0]." Tagihan Lunas";
                    }
                    ?>
                  	<span class="float-right"> <i class="fa fa-usd"></i></i></span></p></h6>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h6 class="text-white mb-0"> 
					<?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan) from tb_tagihan where status='Belum Bayar'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  "- ".rupiah($row[0]);
                    }
                    ?>
                  	<span class="float-right"><i class="zmdi zmdi-block"></i> </span>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">
					<?php // menghitung
                    $sql_hitung = "SELECT sum(uang_bayar) from tb_pembayaran";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  "+ ".rupiah($row[0]);
                    }
                    ?>
                  	<span class="float-right"><i class="zmdi zmdi-balance-wallet"></i></span></p></h6>
                </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3 border-light">
                <div class="card-body">
                  <h6 class="text-white mb-0"> 
					<?php // menghitung
                    $sql_hitung = "SELECT count(id_pakai) from tb_pakai where pakai>='1'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo $row[0]." Pelanggan Aktif";
                    }
                    ?>
                  	<span class="float-right"><i class="zmdi zmdi-block"></i> </span>
                    <div class="progress my-3" style="height:3px;">
                       <div class="progress-bar" style="width:55%"></div>
                    </div>
                  <p class="mb-0 text-white small-font">
					<?php // menghitung
                    $sql_hitung = "SELECT sum(pakai) from tb_pakai where pakai>='1'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  "Pemakaian ".$row[0]." M";
                    }
                    ?><sup> 3</sup>
                  	<span class="float-right"><i class="zmdi zmdi-spinner"></i></span></p></h6>
                </div>
            </div>
       </div>
</p></a>

<h2>&emsp;Selamat Datang</h2>
<h3>
	&emsp;&emsp;<?php echo $data_nama_lengkap; ?>(
	<?php echo $data_level; ?>), Di Aplikasi Pembayaran Tagihan Air.</h3>
<hr/>
</div>
	<div class="col-10 col-lg-12 col-xl-12">
	    <div class="card">
		 <div class="card-header">Grafik Pembayaran Tagihan Air
		   
		 </div>
		 <div class="card-body">
		    <ul class="list-inline">
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-white border-light-3"></i>Sudah Bayar</li>
			  <li class="list-inline-item"><i class="fa fa-circle mr-2 text-light border-light"></i>Belum Bayar</li>
			</ul>
			<div class="chart-container-1">
			  <canvas id="chart1"></canvas>
			  <font size="1">*Label Angka dalam grafik dibagi 10.000 ((Jumlah bayar/jumlah tagihan)/10000))</font>
			</div>
		 </div>
		 
		 <div class="row m-0 row-group text-center border-top border-light-3">
		   <div class="col-12 col-lg-6">
		     <div class="p-3">
		       <h5 class="mb-0"><?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan) from tb_tagihan where status='Belum Bayar'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  "- ".rupiah($row[0]);
                    }
                    ?></h5>
			   <small class="mb-0">Belum Membayar Tagihan <span> <i class="fa fa-arrow-down"></i> </span></small>
		     </div>
		   </div>
		   <div class="col-12 col-lg-6">
		     <div class="p-3">
		       <h5 class="mb-0"><?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan) from tb_tagihan where status='Lunas'";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  "+ ".rupiah($row[0]);
                    }
                    ?></h5>
			   <small class="mb-0">Sudah Membayar Tagihan <span> <i class="fa fa-arrow-up"></i> </span></small>
		     </div>
		   </div>
		 </div>
		 
		</div>
	 </div>


