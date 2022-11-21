<?php
    //Mulai Sesion
    session_start();
	
    if (isset($_SESSION["ses_username"])==""){
    echo"<meta http-equiv='refresh' content='0;url=login'>";
    
    }else{
    $data_ath = $_SESSION["ses_id"];
    $data_nama_lengkap = $_SESSION["ses_nama"];
    $data_nama = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
    $data_rek = $_SESSION["ses_rek"];
    }

    //KONEKSI DB
    include "inc/koneksi.php";

    //FUNGSI RUPIAH
    include "inc/rupiah.php";

    //FUNGSI ENKRIPSI
    include "inc/enk.php";

    

?>
<style>
h4 {
    background-blend-mode: lighten;
  color: black;
  border: blue;
  font-size: medium;
}
div {
    background-blend-mode: hard-light;

}

a {
    border-top-right-radius: inherit;

}
tbody {
    color: black;
    
    font-size: small;
    border: transparent;
    text-overflow: inherit;
    
}

thead {
    color: black;
    background-color: lightblue;
    font-size: ;
    
}
label {
    color: black;   
    font-size: small;
}

.button {
  display: inline-block;
  font-size: 24px;
  cursor: pointer;
  text-align: center;
  text-decoration: none;
  outline: 1px;

  
  
  border: 1px;
  border-radius: 15px;
  box-shadow: 0 9px #999;
}

.button:hover {background-color: royalblue;}

.button:active {
  background-color: #3e8e41;
  box-shadow: 0 5px #666;
  transform: translateY(4px);
  }
.button1 {padding: 12px 28px;background-color: orange;}
.button2 {padding: 12px 28px;background-color: blue;}
.button3 {
    padding: 10px 24px;
    background-color: lightseagreen; 
    }
.button4 {
    padding: 8px 12px;
    background-color: lightsalmon; 
    }
.button5 {
    padding: 6px 8px;
    background-color: lightskyblue; 
    }  
.button6 {
    padding: 6px 8px;
    background-color: lightcoral; 
    } 
.container {
  position: relative;
}
.topright {
  position: absolute;
  top: 8px;
  right: 16px;
  font-size: 18px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>App Tagihan Air </title>
  <!-- loader-->
  <!-- <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script> -->
  <!--favicon-->
  <link rel="icon" href="assets/img/logoo.png" type="image/x-icon">
  <!-- Vector CSS -->
  <link href="assets/plugins/vectormap/jquery-jvectormap-2.0.2.css" rel="stylesheet"/>
  <!-- simplebar CSS-->
  <link href="assets/plugins/simplebar/css/simplebar.css" rel="stylesheet"/>
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <link href="assets/css/bootstrap.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Sidebar CSS-->
  <link href="assets/css/sidebar-menu.css" rel="stylesheet"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  <link href="assets/dataTables/dataTables.bootstrap.css" rel="stylesheet" />
  <link rel="stylesheet" href="assets/css/select2.min.css" />
  <link rel="stylesheet" href="assets/swal/sweetalert2.min.css">
    <script src="assets/swal/sweetalert2.min.js"></script>
  
</head>

<body class="bg-theme bg-theme1">
 
<!-- Start wrapper-->
 <div id="wrapper">
 
  <!--Start sidebar-wrapper-->
  <?php include "side.php"; ?>
   <!--End sidebar-wrapper-->

<!--Start topbar header-->
<header class="topbar-nav">
 <nav class="navbar navbar-expand fixed-top">
  <ul class="navbar-nav mr-auto align-items-center">
    <li class="nav-item">
      <a class="nav-link toggle-menu" href="javascript:void();">
       <i class="icon-menu menu-icon"></i>
     </a>
    </li>
    <!-- <li class="nav-item">
      <form class="search-bar">
        <input type="text" class="form-control" placeholder="Enter keywords">
         <a href="javascript:void();"><i class="icon-magnifier"></i></a>
      </form>
    </li> -->
  </ul>
     
  <ul class="navbar-nav align-items-center right-nav-link">
    <!-- <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-envelope-open-o"></i></a>
      	<ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li>
    <li class="nav-item dropdown-lg">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();">
      <i class="fa fa-bell-o"></i></a>
    </li>
    <li class="nav-item language">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret waves-effect" data-toggle="dropdown" href="javascript:void();"><i class="fa fa-flag"></i></a>
      <ul class="dropdown-menu dropdown-menu-right">
          <li class="dropdown-item"> <i class="flag-icon flag-icon-gb mr-2"></i> English</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-fr mr-2"></i> French</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-cn mr-2"></i> Chinese</li>
          <li class="dropdown-item"> <i class="flag-icon flag-icon-de mr-2"></i> German</li>
        </ul>
    </li> -->
    <li class="nav-item">
      <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" data-toggle="dropdown" href="#">
        <span class="user-profile"><img src="assets/img/logoo.png" class="img-circle" alt="user avatar"></span>
      </a>
      <ul class="dropdown-menu dropdown-menu-right">
       <li class="dropdown-item user-details">
        <a href="javaScript:void();">
           <div class="media">
             <div class="avatar"><img class="align-self-start mr-3" src="assets/img/logo.png"  alt="user avatar"></div>
            <div class="media-body">
            <h6 class="mt-2 user-title"><?php echo $data_nama_lengkap; ?></h6>
            <p class="user-subtitle"><?php echo $data_level; ?></p>
            </div>
           </div>
          </a>
        </li>
        <li class="dropdown-divider"></li>
        <li class="dropdown-item"><i class="icon-power mr-2"></i> 
        	<a href="logout" onclick="return confirm('Apakah anda yakin ingin keluar dari aplikasi ini ?')">Logout</li></a>
      </ul>
    </li>
  </ul>
</nav>
</header>
<!--End topbar header-->

<div class="clearfix"></div>
	
  <div class="content-wrapper">

  <!--Start Dashboard Content-->

	<div class="card mt-3">
	    <div class="card-content">
	    <?php
	    include "konten.php";
	    ?>

	    </div>
	</div><!--End Row-->

      <!--End Dashboard Content-->
	  
	
    <!--End Back To Top Button-->
	
	<!--Start footer-->
	<footer class="footer">
      <div class="container">
        <div class="text-center">
          Copyright © 2022 Reza - Tanggal <?php echo date('d M y H:i:s'); ?>
        </div>
      </div>
    </footer>
	<!--End footer-->
	
  <!--start color switcher-->
    <div class="right-sidebar">
        <div class="switcher-icon">
          <i class="zmdi zmdi-settings zmdi-hc-spin"></i>
        </div>
    <div class="right-sidebar-content">

      <p class="mb-0">Gaussion Texture</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme1"></li>
        <li id="theme2"></li>
        <li id="theme3"></li>
        <li id="theme4"></li>
        <li id="theme5"></li>
        <li id="theme6"></li>
      </ul>

      <p class="mb-0">Gradient Background</p>
      <hr>
      
      <ul class="switcher">
        <li id="theme7"></li>
        <li id="theme8"></li>
        <li id="theme9"></li>
        <li id="theme10"></li>
        <li id="theme11"></li>
        <li id="theme12"></li>
		<li id="theme13"></li>
        <li id="theme14"></li>
        <li id="theme15"></li>
      </ul>
      
    </div>

  <!--end color switcher-->
   
  </div><!--End wrapper-->

  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
  <script src="assets/js/bootstrap.js"></script>
	
 <!-- simplebar js -->
  <script src="assets/plugins/simplebar/js/simplebar.js"></script>
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <!-- loader scripts -->
  <!-- <script src="assets/js/jquery.loading-indicator.js"></script> -->
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <!-- Chart js -->
  <script src="assets/plugins/Chart.js/Chart.min.js"></script>
 
<!-- DataTables -->
<script src="assets/dataTables/jquery.dataTables.js"></script>
<script src="assets/dataTables/dataTables.bootstrap.js"></script>
				<script>
					$(document).ready(function() {
						$('#dataTables-example').dataTable();
					});
				</script>

				<script src="assets/js/select2.min.js"></script>
				<!-- <script>
					$(document).ready(function() {
						$("#id_pelanggan").select2({
							placeholder: "-- Pilih Pelanggan --"
						});
					});
				</script> -->

  <!-- Index js -->
  <script type="text/javascript">
$(function() {
    "use strict";

     // chart 1
	 
		  var ctx = document.getElementById('chart1').getContext('2d');
		
			var myChart = new Chart(ctx, {
				type: 'bar',
				data: {
					labels: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Des"],
					datasets: [{
						label: 'Belum Bayar',
						data: [<?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '01';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '02';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '03';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '04';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '05';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '06';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '07';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '08';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '09';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '10';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '11';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Belum Bayar' and
									right(left(id_pakai,6),2)  = '12';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>],
						backgroundColor: 'rgba(255, 255, 255, 0.20)',
						borderColor: "yellow",
						pointRadius :"5",
						borderWidth: 2
					}, {
						label: 'Sudah Bayar',
						data: [<?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '01';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '02';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '03';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '04';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '05';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '06';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '07';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '08';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '09';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '10';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '11';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>, <?php // menghitung
                    $sql_hitung = "SELECT sum(tagihan)/10000 FROM tb_tagihan where status='Lunas' and
									right(left(id_pakai,6),2)  = '12';";
                    $q_hit= mysqli_query($koneksi, $sql_hitung);
                    while($row = mysqli_fetch_array($q_hit)) {
                        echo  $row[0];
                    }
                    ?>],
						backgroundColor: "#ffffff",
						borderColor: "red",
						pointRadius :"5",
						borderWidth: 2
					}]
				},
			options: {
				maintainAspectRatio: false,
				legend: {
				  display: false,
				  labels: {
					fontColor: '#ddd',  
					boxWidth:40
				  }
				},
				tooltips: {
				  displayColors:false
				},	
			  scales: {
				  xAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#ddd'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(221, 221, 221, 0.08)"
					},
				  }],
				   yAxes: [{
					ticks: {
						beginAtZero:true,
						fontColor: '#ddd'
					},
					gridLines: {
					  display: true ,
					  color: "rgba(221, 221, 221, 0.08)"
					},
				  }]
				 }

			 }
			});  
		
		
    // chart 2

		var ctx = document.getElementById("chart2").getContext('2d');
			var myChart = new Chart(ctx, {
				type: 'doughnut',
				data: {
					labels: ["Direct", "Affiliate", "E-mail", "Other"],
					datasets: [{
						backgroundColor: [
							"#ffffff",
							"rgba(255, 255, 255, 0.70)",
							"rgba(255, 255, 255, 0.50)",
							"rgba(255, 255, 255, 0.20)"
						],
						data: [5856, 2602, 1802, 1105],
						borderWidth: [0, 0, 0, 0]
					}]
				},
			options: {
				maintainAspectRatio: false,
			   legend: {
				 position :"bottom",	
				 display: false,
				    labels: {
					  fontColor: '#ddd',  
					  boxWidth:15
				   }
				}
				,
				tooltips: {
				  displayColors:false
				}
			   }
			});
		

		
		
   });	 
   
  </script>

  
</body>
</html>
