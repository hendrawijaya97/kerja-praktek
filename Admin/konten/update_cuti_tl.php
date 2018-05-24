<?php 
include '../connect.php';
$c_tl = $_POST['c_tl'];

$sql = "UPDATE tblkaryawan SET sisa_cuti =  $c_tl WHERE id_jabatan = 3";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=reset_cuti";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=reset_cuti";</script>
<?php

}


?>