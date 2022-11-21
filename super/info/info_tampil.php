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
</style><div class="row">
                <div class="col-md-12">
                    <!-- Advanced Tables -->
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                             <b>Informasi</b>
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                <br>
                                    <thead>
                                        <tr>
                                            <th>Info</th>
                                            <th>Aksi</th>

                                        </tr>
                                        
                                    </thead>
                                    <tbody>
                                    

                                    <?php

                                    $sql = $koneksi->query("select * from tb_info");
                                    while ($data= $sql->fetch_assoc()) {

                                    ?>

                                    <tr>
                                        <td><?php echo $data['isi_info']; ?></td>
                                                           
                                        <td>
                                        <a href="?halaman=info_ubah&kode=<?php echo $data['id_info']; ?>" title="Buat info" class="btn btn-primary"><i class="glyphicon glyphicon-edit"></i></a>
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