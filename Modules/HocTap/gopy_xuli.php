<?php	
	include("../config.php"); //Can ket noi vi cai nay nam doc lap	
	include("../functions.php");
	error_reporting(0);					  							
	$hovaten= $_POST["txthovaten"];
	$noidung= $_POST["txtnoidung"];
	$email= $_POST["txtemail"];		
	$ngay= PTngayThang();						
	$sql="insert into tblgopy (hovaten, noidung, email, ngay) values ('$hovaten', '$noidung','$email','$ngay')";	
	mysqli_query($con, $sql);	
	header("location:../../index.php?xem=thongbao&ms=1002");	
	exit;																	
?>