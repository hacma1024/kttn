<?php
	$xem="";
	if (isset($_GET["xem"]))
		$xem= $_GET["xem"];
	switch ($xem)
	{
		case "kiemtra": include("Modules/KiemTra/kiemtra.php");
		break;
		case "timkiem": include("Modules/timkiem.php");
		break;
		case "xemlai": include("Modules/xemlai.php");
		break;	
		case "hoctap": include("Modules/HocTap/hoctap.php");
		break;
		case "thongbao": include("Modules/thongbao.php");
		break;			
		case "dangki": include("Modules/HocTap/hoctap.php");
		break;	
		case "tailieu": 			
			include("Modules/HocTap/hoctap.php");
		break;	
		case "loaitin": 			
			include("Modules/HocTap/hoctap.php");
		break;	
		case "gopy": include("Modules/HocTap/hoctap.php");
		break;					
		default:
			include("Modules/main.php");
		break;
		
	}
?>