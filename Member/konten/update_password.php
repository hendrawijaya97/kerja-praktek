<?php


include '../connect.php';

if(isset($_SESSION['username'])){

$cr_pass = md5($_POST['cr_pass']);
$n_pass = md5($_POST['n_pass']);
$cnpass = md5($_POST['cnpass']);


$username = $_SESSION['username'];
$query = "SELECT password FROM tblkaryawan WHERE nip_karyawan = '$username'";

$hasil = $connect->query($query);
										  
while($data = $hasil->fetch_array()){
$password = $data['password'];

}

if($cr_pass == $password){

	if($n_pass == $cnpass){
		$querychange = mysqli_query($connect,"UPDATE tblkaryawan SET password = '$n_pass' WHERE nip_karyawan = '$username'");
		?>
			<script>alert('Data Berhasil Di UPDATE');document.location.href="index.php?page=change_password";</script>
			<?php
	}else{
		//echo "new password dont macth";
		echo '<script>alert("New Password Dont Match");document.location.href="index.php?page=change_password";</script>';
	}

}else{
	echo '<script>alert("Password Wrong");document.location.href="index.php?page=change_password";</script>';
}
}else{
	echo '<script>alert("Password Wrong");document.location.href="index.php?page=change_password";</script>';
}


?>