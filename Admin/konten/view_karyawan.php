
<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Data Karyawan</div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-karyawan">
						<thead>
							<tr>
								<th>Nip Karyawan</th>
								<th>Nama</th>
								<th>Kantor</th>
								<th>Jabatan</th>
								<th>Departemen</th>
								<th>Sisa Cuti</th>
								<th>Status Karyawan</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						

						<?php

					 function url_link($tujuan="", $nama_link="", $id="" , $Modal=""){

						  if(empty($id)){
						    echo "<a  class=\"btn btn-danger btn-xs btn1\"data-toggle=\"modal\" data-target=\"".$Modal."\">$nama_link</a>";
						  }else{
						    echo "<a class=\"btn btn-danger btn-xs btn1\" data-toggle=\"modal\" data-target=\"".$Modal."\" data-id=\"".$id."\">$nama_link</a>";
						  }
					}



				  			$no = 1;
				  			include '../connect.php';
				  		 $sql= "SELECT tblkaryawan.nama_karyawan, tblkaryawan.nip_karyawan, tblkaryawan.alamat, tblkaryawan.sisa_cuti, tblkaryawan.no_hp, tblkaryawan.id_kantor,tbljabatan.jabatan, tbldepartemen.departemen, tblkaryawan.status_karyawan FROM tblkaryawan, tbljabatan, tbldepartemen WHERE tblkaryawan.id_jabatan = tbljabatan.id_jabatan AND tblkaryawan.id_departemen = tbldepartemen.id_departemen ORDER BY tblkaryawan.status_karyawan asc";

				  			$hasil = $connect->query($sql);
				  
							while($data = $hasil->fetch_array()){
							  $id = $data['nip_karyawan'];
							  $nama = $data['nama_karyawan'];
							  $alamat = $data['alamat'];
							  $id_kantor = $data['id_kantor'];
							  $jabatan = $data['jabatan'];
							  $departemen = $data['departemen'];
							  $sisa_cuti = $data['sisa_cuti'];
							  $status_karyawan = $data['status_karyawan']; 
				  		?>
							<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $nama; ?></td>
							<td>
								<?php 
								      switch ($id_kantor) {
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
							<td><?php echo $jabatan; ?></td>
							<td><?php echo $departemen; ?></td>
							<td><?php echo $sisa_cuti; ?></td>
							<td>
								<?php 
								      switch ($status_karyawan) {
				                        case 0:
				                          echo "Aktif" ;
				                          break;
				                        case 1:
				                          echo "Non Aktif" ;
				                          break;
				                       }
				                          ?>
							</td>
							<td>
								  
								  <a  class="btn btn-info btn-xs btn1" href="index.php?page=info_karyawan&id=<?php echo $id; ?>">Info</a>

								<?php 
								if($status_karyawan == 0){
								url_link('delete_karyawan','Non Aktif',$id , '#ModalDelete'); 
								}
								?> 
							</td>
							</tr>
					
						
								<?php
  $no++;
  }
  ?>
	</tbody>
					</table>

  				</div>
  			</div>



		  </div>
		</div>
    </div>
 <!-- Delete Departemen Modal-->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="ModalDelete" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Status Karyawan Ini Akan di Non Aktifkan ?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Non Aktif Jika Ingin Menghapus Data</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary btndlt" >Non Aktif</a>
          </div>
        </div>
      </div>


<!-- End Departemen Modal -->

<script>
$(document).ready(function(){
	$('#table-karyawan').DataTable({
		 aaSorting: [[5, 'asc']]
		 
	});
  
  $("#table-karyawan").on('click', '.btn1', function(){
    $(".btndlt").attr("href","index.php?page=delete_karyawan&id="+$(this).data("id"));
  });

});

</script>

    
