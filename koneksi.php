<?php 
$host = "localhost";
$user = "root";
$pass = "";
$db = "db_sekolah";
$conn = mysqli_connect($host, $user, $pass, $db);

mysqli_select_db($conn, $db);

$status = null;
if($conn){
   $status = "Koneksi Berhasil";
}
else {
    $status = "Koneksi Gagal";
}

echo "
<script>
    console.log('".$status."');
</script>
";
