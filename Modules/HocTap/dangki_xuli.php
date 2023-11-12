<?php			
	include("../config.php"); //Can ket noi vi cai nay nam doc lap	
	$hovaten=$_POST["hoten"];	
	$gt= $_POST["gioitinh"];
	$tendangnhap= $_POST["tendn"];
	$matkhau= $_POST["matkhau"];
	$email=$_POST["email"];				
	$sql="insert into tblnguoidung (hovaten, gioitinh, tendangnhap, matkhau, email, quyen) values ('$hovaten', '$gt', '$tendangnhap', '$matkhau', '$email', '2')";		
	mysqli_query($con,$sql);	 	
	exit;		
?>