<?php
$host ='localhost';
$user='root';
$pass='';
$db='portal';

$connect=new mysqli($host , $user , $pass , $db);
if($connect->connect_error){
    echo 'Error Connection';
}


require('fpdf/fpdf.php');


$judul = "Laporan Pengajuan Karyawan";

$pdf = new FPDF();
$pdf->AddPage('L','A4');

$pdf->Ln();
$pdf->SetAutoPageBreak('50');

$pdf->SetFont('Arial' ,'B' ,'16' );
$pdf->Cell(0,10, $judul, '0' , 1, 'C' );

$f=strtotime($_POST['p_from']);
$f_date=date("Y-m-d 00:00:00",$f); 

$t=strtotime($_POST['t_until']);
$t_date=date("Y-m-d 23:59:59",$t);

$kantorr = $_POST['kantorr'];


 if($kantorr == 1){
        	$jdl = "Kantor Pusat Jodoh";
        }else if($kantorr == 2){
        	$jdl = "Batu Aji";
        }else if($kantorr == 3){
        	$jdl = "Penuin"; 
        }else if($kantorr == 4){
        	$jdl = "Botania"; 
        }else{
        	$jdl = "Mitra Raya";
        } 
  


$pdf->SetFont('Arial' ,'B' ,'14' );
$pdf->Cell(0,20, 'Kantor : '.$jdl, '0' , 1, 'C' );

$pdf->SetFillColor(19, 12, 22);
$pdf->SetTextColor(255, 255, 255);
$warna=true;

$pdf->SetFont('Arial' ,'' ,'10' );
$pdf->Cell(10,10,'No',1,0,'C',$warna);
$pdf->Cell(40,10,'Tanggal Mulai',1,0,'C',1);
$pdf->Cell(40,10,'Tanggal Selesai',1,0,'C',1);
$pdf->Cell(40,10,'Nama Karyawan',1,0,'C',1);
$pdf->Cell(40,10,'Jenis Pengajuan',1,0,'C',1);
$pdf->Cell(40,10,'No Urgent',1,0,'C',1);
$pdf->Cell(40,10,'Status Pengajuan',1,0,'C',1);
$pdf->Cell(30,10,'Sisa Cuti',1,1,'C',1);


$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);

$sql = "SELECT a.tgl_mulai, a.tgl_selesai, b.nama_karyawan, a.status_service, c.pengajuan, a.no_urgent ,b.sisa_cuti
        FROM tblservice AS a, tblkaryawan AS b , tblpengajuan AS c 
        WHERE a.nip_karyawan = b.nip_karyawan AND b.id_kantor = $kantorr AND a.id_pengajuan = c.id_pengajuan AND tgl_pengajuan >= '$f_date' AND tgl_pengajuan <= '$t_date'";

$runquery=$connect->query($sql);


$no = 1;
while($data = $runquery->fetch_array()){
		$no_urgent = $data['no_urgent'];
        $pengajuan = $data['pengajuan'];
        $tgl_mulai = $data['tgl_mulai'];
        $tgl_selesai = $data['tgl_selesai'];
        $status_service = $data['status_service'];
        $sisa_cuti = $data['sisa_cuti'];
        $nama_karyawan = $data['nama_karyawan'];

        if($status_service == 0){
        	$write = "Pending";
        }else if($status_service == 1){
        	$write = "Cancel";
        }else if($status_service == 2){
        	$write = "Approved"; 
        }else{
        	$write = "Rejected";
        }



$pdf->Cell(10,10,$no,1,0,'C',1);
$pdf->Cell(40,10,$tgl_mulai,1,0,'C',1);
$pdf->Cell(40,10,$tgl_selesai,1,0,'C',1);
$pdf->Cell(40,10,$nama_karyawan,1,0,'C',1);
$pdf->Cell(40,10,$pengajuan,1,0,'C',1);
$pdf->Cell(40,10,$no_urgent,1,0,'C',1);
$pdf->Cell(40,10,$write,1,0,'C',1);
$pdf->Cell(30,10,$sisa_cuti,1,1,'C',1);

$no++;
}

$date = date("d-m-Y");

$pdf->SetFont('Arial' ,'B' ,'12' );
$pdf->Cell(0,20, 'Batam, '.$date, '0' , 1, 'L' );
$pdf->Cell(0,-10, 'Dilaporkan Oleh, ' ,'0' , 1, 'L' );
$pdf->Cell(0,60, '(......................)' ,'0' , 1, 'L' );


$pdf->SetTextColor(0);
$pdf->Ln();
$pdf->Output();
?>