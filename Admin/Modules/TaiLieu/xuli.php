<?php	
	include("../config.php"); //Can ket noi vi cai nay nam doc lap
	$id=0; $x=""; $sql=""; $trang = 1; $dichden="";
	if (isset($_GET["id"]))	$id=$_GET["id"];	
	if(isset($_GET["ac"]))   $x= $_GET["ac"];
			
	if ($x=="xoa")
	{
	  $sql= "select hinhanh from tbltailieu where id='$id'";
	  $baiviet= mysqli_query($con, $sql);
	  $dong= mysqli_fetch_assoc($baiviet);
	  if ($dong["hinhanh"]!="")
			  unlink("../../../".$dong["hinhanh"]);
	  $sql="delete from tbltailieu where id='$id'";
	  mysqli_query($con, $sql);	
	  header("location:../../index.php?quanli=tailieu&ac=them&tt=xoa&trang=$trang");
	  exit;
	}		

	$tensach= trim($_POST["txttensach"]);
	$tomtat= trim($_POST["txttomtat"]);
	$lop= $_POST["list-lop"];
	$mon= $_POST["list-mon"];
	$tacgia= $_POST["txttacgia"];
	$ngay= $_POST["txtthoigian"];
	$link= trim($_POST["txtlink"]);	
	//'https://drive.google.com/file/d/1082vYm0kekFOLSZQMqtASEaSTWJostYR'
    // 'https://drive.google.com/uc?export=download&id=1082vYm0kekFOLSZQMqtASEaSTWJostYR'
	//$linkdown= trim($_POST["txtlinkdown"]);	
	$linkdown= str_replace("https://drive.google.com/file/d/","https://drive.google.com/uc?export=download&id=",$link);
	$linkdown= str_replace("/view","",$linkdown);		
	$thutu= $_POST["txtthutu"];		
	$mand= $_POST["txtnguoiviet"];
	$trang= $_POST["txttrang"];
	// ANH MINH HOA
	$tenanh=$_FILES["anhminhhoa"]["name"];
	if ($tenanh!="")
	{
		$time=date("Ymdhis");
		$tenanh=$time.$tenanh;
		// $dichden="../../../Upload/".$tenanh;
		$dichden="/opt/lampp/htdocs/Upload/".$tenanh;
		copy($_FILES["anhminhhoa"]["tmp_name"],$dichden);
		$dichden= substr($dichden,18);
	}		
	
	if (isset($_POST["btnthem"]))
	{
		$sql="insert into tbltailieu (tensach, tomtat, lop, mon, tacgia, ngay, hinhanh, link, thutu, mand, linkdown) ";
		$sql=$sql."values ('$tensach', '$tomtat', '$lop', '$mon', '$tacgia', '$ngay','$dichden', '$link', '$thutu', '$mand', '$linkdown')";
		mysqli_query($con, $sql);	
		$tmp=$_FILES["anhminhhoa"]["tmp_name"];
		header("location:../../index.php?quanli=tailieu&ac=them&tt=them&trang=$trang");	
		exit();
	}	
				
	if (isset($_POST["btncapnhat"]))
	{
		
		if ($tenanh=="")
		
			{
				$sql="update tbltailieu set tensach='$tensach', tomtat='$tomtat', lop='$lop', mon='$mon', tacgia='$tacgia', ngay='$ngay', link='$link', mand='$mand', thutu='$thutu', linkdown='$linkdown' where id='$id'";
			}
		else
		{
			$sqla= "select hinhanh from tbltailieu where id='$id'";
			$baivieta= mysqli_query($con, $sqla);
			$dong= mysqli_fetch_assoc($baivieta);
			if ($dong["hinhanh"]!="")
				unlink("../../../".$dong["hinhanh"]);
			$sql="update tbltailieu set tensach='$tensach', tomtat='$tomtat', lop='$lop', mon='$mon', tacgia='$tacgia', ngay='$ngay', hinhanh='$dichden', link='$link', mand='$mand', thutu='$thutu', linkdown='$linkdown' where id='$id'";			
		}				
		mysqli_query($con,$sql);
		header("location:../../index.php?quanli=tailieu&ac=sua&tt=sua&id=$id&trang=$trang");
		exit();
	}						
?>