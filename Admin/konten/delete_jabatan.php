<?php
include '../connect.php';
$id = $_GET['id'];

$sql="DELETE FROM tbljabatan WHERE id_jabatan = '$id'";

if($connect->query($sql) === false){
echo '<script>document.location.href="index.php?page=view_jabatan";</script>';
//header('location: index.php?page=view_jabatan');
}else{
echo '<script>document.location.href="index.php?page=view_jabatan";</script>';
//header('location: index.php?page=view_jabatan');
}

?>
<h3>Perhatian!</h3>
<p>Data ini tidak bisa di hapus karena masih digunakan, coba cek kembali!</br>
  
<a href="index.php?page=view_jabatan">&laquo; Kembali</a></p>
