<?php
include '../connect.php';

$jabatan = $_POST['addjabatan'];

$sql= "INSERT INTO tbljabatan (jabatan) VALUES('$jabatan')";
$hasil = $connect->query($sql);

if($hasil){
	echo '<script>document.location.href="index.php?page=view_jabatan";</script>';
	//header('location:index.php?page=view_jabatan');
}else{
	echo '<script>document.location.href="index.php?page=view_jabatan";</script>';
	//header('location:index.php?page=view_jabatan');
}
?>