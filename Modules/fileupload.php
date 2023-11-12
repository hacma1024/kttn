<?php
  include("config.php");	
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $ten=""; $lop=""; $tg=""; $madt=""; $link=""; $dichden="";
  $ngay= date("d/m/Y");
  $gio= date("H:i:s");	
  $tg= $ngay." - ".$gio;
  if (isset($_POST['txtten2']))	
	  $ten= $_POST['txtten2'];
  if (isset($_POST['txtlop2']))	
	  $lop= $_POST['txtlop2'];
  if (isset($_POST['txtmadethi2']))	
	  $madt= $_POST['txtmadethi2'];		 
 
 if (isset($_POST['btnupload']))
 {  	
	if (isset($_FILES['fileupload']))
	{
		if ($_FILES['fileupload']['error'])
		{
			header("location:../index.php?xem=thongbao&ms=1001");	
	  		exit();
		}
		else
		{
			$time=date("Ymdhis");
			$dichden="../Upload_Files/".$time.$_FILES['fileupload']['name'];
			move_uploaded_file($_FILES['fileupload']['tmp_name'], $dichden);
			// trong dich den co ten file la gi thi anh se la ten do. kaka
			$link="../Upload_Files/".$dichden;
			$sql="insert into tbldiem (hoten, lop, madethi, thoigian, linkfile) values ('$ten','$lop','$madt', '$tg','$link')";
			mysqli_query($con,$sql);			
			header("location:../index.php?xem=thongbao&ms=1000");				
			exit();	
		}
	}	
	
  }
  else
  {	
  	  
	  header("location:../index.php?xem=thongbao&ms=1001");	
	  exit();
  }
        
?>