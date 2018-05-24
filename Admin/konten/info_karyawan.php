<!DOCTYPE html>
<html>
  <head>
    <title>Bootstrap Admin Theme v3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
    <style>
    img{
    	border-radius: 50%;
    }
    </style>

  </head>
  <body>
<div class="row">
					<div class="col-md-12">
						<div class="content-box-large">
		  				<div class="panel-heading">
							<div class="panel-title">Info Data Karyawan</div>
							
							
						</div>
						<?php

			            function url_link($tujuan="", $nama_link="", $id=""){

			                if(empty($id)){
			                  echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
			                }else{
			                  echo "<a class= \"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id>$nama_link</a>";
			                }
			            }

			            $no = 1;
			            include '../connect.php';
			            $id  = $_GET['id'];
			            $sql= "SELECT * FROM tblkaryawan WHERE nip_karyawan = '$id'";
			            $hasil = $connect->query($sql);
			              
			            while($data = $hasil->fetch_array()){
			              $id = $data['nip_karyawan'];
			              $nama_karyawan = $data['nama_karyawan'];
			              $tmpt_lahir = $data['tempat_lahir'];
			              $tgl_lahir = $data['tanggal_lahir'];
			              $alamat = $data['alamat'];
			              $no_hp = $data['no_hp'];
			              $email = $data['email'];
			              $jk = $data['jenis_kelamin'];
			              $id_jabatan = $data['id_jabatan'];
			              $id_departemen = $data['id_departemen'];
			              $sisa_cuti = $data['sisa_cuti'];
			              $tgl_masuk = $data['tgl_masuk'];
			              $foto_karyawan = $data['foto_karyawan'];
			              $status_karyawan = $data['status_karyawan'];
			              }


			            ?>
		  				<div class="panel-body">
		  					<div id="rootwizard">
								<div class="navbar">
								    <div class="tab-pane active" id="tab1">
								      <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_karyawan">
								     	 <div class="form-group">
										    <label for="Foto KAryawan" class="col-sm-2 control-label"></label>
										    <div class="col-sm-10">
										      <img src="<?php echo "images/".$foto_karyawan ; ?>" name="" width="250" height="200">
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="NipKaryawan" class="col-sm-2 control-label">Nip Karyawan</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="nip" placeholder="Nip Karyawan" name="nip_karyawan" value="<?php echo $id; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="Nama" class="col-sm-2 control-label">Nama Karyawan</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="nama_karyawan" placeholder="Nama Karyawan" name="nama_karyawan" value="<?php echo $nama_karyawan; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="tmp_lahir" class="col-sm-2 control-label">Tempat Lahir</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="tmpt_lahir" placeholder="Tempat Lahir" name="tmpt_lahir" value="<?php echo $tmpt_lahir; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="tgl_lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="tgl_lahir" placeholder="yyyy-mm-dd" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="alamat" class="col-sm-2 control-label">Alamat</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="alamat" placeholder="Alamat Domisili" name="alamat" value="<?php echo $alamat; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="no_hp" class="col-sm-2 control-label">No Handphone</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="no_hp" placeholder="No Handphone" name="no_hp" value="<?php echo $no_hp; ?>" required readonly>
										    </div>
										  </div>
										   <div class="form-group">
										    <label for="email" class="col-sm-2 control-label">Email</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="email" placeholder="Email" name="email" value="<?php echo $email; ?>" required readonly>
										    </div>
										  </div>
										  <div class="form-group">
										    <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="jenis_kelamin" placeholder="Email" name="jenis_kelamin" value="<?php echo $jk; ?>" required readonly>
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="departemen" class="col-sm-2 control-label">Kantor</label>
										    <div class="col-sm-10">
										     
										      <?php
										     
											  include '../connect.php';
										  		$sql= "SELECT tblkantor.kantor FROM tblkantor, tblkaryawan WHERE tblkaryawan.nip_karyawan='$id' AND tblkantor.id_kantor = tblkaryawan.id_kantor";
										  		$hasil = $connect->query($sql);
										  
												while($data = $hasil->fetch_array()){
												//$id = $data['id_kantor'];
												$kantor = $data['kantor'];
											  ?>
										 			<input type="text" class="form-control" id="id_jabatan" placeholder="Email" name="id_jabatan" value="<?php echo $kantor; ?>" required readonly>
										  		<?php } ?>
										  		</select>
										  		
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="jabatan" class="col-sm-2 control-label">Jabatan</label>
										    <div class="col-sm-10">
										    <?php
                         
						                        include '../connect.php';
						                          $sql= "SELECT tbljabatan.jabatan FROM tbljabatan , tblkaryawan WHERE tblkaryawan.nip_karyawan = '$id' AND tbljabatan.id_jabatan = tblkaryawan.id_jabatan";
						                          $hasil = $connect->query($sql);
						                      
						                        while($data = $hasil->fetch_array()){
						                        
						                        $jabatan = $data['jabatan'];
						                        ?>
										  		<input type="text" class="form-control" id="id_jabatan" placeholder="Email" name="id_jabatan" value="<?php echo $jabatan; ?>" required readonly>
										  		<?php } ?>
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="departemen" class="col-sm-2 control-label">Departemen</label>
										    <div class="col-sm-10">
										    <?php
                         
						                        include '../connect.php';
						                          $sql= "SELECT tbldepartemen.departemen FROM tbldepartemen , tblkaryawan WHERE tblkaryawan.nip_karyawan = '$id' AND tbldepartemen.id_departemen = tblkaryawan.id_departemen";
						                          $hasil = $connect->query($sql);
						                      
						                        while($data = $hasil->fetch_array()){
						                        
						                        $departemen = $data['departemen'];
						                        ?>
										      <input type="text" class="form-control" id="id_departemen" placeholder="Email" name="id_departemen" value="<?php echo $departemen; ?>" required readonly>
										       <?php } ?>
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="sisa_cuti" class="col-sm-2 control-label">Sisa Cuti</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="sisa_cuti" placeholder="Sisa Cuti Karyawan" name="sisa_cuti" value="<?php echo $sisa_cuti; ?>" required readonly>
										    </div>
										  </div>

										  <div class="form-group">
										    <label for="tgl_masuk" class="col-sm-2 control-label">Tanggal Masuk</label>
										    <div class="col-sm-10">
										      <input type="text" class="form-control" id="tgl_masuk" placeholder="yyyy-mm-dd" name="tgl_masuk" value="<?php echo $tgl_masuk; ?>" required readonly>
										    </div>
										  </div>

										  
										<div class="form-group" >
											<label for="fotokaryawan" class="col-sm-2 control-label"></label>
											<div class="col-md-7">
												
												<?php 
												if($status_karyawan == 0){
												url_link('edit_karyawan','Edit ',$id);
												}
												 ?>
												
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

 <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- jQuery UI -->
    <script src="https://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>

    <script src="vendors/form-helpers/js/bootstrap-formhelpers.min.js"></script>

    <script src="vendors/select/bootstrap-select.min.js"></script>

    <script src="vendors/tags/js/bootstrap-tags.min.js"></script>

    <script src="vendors/mask/jquery.maskedinput.min.js"></script>

    <script src="vendors/moment/moment.min.js"></script>

    <script src="vendors/wizard/jquery.bootstrap.wizard.min.js"></script>

     <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script> 


    <link href="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/css/bootstrap-editable.css" rel="stylesheet"/>
	<script src="//cdnjs.cloudflare.com/ajax/libs/x-editable/1.5.0/bootstrap3-editable/js/bootstrap-editable.min.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/forms.js"></script>
      </body>
</html>