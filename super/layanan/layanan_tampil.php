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
                    
                    <a href="?halaman=layanan_tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i> Tambah</a>
                    

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Layanan</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama Layanan</th>
                                            <th>Tarif Per Meter</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_layanan");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['layanan']; ?></td>
                                        <td><?php echo rupiah($data['tarif']); ?></td>                 
                                        <td>
                                        <a href="?halaman=layanan_ubah&kode=<?php echo $data['id_layanan']; ?>" title="Ubah" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="?halaman=layanan_hapus&kode=<?php echo $data['id_layanan']; ?>" onclick="return confirm('Apakah anda yakin hapus layanan ini ?')" title="Hapus" class="btn btn-danger"><i class="icon icon-trash"></i></a>
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