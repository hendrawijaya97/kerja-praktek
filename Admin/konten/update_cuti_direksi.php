<?php 
include '../connect.php';
$c_direksi = $_POST['c_direksi'];

$sql = "UPDATE tblkaryawan SET sisa_cuti =  $c_direksi WHERE id_jabatan = 1";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=reset_cuti";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=reset_cuti";</script>
<?php

}


?>