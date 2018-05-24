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



// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$foto_karyawan = $_FILES['foto_karyawan']['name'];
	$tmp = $_FILES['foto_karyawan']['tmp_name'];
	
	// Set path folder tempat menyimpan fotonya
	$path = "images/".$foto_karyawan;
			

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		if($id_jabatan == 1){
			$qry = "SELECT nip_karyawan from tblatasan where id_departemen = 1";
			}else if($id_jabatan == 2 OR 3){
				$qry = "SELECT nip_karyawan from tblatasan where id_departemen = 1";
			}else{
			$qry = "SELECT nip_karyawan from tblatasan WHERE id_departemen = $id_departemen and id_kantor = $id_kantor";
			}
		$sql = mysqli_query($connect,$qry);
		$parentId = $sql->fetch_array();
		$parent = $parentId[0];

		
		// Proses ubah data ke Database
		$query1 = "UPDATE tblkaryawan SET nama_karyawan='".$nama_karyawan."', tempat_lahir='".$tmpt_lahir."', tanggal_lahir='".$tgl_lahir."', alamat='".$alamat."', no_hp='".$no_hp."', email='".$email."', jenis_kelamin='".$jenis_kelamin."', id_kantor='".$id_kantor."', id_jabatan='".$id_jabatan."', id_departemen='".$id_departemen."', sisa_cuti='".$sisa_cuti."', tgl_masuk='".$tgl_masuk."', id_kantor='".$id_kantor."', parent_id='".$parent."', foto_karyawan='".$foto_karyawan."' WHERE nip_karyawan='".$nip_karyawan."'";
		$sql2 = mysqli_query($connect, $query1); // Eksekusi/ Jalankan query dari variabel $query

		if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			?>
			<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_karyawan";</script> <!-- Redirect ke halaman index.php -->
			<?php
			
		}else{
			// Jika Gagal, Lakukan :
			
			echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
		}
	}else{
		// Jika gambar gagal diupload, Lakukan :
		echo "Maaf, Gambar gagal untuk diupload.";
	}
}else{ // Jika user tidak menceklis checkbox yang ada di form ubah, lakukan :
	// Proses ubah data ke Database
	$query = "UPDATE tblkaryawan SET nama_karyawan='".$nama_karyawan."', tempat_lahir='".$tmpt_lahir."', tanggal_lahir='".$tgl_lahir."', alamat='".$alamat."', no_hp='".$no_hp."', email='".$email."', jenis_kelamin='".$jenis_kelamin."', id_kantor='".$id_kantor."', id_jabatan='".$id_jabatan."', id_departemen='".$id_departemen."', sisa_cuti='".$sisa_cuti."', tgl_masuk='".$tgl_masuk."', id_kantor='".$id_kantor."', parent_id='".$parent."' WHERE nip_karyawan='".$nip_karyawan."'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo '<script>document.location.href="index.php?page=view_karyawan";</script>';
		//header("location: index.php?page=view_karyawan"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	}
}


?>