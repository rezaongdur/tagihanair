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
                                            <th>Bulan - Tahun</th>
                                            <th>Meter Awal</th>
                                            <th>Meter Akhir</th>
                                            <th>Pemakaian</th>
                                            <th>Tagihan</th>
                                            <th>Tgl. Pembayaran</th>
                                            <th>Cetak Struk</th>
                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select p.id_pelanggan, t.id_tagihan, t.tagihan, t.status, bl.nama_bulan, 
                                    k.tahun, k.awal, k.akhir, k.pakai, b.tgl_bayar
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_pembayaran b on t.id_tagihan=b.id_tagihan
                                    inner join tb_bulan bl on k.bulan=bl.id_bulan 
                                    where t.status='Lunas' and p.id_pelanggan='$data_rek' 
                                    order by tahun desc, id_bulan desc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_bulan']; ?> - <?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['awal']; ?> M<sup> 3</sup></td> 
                                        <td><?php echo $data['akhir']; ?> M<sup> 3</sup></td> 
                                        <td><?php echo $data['pakai']; ?> M<sup> 3</sup></td>
                                        <td><?php echo rupiah($data['tagihan']); ?></td>
                                        <td>
                                        <?php  $tgl = $data['tgl_bayar']; echo date("d - M - Y", strtotime($tgl))?>
                                        </td> 
                                        <td>
                                        <a href="./report/cetak_pembayaran.php?id_tagihan=<?php echo $data['id_tagihan']; ?>" target=" _blank" title="Cetak Pembayaran" class="btn btn-primary"><i class="glyphicon glyphicon-print"></i></a>   
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