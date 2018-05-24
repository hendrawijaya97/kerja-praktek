<?php
								   
$username = $_SESSION['username'];
$id_jabatan = $_SESSION['id_jabatan'];
$id_departemen = $_SESSION['id_departemen'];
$id_kantor = $_SESSION['id_kantor'];

$q = "SELECT sisa_cuti FROM tblkaryawan WHERE nip_karyawan = '$username'";
$hsl = $connect->query($q);

while($data = $hsl->fetch_array()){
	$sisa_cuti = $data['sisa_cuti'];
}
?> 
<div class="row">
<div class="col-md-6">
	  	<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><p> <h2>Form E-Pelayanan</h2></p></div>
					        </div>
		</div>
		<div class="content-box-large">
			  				<div class="panel-heading">
			  				<label class="col-sm-10 control-label"><font size="5" >Sisa Cuti : <?php echo $sisa_cuti . ' Hari'; ?></font></label>
					            
					        </div>
		</div>
</div>
</div>
<div class="row">
	<div class="col-md-6">
	  	<div class="content-box-large">
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=input_pengajuan">
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Jenis Pengajuan</label>
								    <div class="col-sm-10">
								    <select name="id_pengajuan" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT * FROM tblpengajuan";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['id_pengajuan'];
												$pengajuan = $data['pengajuan'];
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $pengajuan; ?></option>
										  		<?php } ?>
									</select>
									</div>
								  </div>

								  <div class="form-group">	  		
								    <label class="col-sm-4 control-label">NIP Karyawan</label>
								    <div class="col-sm-10">
								   
								      <input type="text" class="form-control" id="nip_karyawan"  name="nip_karyawan" value="<?php echo $username; ?>" required readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Tanggal Pengajuan</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="tgl_pengajuan" id="tgl_pengajuan" value="<?php echo date("Y-m-d"); ?>" readonly >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">No Urgent</label>
								    <div class="col-sm-10">
								      <input type="number" class="form-control" id="no_urgent" placeholder="Nomor HP" name="no_urgent" required>
								      <label class="col-sm-14 "><font size="2" color="red">* Nomor yang bisa dihubungi selama tidak masuk kerja</font> </label>
								    </div>
								  </div>
			  				</div>
			  			</div>
			  			</div>

			  			<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-body">
			  				<?php if($id_jabatan == 4){ ?>
			  						<div class="form-group">
								    <label class="col-sm-4 control-label">Pengganti</label>
								    <div class="col-sm-10">
								    <select name="penganti" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan, id_kantor FROM tblkaryawan WHERE id_jabatan = $id_jabatan AND id_departemen = $id_departemen AND id_kantor = $id_kantor AND nip_karyawan != $username AND status_karyawan = 0";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
						
				
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $nama_karyawan; ?></option>
										  		<?php } ?>
									</select>
									</div>
								<?php }else if($id_jabatan == 2){ ?>

									<div class="form-group">
								    <label class="col-sm-4 control-label">Pengganti</label>
								    <div class="col-sm-10">
								    <select name="penganti" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan, id_kantor FROM tblkaryawan WHERE id_jabatan = 3 AND id_departemen = $id_departemen AND id_kantor = $id_kantor AND nip_karyawan != $username AND status_karyawan = 0";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
						
				
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $nama_karyawan; ?></option>
										  		<?php } ?>
									</select>
									</div>
								<?php }else if($id_jabatan == 3){ ?>

									<div class="form-group">
								    <label class="col-sm-4 control-label">Pengganti</label>
								    <div class="col-sm-10">
								    <select name="penganti" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan, id_kantor FROM tblkaryawan WHERE id_jabatan = 2 AND id_kantor = $id_kantor AND nip_karyawan != $username AND status_karyawan = 0";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
						
				
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $nama_karyawan; ?></option>
										  		<?php } ?>
									</select>
									</div>
								<?php }else{ ?>

									<div class="form-group">
								    <label class="col-sm-4 control-label">Pengganti</label>
								    <div class="col-sm-10">
								    <select name="penganti" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan, id_kantor FROM tblkaryawan WHERE id_jabatan = $id_jabatan AND id_departemen = $id_departemen AND id_kantor = $id_kantor AND nip_karyawan != $username AND status_karyawan = 0";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
						
				
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $nama_karyawan; ?></option>
										  		<?php } ?>
									</select>
									</div>
								<?php } ?>


								  <div class="form-group">
								    <label  class="col-sm-4 control-label">Tanggal Mulai</label>
								    <div class="col-sm-10">
								       <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Tanggal Selesai</label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Keterangan</label>
								    <div class="col-sm-10">
								      <textarea class="form-control" placeholder="Keterangan" rows="3" name="keterangan" id="keterangan" ></textarea>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Bukti</label>
								    <div class="col-sm-10">
								      <input name="bukti" class="form-control" type="file" id="bukti"/>
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-4 col-sm-10">
								    <input type="submit" name="Submit" value="Submit" id="Submit" class="btn btn-primary btn-xs">
								      
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
			  			</div>
			  			</div>

 
