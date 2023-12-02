<?php 	
	session_start();
	$_SESSION['tendangnhap']="";
	$_SESSION['hovaten']="";
	$_SESSION['mand']=0;
	$_SESSION['quyen']=0;
	$_SESSION['matkhau']="";
	include("Modules/config.php");	
	$trangthai= 0;
	$dong= -1;
	if (isset($_POST["btndangnhap"]))
	{				
		$ten= $_POST["txtten"];
		$matkhau= $_POST["txtmatkhau"];
		$sql="select * from tblnguoidung where tendangnhap='$ten' and matkhau='$matkhau'";
		mysqli_set_charset($con, "utf8");	
		$nguoidung= mysqli_query($con,$sql);
		$dong= mysqli_fetch_assoc($nguoidung);
		$sodong= mysqli_num_rows($nguoidung);		
		if ($sodong > 0)
		{									
			$_SESSION['tendangnhap']= $ten;	
			$_SESSION['mand']= $dong["id"];
			$_SESSION['quyen']= $dong["quyen"];	
			$_SESSION['matkhau']= $dong["matkhau"];		
			$_SESSION['hovaten']=$dong["hovaten"];	;
			header("location:index.php");
			$trangthai= 2;
		}
		else
			$trangthai= 1;
	}
	else
	{
		if (isset($_POST["btnthoat"]))
		{
			session_destroy();	//huy session
			header("location:../index.php");
		}
			
		if (isset($_GET["ac"]))
		{
			if ($_GET["ac"]=="thoat")
			{
				session_destroy();
				header("location:login.php");
			}	
		}	
	}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Đăng nhập hệ thống</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css" />
<link rel="shortcut icon" type="images/png" href="Images/check_logo.png" />
<script type="text/javascript" src="../JQ/jquery-1.11.3.js"></script>
<script type="text/javascript" src="../JQ/jquery-1.11.3.min.js"></script>
</head>

<body>
<script type="text/javascript" language="javascript"> 
	$(document).ready(function(e) {
        $('#btndangky').click(function(e) {
            window.location="../index.php?xem=dangki";
        });
    });
</script>
<?php 
	include("Modules/header-ad.php");
?>
<div id="login" style="margin-left: 70px; margin-left: 70px;">
<form action="login.php" method="post" enctype="multipart/form-data">
  <table width="736" border="0" cellspacing="0" cellpadding="0" style="margin-left: 120px;">
    <tr>
      <td height="35" colspan="4">
      <div style="width: 695px; margin-top: 80px; font-family:Verdana; color: #00F; font-size: 20px; pad" align="center"> <strong><p style="padding-left: 280px; margin-bottom: 10px;">ĐĂNG NHẬP HỆ THỐNG</p></strong>
      </div>
      </td>
    </tr>
    <tr>
      <td width="235" rowspan="3">
      	<img src="Images/login.png" width="182" height="154" style="padding: 10px;"/>
      </td>
      <td width="121" height="56">Tên đăng nhập:</td>
      <td colspan="2"><input style="font-size: 18px; margin-left: 10px; border-radius:4px; height: 30px;" class="textbox" type="text" name="txtten" id="txtten"  size="30px" placeholder=" Nhập tên đăng nhập..."/>
      
      </td>
    </tr>
    <tr>
      <td width="121" height="42">Mật khẩu:</td>
      <td colspan="2">
      <input class="textbox" style="font-size: 18px; margin-left: 10px; border-radius:4px; height: 30px;" type="password" name="txtmatkhau" id="txtmatkhau" size="30px"  placeholder=" Nhập mật khẩu..."/>
      </td>
    </tr>
    <tr>
      <td></td>
      <td width="125">
        <input class="button" type="submit" name="btndangnhap" id="btndangnhap" value=" Đăng nhập " />
      </td>
      <td width="255">
      	<input class="button" type="submit" name="btnthoat" id="btnthoat" value="   Thoát   " height=""/> 
        <input class="button" type="button" name="btndangky" id="btndangky" value="   Đăng kí   " height=""/>
      </td>       
    </tr>
    <tr>      
      <td colspan="4" height="50"> 
      <?php 	  		
			if ($trangthai==1)
				echo 'Tên đăng nhập hoặc mật khẩu không đúng!';
	  ?>
      </td>
      </tr>    
  </table>
</form>  
</div>
<?php 
	//include("Modules/footer-ad.php");
?>
</body>
</html>
