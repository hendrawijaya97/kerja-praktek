<?php
include '../connect.php';

$id = $_GET['id'];
$password = md5($id);



$sql= "UPDATE tblkaryawan SET password = '$password' WHERE nip_karyawan = '$id'";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_user";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=view_user";</script>
<?php

}

?>