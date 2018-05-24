<div class="content-box-large">
<div class="panel-heading">
	<div class="panel-title">Jabatan Karyawan</div>
		<div class="panel-options">
			<a class="nav-link" data-toggle="modal" data-target="#AddJabatanModul">
            <i class="fa fa-fw fa-plus"></i>Add</a>
		</div>
</div>
  				
  <div class="panel-body">
  	<div class="table-responsive">
  		<table class="table">
		<thead>
			<tr>
				<th>Id Jabatan</th>
				<th>Jabatan</th>
			</tr>

		</thead>

		 <?php

     function url_link($tujuan="", $nama_link="", $id="" , $Modal=""){

        if(empty($id)){
          echo "<a  class=\"btn btn-info btn-xs btn1\"data-toggle=\"modal\" data-target=\"".$Modal."\">$nama_link</a>";
        }else{
          echo "<a class=\"btn btn-danger btn-xs btn1\" data-toggle=\"modal\" data-target=\"".$Modal."\" data-id=\"".$id."\">$nama_link</a>";
        }
    }

  			$no = 1;
  			include '../connect.php';
  			$sql= "SELECT * FROM tbljabatan";

  			$hasil = $connect->query($sql);
  
			while($data = $hasil->fetch_array()){
			  $id = $data['id_jabatan'];
			  $jabatan = $data['jabatan']; 
  		?>
			<tbody>
				<tr>
					<td><?php echo $id; ?></td>
					<td><?php echo $jabatan; ?></td>
					<td>
          <a class="btn btn-info btn-xs btn1" data-toggle="modal" data-target="#ModalEdit" data-id="<?php echo $id ?>"> Edit </a>

						<?php url_link('delete_jabatan','Delete ',$id , '#ModalDelete'); ?> 
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
    <div class="modal fade" id="AddJabatanModul" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Jabatan</h5>
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
                                    <form class="form-horizontal" role="form" method="post" action="index.php?page=input_jabatan" onsubmit="return validateJabatan(this);">
                                      <div class="form-group">
                                         <label for="Nama" class="col-sm-2 control-label">Jabatan</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="addjabatan" id="addjabatan" placeholder="Jabatan Baru">
                                            </div>
                                        </div>
                                        
                                        <script type="text/javascript">
                                            function validateJabatan(formObj){
                                                if(formObj.addjabatan.value.trim()==''){
                                                    alert('Mohon isi Jabatan');
                                                    return false;
                                                }
                                                formObj.submit.disable = true;
                                                formObj.submit.value = 'Please Wait';
                                            }
                                        </script>
                                   
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
            <h5 class="modal-title" id="exampleModalLabel">Edit Jabatan</h5>
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
                                    <form class="form-horizontal" role="form" method="post" action="index.php?page=update_jabatan" onsubmit="return validateEditJabatan(this);">
                                      <div class="form-group">
                                         <label for="Nama" class="col-sm-2 control-label">ID Jabatan</label>
                                            <div class="col-sm-10">
                                              <input type="text" class="form-control" name="id_jabatan" id="id_jabatan" value="" readonly >
                                            </div>
                                        </div>
                                        <div class="form-group">
                                          <label for="Nama" class="col-sm-2 control-label">Jabatan</label>
                                          <div class="col-sm-10">
                                            <input type="text" class="form-control" name="jabatan" id="jabatan" value="">
                                          </div>
                                        </div>
                                        
                                   <script type="text/javascript">
                                            function validateEditJabatan(formObj){
                                                if(formObj.jabatan.value.trim()==''){
                                                    alert('Mohon isi Jabatan');
                                                    return false;
                                                }
                                                formObj.submit.disable = true;
                                                formObj.submit.value = 'Please Wait';
                                            }
                                        </script>
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
    $("input[name='id_jabatan']").val($(this).data("id"));
    $("input[name='jabatan']").val($(this).parent().prev().text());
    $("#btndlt").attr("href","index.php?page=delete_jabatan&id="+$(this).data("id"));
  });
});

</script>