<div class="content-box-large">
  				<div class="panel-heading">
					<div class="panel-title">Reset Cuti Karyawan</div>
				</div>
  				<div class="panel-body">
  					<table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" >
						<thead>
							<tr>
								<th>Jabatan</th>
								<th>Reset</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_cuti_direksi" onsubmit="return validateFormResetDireksi(this);">
									<td>Direksi</td>
									<td>
										<input type="text" class="form-control" id="nip" placeholder="Saldo Cuti Direksi" name="c_direksi" required>
									</td>
									<td>
										 <button type="submit" class="btn btn-danger btn-sm" name="submit">Reset</button>  
									</td>
								</form>
							</tr>
							<tr>
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_cuti_manager" onsubmit="return validateFormResetManager(this);">
									<td>Manager</td>
									<td>
										<input type="text" class="form-control" id="nip" placeholder="Saldo Cuti Manager" name="c_manager" required>
									</td>
									<td>
										 <button type="submit" class="btn btn-danger btn-sm" name="submit">Reset</button>  
									</td>
								</form>
							</tr>
							<tr>
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_cuti_tl" onsubmit="return validateFormResetTL(this);">
									<td>TL / Kabag</td>
									<td>
										<input type="text" class="form-control" id="nip" placeholder="Saldo Cuti TL / Kabag" name="c_tl" required>
									</td>
									<td>
										 <button type="submit" class="btn btn-danger btn-sm" name="submit">Reset</button>  
									</td>
								</form>
							</tr>
							<tr>
								<form class="form-horizontal" role="form" method="post" enctype="multipart/form-data" action="index.php?page=update_cuti_staff" onsubmit="return validateFormResetStaff(this);">
									<td>Staff</td>
									<td>
										<input type="text" class="form-control" id="nip" placeholder="Saldo Cuti Staff" name="c_staff" required>
									</td>
									<td>
										 <button type="submit" class="btn btn-danger btn-sm" name="submit">Reset</button>  
									</td>
								</form>
							</tr>
	</tbody>
					</table>

  				</div>
  			</div>



		  </div>
		</div>
    </div>

 <script type="text/javascript">
	function validateFormResetDireksi(formObj){
		if(formObj.c_direksi.value.trim()==''){
			alert('Mohon isi Saldo Cuti DIreksi');
			return false;
		formObj.submit.disable = true;
		formObj.submit.value = 'Please Wait';
	}
	function validateFormResetManager(formObj){
		if(formObj.c_manager.value.trim()==''){
			alert('Mohon isi Saldo Cuti Manager');
			return false;
		formObj.submit.disable = true;
		formObj.submit.value = 'Please Wait';
	}
	function validateFormResetTL(formObj){
		if(formObj.c_tl.value.trim()==''){
			alert('Mohon isi Saldo Cuti TL / Kabag');
			return false;
		formObj.submit.disable = true;
		formObj.submit.value = 'Please Wait';
	}
	function validateFormResetStaff(formObj){
		if(formObj.c_staff.value.trim()==''){
			alert('Mohon isi Saldo Cuti Staff');
			return false;
		formObj.submit.disable = true;
		formObj.submit.value = 'Please Wait';
	}
</script>
