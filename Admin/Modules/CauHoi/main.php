<?php
	
	if (isset($_GET["ac"]))
		$ac= $_GET["ac"];
	else
		$ac="";
	if ($ac=="them")
		include("Modules/CauHoi/them.php");    		
	if ($ac=="sua1")
		include("Modules/CauHoi/sua.php");
	if ($ac=="sua2")
		include("Modules/CauHoi/sua-tl.php");
	include("Modules/CauHoi/lietke.php");
?>