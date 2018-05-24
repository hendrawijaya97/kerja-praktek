<?php
include '../connect.php';

$id = $_GET['id'];
$id_pengajuan = $_GET['id_pengajuan'];

$sql= "SELECT id_pengajuan, kat_pengajuan FROM tblpengajuan WHERE id_pengajuan = $id_pengajuan";
$hasil = $connect->query($sql);

while($data = $hasil->fetch_array()){
    $id_p = $data['id_pengajuan'];
    $kat_pengajuan = $data['kat_pengajuan'];
  }

if($kat_pengajuan == 1){

		$sql2 = "SELECT tgl_mulai , tgl_selesai FROM tblservice WHERE id_service = $id";
		$hasil2 =  $connect->query($sql2);

		while($data = $hasil2->fetch_array()){
		    $tgl_mulai = $data['tgl_mulai'];
		    $tgl_selesai = $data['tgl_selesai'];

		    $s = strtotime($tgl_mulai);
		    $e = strtotime($tgl_selesai);
		    $e_date=date("d-m-y",$e);
		    $s_date=date("d-m-y",$s);
		    $c = $e-$s;
		    $f = date("d",$c);
		 }

		$sql3 = "SELECT a.sisa_cuti, a.nip_karyawan, b.id_service , b.nip_karyawan FROM tblkaryawan AS a, tblservice AS b WHERE a.nip_karyawan = b.nip_karyawan AND b.id_service = $id";
		$hasil3 =  $connect->query($sql3);

		while($data = $hasil3->fetch_array()){
		    $sisa_cuti = $data['sisa_cuti'];
		    $nip_karyawan = $data['nip_karyawan'];
		   
		 }

		$now = $sisa_cuti - $f;


		$sql4 = "UPDATE tblkaryawan SET sisa_cuti = $now WHERE nip_karyawan = $nip_karyawan";
		$hasil4 = $connect->query($sql4);

		if($hasil4){
			  	$sql1= "UPDATE tblservice SET status_service = 2 WHERE id_service = $id";
				$hasil1 = $connect->query($sql1);
				echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
			//header('location:index.php?page=view_pengajuan');
		}else{
			echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
			//header('location:index.php?page=view_pengajuan');
		}
}else if ($kat_pengajuan == 0) {
		$sql5 = "UPDATE tblservice SET status_service = 2 WHERE id_service = $id";
		$hasil5 = $connect->query($sql5);
}else if($kat_pengajuan == 2){
		$sql6 = "SELECT bukti FROM tblservice WHERE id_service = $id";
		$hasil6 = $connect->query($sql6);

		while($data = $hasil6->fetch_array()){
		    $bukti = $data['bukti'];
		 }

		 if(empty($bukti)){
		 	$sql2 = "SELECT tgl_mulai , tgl_selesai FROM tblservice WHERE id_service = $id";
			$hasil2 =  $connect->query($sql2);

				while($data = $hasil2->fetch_array()){
			        $tgl_mulai = $data['tgl_mulai'];
			        $tgl_selesai = $data['tgl_selesai'];

			        $s = strtotime($tgl_mulai);
		            $e = strtotime($tgl_selesai);
		            $e_date=date("d-m-y",$e);
		            $s_date=date("d-m-y",$s);
		            $c = $e-$s;
		            $f = date("d",$c);
			     }

			$sql3 = "SELECT a.sisa_cuti, a.nip_karyawan, b.id_service , b.nip_karyawan FROM tblkaryawan AS a, tblservice AS b WHERE a.nip_karyawan = b.nip_karyawan AND b.id_service = $id";
			$hasil3 =  $connect->query($sql3);

				while($data = $hasil3->fetch_array()){
			        $sisa_cuti = $data['sisa_cuti'];
			        $nip_karyawan = $data['nip_karyawan'];
			       
			     }

			$now = $sisa_cuti - $f;


			$sql4 = "UPDATE tblkaryawan SET sisa_cuti = $now WHERE nip_karyawan = $nip_karyawan";
			$hasil4 = $connect->query($sql4);

				if($hasil4){
					  	$sql1= "UPDATE tblservice SET status_service = 2 WHERE id_service = $id";
						$hasil1 = $connect->query($sql1);
					echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
					//header('location:index.php?page=view_pengajuan');
				}else{
					echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
					//header('location:index.php?page=view_pengajuan');
				}
		 }else{
		 	$sql5= "UPDATE tblservice SET status_service = 2 WHERE id_service = $id";
			$hasil5 = $connect->query($sql5);
				if($hasil5){
					echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
					//header('location:index.php?page=view_pengajuan');
				}else{
					echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
					//header('location:index.php?page=view_pengajuan');
				}
		 }

}else{
	  	$sql5= "UPDATE tblservice SET status_service = 2 WHERE id_service = $id";
		$hasil5 = $connect->query($sql5);
			if($hasil5){
				echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
				//header('location:index.php?page=view_pengajuan');
			}else{
				echo '<script>document.location.href="index.php?page=view_pengajuan";</script>';
				//header('location:index.php?page=view_pengajuan');
			}
  }