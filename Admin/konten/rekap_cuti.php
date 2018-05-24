<div class="content-box-large">
	<div class="panel-heading">
	<div class="panel-title">Rekap Cuti Karyawan</div>
</div>

	<div class="panel-body">
		<form role="form" action="" method="POST">
			<div class="col-md-6">
				
					<div class="form-group">
						<label>Kantor</label>
						<select name="id_kantorr" id="select" class="bfh-selectbox form-control">
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
					<button type="submit" class="btn btn-primary btn-sm" name="submit">View</button>
			</div>
			
		</form>
	</div>
</div>

<div class="content-box-large">
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-laporan">
			<thead>
				<tr>
					<th>No</th>
					<th>Nip Karyawan</th>
					<th>Nama Karyawan</th>
					<th>Departemen</th>
					<th>Jabatan</th>
					<th>Sisa Cuti</th>
				</tr>
			</thead>
			<tbody>
			 <?php

				if(isset($_POST['submit'])==true){

					$id_kantorr = $_POST['id_kantorr'];

                  	$sql = "SELECT a.nip_karyawan , a.nama_karyawan , b.jabatan, c.departemen, a.sisa_cuti
							FROM tblkaryawan AS a, tbljabatan AS b , tbldepartemen AS c 
							WHERE a.id_jabatan = b.id_jabatan AND a.id_departemen = c.id_departemen AND a.id_kantor = '$id_kantorr'";

		  			$hasil = $connect->query($sql);
		  			$no = 1;
					while($data = $hasil->fetch_array()){
					  $nip_karyawan = $data['nip_karyawan'];
					  $nama_karyawan = $data['nama_karyawan'];
					  $jabatan = $data['jabatan'];
					  $departemen = $data['departemen'];
					  $sisa_cuti = $data['sisa_cuti'];
					  
	  		?>
				<tr>
				<td><?php echo $no; ?></td>
				<td><?php echo $nip_karyawan; ?></td>
				<td><?php echo $nama_karyawan; ?></td>
				
				<td><?php echo $departemen; ?></td>
				<td><?php echo $jabatan; ?></td>
				<td><?php echo $sisa_cuti. ' hari'; ?></td>
				</tr>
					
						
			<?php
			$no++;
			}
			}
			?>
			</tbody>
	</table>
						<form role="form" action="konten/laporan_rekapcuti.php" method="POST" target="_blank">
						<div class="form-group">
							<input type="hidden" class="form-control" name="kantorr" id="kantorr"  value="<?php echo $id_kantorr; ?>">
							<?php
								if(!empty($id_kantorr)){

							?>
							<button type="submit" class="btn btn-success btn-sm" name="submit"><span class="glyphicon glyphicon-print"> Print</span></button>
							<?php  } ?>
						</div>
						</form>
	</div>
</div>

<script>
$(document).ready(function(){
	$('#table-laporan').DataTable();
  
});

</script>



  