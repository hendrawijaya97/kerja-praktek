<?php
include '../connect.php';
$id = $_GET['id'];

$q = "SELECT nip_karyawan FROM tblatasan WHERE id_atasan = '$id'";
$hasil = $connect->query($q);

$data = $hasil->fetch_assoc();
$nip= $data['nip_karyawan'];

$q2 = "UPDATE tblkaryawan SET id_jabatan = 4 WHERE nip_karyawan = '$nip'";
$hsl = $connect->query($q2);

$sql="DELETE FROM tblatasan WHERE id_atasan = '$id'";



if($connect->query($sql) === false){
	echo '<script>document.location.href="index.php?page=view_atasan1";</script>';
//header('location: index.php?page=view_atasan1');
}else{
echo '<script>document.location.href="index.php?page=view_atasan1";</script>';
//header('location: index.php?page=view_atasan1');
}

?>
<h3>Perhatian!</h3>
<p>Data ini tidak bisa di hapus karena masih digunakan, coba cek kembali!</br>
  
<a href="index.php?page=view_atasan1">&laquo; Kembali</a></p>
