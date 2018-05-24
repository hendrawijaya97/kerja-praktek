
<div class="row">
<div class="col-md-6">
	  	<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><p> <h2>Form E-Service</h2></p></div>
					        </div>
		</div>
</div>
<?php

    function url_link($tujuan="", $nama_link="", $id=""){

        if(empty($id)){
          echo "<a href=index.php?page=$tujuan>$nama_link</a>";
        }else{
          echo "<a href=index.php?page=$tujuan&id=$id>$nama_link</a>";
        }
    }

    $no = 1;
    include '../connect.php';
    $id  = $_GET['id'];
    $sql= "SELECT a.id_service, a.id_pengajuan, b.id_pengajuan, b.pengajuan, a.nip_karyawan, c.nama_karyawan, a.tgl_pengajuan, a.no_urgent, a.penganti, a.tgl_mulai, a.tgl_selesai, a.keterangan, a.status_service, a.bukti FROM tblservice AS a , tblpengajuan AS b , tblkaryawan AS c WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = c.nip_karyawan AND a.id_service = $id";
    $hasil = $connect->query($sql);
      
    while($data = $hasil->fetch_array()){
    	$id = $data['id_service'];
	    $nip_karyawan = $data['nip_karyawan'];
	    $tgl_pengajuan = $data['tgl_pengajuan'];
	    $id_pengajuan = $data['id_pengajuan'];
	    $pengajuan = $data['pengajuan'];
	    $tgl_mulai = $data['tgl_mulai'];
	    $no_urgent = $data['no_urgent'];
	    $penganti = $data['penganti'];
	    $tgl_selesai = $data['tgl_selesai'];
	    $status_service = $data['status_service'];
	    $keterangan = $data['keterangan'];
	    $bukti = $data['bukti'];
      }


?>

</div>
<div class="row">
	<div class="col-md-6">
	  	<div class="content-box-large">
			  				<div class="panel-body">
			  					<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_pengajuan">

								      <input type="text" class="form-control" name="id_service" id="id_service" value="<?php echo $id; ?>" hidden >
								   
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
												if($id_pengajuan == $id ){
											  	?>
										 			<option value="<?php echo $id; ?>" selected><?php echo $pengajuan; ?></option>
										 			<?php }else{ ?>
										 			<option value="<?php echo $id; ?>"><?php echo $pengajuan; ?></option>
										 			
										  		<?php } } ?>
									</select>
									</div>
								  </div>

								  <div class="form-group">	  		
								    <label class="col-sm-4 control-label">NIP Karyawan</label>
								    <div class="col-sm-10">
								   <?php
								   
								    $username = $_SESSION['username'];
								    $id_jabatan = $_SESSION['id_jabatan'];
								    $id_departemen = $_SESSION['id_departemen'];
								    $id_kantor = $_SESSION['id_kantor'];

								    ?> 
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
								      <input type="text" class="form-control" id="no_urgent" placeholder="Nomor HP" name="no_urgent" value="<?php echo $no_urgent; ?>" required>
								      <label class="col-sm-14 "><font size="2" color="red">* Nomor yang bisa dihubungi selama tidak masuk kerja</font> </label>
								    </div>
								  </div>
			  				</div>
			  			</div>
			  			</div>

			  			<div class="col-md-6">
	  					<div class="content-box-large">
			  				<div class="panel-body">
			  						<div class="form-group">
								    <label class="col-sm-4 control-label">Pengganti</label>
								    <div class="col-sm-10">
								    <select name="penganti" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan FROM tblkaryawan WHERE id_jabatan = $id_jabatan AND id_departemen = $id_departemen AND id_kantor = id_kantor AND nip_karyawan != $username";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
												if($penganti == $id){
				
											  ?>
										 			<option value="<?php echo $id; ?>" selected><?php echo $nama_karyawan; ?></option>
										 			<?php }else{ ?>
										 			<option value="<?php echo $id; ?>" ><?php echo $nama_karyawan; ?></option> 
										  		<?php  } } ?>
									</select>
									</div>

								  <div class="form-group">
								    <label  class="col-sm-4 control-label">Tanggal Mulai</label>
								    <div class="col-sm-10">
								       <input type="date" class="form-control" name="tgl_mulai" id="tgl_mulai" value="<?php echo $tgl_mulai; ?>" >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Tanggal Selesai</label>
								    <div class="col-sm-10">
								      <input type="date" class="form-control" name="tgl_selesai" id="tgl_selesai" value="<?php echo $tgl_selesai; ?>" >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Keterangan</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="keterangan" id="keterangan" value="<?php echo $keterangan; ?>"  >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Bukti</label>
								    <div class="col-sm-10">
								      <input name="bukti" class="form-control" type="file" id="bukti"/>
								      <input name="ubah_foto" type="checkbox" id="ubah_foto" value="checkbox" /> Ceklis jika ingin mengubah foto
								    </div>
								  </div>
								  <div class="form-group">
								    <div class="col-sm-offset-4 col-sm-10">
								    <input type="submit" name="Submit" value="Submit" id="Submit" class="btn btn-primary">
								      
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
			  			</div>
			  			</div>

