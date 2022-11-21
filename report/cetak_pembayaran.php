<?php
include "../inc/koneksi.php";
//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>STRUK PEMBAYARAN</title>
</head>

<body>
	<center>
		<h3>*** STRUK PEMBAYARAN TAGIHAN AIR ***</h3>
	</center>
	<table>
		<tbody>
			<?php
            $id = $_GET['id_tagihan'];
            $sql_tampil = "select k.id_pakai, p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status, k.bulan, k.tahun, k.pakai, 
            b.tgl_bayar, b.uang_bayar, b.kembali, bl.nama_bulan
            from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
            inner join tb_tagihan t on k.id_pakai=t.id_pakai
            inner join tb_pembayaran b on t.id_tagihan=b.id_tagihan
            inner join tb_bulan bl on k.bulan=bl.id_bulan
            where t.id_tagihan='$id'";
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
			<tr>
				<td>Nomor Tagihan</td>
				<td>:</td>
				<td>
					<?php echo $data['id_pakai']; ?>
				</td>
				<td>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Pemakaian </td>
					<td>:</td>
					<td>
						<?php echo $data['pakai']; ?>M
						<sup> 3</sup>
					</td>
			</tr>

			<tr>
				<td>Nama Pelanggan</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_pelanggan']; ?>
				</td>
				<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Tagihan</td>
					<td>:</td>
					<td>
						<?php echo rupiah($data['tagihan']); ?>
					</td>
					<td>
			</tr>

			<tr>
				<td>Bln/Th</td>
				<td>:</td>
				<td>
					<?php echo $data['nama_bulan']; ?>/
					<?php echo $data['tahun']; ?>
				</td>
				<td>
				&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
					<td>Pembayaran</td>
					<td>:</td>
					<td>
						<?php echo $data['status']; ?>
					</td>
					<td>
			</tr>
		</tbody>
	</table>
	_______________________________________________________________________________________
	<table>
		<tbody>
			<tr>
				<td>Tgl Pembayaran</td>
				<td>:</td>
				<td>
					<?php  $tgl = $data['tgl_bayar']; echo date("d-m-Y", strtotime($tgl))?>
				</td>
				<td>
					
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Struk ini adalah Bukti Pembayaran yang sah. <br>
					
				</td>
			</tr>
			<tr>
				<td>Uang Bayar</td>
				<td>:</td>
				<td>
					<?php echo rupiah($data['uang_bayar']); ?>
				</td>
				<td>
					
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Struk ini adalah Bukti Pembayaran yang sah. <br>
					
					
				</td>
			</tr>
			<tr>
			</tr>
			<td>Uang Kembali</td>
			<td>:</td>
			<td>
				<?php echo rupiah($data['kembali']); ?>
			</td>
			<td>
					&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Terima Kasih
					
				</td>

			<?php
            }
        ?>
		</tbody>
	</table>
	<br> ----------------------------------------------------------Potong di sini--------------------------------------------------------


	<script>
		window.print();
	</script>
</body>

</html>