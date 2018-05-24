<?php
include '../connect.php';

$id_departemen = $_POST['id_departemen'];

$id_kantor = $_POST['id_kantor'];
$nip_karyawan = $_POST['nip_karyawan'];



$sql= "INSERT INTO tblatasan (id_departemen,id_kantor, nip_karyawan) VALUES('$id_departemen', '$id_kantor', '$nip_karyawan')";
$hasil = $connect->query($sql);

$sql2 = "UPDATE tblkaryawan SET id_jabatan = 2, id_departemen = '$id_departemen', id_kantor = '$id_kantor' WHERE nip_karyawan = '$nip_karyawan'";
$hsl = $connect->query($sql2);

if($hasil){
	echo '<script>document.location.href="index.php?page=view_atasan1";</script>';
	//header('location:index.php?page=view_atasan1');
}else{
	echo '<script>document.location.href="index.php?page=view_atasan1";</script>';
	//header('location:index.php?page=view_atasan1');
}
?>