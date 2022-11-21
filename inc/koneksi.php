<?php
$koneksi = new mysqli ("localhost","root","","db_air");
if (!$koneksi) {
	die("Koneksi tidak berhasil: ".mysqli_connect_error());
}

$config['base_url'] = 'http://localhost/tag';
?>

<script type="text/javascript">
function url(){
  return sprintf(
    "%s://%s%s",
    isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off' ? 'https' : 'http',
    $_SERVER['SERVER_NAME'],
    $_SERVER['REQUEST_URI']
  );
}
</script>