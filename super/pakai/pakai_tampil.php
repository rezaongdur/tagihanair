<div class="row">
            <div class="col-md-12">
                    <a href="?halaman=pakai_tambah" class="button button3"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <!-- Advanced Tables -->
                    
                    <br><br>
                    <div class="panel-primary">
                       
                        <div class="panel-heading">
                             <h4><b>Data Pemakaian</b></h4>
                        </div>
                       <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead class="table-primary">
                                        <tr>
                                            <th width="10px">No</th>
                                            <th width="14px">ID </th>
                                            <th>Nama</th>
                                            <th width="16px">Bulan-Tahun</th>
                                            <th width="16px">Awal </th>
                                            <th width="16px">Akhir</th>
                                            <th width="16px">Pemakaian</th>
                                            <th width="12px">Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    
                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select t.id_tagihan,p.id_pelanggan, p.nama_pelanggan, k.id_pakai, k.tahun, k.awal, k.akhir, k.pakai, b.nama_bulan, t.status 
                                    from tb_pelanggan p inner join tb_pakai k on p.id_pelanggan=k.id_pelanggan
                                    inner join tb_tagihan t on k.id_pakai=t.id_pakai
                                    inner join tb_bulan b on k.bulan=b.id_bulan
                                    order by k.id_pakai desc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>  
                                        <td><font color="black"><a href="?halaman=pakai_view&kode=<?php echo $data['id_tagihan']; ?> "><?php echo $data['id_pelanggan']; ?></font> </a></td>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <td><?php echo $data['nama_bulan']; ?> - <?php echo $data['tahun']; ?></td>
                                        <td><?php echo $data['awal']; ?> M<sup> 3</sup> </td>
                                        <td><?php echo $data['akhir']; ?> M<sup> 3</sup></td>  
                                        <td>
                                            <center><?php echo $data['pakai']; ?> M<sup> 3</sup>
                                        </td> 
                                             
                                        <td>

                                            <?php $stt = $data['status']  ?>
                                            <?php if ($stt == 'Belum Bayar') { ?>
                                                <a href="?halaman=pakai_hapus&kode=<?php echo $data['id_pakai']; ?>" onclick="return confirm('Apakah anda yakin hapus data ini ?')" title="Hapus" align="center" class="button button4"><i class="fa fa-trash-o"></i></a>
                                            <?php } elseif ($stt == 'Lunas') { ?> 
                                                <span class="label label-primary">Lunas</span>
                                            </td>
                                            <?php } ?>

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