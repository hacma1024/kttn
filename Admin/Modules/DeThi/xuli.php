<?php 
	include("../config.php");
	include("../functions.php");	
	$id=""; $chude=""; $soluong=""; $mon=""; $lop=""; $tg=0; $tt= 0; $xemda=0; $quyen= 2; $mand= 0; $x=""; $kttg=0;
	$uploadfile= 0;
	$xemlaibai=0;
	if (isset($_GET['id']))	$id= $_GET['id'];	
	if (isset($_GET['ac']))	$x= $_GET['ac'];	
	mysqli_set_charset($con, "utf8");
	if ($x=="xoa")
	{
		$sql="delete from tbldethi where id='$id'";
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=dethi&ac=them&tt=xoa");
		exit();
	}	
	$chude= $_POST["txtchude"];
	$soluong= $_POST["txtsoluong"];
	$mon= $_POST["list-mon"];	
	$lop= $_POST["list-lop"];	
	$tg= $_POST["txtthoigian"];	
	$kttg= $_POST["txtktthoigian"];
	$quyen= $_POST["txtquyen"];
	$mand= $_POST["txtmand"];
	if (isset($_POST["chktrangthai"])) 
	 	if ($_POST["chktrangthai"]=="on") $tt= 1;	
	if (isset($_POST["chkxemda"])) 
	 	if ($_POST["chkxemda"]=="on") $xemda= 1;
	if (isset($_POST["chkxemlaibai"])) 
	 	if ($_POST["chkxemlaibai"]=="on") $xemlaibai= 1;	
	if (isset($_POST["chkuploadfile"])) 
	 	if ($_POST["chkuploadfile"]=="on") $uploadfile= 1;	
	$sql="";			
	if (isset($_POST["btnthem"]))
		$x="them";
	if (isset($_POST["btncapnhat"]))
		$x="sua";
			
	if ($x=="them")
	{		
		$ma= PTTimMaKeTiep_TheoId("tbldethi","DT",$con);
		$ma= $ma.rand(1000,9999);
		$sql= "insert into tbldethi (madethi, chude, socauhoi, mon, lop, thoigian, trangthai, mand, xemda, ktthoigian,ktxemlai, ttfile) values  ('$ma', '$chude', '$soluong', '$mon', '$lop', '$tg', '$tt','$mand','$xemda', '$kttg','$xemlaibai', '$uploadfile')";
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=dethi&ac=them&tt=them");
		exit();
	}	
	
	if ($x=="sua")
	{
		$sql= "update tbldethi set chude='$chude', socauhoi='$soluong', mon='$mon', lop='$lop', thoigian='$tg', ktthoigian= '$kttg', trangthai='$tt', xemda='$xemda', ktxemlai='$xemlaibai', ttfile='$uploadfile' where id='$id'";
		// 
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=dethi&ac=sua&tt=sua&id=".$id."&cd=".$chude);
		exit();
	}
				
?>