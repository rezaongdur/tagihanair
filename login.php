<?php
session_start();
    
    if (isset($_SESSION["ses_username"])==""){
    // echo"<meta http-equiv='refresh' content='0;url=login'>";
    
    }else{
    $data_ath = $_SESSION["ses_id"];
    $data_nama_lengkap = $_SESSION["ses_nama"];
    $data_nama = $_SESSION["ses_username"];
    $data_level = $_SESSION["ses_level"];
    $data_rek = $_SESSION["ses_rek"];
    }

include "inc/koneksi.php"; 
   
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
  <meta name="description" content=""/>
  <meta name="author" content=""/>
  <title>Login | Tagihan Air</title>
  <!-- loader-->
<!--   <link href="assets/css/pace.min.css" rel="stylesheet"/>
  <script src="assets/js/pace.min.js"></script>
 -->  <!--favicon-->
  <link rel="icon" href="assets/img/logoo.png">
  <!-- Bootstrap core CSS-->
  <link href="assets/css/bootstrap.min.css" rel="stylesheet"/>
  <!-- animate CSS-->
  <link href="assets/css/animate.css" rel="stylesheet" type="text/css"/>
  <!-- Icons CSS-->
  <link href="assets/css/icons.css" rel="stylesheet" type="text/css"/>
  <!-- Custom Style-->
  <link href="assets/css/app-style.css" rel="stylesheet"/>
  
</head>

<body class="bg-theme bg-theme1">

<!-- start loader 
   <div id="pageloader-overlay" class="visible incoming"><div class="loader-wrapper-outer"><div class="loader-wrapper-inner" ><div class="loader"></div></div></div></div>
   end loader -->

<!-- Start wrapper-->
 <div id="wrapper">

 <div class="loader-wrapper"><div class="lds-ring"><div></div><div></div><div></div><div></div></div></div>
	<div class="card card-authentication1 mx-auto my-5">
		<div class="card-body">
		 <div class="card-content p-2" >
            <form action="" method="POST" enctype="multipart/form-data">
		 	<div class="text-center">
		 		<img src="assets/img/air.png" alt="logo icon" width="80" height="50">
		 	</div>
		      <div class="card-title text-uppercase text-center py-3">Sign In</div>
		    <form>
			  <div class="form-group">
			  <label for="exampleInputUsername" class="sr-only">Username</label>
			   <div class="position-relative has-icon-right">
				  <input type="text" class="form-control" placeholder="Masukkan Username " name="username" required autofocus/>
				  <div class="form-control-position">
					  <i class="icon-user"></i>
				  </div>
			   </div>
			  </div>
			  <div class="form-group">
			  <label for="exampleInputPassword" class="sr-only">Password</label>
			   <div class="position-relative has-icon-right">
				  <input type="password" class="form-control" placeholder="Masukkan Password" name="password" required/>
				  <div class="form-control-position">
					  <i class="icon-lock"></i>
				  </div>
			   </div>
			  </div>
			 <button type="submit" class="btn btn-light btn-block" name="btnLogin" title="Masuk Sistem"/>Masuk</button>
			 </form>
		   </div>
		  </div>
		  <!-- <div class="card-footer text-center py-3">
		    <p class="text-warning mb-0">Do not have an account? <a href="register.html"> Sign Up here</a></p>
		  </div> -->
	     </div>
    
     <!--Start Back To Top Button-->
    <a href="javaScript:void();" class="back-to-top"><i class="fa fa-angle-double-up"></i> </a>
    <!--End Back To Top Button-->
	
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
   </div>
  <!--end color switcher-->
	
	</div><!--wrapper-->
	
  <!-- Bootstrap core JavaScript-->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/popper.min.js"></script>
  <script src="assets/js/bootstrap.min.js"></script>
	
  <!-- sidebar-menu js -->
  <script src="assets/js/sidebar-menu.js"></script>
  <script src="assets/js/jquery.metisMenu.js"></script>
  <script src="assets/js/select2.min.js"></script>
  <script src="assets/js/dataTables/jquery.dataTables.js"></script>
                <script src="assets/js/dataTables/dataTables.bootstrap.js"></script>
  
  <!-- Custom scripts -->
  <script src="assets/js/app-script.js"></script>
  <script src="assets/js/sweetalert2@9.js"></script>
  
</body>
</html>

<?php 
		if (isset($_POST['btnLogin'])) {  
            $sql_login = "SELECT * FROM tb_user WHERE username='".$_POST['username']."' AND password='".$_POST['password']."'";
			$query_login = mysqli_query($koneksi, $sql_login);
			$data_login = mysqli_fetch_array($query_login,MYSQLI_BOTH);
            $jumlah_login = mysqli_num_rows($query_login);
        

            if ($jumlah_login ==1 ){
                session_start();
                $_SESSION["ses_id"]=$data_login["id_user"];
                $_SESSION["ses_nama"]=$data_login["nama_user"];
                $_SESSION["ses_username"]=$data_login["username"];
                $_SESSION["ses_password"]=$data_login["password"];
                $_SESSION["ses_level"]=$data_login["level"];
                $_SESSION["ses_rek"]=$data_login["no_rek"];

                echo "<script>
                        Swal.fire({title: 'Login Berhasil',text: '',icon: 'success',confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'http://localhost/tag';
                            }
                        })</script>";
			}else{
			    echo "<script>
                        Swal.fire({title: 'Login Gagal',text: '',icon: 'error',confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.value) {
                                window.location = 'login';
                            }
                        })</script>";
            }
        }

        ?>
			
