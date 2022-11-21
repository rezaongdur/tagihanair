<?php
$data_nama_lengkap = $_SESSION["ses_nama"];
$data_level = $_SESSION["ses_level"];
$data_rek = $_SESSION["ses_rek"];
?>

<h2>Selamat Datang</h2>
<h3>
	<?php echo $data_nama_lengkap; ?>(
	<?php echo $data_level; ?>), Di Aplikasi Pembayaran Tagihan Air.</h3>
<hr/>

<div class="col-md-12">
	<div class="panel panel-info">
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
						<b>&nbsp; Administrator :
							<b>
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