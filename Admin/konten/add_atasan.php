
<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Tambah Head Departemen</div>
							
							
						</div>
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="navbar">
								    <div class="tab-pane active" id="tab1">
								      <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=input_atasan">
										  <div class="form-group">
										    <label for="departemen" class="col-sm-2 control-label">Departemen</label>
										    <div class="col-sm-10">
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
										  </div>

										  <div class="form-group">
										    <label for="departemen" class="col-sm-2 control-label">Kantor</label>
										    <div class="col-sm-10">
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
										  </div>

										  <div class="form-group">
										    <label for="departemen" class="col-sm-2 control-label">Atasan</label>
										    <div class="col-sm-10">
										      <select name="nip_karyawan" id="select" class="bfh-selectbox form-control">
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT nip_karyawan, nama_karyawan FROM tblkaryawan WHERE id_jabatan = 1 OR 2";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												$id = $data['nip_karyawan'];
												$nama_karyawan = $data['nama_karyawan'];
											  ?>
										 			<option value="<?php echo $id; ?>"><?php echo $nama_karyawan; ?></option>
										  		<?php } ?>
										  		</select>
										  		
										    </div>
										  </div>
						
										  
										<div class="form-group" >
											<label for="fotokaryawan" class="col-sm-2 control-label"></label>
											<div class="col-md-7">
												
												<input type="submit" name="Submit" value="Submit" id="Submit" class="btn btn-primary btn-sm"></td>
												
											</div>

										</form>
								    </div>
								   
								    </div>
									
								</div>	
							</div>
		  				</div>
		  			</div>
					</div>
				</div>

 