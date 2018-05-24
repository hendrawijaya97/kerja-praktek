<?php
include '../connect.php';

$departemen = $_POST['adddepartemen'];

$sql= "INSERT INTO tbldepartemen (departemen) VALUES('$departemen')";
$hasil = $connect->query($sql);

if($hasil){
	echo '<script>document.location.href="index.php?page=view_departemen";</script>';
	//header('location:index.php?page=view_departemen');
}else{
	echo '<script>document.location.href="index.php?page=view_departemen";</script>';
	//header('location:index.php?page=view_departemen');
}
?>
