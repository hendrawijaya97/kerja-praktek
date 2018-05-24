<?php
include '../connect.php';
$id_service = $_POST['id_service'];
$id_pengajuan = $_POST['id_pengajuan'];
$nip_karyawan = $_POST['nip_karyawan'];
$tgl_pengajuan = $_POST['tgl_pengajuan'];
$no_urgent = $_POST['no_urgent'];
$penganti = $_POST['penganti'];
$tgl_mulai = $_POST['tgl_mulai'];
$tgl_selesai = $_POST['tgl_selesai'];
$keterangan = $_POST['keterangan'];

// Cek apakah user ingin mengubah fotonya atau tidak
if(isset($_POST['ubah_foto'])){ // Jika user menceklis checkbox yang ada di form ubah, lakukan :
	// Ambil data foto yang dipilih dari form
	$bukti = $_FILES['bukti']['name'];
	$tmp = $_FILES['bukti']['tmp_name'];
	
	// Set path folder tempat menyimpan fotonya
	$path = "images/".$bukti;
			

	// Proses upload
	if(move_uploaded_file($tmp, $path)){ // Cek apakah gambar berhasil diupload atau tidak
		
		
		// Proses ubah data ke Database
		$query1 = "UPDATE tblservice SET id_pengajuan='".$id_pengajuan."', nip_karyawan='".$nip_karyawan."', tgl_pengajuan='".$tgl_pengajuan."', no_urgent='".$no_urgent."', penganti='".$penganti."', tgl_mulai='".$tgl_mulai."', tgl_selesai='".$tgl_selesai."', keterangan='".$keterangan."', bukti='".$bukti."' WHERE id_service='".$id_service."'";
		$sql2 = mysqli_query($connect, $query1); // Eksekusi/ Jalankan query dari variabel $query

		if($sql2){ // Cek jika proses simpan ke database sukses atau tidak
			// Jika Sukses, Lakukan :
			?>
			<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=view_history";</script> <!-- Redirect ke halaman index.php -->
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
	$query = "UPDATE tblservice SET id_pengajuan='".$id_pengajuan."', nip_karyawan='".$nip_karyawan."', tgl_pengajuan='".$tgl_pengajuan."', no_urgent='".$no_urgent."', penganti='".$penganti."', tgl_mulai='".$tgl_mulai."', tgl_selesai='".$tgl_selesai."', keterangan='".$keterangan."' WHERE id_service='".$id_service."'";
	$sql = mysqli_query($connect, $query); // Eksekusi/ Jalankan query dari variabel $query

	if($sql){ // Cek jika proses simpan ke database sukses atau tidak
		// Jika Sukses, Lakukan :
		echo '<script>document.location.href="index.php?page=view_history";</script>';
		//header("location: index.php?page=view_history"); // Redirect ke halaman index.php
	}else{
		// Jika Gagal, Lakukan :
		echo "Maaf, Terjadi kesalahan saat mencoba untuk menyimpan data ke database.";
	}
}


?>