<div class="content-box-large">
	<div class="panel-heading">
	<div class="panel-title">Laporan Karyawan</div>
</div>

	<div class="panel-body">
		<form role="form" action="" method="POST">
			<div class="col-md-6">
				
					<div class="form-group">
						<label>Pengajuan</label>
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
			</div>

			<div class="col-md-6">
						<div class="form-group">
							 <label>FROM</label>
			                <input type="date" class="form-control" name="from" id="from" >
			            </div>			
						<div class="form-group">
							<label>UNTIL</label>
							<input type="date" class="form-control" name="until" id="until">
						</div>
						<button type="submit" class="btn btn-primary" name="submit">View</button>
							
			</div>
		</form>
	</div>
</div>

<div class="content-box-large">
	<div class="panel-body">
		<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-laporan">
			<thead>
				<tr>
					<th>Kantor</th>
					<th>Tanggal Mulai</th>
					<th>Tanggal Selesai</th>
					<th>Nip Karyawan</th>
					<th>Nama Karyawan</th>
					<th>Jenis Pengajuan</th>
					<th>Status Pengajuan</th>
					<th>Sisa Cuti</th>
				</tr>
			</thead>
			<tbody>
			 <?php

				if(isset($_POST['submit'])==true){
					$f=strtotime($_POST['from']);
                	$f_date=date("Y-m-d 00:00:00",$f);

                  	$t=strtotime($_POST['until']);
                  	$t_date=date("Y-m-d 23:59:59",$t);

                  	$id_kantorr = $_POST['id_kantorr'];

                  	if($t_date < $f_date){
                  		echo '<script>alert("Tidak Bisa Pilih Tanggal Mundur");document.location.href="index.php?page=view_laporan";</script>';
                  		
                  	}
                  

                  	$sql = "SELECT a.id_pengajuan , a.nip_karyawan , a.tgl_pengajuan, b.sisa_cuti, a.tgl_mulai, a.tgl_selesai, a.status_service, b.nama_karyawan, b.id_kantor , c.pengajuan 
							FROM tblservice AS a, tblkaryawan AS b , tblpengajuan AS c 
							WHERE a.nip_karyawan = b.nip_karyawan AND b.id_kantor = $id_kantorr AND a.id_pengajuan = c.id_pengajuan AND tgl_pengajuan >= '$f_date' AND tgl_pengajuan <= '$t_date'";

		  			$hasil = $connect->query($sql);
		  
					while($data = $hasil->fetch_array()){
					  $kantor1 = $data['id_kantor'];
					  $tgl_mulai = $data['tgl_mulai'];
					  $tgl_selesai = $data['tgl_selesai'];
					  $nip_karyawan = $data['nip_karyawan'];
					  $pengajuan = $data['pengajuan'];
					  $sisa_cuti = $data['sisa_cuti'];
					  $nama_karyawan = $data['nama_karyawan'];
					  $status_service = $data['status_service']; 
	  		?>
				<tr>
				<td>
					<?php 
				      switch ($kantor1) {
                        case 1:
                          echo "Kantor Pusat Jodoh" ;
                          break;
                        case 2:
                          echo "Batu Aji" ;
                          break;
                        case 3:
                          echo "Penuin" ;
                          break;
                        case 4:
                          echo "Botania" ;
                          break;
                        case 5:
                          echo "Mitra Raya" ;
                          break;  
                       }
                          ?>
				</td>
				<td><?php echo $tgl_mulai; ?></td>
				<td><?php echo $tgl_selesai; ?></td>
				<td><?php echo $nip_karyawan; ?></td>
				<td><?php echo $nama_karyawan; ?></td>
				<td><?php echo $pengajuan; ?></td>
				<td>
					<?php 
			      switch ($status_service) {
                    case 0:
                      echo "Pending" ;
                      break;
                    case 1:
                      echo "Cancel" ;
                      break;
                    case 2:
                      echo "Approved" ;
                      break;
                    case 3:
                      echo "Rejected" ;
                      break; }
					?>
				</td>
				<td><?php echo $sisa_cuti; ?></td>
				
				</tr>
					
						
			<?php
			
			}
			}
			?>
			</tbody>
	</table>
						<form role="form" action="konten/laporan.php" method="POST" target="_blank">
						<div class="form-group">
							<input type="hidden" class="form-control" name="kantorr" id="kantorr"  value="<?php echo $id_kantorr; ?>">
							<input type="hidden" class="form-control" name="p_from" id="p_from"  value="<?php echo $f_date; ?>">
							<input type="hidden" class="form-control" name="t_until" id="t_until"  value="<?php echo $t_date; ?>">
							<?php
								if(!empty($id_kantorr) || !empty($f_date) || !empty($t_date)){

							?>
							<button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-print"> Print</span></button>
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



  