<?php	
	include("../config.php"); //Can ket noi vi cai nay nam doc lap
	include("../functions.php");
	$id=""; $trang=1;
	if (isset($_GET["id"])) 	$id=$_GET["id"];
	if (isset($_GET["trang"])) 	$trang=$_GET["trang"];
	$x="";
	if(isset($_GET["ac"]))	   $x= $_GET["ac"];	
	if ($id=="")    $id=0;
	// --------------- XOA ------------------------
	mysqli_set_charset($con, "utf8");
	if ($x=="xoa")
	{
	  $sqla= "select hinhanh from tblcauhoi where id='$id'";
	  $cauhoia= mysqli_query($con,$sqla);
	  $dong= mysqli_fetch_assoc($cauhoia);
	  if ($dong["hinhanh"]!="")
		  unlink("../../../".$dong["hinhanh"]);			 
	  $sql= "delete from tblcauhoi where id='$id'";
	  mysqli_query($con,$sql);	
	  header("location:../../index.php?quanli=cauhoi&ac=them&tt=xoa");
	  exit;
	}
	
	$mach= PTTimMaKeTiep_TheoId("tblcauhoi","CH",$con);
	$cauhoi= $_POST["txtnoidung"]; $cauhoi= trim($cauhoi);		
	$da1= $_POST["txtdapan1"];
	$da2= $_POST["txtdapan2"];
	$da3= $_POST["txtdapan3"];
	$da4= $_POST["txtdapan4"];
	$dadung= $_POST["list-dadung"];			
	$chuthich= trim($_POST["txtchuthich"]);
	$dethi= $_POST["list-dethi"];	
	$trangthai=	$_POST["list-trangthai"];
	if (isset($_POST["txtquyen"])) $quyen= $_POST["txtquyen"];
	if (isset($_POST["txtmand"])) $mand= $_POST["txtmand"];
	$xao= 0;	
	if (isset($_POST['chkxao'])) 
		if ($_POST['chkxao']=="on")
			$xao= 1;
	// ANH MINH HOA
	$dichden="";
	$tenanh= $_FILES['hinhanh']['name'];
	$duongdan=$tenanh;	     
	if ($tenanh!= "")
	{
		$time=date("Ymdhis");
		$tenanh= $time.$tenanh;
		$dichden="../../../Upload/".$tenanh;
		copy($_FILES["hinhanh"]["tmp_name"],$dichden);
		$dichden= substr($dichden,9);
	}		
	// --------------- THEM ------------------------
	if ($x=="them")
	{
		$sql= "insert into tblcauhoi (mach, cauhoi, madethi, dangch, hinhanh, dapan1, dapan2, dapan3, dapan4, dapandung, xao, chuthich) ";
		$sql= $sql."values ('$mach', '$cauhoi', '$dethi', '$dangch', '$dichden', '$da1', '$da2', '$da3', '$da4', '$dadung', '$xao','$chuthich')";		
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=cauhoi&ac=them&tt=them");			
		exit();
	}	
				
	if ($x=="sua")
	{		
		if ($tenanh=="")
		{
			$sql= "update tblcauhoi set cauhoi='$cauhoi', madethi='$dethi', ";				 
			$sql= $sql." dapan1='$da1', dapan2='$da2', dapan3='$da3', dapan4='$da4', dapandung='$dadung',";
			$sql= $sql."  xao='$xao', trangthai='$trangthai', chuthich='$chuthich' where id='$id'";
		}
		else
		{
			$sqla= "select hinhanh from tblcauhoi where id='$id'";
			$cauhoia= mysqli_query($con,$sqla);
			$dong= mysqli_fetch_assoc($cauhoia);
			if ($dong["hinhanh"]!="")
				unlink("../../../".$dong["hinhanh"]);
			$sql="update tblcauhoi set cauhoi='$cauhoi', madethi='$dethi', hinhanh='$dichden',";				
			$sql=$sql." dapan1='$da1', dapan2='$da2', dapan3='$da3', dapan4='$da4', dapandung='$dadung',";
			$sql=$sql."  xao='$xao', trangthai='$trangthai', chuthich='$chuthich' where id='$id'";
		}					
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=cauhoi&ac=sua1&tt=sua&trang=".$trang."&id=".$id);
	}						
?>