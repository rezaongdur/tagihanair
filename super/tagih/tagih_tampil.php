<div class="row">
            <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <br><br>
                    <div class="panel-primary">
                        <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Tagihan Belum Dibayar</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <h4><tr>
                                            <th>No</th>
                                            <th>ID | Nama Pelanggan</th>
                                            <th>Bulan - Tahun</th>
                                            <th>Pemakaian</th>
                                            <th>Tagihan</th>
                                            <th width="12px">Struk</th>
                                            <th width="12px">Aksi</th>

                                        </tr></h4>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select p.id_pelanggan, p.nama_pelanggan, t.id_tagihan, t.tagihan, t.status, 
                                    k.tahun, k.pakai, b.nama_bulan 
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_bulan b on k.bulan=b.id_bulan where t.status='Belum Bayar' 
                                    order by tahun asc, id_bulan asc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_pelanggan']; ?> - <?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['nama_bulan']; ?> - <?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['pakai']; ?> M<sup> 3</sup></td> 
                                        <td><?php echo rupiah($data['tagihan']); ?></td></a>
                                        <td>
                                        <a href="./report/cetak_tagihan.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" target=" _blank" title="Cetak Pembayaran" class="button button5"><i class="zmdi zmdi-print"></i></a>   
                                        </td>          
                                        <td>
                                        <a href="?halaman=tagih_bayar&kode=<?php echo $data['id_tagihan']; ?>" title="Bayar Tagihan Ini" class="button button6"><i class="zmdi zmdi-play-circle"></i></a>
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