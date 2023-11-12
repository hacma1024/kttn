<?php 	
	session_start();				
	if (!isset($_SESSION['tendangnhap'])||($_SESSION['tendangnhap']==""))	
	{		
		header("location:login.php");
		exit();
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Trang quản trị website</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="shortcut icon" type="image/png" href="../Images/check_logo.png" />
<script type="text/javascript" src="../JQ/jquery-1.11.3.js"></script>
<script type="text/javascript" src="../JQ/jquery-1.11.3.min.js"></script>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="JQ/Chart.min.js"> </script>
</head>

<body>
	<div id="wrapper" style="width: 2100px;">
    	<?php 		
		  date_default_timezone_set('Asia/Ho_Chi_Minh'); 
		  include("Modules/config.php");		 
		  include("Modules/banner.php");
		  include("Modules/menu.php");
		  include("Modules/content.php");
		  include("Modules/footer.php");			 	 
		?>
    </div>	
</body>
</html>