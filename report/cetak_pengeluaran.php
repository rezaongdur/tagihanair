<?php
include "../inc/koneksi.php";

//FUNGSI RUPIAH
include "../inc/rupiah.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <title>Laporan Pengeluaran</title>
</head>
<body>
<center>
<h2>Laporan Pengeluaran</h2>
<h3>Air Tirto Nolo Ds. Tlogomojo, Kec. Batangan, Kab. Pati</h3>
<p>________________________________________________________________________</p>

  <table border="1" cellspacing="0">
    <thead>
      <tr>
            <th>No</th>
            <th>Kategori</th>
            <th>Keterangan</th>
            <th>Tgl/Bln/Th</th>
            <th>Jumlah</th>
      </tr>
    </thead>
    <tbody>
        <?php
            $sql_tampil = "select * from tb_pengeluaran order by tgl asc";
            $query_tampil = mysqli_query($koneksi, $sql_tampil);
            $no=1;
            while ($data = mysqli_fetch_array($query_tampil,MYSQLI_BOTH)) {
        ?>
        <tr>       
            <td><?php echo $no; ?></td>
            <td><?php echo $data['keluar']; ?></td> 
            <td><?php echo $data['ket']; ?></td>
            <td><?php echo $data['tgl']; ?></td>
            <td><?php echo rupiah($data['jumlah']); ?></td>                     
        </tr>
        <?php
            $no++;
            }
        ?>
    </tbody>
  </table>
<?php
    $sql = $koneksi->query("SELECT SUM(jumlah) as kurang FROM tb_pengeluaran");
    while ($data= $sql->fetch_assoc()) {
?>

  <h3>Total Pengeluaran : <?php echo rupiah($data['kurang']); ?></h3>

<?php
    }
?>
</center>

<script>
    window.print();
</script>
</body>
</html>