<?php			
	include("../config.php"); //Can ket noi vi cai nay nam doc lap	
	$id=$_POST["idnd"];
	$mk= $_POST["matkhau"];				
	$sql="update tblnguoidung set matkhau='$mk' where id='$id' ";	
	mysqli_query($con,$sql);			
	exit;		
?>