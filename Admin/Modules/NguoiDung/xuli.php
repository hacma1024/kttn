<?php		
	include("../config.php"); //Can ket noi vi cai nay nam doc lap	
	$id=0; $x="";
	if (isset($_GET["id"]))		$id=$_GET["id"];	
	if(isset($_GET["ac"]))	   $x= $_GET["ac"];		
	if ($x=="xoa")
	{	  
	  $sql="delete from tblnguoidung where id='$id'";
	  mysqli_query($con,$sql);	
	  header("location:../../index.php?quanli=nguoidung&ac=them&tt=xoa");
	  exit;
	}
	
	$hovaten= $_POST["txthovaten"];
	$gioitinh= $_POST["rdgioitinh"];
	$tendangnhap= $_POST["txttendangnhap"];
	$matkhau= $_POST["txtmatkhau"];
	$email= $_POST["txtemail"];
	$quyen= $_POST["oquyen"];	
	
	if (isset($_POST["btnthem"]))
	{
		$sql="insert into tblnguoidung (tendangnhap, matkhau, quyen, hovaten, email, gioitinh) values ('$tendangnhap', '$matkhau', '$quyen' , '$hovaten','$email', '$gioitinh' )";
		mysqli_query($con,$sql);	
		header("location:../../index.php?quanli=nguoidung&ac=them&tt=them");	
		exit();
	}	
				
	if (isset($_POST["btncapnhat"]))
	{				
			$sql="update tblnguoidung set hovaten='$hovaten', gioitinh='$gioitinh', tendangnhap='$tendangnhap', matkhau='$matkhau', quyen='$quyen', email='$email' where id='$id'";					
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=nguoidung&ac=sua&tt=sua&id=".$id);
		exit();
	}						
?>