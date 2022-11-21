<?php
$data_nama_lengkap = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];
$data_rek = $_SESSION["ses_rek"];
?>

<h2>Selamat Datang</h2>
<h3>
	<?php echo $data_rek; ?>|
	<?php echo $data_nama_lengkap; ?>(
	<?php echo $data_level; ?>), Di Aplikasi Pembayaran Tagihan Air.</h3>
<hr/>

<div class="row">
	<div class="col-md-6">
		<div class="panel panel-warning">
			<div class="panel-heading">
				<b>Info Tagihan</b>
			</div>
			<div class="panel-body">
				<table class="table table-striped">

					<tbody>
						<br>
						<tr>
							<td>
								<b>Belum Bayar</b>
							</td>
							<td width="60%">
								<b>:
									<?php // menghitung
                                                $sql = "SELECT COUNT(t.id_tagihan)
                                                from tb_tagihan t join tb_pakai k on t.id_pakai=k.id_pakai 
                                                join tb_pelanggan p on k.id_pelanggan=p.id_pelanggan 
                                                where t.status='Belum Bayar' and p.id_pelanggan='$data_rek'";
                                                $q_hit= mysqli_query($koneksi, $sql);
                                                while($row = mysqli_fetch_array($q_hit)) {
                                                    echo  $row[0]." Bulan";
                                                }
                                                ?>
								</b>
							</td>
						</tr>

						<tr>
							<td>
								<b>Tagihan Lunas</b>
							</td>
							<td width="60%">
								<b>:
									<?php // menghitung
                                                $sql = "SELECT COUNT(t.id_tagihan)
                                                from tb_tagihan t join tb_pakai k on t.id_pakai=k.id_pakai 
                                                join tb_pelanggan p on k.id_pelanggan=p.id_pelanggan 
                                                where t.status='Lunas' and p.id_pelanggan='$data_rek'";
                                                $q_hit= mysqli_query($koneksi, $sql);
                                                while($row = mysqli_fetch_array($q_hit)) {
                                                    echo  $row[0]." Bulan";
                                                }
                                                ?>
								</b>
							</td>
						</tr>
					</tbody>
				</table>
				</form>
			</div>
		</div>
	</div>

	<div class="col-md-6">
		<div class="panel panel-success">
			<div class="panel-heading">
				<b>Info Layanan</b>
			</div>
			<div class="panel-body">
				<table class="table table-striped">

					<tbody>
						<?php
                                    $sql = $koneksi->query("select * from tb_info");
                                    while ($data= $sql->fetch_assoc()) {
                                        ?>
						<h5>
							<b>&nbsp;Administrator :</b>
						</h5>
						<tr>
							<td>
								<?php echo $data['isi_info'];?>
							</td>
						</tr>
						<?php
                                    }?>
					</tbody>
				</table>
			</div>
		</div>
		</form>
	</div>
</div>
<hr/>
<div class="row">
	<div class="col-md-12">
		<!-- Advanced Tables -->
		<div class="panel panel-info">
			<div class="panel-heading">
				<b>Ketertiban Pembayaran Semua Pelanggan
					<span class="label label-danger">PENTING !</span>
				</b>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>No</th>
								<th>ID | Nama Plg</th>
								<th>Status</th>
								<th>Bulan - Tahun</th>
								<th>Tagihan</th>
								<th>Pembayaran</th>

							</tr>

						</thead>
						<tbody>

							<?php

                                    $no = 1;
                                    $sql = $koneksi->query("select p.id_pelanggan, p.nama_pelanggan, p.status as pel, t.tagihan, t.status, 
                                    k.tahun, k.pakai, b.nama_bulan 
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_bulan b on k.bulan=b.id_bulan where t.tagihan>='1'
                                    order by t.status asc, k.tahun asc, b.id_bulan asc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

							<tr>
								<td>
									<?php echo $no++; ?>
								</td>
								<td>
									<?php echo $data['id_pelanggan']; ?>-
									<?php echo $data['nama_pelanggan']; ?>
								</td>
								<td>
									<?php $pel = $data['pel']  ?>
									<?php if ($pel == 'Aktif') { ?>
									<span class="label label-success">Aktif</span>
									<?php } elseif ($pel == 'Non Aktif') { ?>
									<span class="label label-warning">Non Aktif</span>
								</td>
								<?php } ?>
								</td>
								<td>
									<?php echo $data['nama_bulan']; ?>-
									<?php echo $data['tahun']; ?>
								</td>
								<td>
									<?php echo rupiah($data['tagihan']); ?>
								</td>
								<td>
									<?php $warna = $data['status']  ?>
									<?php if ($warna == 'Belum Bayar') { ?>
									<span class="label label-danger">Belum Bayar</span>
									<?php } elseif ($warna == 'Lunas') { ?>
									<span class="label label-primary">Lunas</span>
								</td>
								<?php } ?>
								</td>
							</tr>
							<?php
                                    }
                                    ?>

						</tbody>

				</div>
			</div>
		</div>
	</div>
</div>
</div>