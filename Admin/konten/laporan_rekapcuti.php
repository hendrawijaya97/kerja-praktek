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


$judul = "Rekap Cuti Karyawan";

$pdf = new FPDF();
$pdf->AddPage('P','A4');

$pdf->Ln();
$pdf->SetAutoPageBreak('50');

$pdf->SetFont('Arial' ,'B' ,'16' );
$pdf->Cell(0,10, $judul, '0' , 1, 'C' );


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
$pdf->Cell(40,10,'Nip Karyawan',1,0,'C',1);
$pdf->Cell(40,10,'Nama Karyawan',1,0,'C',1);
$pdf->Cell(40,10,'Departemen',1,0,'C',1);
$pdf->Cell(40,10,'Jabatan',1,0,'C',1);
$pdf->Cell(20,10,'Sisa Cuti',1,1,'C',1);


$pdf->SetTextColor(0,0,0);
$pdf->SetFillColor(255,255,255);

$sql = "SELECT a.nip_karyawan , a.nama_karyawan , b.jabatan, c.departemen, a.sisa_cuti
        FROM tblkaryawan AS a, tbljabatan AS b , tbldepartemen AS c 
        WHERE a.id_jabatan = b.id_jabatan AND a.id_departemen = c.id_departemen AND a.id_kantor = '$kantorr'";

$runquery=$connect->query($sql);


$no = 1;
while($data = $runquery->fetch_array()){
	  $nip_karyawan = $data['nip_karyawan'];
      $nama_karyawan = $data['nama_karyawan'];
      $jabatan = $data['jabatan'];
      $departemen = $data['departemen'];
      $sisa_cuti = $data['sisa_cuti'];



$pdf->Cell(10,10,$no,1,0,'C',1);
$pdf->Cell(40,10,$nip_karyawan,1,0,'L',1);
$pdf->Cell(40,10,$nama_karyawan,1,0,'L',1);
$pdf->Cell(40,10,$departemen,1,0,'L',1);
$pdf->Cell(40,10,$jabatan,1,0,'L',1);
$pdf->Cell(20,10,$sisa_cuti.' hari',1,1,'C',1);


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