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
                    <a href="?halaman=pengguna_tambah" class="btn btn-primary"><i class="glyphicon glyphicon-plus">Tambah</i> </a>
                    

                    <div class="panel panel-info">
                        <div class="panel-heading">
                             <b>Data Pengguna</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>Username</th>
                                            <th>Level</th>
                                            <th>No. HP</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php

                                    $no = 1;
                                    $sql = $koneksi->query("select * from tb_user");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $no++; ?></td>
                                        <td><?php echo $data['nama_user']; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['level']; ?></td>
                                        <td><?php echo $data['no_hp']; ?></td>                   
                                        <td>
                                        <a href="?halaman=pengguna_ubah&kode=<?php echo $data['id_user']; ?>" title="Ubah" class="btn btn-success"><i class="fa fa-pencil-square-o"></i></a>
                                        <a href="?halaman=pengguna_hapus&kode=<?php echo $data['id_user']; ?>" onclick="return confirm('Apakah anda yakin hapus pengguna ini ?')" title="Hapus" class="btn btn-danger"><i class="icon icon-trash"></i></a>
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