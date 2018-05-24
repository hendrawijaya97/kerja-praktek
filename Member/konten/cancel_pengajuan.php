<?php
include '../connect.php';

$id = $_GET['id'];


$sql= "UPDATE tblservice SET status_service = 1 WHERE id_service = '$id'";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_history";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=view_history";</script>
<?php
}

?>