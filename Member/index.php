<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>E-Service Karyawan BPR Sejahtera Batam</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<?php 
session_start();
ob_start();
$username = $_SESSION['username'];
$id_jabatan = $_SESSION['id_jabatan'];
$id_departemen = $_SESSION['id_departemen'];
$id_kantor = $_SESSION['id_kantor'];
?>
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.php">E-Pelayanan Karyawan BPR Sejahtera Batam</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="index.php?page=form_pengajuan">
            <i class="fa fa-fw fa fa-edit"></i>
            <span class="nav-link-text">E-Pelayanan</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="index.php?page=view_history">
            <i class="fa fa-fw fa fa-clock-o"></i>
            <span class="nav-link-text">History</span>
          </a>
        </li>
        <?php
        if($id_jabatan == 1 || $id_jabatan == 2){
          ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="index.php?page=view_pengajuan">
            <i class="fa fa-fw fa fa-newspaper-o"></i>
            <span class="nav-link-text">Pengajuan Karyawan</span>
          </a>
        </li>
      <?php } ?>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
          <?php
                         
                        include '../connect.php';

                          $sql= "SELECT sisa_cuti FROM tblkaryawan WHERE nip_karyawan = '$username'";
                          $hasil = $connect->query($sql);
                          
                        while($data = $hasil->fetch_array()){
                        $sisa_cuti = $data['sisa_cuti'];
                        }
                         
                      
                         ?>

                         <?php
                         if($id_jabatan == 2 && $id_departemen == 2){
                          $sql1 = "SELECT count(*) AS jumlah , tblservice.nip_karyawan , tblkaryawan.id_kantor 
                                  FROM tblservice , tblkaryawan
                                  where status_service=0 AND tblkaryawan.nip_karyawan = tblservice.nip_karyawan AND tblkaryawan.id_kantor = $id_kantor AND tblkaryawan.id_jabatan=4";
                          }else{
                            $sql1 = "SELECT count(*) AS jumlah , tblservice.nip_karyawan , tblkaryawan.id_kantor ,tblkaryawan.id_departemen
                                  FROM tblservice , tblkaryawan
                                  where status_service=0 AND tblkaryawan.nip_karyawan = tblservice.nip_karyawan AND tblkaryawan.id_kantor = $id_kantor AND tblkaryawan.id_departemen = $id_departemen AND tblkaryawan.id_jabatan=4";
                          }
                        $query =  $connect->query($sql1);
                         while($data = $query->fetch_array()){
                        $jumlah = $data['jumlah'];
                        }
                      
                         ?>
                     
            <!-- <span class="nav-link-text">Saldo Cuti : <?php //echo $sisa_cuti." Hari "; ?> </span> -->
          </a>
        </li>
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">

      <?php if($id_jabatan == 1){ ?>

      <?php
      $sql2 = "SELECT count(*) AS jmlh , tblservice.nip_karyawan
              FROM tblservice , tblkaryawan
              where status_service=0 AND tblkaryawan.nip_karyawan = tblservice.nip_karyawan AND (tblkaryawan.id_jabatan = 2 OR tblkaryawan.id_jabatan = 3)";
              $query2 =  $connect->query($sql2);
               while($data = $query2->fetch_array()){
              $jmlh = $data['jmlh'];
              }

      ?>

      <?php if($jmlh == 0) { ?>
          
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
            <span class="indicator text-warning d-none d-lg-block">
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                
              </span>
            </a>
        </li>
         

        <?php }else{ ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning"><?php echo $jmlh?></span> 
            </span>
            
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span> 
            
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?page=view_pengajuan">
              <span class="text-danger">
                <strong>
                  <i class="fa far fa-envelope fa-fw"></i><?php echo $jmlh?> Pengajuan Baru</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Click For Detail </div>
            </a>
            <div class="dropdown-divider"></div>
            
        </li>
        <?php } }?>
        
       

        <?php if($id_jabatan == 4) { ?>
        <?php
         $sql4 = "SELECT count(*) AS total, id_service
                    FROM tblservice
                    WHERE (status_service = 2 OR status_service = 3) AND nip_karyawan = $username AND notif = 0";
              $query4 =  $connect->query($sql4);
               while($data = $query4->fetch_array()){
                $id_service = $data['id_service'];
              $total = $data['total'];
              }?>
          <?php if($total == 0) { ?>
          
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
            <span class="indicator text-warning d-none d-lg-block">
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                
              </span>
            </a>
        </li>
         

        <?php }else{ ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning"><?php echo $total?></span> 
            </span>
            
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span> 
            
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" id = "<?php echo $id ?>" href="index.php?page=update_notif&id_up=<?php echo $id_service ?>" >
              <span class="text-danger">
                <strong>
               <i class="fa far fa-envelope fa-fw"></i><?php echo $total; ?> Notification</strong>
              </span>
              <div class="dropdown-message small">Click For Detail </div>
            </a>
            <!-- Special -->
            

            
            

            <!-- end spesial -->
           
            <div class="dropdown-divider"></div>
            
        </li>
        <?php } }?>

         <?php if($id_jabatan == 2) { ?>
          <?php if($jumlah == 0) { ?>
          
           <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
            <span class="indicator text-warning d-none d-lg-block">
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                
              </span>
            </a>
        </li>
         

        <?php }else{ ?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning"><?php echo $jumlah?></span> 
            </span>
            
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span> 
            
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="index.php?page=view_pengajuan">
              <span class="text-danger">
                <strong>
                  <i class="fa far fa-envelope fa-fw"></i><?php echo $jumlah?> Pengajuan Baru</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Click For Detail </div>
            </a>
            
            <div class="dropdown-divider"></div>
            
        </li>
        <?php } }?>

        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-user"></i>
            <span class="d-lg-none">Account
              
            </span>
            
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header"><a href="index.php?page=change_password">Change Password</a></h6>
          </div>
        </li>

        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
  <!-- END NAV -->
  <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="../logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
     <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  <!-- content -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <?php
              if(isset($_GET['page'])){
                $page = $_GET['page'].".php";
                include('konten/'.$page);
              }else{
                include('konten/home.php');
              }
            ?>
        </div>
      </div>
    </div>
    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->    
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright Hendra Wijaya 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
  </div>
</body>

</html>
