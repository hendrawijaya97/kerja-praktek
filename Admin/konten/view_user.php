<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Reset Password Karyawan</div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-user">
						<thead>
							<tr>
								<th>Nip Karyawan</th>
								<th>Nama</th>
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
				  			$sql= "SELECT nip_karyawan , nama_karyawan FROM tblkaryawan where status_karyawan = 0";

				  			$hasil = $connect->query($sql);
				  
							while($data = $hasil->fetch_array()){
							  $id = $data['nip_karyawan'];
							  $nama = $data['nama_karyawan']; 
				  		?>
							<tr>
							<td><?php echo $id; ?></td>
							<td><?php echo $nama; ?></td>
							<td>
								 <?php url_link('reset_password','Reset Password ',$id , '#ModulReset'); ?>  
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

<!-- Reset Password Modal-->
    <div class="modal fade" id="ModulReset" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Password Ingin di Reset Ulang?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Reset Jika Ingin Reset Password menjadi NIP Karyawan</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a id = "btndlt" class="btn btn-primary" >Reset</a>
          </div>
        </div>
      </div>


<!-- End Departemen Modal -->

<script>
$(document).ready(function(){

  $(".btn1").click(function(){
    $("#btndlt").attr("href","index.php?page=reset_password&id="+$(this).data("id"));
  });

	$('#table-user').DataTable();
});


</script>