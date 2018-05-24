 <!--<style>

#myImg {
    border-radius: 5px;
    cursor: pointer;
    transition: 0.3s;
}

#myImg:hover {opacity: 0.7;}

/* The Modal (background) */
.modal {
    display: none; /* Hidden by default */
    position: fixed; /* Stay in place */
    z-index: 1; /* Sit on top */
    padding-top: 100px; /* Location of the box */
    left: 0;
    top: 0;
    width: 100%; /* Full width */
    height: 100%; /* Full height */
    overflow: auto; /* Enable scroll if needed */
    background-color: rgb(0,0,0); /* Fallback color */
    background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
}

/* Modal Content (image) */
.modal-content {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
}

/* Caption of Modal Image */
#caption {
    margin: auto;
    display: block;
    width: 80%;
    max-width: 700px;
    text-align: center;
    color: #ccc;
    padding: 10px 0;
    height: 150px;
}

/* Add Animation */
.modal-content, #caption {    
    -webkit-animation-name: zoom;
    -webkit-animation-duration: 0.6s;
    animation-name: zoom;
    animation-duration: 0.6s;
}

@-webkit-keyframes zoom {
    from {-webkit-transform:scale(0)} 
    to {-webkit-transform:scale(1)}
}

@keyframes zoom {
    from {transform:scale(0)} 
    to {transform:scale(1)}
}

/* The Close Button */
.close {
    position: absolute;
    top: 50px;
    right: 35px;
    color: #f1f1f1;
    font-size: 40px;
    font-weight: bold;
    transition: 0.3s;
}

.close:hover,
.close:focus {
    color: #bbb;
    text-decoration: none;
    cursor: pointer;
}

/* 100% Image Width on Smaller Screens */
@media only screen and (max-width: 700px){
    .modal-content {
        width: 80%;
    }
}
</style>
-->

<style>
.popup{
    width: 100px;
 	margin-left: 10px;
 	margin-top: 10px;
 	margin-bottom: 10px;

}
.popup img{
    width: 250px;
    height: 250px;
    cursor: pointer;
}
.show{
    z-index: 999;
    display: none;
}
.show .overlay{
    width: 100%;
    height: 100%;
    background: rgba(0,0,0,.66);
    position: absolute;
    top: 0;
    left: 0;
}
.show .img-show{
    width: 600px;
    height: 500px;
    background: #FFF;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    overflow: hidden
}
.img-show span{
    position: absolute;
    top: 10px;
    right: 10px;
    z-index: 99;
    cursor: pointer;
}
.img-show img{
    width: 100%;
    height: 100%;
    position: absolute;
    top: 0;
    left: 0;
}
/*End style*/

</style>

<script>
	$(function () {
    "use strict";
    
    $(".popup img").click(function () {
        var $src = $(this).attr("src");
        $(".show").fadeIn();
        $(".img-show img").attr("src", $src);
    });
    
    $("span, .overlay").click(function () {
        $(".show").fadeOut();
    });
    
});
</script>

 <?php

                 function url_link($tujuan="", $nama_link="", $id=""){

                    if(empty($id)){
                      echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
                    }else{
                      echo "<a  class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id>$nama_link</a>";
                    }
                }

                $username = $_SESSION['username'];
                $id = $_GET['id'];
                $no = 1;
                include '../connect.php';
                $sql= "SELECT a.id_service, a.id_pengajuan, b.id_pengajuan, b.pengajuan, a.nip_karyawan, c.nama_karyawan, a.tgl_pengajuan, a.no_urgent, a.penganti, a.tgl_mulai, a.tgl_selesai, a.keterangan, a.status_service, a.bukti, d.departemen FROM tblservice AS a , tblpengajuan AS b , tblkaryawan AS c , tbldepartemen AS d WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = c.nip_karyawan AND a.id_service = $id AND c.id_departemen = d.id_departemen";

                $hasil = $connect->query($sql);
          
              while($data = $hasil->fetch_array()){
                $id = $data['id_service'];
                $departemen = $data['departemen'];
                $nip_karyawan = $data['nip_karyawan'];
                $tgl_pengajuan = $data['tgl_pengajuan'];
                $pengajuan = $data['pengajuan'];
                $tgl_mulai = $data['tgl_mulai'];
                $id_pengajuan = $data['id_pengajuan'];
                $no_urgent = $data['no_urgent'];
                $penganti = $data['penganti'];
                $tgl_selesai = $data['tgl_selesai'];
                $status_service = $data['status_service'];
                $keterangan = $data['keterangan'];
                $bukti = $data['bukti'];

            }

                ?>
<div class="row">
<div class="col-md-6">
	  	<div class="content-box-large">
			  				<div class="panel-heading">
					            <div class="panel-title"><p> <h2>Info Pengajuan</h2></p></div>
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
								    <input type="text" class="form-control" name="pengajuan" id="pengajuan" value="<?php echo $pengajuan; ?>" readonly >
									</div>
								  </div>

								  <div class="form-group">	  		
								    <label class="col-sm-4 control-label">NIP Karyawan</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="nip_karyawan"  name="nip_karyawan" value="<?php echo $nip_karyawan; ?>" required readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Tanggal Pengajuan</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" name="tgl_pengajuan" id="tgl_pengajuan" value="<?php echo $tgl_pengajuan; ?>" readonly >
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">No Urgent</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="no_urgent" placeholder="Nomor HP" name="no_urgent" value="<?php echo $no_urgent; ?>" readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Status Pengajuan</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="status_service"  name="status_service" value="<?php 
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
				                          ?>" readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Departemen</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="no_urgent" placeholder="Nomor HP" name="departemen" value="<?php echo $departemen; ?>" readonly>
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
								    <?php 
								    $sql2 = "SELECT a.nama_karyawan , a.nip_karyawan , b.penganti FROM tblkaryawan AS a , tblservice AS b WHERE a.nip_karyawan = b.penganti AND b.id_service = $id";
								    $hasil2 = $connect->query($sql2);
          							$nama_penganti = "";
						              while($data = $hasil2->fetch_array()){
						                $nama_penganti = $data['nama_karyawan'];
						            }

								    ?>
								    <input type="text" class="form-control" id="penganti" placeholder="Nomor HP" name="penganti" value="<?php echo $nama_penganti." ".$penganti; ?>" readonly>
									</div>

								  <div class="form-group">
								    <label  class="col-sm-4 control-label">Tanggal Mulai</label>
								    <div class="col-sm-10">
								       <input type="text" class="form-control" id="tgl_mulai" placeholder="Nomor HP" name="tgl_mulai" value="<?php echo $tgl_mulai; ?>" readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Tanggal Selesai</label>
								    <div class="col-sm-10">
								      <input type="text" class="form-control" id="tgl_selesai" placeholder="Nomor HP" name="tgl_selesai" value="<?php echo $tgl_selesai; ?>" readonly>
								    </div>
								  </div>
								  <div class="form-group">
								    <label class="col-sm-4 control-label">Keterangan</label>
								    <div class="col-sm-10">
								    <input type="text" class="form-control" id="keterangan" placeholder="Nomor HP" name="keterangan" value="<?php echo $keterangan; ?>" readonly>
								      <!--<textarea class="form-control"  rows="3" name="keterangan" id="keterangan" value="<?php //echo $keterangan; ?>" readonly ></textarea> -->
								    </div>
								  </div>
								  <?php if(empty($bukti)) {?>
								  
								 	 <?php } else {?>
								 	<div class="form-group">
								    <label class="col-sm-4 control-label">Bukti</label>
								    <div class="col-sm-10">
								      <div class="popup">
								      <img src="<?php echo "images/".$bukti ; ?>" name="bukti" width="250" height="200"> 
								      </div>
								      <div class="show">
									  <div class="overlay"></div>
									  <div class="img-show">
									    <span>X</span>
									    <img src="">
									  </div>
									</div>
								    
								 	 </div>
								 	 <?php } ?>
								  <div class="form-group">
								    <div class="col-sm-offset-4 col-sm-10">

								    <?php
								    if($status_service == 0 AND $nip_karyawan == $username){ 
								    url_link('edit_pengajuan','Edit ',$id); 
								    }?>
								      
								    </div>
								  </div>
								</form>
			  				</div>
			  			</div>
			  			</div>
			  			</div>

<!-- The Modal 
<div id="myModal" class="modal">
  <span class="close">&times;</span>
  <img class="modal-content" id="img01">
  <div id="caption"></div>
</div>

<script>
// Get the modal
var modal = document.getElementById('myModal');

// Get the image and insert it inside the modal - use its "alt" text as a caption
var img = document.getElementById('myImg');
var modalImg = document.getElementById("img01");
var captionText = document.getElementById("caption");
img.onclick = function(){
    modal.style.display = "block";
    modalImg.src = this.src;
    captionText.innerHTML = this.alt;
}

// Get the <span> element that closes the modal
var span = document.getElementsByClassName("close")[0];

// When the user clicks on <span> (x), close the modal
span.onclick = function() { 
    modal.style.display = "none";
}
</script>
 
-->