
<div class="content-box-large">
<div class="panel-heading">
	<div class="panel-title">Head Departemen</div>
		<div class="panel-options">
			<a class="nav-link" data-toggle="modal" data-target="#AddATasanModal"><span class="glyphicon glyphicon-plus"></span>Add </a>
		</div>
</div>
  				
  <div class="panel-body">
  	<div class="table-responsive">
  		<table class="table">
		<thead>
			<tr>
				<th>Departemen</th>
				<th>Kantor</th>
        <th>Atasan</th>
        <th>Action</th>
			</tr>

		</thead>

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
  			$sql= "SELECT  tblatasan.id_atasan,tbldepartemen.departemen, tblkaryawan.nama_karyawan, tblkantor.kantor, tbldepartemen.id_departemen, tblkantor.id_kantor ,tblkaryawan.nip_karyawan FROM tblkantor, tblkaryawan, tbldepartemen, tblatasan WHERE tbldepartemen.id_departemen = tblatasan.id_departemen AND tblatasan.id_kantor = tblkantor.id_kantor AND tblatasan.nip_karyawan = tblkaryawan.nip_karyawan";

  			$hasil = $connect->query($sql);
  
			while($data = $hasil->fetch_array()){
			  $id = $data['id_atasan'];
        $departemen = $data['departemen'];
        $id_departemen = $data['id_departemen'];
        $id_kantor = $data['id_kantor'];
        $nip_karyawan = $data['nip_karyawan'];
			  $kantor = $data['kantor']; 
        $nama_karyawan = $data['nama_karyawan'];

        
  		?>
			<tbody>
				<tr>
					<td><?php echo $departemen; ?></td>
					<td><?php echo $kantor; ?></td>
          <td><?php echo $nama_karyawan; ?></td>
					<td>
					<a class="btn btn-info btn-xs btn-edit" data-toggle="modal" data-target="#ModalEdit" data-iddepartemen="<?php echo $id_departemen; ?>" data-idkantor ="<?php echo $id_kantor; ?>" data-nip="<?php echo $nip_karyawan; ?>" >Edit</a> 
						<?php url_link('delete_atasan','Delete ',$id , '#ModalDelete'); ?> 
					</td>
					
				</tr>	
				<?php
  $no++;
  }
  ?>		
			</tbody>
			 </table>
  					</div>
			
	</table>
  </div>
  </div>

<!-- Add Departemen Modal-->
    <div class="modal fade" id="AddATasanModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Atasan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">

                <div class="col-md-12">
                   <div class="content-box-large">
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
                        
                                  
                                
                                                    
                                               
                                           </div>
                                        </div>
                              
                            </div>  
                          </div>
                          </div>
                        </div>


          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input class="btn btn-primary" type="submit" name="Submit" value="Submit" id="Submit">
             </form>
          </div>
        </div>
      </div>
    </div>
<!-- End Departemen Modal -->

<!-- Edit Departemen Modal-->
    <div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Atasan</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span></button>
          </div>
          <div class="modal-body">
         
          <div class="col-md-12">
                   <div class="content-box-large">
                       <div class="panel-body">
                        <div id="rootwizard">
                             <div class="navbar">
                                <div class="tab-pane active" id="tab1">
                                    <form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_atasan">
                                  <div class="form-group">
                                    <label for="departemen" class="col-sm-2 control-label">Departemen</label>
                                    <div class="col-sm-10">
                                      <select name="id_departemen" id="select1" class="bfh-selectbox form-control">
                                      <?php
                                     
                                    include '../connect.php';
                                      $sql= "SELECT * FROM tbldepartemen";
                                      $hasil = $connect->query($sql);
                                  
                                    while($data = $hasil->fetch_array()){
                                    $id1 = $data['id_departemen'];
                                    $departemen = $data['departemen'];
                                    ?>
                                        <option value="<?php echo $id1; ?>"><?php echo $departemen; ?></option>
                                    <?php } ?>  
                                      </select>
                                      
                                    </div>
                                  </div>

                                  <div class="form-group">
                                    <label for="departemen" class="col-sm-2 control-label">Kantor</label>
                                    <div class="col-sm-10">
                                      <select name="id_kantor" id="select2" class="bfh-selectbox form-control">
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
                                      <select name="nip_karyawan" id="select3" class="bfh-selectbox form-control">
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
                        
                                  
                                
                                                    
                                               
                                           </div>
                                        </div>
                              
                            </div>  
                          </div>
                          </div>
                        </div>



          </div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <input class="btn btn-primary" type="submit" name="Submit" value="Submit" id="btnedt">
             </form>
          </div>
        </div>
      </div>
    </div>
<!-- End Departemen Modal -->

 <!-- Delete Departemen Modal-->
    <div class="modal fade" id="ModalDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Apakah Data Akan Di Hapus?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Pilih Delete Jika Ingin Menghapus Data</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a id = "btndlt" class="btn btn-primary" >Delete</a>
          </div>
        </div>
      </div>


<!-- End Departemen Modal -->

<script>
$(document).ready(function(){
  $(".btn1").click(function(){
    $("input[name='id_atasan']").val($(this).data("id"));
        $("input[name='id_departemen']").val($(this).parent().prev().text());
        $("input[name='id_kantor']").val($(this).parent().prev().text());
        $("input[name='nip_karyawan']").val($(this).parent().prev().text());
    $("#btnedt").attr("href","index.php?page=update_atasan&id="+$(this).data("id"));
    $("#btndlt").attr("href","index.php?page=delete_atasan&id="+$(this).data("id"));
  });

  $(".btn-edit").click(function(){
       var id = $(this).data("iddepartemen");
      $('#select1').val(id);
      var id = $(this).data("idkantor");
      $('#select2').val(id);
      var id = $(this).data("nip");
      $('#select3').val(id);
  });
});

</script>