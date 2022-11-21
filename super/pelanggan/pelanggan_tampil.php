<div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <a href="?halaman=pelanggan_tambah" class="button button3"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    <br><br>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Pelanggan</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th width="2">No</th>
                                            <th width="2">ID</th>
                                            <th width="2">Nama</th>
                                            <!-- <th>Alamat</th> -->
                                            <!-- <th>No HP</th> -->
                                            <th>Status</th>
                                            <th>Layanan</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select p.id_pelanggan, nama_pelanggan, alamat, no_hp, status, l.layanan
                                    from tb_pelanggan p join tb_layanan l on p.id_layanan=l.id_layanan order by status asc");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['id_pelanggan']; ?></td>
                                        <td><?php echo $data['nama_pelanggan']; ?></td>
                                        <!-- <td><?php echo $data['alamat']; ?></td> -->
                                        <!-- <td><?php echo $data['no_hp']; ?></td> -->

                                        <?php $warna = $data['status']  ?>
                                        <td> <?php if ($warna == 'Aktif') { ?> 
                                            <span class="label label-primary">Aktif</span>
                                            <a href="?halaman=nonaktif&kode=<?php echo $data['id_pelanggan']; ?>" title="Non Aktifkan" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i></a>
                                        
                                        <?php } elseif ($warna == 'Non Aktif') { ?>
                                            <span class="label label-danger">Non Aktif</span>
                                            <a href="?halaman=aktif&kode=<?php echo $data['id_pelanggan']; ?>" title="Aktifkan" class="btn btn-default"><i class="glyphicon glyphicon-ok"></i></a>
                                        </td>
                                        <?php } ?>
                                               
                                        <td><?php echo $data['layanan']; ?></td>                    
                                        <td>
                                        <a href="?halaman=pelanggan_ubah&kode=<?php echo $data['id_pelanggan']; ?>" title="Ubah" class="button button6"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="?halaman=pelanggan_hapus&kode=<?php echo $data['id_pelanggan']; ?>" onclick="return confirm('Apakah anda yakin hapus pelanggan ini ?')" title="Hapus" class="button button5"><i class="icon icon-trash"></i></a>
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