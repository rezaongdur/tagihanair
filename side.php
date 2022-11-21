<div id="sidebar-wrapper" data-simplebar="" data-simplebar-auto-hide="true">
  <div class="brand-logo">
    <a href="#">
      <img src="assets/img/air.png" class="logo-icon" alt="logo icon" width="100" height="25">
      <h5 class="logo-text"><a href="http://localhost/tag/" >Kembang Harum 2</a></h5>
    </a>
  </div>
   <ul class="sidebar-menu do-nicescrol">
      <li class="sidebar-header">MAIN NAVIGATION</li>

      <?php
                    if ($data_level=="Administrator"){
                    ?>
      <li>
        <a href="?halaman=home_sa">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li >
        <a href="?halaman=pakai_tampil">
          <i class="zmdi zmdi-invert-colors"></i> <span>Input Pemakaian</span>
        </a>
      </li>

      
        <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Tagihan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-block"></i> 
                <a href="?halaman=tagih_tampil"><font size="3" color="red">Belum Bayar</font></a>
              </li>

              <li class="dropdown-item"> <i class="zmdi zmdi-balance-wallet"></i> 
              <a href="?halaman=lunas_tampil"><font size="3" color="red">Lunas</font></a>
              </li>
            </ul>
            
        </li>

      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-account-circle"></i> <span>Administrasi</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-block"></i> <a href="?halaman=pelanggan_tampil"><font size="3" color="red">Pelanggan</font></a></li>

             <li class="dropdown-item"> <i class="zmdi zmdi-balance-wallet"></i> <a href="?halaman=layanan_tampil"><font size="3" color="red">Layanan Air</font></a></li>
            </ul>
            
      </li>


      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-face"></i>  <span>Pengaturan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-block"></i> <a href="?halaman=pengguna_tampil"><font size="3" color="red">Pengguna Sistem</font></a></li>

             <li class="dropdown-item"> <i class="zmdi zmdi-balance-wallet"></i> <a href="?halaman=info_tampil"><font size="3" color="red">Info Pelanggan</font></a></li>
            </ul>
            
      </li>


      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-local-printshop"></i>  <span>Laporan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-local-printshop"></i>  <a href="?halaman=lap_masuk"><font size="3" color="red">Laporan Pembayaran</font></a></li>
  
              <!-- <li class="dropdown-item"> <i class="zmdi zmdi-local-printshop"></i>  <a href="?halaman=lap_tag">Laporan Tagihan</a> -->
            </ul>
            
      


      <?php
                    } elseif($data_level=="Operator"){
                    ?>
      <li>
        <a href="?halaman=home_sa">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

      <li >
        <a href="?halaman=pakai_tampil">
          <i class="zmdi zmdi-invert-colors"></i> <span>Input Pemakaian</span>
        </a>
      </li>

      
      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Tagihan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-block"></i> <a href="?halaman=tagih_tampil">Belum Bayar</a></li>

             <li class="dropdown-item"> <i class="zmdi zmdi-balance-wallet"></i> <a href="?halaman=lunas_tampil">Lunas</a></li>
            </ul>
            
      </li>

      


      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-local-printshop"></i>  <span>Laporan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-local-printshop"></i>  <a href="?halaman=lap_masuk">Laporan</a></li>
            </ul>
            
      <!-- <li class="sidebar-header">LABELS</li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-coffee text-danger"></i> <span>Important</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-chart-donut text-success"></i> <span>Warning</span></a></li>
      <li><a href="javaScript:void();"><i class="zmdi zmdi-share text-info"></i> <span>Information</span></a></li>
 -->

       <?php
                     } elseif($data_level=="Pelanggan"){
                    ?>
      <li>
        <a href="?halaman=home_sa">
          <i class="zmdi zmdi-view-dashboard"></i> <span>Dashboard</span>
        </a>
      </li>

    
      <li  class="nav-item dropdown-lg">
        <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
          <i class="zmdi zmdi-format-list-bulleted"></i> <span>Tagihan</span></a>
            <ul class="dropdown-menu dropdown-menu-right">
              <li class="dropdown-item"> <i class="zmdi zmdi-block"></i> <a href="?halaman=tagih_tampil">Belum Bayar</a></li>

             <li class="dropdown-item"> <i class="zmdi zmdi-balance-wallet"></i> <a href="?halaman=lunas_tampil">Lunas</a></li>
            </ul>
            
      </li>
            
      <
      
    </ul>
    <?php
                    }
                ?>

  </div>