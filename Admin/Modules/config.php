<?php	
	date_default_timezone_set('Asia/Ho_Chi_Minh');			
	$tenmaychu= "localhost";
	$taikhoan= "root";	
    $matkhau= "";
	$csdl= "kttracnghiem";
	$con= mysqli_connect($tenmaychu, $taikhoan, $matkhau, $csdl);	
	mysqli_set_charset($con, "utf8");			
?>