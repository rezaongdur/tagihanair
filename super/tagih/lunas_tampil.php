<style>
h4 {
    background-blend-mode: lighten;
  color: black;
  border: blue;
}
tbody {
    color: black;
    background-color: lightblue;

    border: transparent;
    text-overflow: ;
    font-size: small;

}
label {
    color: black;   
    font-size: small;
}
</style>
<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Tagihan Lunas</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>ID | Nama Pelanggan</th>
                                            <th>Bulan - Tahun</th>
                                            <th>Pemakaian</th>
                                            <th>Tagihan</th>
                                            <th>Tgl Bayar</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status,
                                    k.tahun, k.pakai, b.tgl_bayar, bl.nama_bulan
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_pembayaran b on t.id_tagihan=b.id_tagihan
                                    inner join tb_bulan bl on k.bulan=bl.id_bulan where t.status='Lunas' order by tgl_bayar desc, tahun desc, id_bulan desc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_pelanggan']; ?> - <?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['nama_bulan']; ?> - <?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['pakai']; ?> M<sup> 3</sup></td> 
                                        <td><?php echo rupiah($data['tagihan']); ?></td>  
                                        <td><?php  $tgl = $data['tgl_bayar']; echo date("d - M - Y", strtotime($tgl))?></td>     
                                        <td>
                                        <a href="./report/cetak_pembayaran.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" target=" _blank" title="Cetak Struk Pembayaran" class="button button5"><i class="zmdi zmdi-play-circle"></i></a>
                                        </td>
                                    </tr>
                                    <?php
                                    }
                                    ?>

                                    </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>