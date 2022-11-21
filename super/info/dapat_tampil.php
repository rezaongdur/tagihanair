<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-primary">
            <div class="panel-heading">
                <b>Keuangan Perusahaan</b>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <br>
                        <thead>
                            <tr>
                                <th bgcolor="#228B22">Total Pemasukan</th>
                            </tr>

                        </thead>
                            <tbody>
                                <?php
                                    $sql = $koneksi->query("SELECT SUM(tagihan) as tot FROM tb_tagihan WHERE status='Lunas'");
                                    while ($data= $sql->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <h3>Rp. <input type='text' id="tot"  value=" <?php echo $data['tot'];?>" readonly/></h3>
                                    </td>
                                </tr>

                                <?php
                                    }
                                ?>
                            </tbody>
                        </div>
            </div>
                <!-- Advanced Tables -->
                <table class="table table-striped table-bordered table-hover">
                    <br>
                    <thead>
                        <tr>
                            <th bgcolor="#DC143C">Total Pengeluaran</th>
                        </tr>

                    </thead>
                        <tbody>
                                <?php

                                    $sql = $koneksi->query("SELECT SUM(jumlah) as kurang FROM tb_pengeluaran");
                                    while ($data= $sql->fetch_assoc()) {
                                ?>
                                <tr>
                                    <td>
                                        <h3>Rp. <input type='text' id="kurang"  value=" <?php echo $data['kurang'];?>"  readonly/></h3>
                                    </td>
                                </tr>
                                <?php
                                    }
                                ?>
                        </tbody>
            </div>
        </div>

         <!-- Advanced Tables -->
         <table class="table table-striped table-bordered table-hover">
                    <br>
                    <thead>
                        <tr>
                            <th bgcolor="#1E90FF">Kas Perusahaan</th>

                        </tr>
                    </thead>
                        <tbody>
                                <tr>
                                    <td>
                                        <h3>Rp. <input type='text' id="kas" value=" *******" readonly/>
                                        <input type="submit" id="klik" value="Lihat" class="btn btn-primary" >
                                        </h3>
                                    </td>
                                </tr>
                        </tbody>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#klik").click(function() {
            var kurang  = $("#kurang").val();
            var tot = $("#tot").val();
            var kas = parseInt(tot)-parseInt(kurang);
            $("#kas").val(kas);

        });
    });
</script>



