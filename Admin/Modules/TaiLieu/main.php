<?php
	$ac="";
	if (isset($_GET["ac"]))
		$ac= $_GET["ac"];			
	if ($ac=="them")
		include("Modules/TaiLieu/them.php");    		
	if ($ac=="sua")
		include("Modules/TaiLieu/sua.php");
	include("Modules/TaiLieu/lietke.php");
?>