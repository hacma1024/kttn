<div id="content" style="background-color: #ffeecc;">

<?php 

	$quanli="";

	if (isset($_GET["quanli"]))

		$quanli=$_GET["quanli"];	
	switch ($quanli)
	{
		case "dethi":
			include("Modules/DeThi/main.php");
		break;
		case "diem":
			include("Modules/Diem/main.php");
		break;
		case "cauhoi":
			include("Modules/CauHoi/main.php");	
		break;
		case "nguoidung":
			include("Modules/NguoiDung/main.php");
		break;
		case "doimatkhau":
			include("Modules/NguoiDung/doimatkhau.php");
		case "tailieu":
			include("Modules/TaiLieu/main.php");
		break;
		case "gopy":
			include("Modules/GopY/lietke.php");
		break;
	}	

?>

</div>