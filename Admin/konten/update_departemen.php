<?php
include '../connect.php';

$departemen = $_POST['departemen'];
$id_departemen = $_POST['id_departemen'];


$sql= "UPDATE tbldepartemen SET departemen = '$departemen' WHERE id_departemen = '$id_departemen'";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_departemen";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=view_departemen";</script>
<?php

}

?>