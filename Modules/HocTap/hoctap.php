<div id="hoctap" style="height: auto; text-align: center; font-size: 30px; margin-top: 30px; margin-left: auto; width: 100%;">
<?php
	include("Modules/functions.php");	// dung cho cho nhieu file PHP con nen cac file con ko can goi
	include("Modules/HocTap/menu.php");	
	$xem="";
	if (isset($_GET['xem']))
		$xem= $_GET['xem'];
	switch ($xem)
	{
		case "hoctap": include("Modules/HocTap/tinmoi.php");	
		break;
		case "tailieu": include("Modules/HocTap/tailieu.php");	
		break;
		case "loaitin": include("Modules/HocTap/xemloaitin.php");	
		break;	
		case "gopy": include("Modules/HocTap/gopy.php");	
		break;	
		case "dangki": include("Modules/HocTap/dangki.php");	
		break;			
		default: include("Modules/HocTap/tinmoi.php");				
		break;		
	}		
?>
           
</div>
