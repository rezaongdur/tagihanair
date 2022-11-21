<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<title>Laporan Tagihan Air</title>
</head>

<body>
	<center>
		<h2>Laporan Tagihan air</h2>
		<h3>BTN Kembang Harum 2</h3>
		<h3>Jl. Jaya Baya, Desa Bojong Leles, Kecamatan Cibadak, Kab. Lebak - Banten</h3>
		<p>________________________________________________________________________</p>

		<table border="2" cellspacing="1">
			<thead>
				<tr border="2" >
					<th>No.</th>
					<th>ID </th>
					<th>Nama Pelanggan</th>
					<th>Bulan </th>
						<th>Tahun</th>
					<th>Tagihan</th>
					
				</tr>
			</thead>
			<tbody>
				<?php

        if(isset($_POST["btnCetak"])){
            $bln = $_POST["bln1"];

            $sql = "select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status,
            k.tahun,  bl.nama_bulan
            from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
            inner join tb_tagihan t on k.id_pakai=t.id_pakai
            inner join tb_bulan bl on k.bulan=bl.id_bulan where t.status='Belum Bayar' and bl.id_bulan=$bln  order by bl.id_bulan asc";
            }
            $result = mysqli_query($koneksi, $sql);
            $no=1;
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC));{
            // while ($r = mysqli_fetch_array($result, MYSQLI_ASSOC))	 
         ?>
				<tr>
					<td>
						<?php echo $no; ?>
					</td>
					<td>
						<?php echo $row["id_pelanggan"]; ?>-
					</td>
					<td>
						<?php echo $row["nama_pelanggan"]; ?>
					</td>
					<td>
						<?php echo $row["nama_bulan"]; ?>
					</td>
					<td>
						<?php echo $row["tahun"]; ?>
					</td>
					<td>
						<?php echo rupiah($row["tagihan"]); ?>
					</td>
					
				</tr>
				<?php
            $no++;
            }
        ?>
			</tbody>
		</table>
		<?php
    $sql = $koneksi->query("SELECT SUM(tagihan) as masuk FROM tb_tagihan 
    where status='Belum Bayar' ");
    while ($data= $sql->fetch_assoc()) {
?>

		<h3>Total Tagihan :
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