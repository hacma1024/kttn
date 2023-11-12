<?php	
	include("../config.php");	
	date_default_timezone_set('Asia/Ho_Chi_Minh');
	$ten=""; $lop=""; $diem=""; $tg=""; $madt=""; $tglambai=0; $lichsu=""; $maxemlai="";
	if (isset($_POST['ten']))	
		$ten= $_POST['ten'];
	if (isset($_POST['lop']))	
		$lop= $_POST['lop'];
	if (isset($_POST['diem']))	
		$diem= $_POST['diem'];
	if (isset($_POST['madt']))	
		$madt= $_POST['madt'];	
	if (isset($_POST['tglam']))	
		$tglambai= $_POST['tglam'];	
	if (isset($_POST['ketqua']))	
		$lichsu= $_POST['ketqua'];	
	if (isset($_POST['maxemlai']))	
		$maxemlai= $_POST['maxemlai'];			
	$ngay= date("d/m/Y");
	$gio= date("H:i:s");	
	$tg= $ngay." - ".$gio;	
	$now= getdate();
	$nam= $now["year"]; $thang=$now["mon"]; $namhoc="";
	if ($thang >= 8) $namhoc=$nam."-".($nam+1);
	else
		$namhoc=($nam-1)."-".$nam;
	$tglambaikt=  floor($tglambai/60)."m ".($tglambai%60)."s";
	$sql="insert into tbldiem (hoten, lop, diem, madethi, thoigian, thoigianlambai, lichsu, maxemlai,namhoc) values ('$ten', '$lop', '$diem', '$madt', '$tg','$tglambaikt','$lichsu','$maxemlai','$namhoc')";	
	mysqli_query($con,$sql);		
?>