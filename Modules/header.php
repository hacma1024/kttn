<?php
function PTHienThiDanhNgon()
{
	$kq = "";
	$so = rand(0, 7);
	switch ($so) {
		case 1:
			$kq = "--- Nghị lực và bền bỉ có thể chinh phục mọi thứ  ---<br />";
			break;
		case 2:
			$kq = "--- Sự học như đi thuyền trên dòng nước ngược, không tiến ắt phải lùi ---<br />";
			break;
		case 3:
			$kq = "--- We can't change yesterday, but we can change today ---<br />";
			break;
		case 4:
			$kq = "--- Không có gì là không thể với một người luôn biết cố gắng ---<br />";
			break;
		case 5:
			$kq = "--- Never, never, never give up ---<br />";
			break;
		default:
			$kq = "--- Bạn chỉ thất bại khi bạn từ bỏ mọi cố gắng ---<br />";
			break;
	}

	return $kq;
}

?>
<div id="banner" style="height: 200px; background-color: #3399ff; padding-top: 25px; padding-bottom: 50px;">
	<img src="Images/logo.jpg" style="position: absolute; height: 150px; width: 200px; padding-left: 100px; padding-bottom: 5px; z-index: 1;"/>
	<img src="Images/banner.gif" style="height: 210px; width: 700px; padding-left: 400px;" />
	<p style="position: absolute; width: 200px; padding-left: 100px; text-align:center; font-size: 25px; color: white; z-index: 2; top: 190px;">
		<b>Trường THCS Phú Tân</b>
	</p>
</div>
<div id="gioithieu" style="position: relative;">

	<p id="tieude">
		WEBSITE HỖ TRỢ ÔN TẬP, KIỂM TRA TRỰC TUYẾN
	</p>
	<p style="font-family: Times New Roman; font-size: 18px; font-style: italic; margin-top: 5px;">
		<?php echo PTHienThiDanhNgon(); ?>
	</p>

	<div id="thongtinhocsinh">
	</div>

	<div style="position: absolute; top:10px; z-index:100;  right: 10px;">
		<a href="index.php">
			<img src="Images/home.png" height="50" width="50" />
		</a>
	</div>
</div>