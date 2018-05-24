<?php 
include '../connect.php';
$c_manager = $_POST['c_manager'];

$sql = "UPDATE tblkaryawan SET sisa_cuti =  $c_manager WHERE id_jabatan = 2";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=reset_cuti";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=reset_cuti";</script>
<?php

}


?>