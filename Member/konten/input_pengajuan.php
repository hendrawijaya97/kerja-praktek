<?php
include '../connect.php';

$id_pengajuan = $_POST['id_pengajuan'];
$nip_karyawan = $_POST['nip_karyawan'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$no_urgent = $_POST['no_urgent'];
$penganti = $_POST['penganti'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
$keterangan = $_POST['keterangan'];

$bukti = $_FILES['bukti']['name'];
$tmp = $_FILES['bukti']['tmp_name'];
$path = "images/".$bukti;

$f=strtotime($_POST['tgl_mulai']);
$f_date=date("Y-m-d 00:00:00",$f);

$t=strtotime($_POST['tgl_selesai']);
$t_date=date("Y-m-d 23:59:59",$t);
if($t_date < $f_date){
	echo '<script>alert("Tidak Bisa Pilih Tanggal Mundur");document.location.href="index.php?page=form_pengajuan";</script>';
	
}

$sql1 = "SELECT sisa_cuti FROM tblkaryawan WHERE nip_karyawan = $nip_karyawan";
$result = $connect->query($sql1);

while($data = $result->fetch_array()){
		$sisa_cuti = $data['sisa_cuti'];

}


if($id_pengajuan == 1 && !isset($penganti)){
	echo '<script>alert("Gak Ada Penganti");document.location.href="index.php?page=form_pengajuan";</script>';
}else if($sisa_cuti == 0 && $id_pengajuan == 1){
	echo '<script>alert("CUTI ANDA SUDAH HABIS");document.location.href="index.php?page=form_pengajuan";</script>';
}else{


if(isset($bukti) && !empty($bukti)){
	$finfo = new finfo(FILEINFO_MIME_TYPE);
	if(array_search($finfo->file($tmp),
		array(
			'jpg' => 'image/jpeg',
			'png' => 'image/png',
			'gif' => 'image/gif',
			), true) === false){
		// true
		echo '<script>alert("Only jpg, gif or png types");document.location.href="index.php?page=form_pengajuan";</script>';
	}else{
		//limit file size
		if($_FILES['bukti']['size'] > 10000000){
			echo '<script>alert("Size Foto Terlalu Besar");document.location.href="index.php?page=form_pengajuan";</script>';
		}else{
			if(move_uploaded_file($tmp, $path)){
				
				$sql = "INSERT INTO tblservice (id_pengajuan, nip_karyawan, tgl_pengajuan, no_urgent, penganti, tgl_mulai, tgl_selesai, keterangan, bukti, status_service) VALUES ('$id_pengajuan', '$nip_karyawan', '$tgl_pengajuan' ,'$no_urgent', '$penganti' ,'$tgl_mulai' , '$tgl_selesai' , '$keterangan' , '$bukti',0)";

				$hasil = $connect->query($sql); 
			}

			if($hasil){
				echo '<script>document.location.href="index.php?page=view_history";</script>';
				//header("Location:index.php?page=view_history");
			}else{
				echo '<script>document.location.href="index.php?page=view_history";</script>';
				//header("Location:index.php?page=view_history"); 
			}
		}
	}
}else{
	$sql = "INSERT INTO tblservice (id_pengajuan, nip_karyawan, tgl_pengajuan, no_urgent, penganti, tgl_mulai, tgl_selesai, keterangan, status_service) VALUES ('$id_pengajuan', '$nip_karyawan', '$tgl_pengajuan' ,'$no_urgent', '$penganti' ,'$tgl_mulai' , '$tgl_selesai' , '$keterangan', 0)";
	$hasil = $connect->query($sql); 

	if($hasil){
		echo '<script>document.location.href="index.php?page=view_history";</script>';
		//header("Location:index.php?page=view_history");
	}else{
		echo '<script>document.location.href="index.php?page=view_history";</script>';
		//header("Location:index.php?page=view_history"); 
	}
}
}
?>