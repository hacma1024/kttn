<?php

function PTTimMaKeTiep_TheoId($tenbang, $tiento, $con)
{
	$kq = "";
	$sql = "select * from " . $tenbang . " order by id desc limit 1";
	$bang = mysqli_query($con, $sql);
	$sodong = mysqli_num_rows($bang);
	if ($sodong == 0)
		$kq = $tiento . "0001";
	else {
		$dong = mysqli_fetch_assoc($bang);
		$maketiep = $dong["id"];
		$n = strlen($maketiep);
		for ($i = 1; $i <= 4 - $n; $i++) {
			$kq = "0" . $kq;
		}
		$kq = $tiento . $kq . ($maketiep + 1);
	}
	return $kq;
}

//==========================================================

function PTInTrangThai()
{
	?>
	<div class="thongbao">
		<?php
		if (isset($_GET["tt"])) {
			$tt = $_GET["tt"];

			switch ($tt) {

				case "them": echo "Thêm thành công!";

					break;

				case "sua":
					echo "Sửa thành công!";

					break;

				case "xoa":
					echo "Xóa thành công!";

					break;

				case "tontai":
					echo "Bản ghi đã tồn tại, vui lòng kiểm tra lại!";

					break;

				default:

					break;

			}

		}

		?>

	</div>

<?php

}



// PT TIM THU TRONG TUAN

function PTTimThu($thu)
{

	$kq = 0;

	switch ($thu) {

		case 1:
			$kq = "Thứ hai";

			break;

		case 2:
			$kq = "Thứ ba";

			break;

		case 3:
			$kq = "Thứ tư";

			break;

		case 4:
			$kq = "Thứ năm";

			break;

		case 5:
			$kq = "Thứ sáu";

			break;

		case 6:
			$kq = "Thứ bảy";

			break;

		default:
			$kq = 'Chủ nhật';

			break;

	}

	return $kq;

}



//	PT TIM NGAY THANG

function PTngayThang()
{

	$kq = "";

	$time = getdate();

	$d = $time["mday"];

	$m = $time["mon"];

	$y = $time["year"];

	$h = $time["hours"];

	$mn = $time["minutes"];

	$wday = $time["wday"];

	$kq = $d . "/" . $m . "/" . $y . " | " . $h . ":" . $mn;

	return $kq;

}

//------------------------------------------------------
function PTTimTrangThai($tt)
{
	$kq = "No";
	if ($tt == 1)
		$kq = "Ok";
	return $kq;
}

function PTDoiGioiTinh($gt)
{
	$kq = "Nam";
	if ($gt == 0)
		$kq = "Nữ";
	return $kq;
}
//------------------------------------------------------
function PTCoKhong($xem)
{
	$kq = "No";
	if ($xem == 1)
		$kq = "Ok";
	return $kq;
}
function PTTimMucDo($ma)
{
	$kq = "";
	switch ($ma) {
		case 1:
			$kq = "Dễ";
			break;
		case 2:
			$kq = "Vừa";
			break;
		case 3:
			$kq = "Khó";
			break;
		default:
			$kq = "Lỗi";
			break;
	}
	return $kq;
}

function PTHienThiXao($s)
{
	$kq = "";
	switch ($s) {
		case 1:
			$kq = "Ok";
			break;
		case 0:
			$kq = "No";
			break;
		default:
			$kq = "Lỗi";
			break;
	}
	return $kq;
}

function PTHienThiTT($s)
{
	$kq = "";
	switch ($s) {
		case 1:
			$kq = "Ok";
			break;
		case 0:
			$kq = "No";
			break;
		default:
			$kq = "Lỗi";
			break;
	}
	return $kq;
}

function PTHienThiDang($d)
{
	$kq = "";
	switch ($d) {
		case 1:
			$kq = "T Ng";
			break;
		case 2:
			$kq = "T Ln";
			break;
		default:
			$kq = "Lỗi";
			break;
	}
	return $kq;
}
//PT DINH DANG TOM TAT
function PTDinhDangXau($tomtat, $dodai)
{
	$d = strlen($tomtat);
	$kq = $tomtat;
	if ($d < $dodai)
		return $kq;
	for ($i = $dodai; $i < $d; $i++) {
		if ($tomtat[$i] == " ") {
			$kq = substr($tomtat, 0, $i) . "...";
			return $kq;
		}
	}
	return $kq;
}
?>