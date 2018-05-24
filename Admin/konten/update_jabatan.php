<?php
include '../connect.php';

$jabatan = $_POST['jabatan'];
$id_jabatan = $_POST['id_jabatan'];

$sql= "UPDATE tbljabatan SET jabatan = '$jabatan' WHERE id_jabatan = '$id_jabatan'";
$hasil = $connect->query($sql);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_jabatan";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=view_jabatan";</script>
<?php
}

?>