<!DOCTYPE html>
<html>
  <head>
    <title>Admin Portal BPRSB</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery UI -->
    <link href="https://code.jquery.com/ui/1.10.3/themes/redmond/jquery-ui.css" rel="stylesheet" media="screen">

    <!-- Bootstrap -->
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- styles -->
    <link href="css/styles.css" rel="stylesheet">

    <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
    <link href="vendors/form-helpers/css/bootstrap-formhelpers.min.css" rel="stylesheet">
    <link href="vendors/select/bootstrap-select.min.css" rel="stylesheet">
    <link href="vendors/tags/css/bootstrap-tags.css" rel="stylesheet">

    <link href="css/forms.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
<div class="content-box-large">
<div class="panel-heading">
	<div class="panel-title">Head Departemen</div>
		<div class="panel-options">
			<a href="index.php?page=add_atasan"><span class="glyphicon glyphicon-plus"></span>Add </a>
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

		 function url_link($tujuan="", $nama_link="", $id=""){

			  if(empty($id)){
			    echo "<a class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan>$nama_link</a>";
			  }else{
			    echo "<a  class=\"btn btn-info btn-sm\" href=index.php?page=$tujuan&id=$id>$nama_link</a>";
			  }
		}

  			$no = 1;
  			include '../connect.php';
  			$sql= "SELECT  tblatasan.id_atasan,tbldepartemen.departemen, tblkaryawan.nama_karyawan, tblkantor.kantor FROM tblkantor, tblkaryawan, tbldepartemen, tblatasan WHERE tbldepartemen.id_departemen = tblatasan.id_departemen AND tblatasan.id_kantor = tblkantor.id_kantor AND tblatasan.nip_karyawan = tblkaryawan.nip_karyawan";

  			$hasil = $connect->query($sql);
  
			while($data = $hasil->fetch_array()){
			  $id = $data['id_atasan'];
        $departemen = $data['departemen'];
			  $kantor = $data['kantor']; 
        $nama_karyawan = $data['nama_karyawan'];

        
  		?>
			<tbody>
				<tr>
					<td><?php echo $departemen; ?></td>
					<td><?php echo $kantor; ?></td>
          <td><?php echo $nama_karyawan; ?></td>
					<td>
					<?php url_link('edit_atasan','Edit ',$id); ?> 
						<?php url_link('delete_atasan','Delete ',$id); ?> 
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
   </body>
</html>