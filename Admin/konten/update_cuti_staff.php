<?php 
include '../connect.php';
$c_staff = $_POST['c_staff'];

$sql = "UPDATE tblkaryawan SET sisa_cuti =  $c_staff WHERE id_jabatan = 4";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=reset_cuti";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=reset_cuti";</script>
<?php

}


?>