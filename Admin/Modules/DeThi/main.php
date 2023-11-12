<?php 	
	$ac="";
	if (isset($_GET["ac"]))
		$ac= $_GET["ac"];
	if ($ac=="them")
		include("Modules/DeThi/them.php");
	if ($ac=="sua")
		include("Modules/DeThi/sua.php");
	include("Modules/DeThi/lietke.php");
?>