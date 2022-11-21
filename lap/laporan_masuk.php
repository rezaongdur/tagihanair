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
<div >
    <div class="col-lg-6 col-xl-6">
        <div >
            <div class="panel-heading">
               <h4> <b>Laporan Pemasukan</b> </h4>
            </div>
            <div class="panel-body">

            <form action="./report/laporan_pemasukan.php" method="post" enctype="multipart/form-data" target="_blank">
                <div class="form-group">
                    <label>Tanggal Awal</label>
                    <input type="date" class="form-control" name="tgl1" required/>
                </div>
                <div class="form-group">
                    <label>Tanggal Akhir</label>
                    <input type="date" class="form-control" name="tgl2" required/>
                </div>

                    <button type="submit" class="btn btn-primary" name="btnCetak" target="_blank">Cetak</button>
            </form>
            </div>
            
        </div>
    </div>
</div>