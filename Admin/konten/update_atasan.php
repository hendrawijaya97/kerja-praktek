<?php
include '../connect.php';

$id = $_GET['id'];
$id_departemen = $_POST['id_departemen'];
$id_kantor = $_POST['id_kantor'];
$nip_karyawan = $_POST['nip_karyawan'];

$sql= "UPDATE tblatasan SET id_departemen = '$id_departemen' , id_kantor = '$id_kantor' , nip_karyawan = '$nip_karyawan'   WHERE id_atasan = '$id'";
$hasil = $connect->query($sql);

$sql2 = "UPDATE tblkaryawan SET id_jabatan = 2, id_departemen = '$id_departemen', id_kantor = '$id_kantor' WHERE nip_karyawan = '$nip_karyawan'";
$hsl = $connect->query($sql2);



if($hasil){
	?>
	<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_atasan1";</script>


<?php }else{ ?>
	<script>alert('Data Tidak Berhasil di UPDATE');document.location.href="index.php?page=view_atasan1";</script>
<?php
}

?>