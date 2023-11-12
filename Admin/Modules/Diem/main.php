<?php 	
	$ac="";
	if (isset($_GET["ac"]))
		$ac= $_GET["ac"];
	if ($ac=="them")
		include("Modules/Diem/them.php");
	if ($ac=="excel")
		include("Modules/Diem/excel.php");
	if ($ac=="sua")
		include("Modules/Diem/sua.php");
	include("Modules/Diem/lietke.php");
?>