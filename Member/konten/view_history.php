 <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
          <i class="fa fa-table"></i> History Pengajuan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="table-history">
              <thead>
                <tr>
                  <th>Tanggal Pengajuan</th>
                  <th>Jenis Pengajuan</th>
                  <th>Tanggal Mulai</th>
                  <th>Tanggal Selesai</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              <?php

                 function url_link($tujuan="", $nama_link="", $id=""){

                    if(empty($id)){
                      echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
                    }else{
                      echo "<a  class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id>$nama_link</a>";
                    }
                }
               
                $username = $_SESSION['username'];
                $no = 1;
                include '../connect.php';

               

                $sql= "SELECT a.id_service, a.tgl_pengajuan, a.id_pengajuan, a.nip_karyawan, b.pengajuan, a.tgl_mulai, a.tgl_selesai, a.status_service FROM tblservice AS a , tblpengajuan AS b WHERE a.id_pengajuan = b.id_pengajuan AND a.nip_karyawan = $username ORDER BY a.tgl_pengajuan DESC";

                $hasil = $connect->query($sql);
                //isset($_POST['id_up']) ? $id_up = $_POST['id_up'] : $id_up = $_GET['id_up']
                 

          
              while($data = $hasil->fetch_array()){
                $id = $data['id_service'];
                $tgl_pengajuan = $data['tgl_pengajuan'];
                $id_pengajuan = $data['id_pengajuan'];
                $pengajuan = $data['pengajuan'];
                $tgl_mulai = $data['tgl_mulai'];
                $tgl_selesai = $data['tgl_selesai'];
                $status_service = $data['status_service'];



                ?>
                <tr>
                  <td><?php echo $tgl_pengajuan; ?></td>
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
                    <?php url_link('info_pengajuan','Info Pengajuan ',$id ); ?>  
                    <?php
                    if($status_service == 0) 
                    url_link('cancel_pengajuan','Cancel',$id ); 
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

<script>
$(document).ready(function(){
  $('#table-history').DataTable({
     "order": [[ 0, 'desc' ]]
  });

});

</script>