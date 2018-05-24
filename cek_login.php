<?php
session_start();
ob_start();

include 'connect.php';

if(isset($_POST['Submit'])){
					
					
					$username	= mysqli_real_escape_string($connect,$_POST['username']);
					$password	= mysqli_real_escape_string($connect,md5($_POST['password']));
					$level		= mysqli_real_escape_string($connect,$_POST['level']);
					
					
					$query = mysqli_query($connect, "SELECT * FROM tblkaryawan WHERE nip_karyawan='$username' AND password='$password' AND status_karyawan = 0");
					if(mysqli_num_rows($query) == 0){
						echo '<script>alert("Login Gagal");document.location.href="index.php";</script>';
					}else{
						$row = mysqli_fetch_assoc($query);
						$id_jabatan = $row['id_jabatan'];
						$id_departemen = $row['id_departemen'];
						$id_kantor = $row['id_kantor'];

						
						if($row['level'] == 1 && $level == 1){
							$_SESSION['username']=$username;
							$_SESSION['level']='Member';
							$_SESSION['id_jabatan']=$id_jabatan;
							$_SESSION['id_departemen']=$id_departemen;
							$_SESSION['id_kantor']=$id_kantor;
							?>
							<script>document.location.href="Member/index.php";</script>;
							<!-- header("Location: Member/index.php"); -->
						<?php 
						}else if($row['level'] == 2 && $level == 2){
							$_SESSION['username']=$username;
							$_SESSION['id_departemen']=$id_departemen;
							$_SESSION['level']='Admin';

							echo '<script>document.location.href="Admin/index.php";</script>';
							//header("Location: Admin/index.php");
						}else{
							echo '<script>alert("Login Gagal");document.location.href="index.php";</script>';
						}
					}
				}

?>