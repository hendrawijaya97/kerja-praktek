<?php
include '../connect.php';
$id = $_GET['id'];




$sql="UPDATE tblkaryawan SET status_karyawan = 1 WHERE nip_karyawan = $id";
$hasil1 = $connect->query($sql);

if($hasil1){
	$query1 = "SELECT nip_karyawan, id_jabatan, status_karyawan FROM tblkaryawan WHERE nip_karyawan = $id";
	$run = $connect->query($query1);
	while($data = $run->fetch_array()){
		$nip_karyawan = $data['nip_karyawan'];
		$id_jabatan = $data['id_jabatan'];
		$status_karyawan = $data['status_karyawan'];
	}
}


if($nip_karyawan == $id && $status_karyawan == 1 && $id_jabatan == 2){
	$del = "DELETE FROM tblatasan WHERE nip_karyawan = $nip_karyawan";
	$rundel = $connect->query($del);
}

if($rundel){
echo '<script>document.location.href="index.php?page=view_karyawan";</script>';
//header('location: index.php?page=view_karyawan');
}else{
echo '<script>document.location.href="index.php?page=view_karyawan";</script>';
//header('location: index.php?page=view_karyawan');
}

?>
<h3>Perhatian!</h3>
<p>Data ini tidak bisa di hapus karena masih digunakan, coba cek kembali!</br>
  
<a href="index.php?page=view_karyawan">&laquo; Kembali</a></p>
