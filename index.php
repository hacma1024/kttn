<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Kiểm tra trắc nghiệm</title>
</head>
<link rel="stylesheet" type="text/css" href="CSS/style.css"/>
<link rel="shortcut icon" type="image/png" href="Images/check_logo.png" />
<script type="text/javascript" src="JQ/jquery-1.11.3.js"></script>
<script type="text/javascript" src="JQ/jquery-1.11.3.min.js"></script>
<style type="text/css">
#menu
{
	width: 100%; height: 40px;	background-color: #D8D8D8; z-index: 200;
	margin-bottom: 1px;	padding-left: 20px;
}

#menu ul {	position: relative;}

#menu ul li
{
	display: inline-block; 	list-style-type: none;
	font-family: Tahoma, Geneva, sans-serif;	z-index: 200; 
	padding-left: 15px; 	padding-right: 15px; 	padding-top: 8px;	  
}

#menu ul li ul
{	
	display: none;    position: absolute;  z-index: 200; 
}

#menu ul li:hover
{
	font-weight: bold;	background-color:#0206A4;
	color: #FFF; 	padding-bottom: 11px;	
}

#menu ul li:hover > ul
{
	display: block;	background-color: #D8D8D8;
	left: auto; 	top: 38px; 	color: #000;
	font-weight: normal;	width: 200px;
}

#menu ul li ul li
{	display: block; 	padding: 7px 15px; }
</style>
<body>

<div id="wrapper">
	<?php				
        include("Modules/config.php");	
		include("Modules/header.php");			
		include("Modules/content.php");	
		include("Modules/footer.php");				
	?>      
</div>	 
</body>
</html>