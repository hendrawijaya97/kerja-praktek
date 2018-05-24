<?php
include '../connect.php';
$id = $_GET['id'];

$sql="DELETE FROM tbldepartemen WHERE id_departemen = '$id'";

if($connect->query($sql) === false){
echo '<script>document.location.href="index.php?page=view_departemen";</script>';
//header('location: index.php?page=view_departemen');
}else{
echo '<script>document.location.href="index.php?page=view_departemen";</script>';
//header('location: index.php?page=view_departemen');
}

?>
<h3>Perhatian!</h3>
<p>Data ini tidak bisa di hapus karena masih digunakan, coba cek kembali!</br>
  
<a href="index.php?page=view_departemen">&laquo; Kembali</a></p>
