<?php
	if (isset($_GET["ac"]))
		$ac= $_GET["ac"];
	else
		$ac="";
	if ($ac=="them")
		include("Modules/NguoiDung/them.php");    		
	if ($ac=="sua")
		include("Modules/NguoiDung/sua.php");
	include("Modules/NguoiDung/lietke.php");
?>