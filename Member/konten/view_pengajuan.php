<?php
include '../connect.php';

$username = $_SESSION['username'];
$id_jabatan = $_SESSION['id_jabatan'];
$id_kantor = $_SESSION['id_kantor'];
$id_departemen = $_SESSION['id_departemen'];

if($id_jabatan == 2){
?>
	 <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Pengajuan Karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="table-pengajuan" width="100%" cellspacing="0">
              <thead>
                <tr>
                 
                  <th>Nama Karyawan</th>
                  <th>Jenis Pengajuan</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php

                 function url_link($tujuan="", $nama_link="", $id="", $id_pengajuan=""){

                    if(empty($id)){
                      echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
                    }else{
                      echo "<a  class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id&id_pengajuan=$id_pengajuan>$nama_link</a>";
                    }
                }

                $username = $_SESSION['username'];
                $id_jabatan = $_SESSION['id_jabatan'];
                $id_departemen = $_SESSION['id_departemen'];
                include '../connect.php';
                if($id_jabatan == 2 && $id_departemen == 2){
                $sql= "SELECT a.id_service, c.nama_karyawan, a.nip_karyawan,a.id_pengajuan, b.pengajuan, a.tgl_mulai, a.tgl_selesai, a.status_service, c.id_jabatan , c.id_kantor, c.id_departemen ,d.departemen
                      FROM tblservice AS a , tblpengajuan AS b , tblkaryawan AS c , tbldepartemen AS d
                      WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = c.nip_karyawan AND c.id_jabatan = 4 AND c.id_kantor = $id_kantor AND a.status_service = 0 AND c.id_departemen = d.id_departemen";
                }else{
                $sql= "SELECT a.id_service, c.nama_karyawan, a.nip_karyawan,a.id_pengajuan, b.pengajuan, a.tgl_mulai, a.tgl_selesai, a.status_service, c.id_jabatan , c.id_kantor, c.id_departemen,d.departemen
                      FROM tblservice AS a , tblpengajuan AS b , tblkaryawan AS c  , tbldepartemen AS d
                      WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = c.nip_karyawan AND c.id_jabatan = 4 AND c.id_kantor = $id_kantor AND c.id_departemen = $id_departemen AND a.status_service = 0 AND c.id_departemen = d.id_departemen";
                }

                $hasil = $connect->query($sql);
          
              while($data = $hasil->fetch_array()){
                $id = $data['id_service'];
                $departemen = $data['departemen'];
                $nama_karyawan = $data['nama_karyawan'];
                $id_pengajuan = $data['id_pengajuan'];
                $pengajuan = $data['pengajuan'];
                $tgl_mulai = $data['tgl_mulai'];
                $tgl_selesai = $data['tgl_selesai'];
                $status_service = $data['status_service'];

                
                $s = strtotime($tgl_mulai);
                $e = strtotime($tgl_selesai);
                $e_date=date("d-m-y",$e);
                $s_date=date("d-m-y",$s);
                
                $c = $e-$s;
                
                $f = date("d",$c);
              
                ?>

                <tr>
                  
                  <td><?php echo $nama_karyawan; ?></td>
                  <td><?php echo $pengajuan; ?></td>
                  <td><?php echo $tgl_mulai; ?></td>
                  <td><?php echo $tgl_selesai; ?></td>
                  <td><?php
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
                          break;
                        
                      
                      } 
                    ?></td>
                  <td>
                    <?php url_link('info_pengajuan','Info ',$id ,$id_pengajuan); ?>  
                    <?php 
                    if($status_service == 0){
                    url_link('reject_pengajuan','Reject',$id,$id_pengajuan); }
                     ?> 
                    <?php
                    if($status_service == 0){
                     url_link('approve_pengajuan','Approve',$id,$id_pengajuan); } ?> 
                  </td>
                </tr>
                <?php
               
                }
                ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
<?php 
} 

if($id_jabatan == 1){
?>

 <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> Pengajuan Karyawan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-pengajuan">
              <thead>
                <tr>
                  <th>Nama Karyawan</th>
                  <th>Jenis Pengajuan</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php

                 function url_link($tujuan="", $nama_link="", $id="", $id_pengajuan=""){

                    if(empty($id)){
                      echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
                    }else{
                      echo "<a  class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id&id_pengajuan=$id_pengajuan>$nama_link</a>";
                    }
                }

                $username = $_SESSION['username'];
                $no = 1;
                include '../connect.php';
                $sql= "SELECT a.id_service, c.nama_karyawan,a.id_pengajuan, a.nip_karyawan, b.pengajuan, a.tgl_mulai, a.tgl_selesai, a.status_service, c.id_jabatan FROM tblservice AS a , tblpengajuan AS b , tblkaryawan AS c WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = c.nip_karyawan AND (c.id_jabatan = 2 OR c.id_jabatan = 3)  AND a.status_service = 0";

                $hasil = $connect->query($sql);
          
              while($data = $hasil->fetch_array()){
                $id = $data['id_service'];
                $nama_karyawan = $data['nama_karyawan'];
                 $id_pengajuan = $data['id_pengajuan'];
                $pengajuan = $data['pengajuan'];
                $tgl_mulai = $data['tgl_mulai'];
                $tgl_selesai = $data['tgl_selesai'];
                $status_service = $data['status_service'];



                ?>
                <tr>
                  <td><?php echo $nama_karyawan; ?></td>
                  <td><?php echo $pengajuan; ?></td>
                  <td><?php echo $tgl_mulai; ?></td>
                  <td><?php echo $tgl_selesai; ?></td>
                  <td><?php
                     switch ($status_service) {
                        case 0:
                          echo "Pending" ;
                          break;
                        case 1:
                          echo "Cancel" ;
                          break;
                        case 0:
                          echo "Approved" ;
                          break;
                        case 0:
                          echo "Rejected" ;
                          break;
                        
                      
                      } 
                    ?></td>
                  <td>
                    <?php url_link('info_pengajuan','Info ',$id ,$id_pengajuan); ?>  
                    <?php url_link('reject_pengajuan','Reject',$id ,$id_pengajuan); ?> 
                    <?php url_link('approve_pengajuan','Approve',$id ,$id_pengajuan); ?> 
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
<?php 
} 
?>

 <script>
$(document).ready(function(){
  $('#table-pengajuan').DataTable({
     "order": [[ 0, 'desc' ]]
  });

});

</script>