<html>
<head>

</head>
<body>


  			<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Tambah Karyawan</div>
				</div>

  				<div class="panel-body">


  				<div class="col-md-6">
	  					
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=input_karyawan" onsubmit="return validateFormKaryawan(this);">
										<div class="form-group">
											<label>Nip Karywan</label>
										      <input type="text" class="form-control" id="nip_karyawan" placeholder="Nip Karyawan" name="nip_karyawan" required>
										</div>
										<div class="form-group">
										    <label for="Nama">Nama Karyawan</label>
										      <input type="text" class="form-control" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan" required>
										</div>
										<div class="form-group">
										    <label >Tempat Lahir</label>
										    <input type="text" class="form-control" id="tmpt_lahir" placeholder="Tempat Lahir" name="tmpt_lahir" required>
										</div>
										<div class="form-group">
										    <label >Tanggal Lahir</label>
										    <input type="date" class="form-control" id="tgl_lahir" placeholder="Tempat Lahir" name="tgl_lahir" required>
										</div>
										<div class="form-group">
										    <label for="Nama">Alamat</label>
										      <input type="text" class="form-control" id="alamat" placeholder="Alamat" name="alamat" required>
										</div>
										<div class="form-group">
										    <label for="Nama">NO HP</label>
										      <input type="text" class="form-control" id="no_hp" placeholder="No Handphone" name="no_hp" required>
										</div>
										<div class="form-group">
										    <label for="Nama">Jenis Kelamin</label>
										      <select name="jenis_kelamin" id="select" class="bfh-selectbox form-control">
										 			<option value="Pria">Pria</option>
										  			<option value="Wanita">Wanita</option>
										  		</select>
										</div>
										<div class="form-group">
										    <label for="Nama">Email</label>
										      <input type="email" class="form-control" id="email" placeholder="Email" name="email" required>
										</div>
									
			  				</div>
			  	</div>

			  			<div class="col-md-6">
	  					
			  				<div class="panel-body">
										<div class="form-group">
											 <label>Kantor</label>
											 <select name="id_kantor" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT * FROM tblkantor";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['id_kantor'];
												$kantor = $data['kantor'];
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $kantor; ?></option>
										  		<?php } ?>
										  		</select>
							            </div>
									
										<div class="form-group">
											<label>Jabatan</label>
											<select name="id_jabatan" id="select" class="bfh-selectbox form-control">
										      
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT * FROM tbljabatan";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['id_jabatan'];
												$jabatan = $data['jabatan'];
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $jabatan; ?></option>
										  		<?php } ?>
										  		</select>

										</div>

										<div class="form-group">
											<label>Departemen</label>
											<select name="id_departemen" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT * FROM tbldepartemen";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['id_departemen'];
												$departemen = $data['departemen'];
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $departemen; ?></option>
										  		<?php } ?>
										  		</select>

										</div>

										<div class="form-group">
										    <label for="Nama">Sisa Cuti</label>
										      <input type="text" class="form-control" id="sisa_cuti" placeholder="Saldo Cuti Tahunan" name="sisa_cuti" required>
										</div>

										<div class="form-group">
										    <label for="Nama">Tanggal Masuk</label>
										      <input type="date" class="form-control" id="tgl_masuk"  name="tgl_masuk" required>
										</div>

										<div class="form-group">
										    <label for="Nama">Foto Karyawan</label>
										      <input name="foto_karyawan" class="form-control" type="file" id="foto_karyawan">
										</div>

										<div class="form-group">
										    <label for="Nama">Level User</label>
										      <select name="level" id="select" class="bfh-selectbox form-control">
										 			<option value="1">Member</option>
										  			<option value="2">Admin</option>
										  		</select>
										</div>

										<div class="form-group">
										    <label class="checkbox-inline">
													<input type="checkbox" name="cek_atasan">
													Check Jika dia adalah Atasan </label>
										</div>
<!-- 									</fieldset>
 -->									
									
											<input class="btn btn-primary btn-sm" type="submit" name="Submit" value="Submit" id="Submit"></td>
										
									
								</form>
			  				</div>
			  			</div>





  					
  				</div>
  			</div>



		  </div>
		</div>
    </div>

<script type="text/javascript">
	function validateFormKaryawan(formObj){
		if(formObj.nip_karyawan.value.trim()==''){
			alert('Mohon isi Nip Karyawan');
			return false;
		}else if(formObj.nama_karyawan.value.trim()==''){
			alert('Mohon isi Nama Karyawan');
			return false;
		}else if(formObj.tmpt_lahir.value.trim()==''){
			alert('Mohon isi Tempat Lahir');
			return false;
		}else if(formObj.tgl_lahir.value.trim()==''){
			alert('Mohon isi Tanggal Lahir');
			return false;
		}else if(formObj.alamat.value.trim()==''){
			alert('Mohon isi Alamat');
			return false;
		}else if(formObj.no_hp.value.trim()==''){
			alert('Mohon isi No Hp');
			return false;
		}else if(formObj.email.value.trim()==''){
			alert('Mohon isi Email');
			return false;
		}else if(formObj.id_kantor.value.trim()==''){
			alert('Mohon isi Kantor');
			return false;
		}else if(formObj.id_jabatan.value.trim()==''){
			alert('Mohon isi Jabatan');
			return false;
		}else if(formObj.id_departemen.value.trim()==''){
			alert('Mohon isi Departemen');
			return false;
		}else if(formObj.sisa_cuti.value.trim()==''){
			alert('Mohon isi Sisa Cuti');
			return false;
		}else if(formObj.tgl_masuk.value.trim()==''){
			alert('Mohon isi Tanggal Masuk');
			return false;
		}else if(formObj.foto_karyawan.value.trim()==''){
			alert('Mohon isi Foto Karyawan');
			return false;
		}else if(formObj.level.value.trim()==''){
			alert('Mohon isi Level');
			return false;
		}
		formObj.submit.disable = true;
		formObj.submit.value = 'Please Wait';
	}
</script>

</body>
</html>