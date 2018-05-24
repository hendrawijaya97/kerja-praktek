<!DOCTYPE html>
<html>
  <head>
    <title>Admin Portal BPRSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="vendors/datatables/dataTables.bootstrap.css" rel="stylesheet" media="screen">

     <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <script src="js/custom.js"></script>

      <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<?php
session_start();
ob_start();
$id_departemen = $_SESSION['id_departemen'];


?>
  	<div class="header">
	     <div class="container">
	        <div class="row">
	           <div class="col-md-5">
	              <!-- Logo -->
	              <div class="logo">
	                 <h1><a href="index.php">Administrator</a></h1>
	              </div>
	           </div>
	           
	           <!-- <div class="col-md-5">
	              <div class="navbar navbar-inverse" role="banner">
	                  <nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	                    <ul class="nav navbar-nav">
	                      <li class="dropdown">
	                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">My Account <b class="caret"></b></a>
	                        <ul class="dropdown-menu animated fadeInUp">
	                          <li><a href="index.php?page=change_password">Change Password</a></li>
	                          <li><a href="../logout.php">Logout</a></li>
	                        </ul>
	                      </li>
	                    </ul>
	                  </nav>
	              </div>
	           </div> -->
	        </div>
	     </div>
	</div>

    <div class="page-content">
    	<div class="row">
		  <div class="col-md-2">
		  	<div class="sidebar content-box" style="display: block;">
                <ul class="nav">
                    <!-- Main menu -->
                    
                    <li><a href="index.php?page=view_karyawan"><i class="glyphicon glyphicon-folder-open"></i> Data Karyawan</a></li>
                    <li><a href="index.php?page=view_atasan1"><i class="glyphicon glyphicon-folder-open"></i> Data Atasan</a></li>
                    <li><a href="index.php?page=view_user"><i class="glyphicon glyphicon-folder-open"></i> User Management</a></li>
                    <?php if($id_departemen == 4){?>
                    <li><a href="index.php?page=reset_cuti"><i class="glyphicon glyphicon-folder-open"></i> Reset Cuti</a></li>
                    <?php } ?>
                    <li><a href="index.php?page=add_karyawan"><i class="glyphicon glyphicon-plus"></i>Tambah Karyawan</a></li>
                    <li><a href="index.php?page=add_atasan"><i class="glyphicon glyphicon-plus"></i> Mutasi Karyawan</a></li>
                    <li><a href="index.php?page=view_jabatan"><i class="glyphicon glyphicon-stats"></i> Jabatan</a></li>
                    <li><a href="index.php?page=view_departemen"><i class="glyphicon glyphicon-lock"></i> Departemen</a></li>
                    <li><a href="index.php?page=view_laporan"><i class="glyphicon glyphicon-file"></i> Laporan</a></li>
                     <li><a href="index.php?page=rekap_cuti"><i class="glyphicon glyphicon-file"></i> Rekap Cuti</a></li>
                    <li><a href="index.php?page=change_password"><i class="glyphicon glyphicon-user"></i> Change Password</a></li>
                    <li><a href="../logout.php"><i class="glyphicon glyphicon-off"></i> Log Out</a></li>
                    
                </ul>
             </div>
		  </div>

		  <div class="col-md-10">
		  	<div class="row">
		  		

		  		
		  	</div>

		  	<div class="row">
		  		<div class="col-md-12 panel-warning">
		  			<div class="content-box-header panel-heading">
	  					<div class="panel-title ">Welcome Admin </div>
		  			</div>
		  			<div class="content-box-large box-with-header">
			  			 <?php
							if(isset($_GET['page'])){
							  $page = $_GET['page'].".php";
							  include('konten/'.$page);
							}else{
							  include('konten/view_karyawan.php');
							}
						?>
					</div>
		  		</div>
		  	</div>
		  </div>
		</div>
    </div>

    <footer>
         <div class="container">
         
            <div class="copy text-center">
               Copyright 2017 - Hendra Wijaya 
            </div>
            
         </div>
      </footer>

   

    <!-- bootstrap-datetimepicker -->
     <link href="vendors/bootstrap-datetimepicker/datetimepicker.css" rel="stylesheet">
     <script src="vendors/bootstrap-datetimepicker/bootstrap-datetimepicker.js"></script>

   <script src="js\Responsive-2.2.1\js\dataTables.responsive.js"></script>

    <script src="vendors/datatables/js/jquery.dataTables.min.js"></script>

    <script src="vendors/datatables/dataTables.bootstrap.js"></script>

    <script src="js/custom.js"></script>
    <script src="js/tables.js"></script>

    
  </body>
</html>