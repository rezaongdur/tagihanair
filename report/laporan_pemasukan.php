<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Pemasukan</title>
</head>

<body>
	<center>
		<h2>Laporan Pembayaran Tagihan air</h2>
		<h3>BTN Kembang Harum 2</h3>
		<h3>Jl. Jaya Baya, Desa Bojong Leles, Kecamatan Cibadak, Kab. Lebak - Banten</h3>
		<p>________________________________________________________________________</p>

		<table border="2" cellspacing="1">
			<thead>
				<tr border="2" >
					<th>No.</th>
					<th>ID & Nama Pelanggan</th>
					<th>Bulan - Tahun</th>
					<th>Tagihan</th>
					<th>Tgl bayar</th>
				</tr>
			</thead>
			<tbody>
				<?php

        if(isset($_POST["btnCetak"])){
            $dt1 = $_POST["tgl1"];
            $dt2 = $_POST["tgl2"];

            $sql_tampil = "select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status,
            k.tahun, b.tgl_bayar, bl.nama_bulan
            from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
            inner join tb_tagihan t on k.id_pakai=t.id_pakai
            inner join tb_pembayaran b on t.id_tagihan=b.id_tagihan
            inner join tb_bulan bl on k.bulan=bl.id_bulan where t.status='Lunas' and b.tgl_bayar BETWEEN '$dt1' AND '$dt2' order by k.tahun asc, id_bulan asc";
            }
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
				<tr>
					<td>
						<?php echo $no; ?>
					</td>
					<td>
						<?php echo $data['id_pelanggan']; ?>-
						<?php echo $data['nama_pelanggan']; ?>
					</td>
					<td>
						<?php echo $data['nama_bulan']; ?>-
						<?php echo $data['tahun']; ?>
					</td>
					<td>
						<?php echo rupiah($data['tagihan']); ?>
					</td>
					<td>
						<?php  $tgl = $data['tgl_bayar']; echo date("d - M - Y", strtotime($tgl))?>
					</td>
				</tr>
				<?php
            $no++;
            }
        ?>
			</tbody>
		</table>
		<?php
    $sql = $koneksi->query("SELECT SUM(t.tagihan) as masuk FROM tb_tagihan t join tb_pembayaran p on t.id_tagihan=p.id_tagihan
    where t.status='Lunas' and p.tgl_bayar BETWEEN '$dt1' AND '$dt2'");
    while ($data= $sql->fetch_assoc()) {
?>

		<h3>Total Pemasukan :
			<?php echo rupiah($data['masuk']); ?>
		</h3>

		<?php
    }
?>
	</center>

	<script>
		window.print();
	</script>
</body>

</html>