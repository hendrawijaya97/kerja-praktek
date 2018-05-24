<?php
include '../connect.php';

$nip_karyawan = $_POST['nip_karyawan'];
$nama_karyawan = $_POST['nama_karyawan'];
$tmpt_lahir = $_POST['tmpt_lahir'];
$tgl_lahir = $_POST['tgl_lahir'];
$alamat = $_POST['alamat'];
$no_hp = $_POST['no_hp'];
$email = $_POST['email'];
$jenis_kelamin = $_POST['jenis_kelamin'];
$id_kantor = $_POST['id_kantor'];
$id_jabatan = $_POST['id_jabatan'];
$id_departemen = $_POST['id_departemen'];
$sisa_cuti = $_POST['sisa_cuti'];
$tgl_masuk = $_POST['tgl_masuk'];

$foto_karyawan = $_FILES['foto_karyawan']['name'];
$tmp = $_FILES['foto_karyawan']['tmp_name'];
$path = "images/".$foto_karyawan;

$level = $_POST['level']; 
$password = md5($_POST['nip_karyawan']);

if(isset($foto_karyawan) && !empty($foto_karyawan)){

	$finfo = new finfo(FILEINFO_MIME_TYPE);
	if(array_search($finfo->file($tmp),
		array(
			'jpg' => 'image/jpeg',
			'png' => 'image/png',
			'gif' => 'image/gif',
			), true) === false){
		// true
		echo '<script>alert("Only jpg, gif or png types");document.location.href="index.php?page=add_karyawan";</script>';
	}else{
		//limit file size
		if($_FILES['foto_karyawan']['size'] > 10000000){
			// throw 
			echo '<script>alert("Size Foto Terlalu Besar");document.location.href="index.php?page=add_karyawan";</script>';
		}else{
			if(move_uploaded_file($tmp, $path)){
				if($id_jabatan == 1){
					$qry = "SELECT nip_karyawan from tblatasan where id_departemen = 1";
				}else if($id_jabatan == 2 || $id_jabatan == 3){
					$qry = "SELECT nip_karyawan from tblatasan where id_departemen = 1";
				}else{
					$qry = "SELECT nip_karyawan from tblatasan WHERE id_departemen = $id_departemen and id_kantor = $id_kantor";
				}
				$sql2 = $connect->query($qry);
				$parentId = $sql2->fetch_array();
				$parent = $parentId[0];

				$sql = "INSERT INTO tblkaryawan (nama_karyawan, nip_karyawan, tempat_lahir, tanggal_lahir, alamat, no_hp, email, jenis_kelamin, id_jabatan, id_departemen, sisa_cuti, tgl_masuk, id_kantor, parent_id, foto_karyawan , level, password) VALUES ('$nama_karyawan', '$nip_karyawan', '$tmpt_lahir' ,'$tgl_lahir', '$alamat' ,'$no_hp' , '$email' , '$jenis_kelamin' , '$id_jabatan' , '$id_departemen' , '$sisa_cuti' , '$tgl_masuk' , '$id_kantor','$parent' ,  '$foto_karyawan' , '$level','$password')";
				$hasil = $connect->query($sql); 

				if($hasil){
					if(isset($_POST['cek_atasan'])){
						$sql= "INSERT INTO tblatasan (id_departemen,id_kantor, nip_karyawan) VALUES('$id_departemen', '$id_kantor', '$nip_karyawan')";
						$hasil = $connect->query($sql);
						if($hasil){
							echo '<script>alert("Atasan & Karyawan Berhasil Di Tambah");document.location.href="index.php?page=view_karyawan";</script>';
						}else{
							echo '<script>alert("Atasan Tidak Berhasil DI Tambah");document.location.href="index.php?page=view_karyawan";</script>';
						}
					}
					echo '<script>alert("Data Sukses di Input");document.location.href="index.php?page=view_karyawan";</script>';
				}
				else{
							echo '<script>alert("Data Sukses di Input");document.location.href="index.php?page=view_karyawan";</script>';

				}
			}else{
				echo '<script>alert("Foto Gagal di Upload");document.location.href="index.php?page=add_karyawan";</script>';
			}
		}
	}
} else {
	echo '<script>alert("Foto Karyawan Kosong");document.location.href="index.php?page=add_karyawan";</script>';
}
?>