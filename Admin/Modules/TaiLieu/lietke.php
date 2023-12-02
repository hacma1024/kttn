<?php
include("Modules/functionjs.php");
$so_bv = 20;
$trang = 1;
if (isset($_GET["trang"]))
  $trang = $_GET["trang"];
$batdau = ($trang - 1) * $so_bv;
$tk = "";
$id = -1;
if (isset($_GET['id']))
  $id = $_GET['id'];
$q = $_SESSION["quyen"];
$mand = $_SESSION["mand"];

$sql = "select tl.id, tl.tensach, tl.hinhanh, tl.lop, tl.link, nd.hovaten, mon.mon ";
$sql = $sql . " from tbltailieu tl inner join tblmon mon on tl.mon=mon.id inner join tblnguoidung nd on tl.mand=nd.id where tl.mand='$mand' order by tl.id desc";
if ($q == 1) {
  $sql = "select tl.id, tl.tensach, tl.hinhanh, tl.lop, tl.link, nd.hovaten, mon.mon ";
  $sql = $sql . " from tbltailieu tl inner join tblmon mon on tl.mon=mon.id inner join tblnguoidung nd on tl.mand=nd.id order by tl.id desc";
  // $sql = "select tl.id, tl.tensach, tl.hinhanh, tl.lop, tl.link, mon.mon ";
  // $sql = $sql . " from tbltailieu tl inner join tblmon mon on tl.mon=mon.id order by tl.id desc";
}
if (isset($_GET["stk"])) {
  $tk = $_GET["stk"];
  $sql = "select tl.id, tl.tensach, tl.hinhanh, tl.lop, tl.link, nd.hovaten,  mon.mon ";
  $sql = $sql . " from tbltailieu tl inner join tblmon mon on tl.mon=mon.id inner join tblnguoidung nd on tl.mand=nd.id where tl.tensach like '%$tk%' order by tl.id desc";
}
$baiviet = mysqli_query($con, $sql);

function PTHienThiHinhAnh($anh)
{
  $kq = "";
  if ($anh != "") {
    $kq = "<img src='../" . $anh . "' style='width: 80px;' />";
  } else {
    $kq = "<img src='Images/no-image.jpg' style='width: 80px;'/>";
  }
  return $kq;
}
?>
<script language="javascript" type="text/javascript">
  $(document).ready(function (e) {
    function PTTimKiem() {
      var stk = $('#txttimkiem').val();
      if (stk != "")
        window.location = "index.php?quanli=tailieu&ac=them&stk=" + stk;
    }

    $('#txttimkiem').keydown(function (e) {
      if (e.keyCode == 13)
        PTTimKiem();
    });

    $('#imgtimkiem').click(function (e) {
      PTTimKiem();
    });

    $('#txttimkiem').click(function (e) {
      $(this).val("");
    });
  });
</script>
<div id="right-loaitin">
  <div id="timkiem" style="width:100%;">
    <img id="imgtimkiem" name="imgtimkiem" src="../Images/Search.png" style="width: 35px; height: 35px;" />
    <input type="text" id="txttimkiem" name="txttimkiem" size="78" style="font-size: 16px;" />
  </div>
  <div class="tieude-bang" style="text-align:center; width: 100%"> DANH SÁCH CÁC TÀI LIỆU </div>
  <table class="table" width="1033" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">
    <tr>
      <td width="47" height="59" style="text-align:center; font-weight:bold;">STT</td>
      <td width="332" style="text-align:center; font-weight:bold;">TÊN SÁCH</td>
      <td width="101" style="text-align:center; font-weight:bold;">MÔN</td>
      <td width="81" style="text-align:center; font-weight:bold;">LỚP</td>
      <td width="205" style="text-align:center; font-weight:bold;">NGƯỜI ĐĂNG</td>
      <td colspan="3" style="text-align:center; font-weight:bold;">QUẢN LÍ</td>
    </tr>
    <?php
    $so = 1;
    while ($dong = mysqli_fetch_assoc($baiviet)) {
      ?>
      <tr <?php
      if ($dong["id"] == $id) { ?> class="maunenchon" <?php }
      if ($so % 2 == 1) { ?> class="maunenle" <?php }
      ?>>
        <!--DONG TR-->
        <td style=" text-align:center;">
          <?php
          echo $so;
          ?>
        </td>
        <td style=" text-align:center;">
          <?php echo $dong['tensach']; ?>
        </td>
        <td style=" text-align:center;">
          <?php
          echo PTHienThiHinhAnh($dong["hinhanh"]);
          ?>
        </td>
        <td style=" text-align:center;">
          <?php echo $dong["mon"] ?>
        </td>
        <td style=" text-align:left;">
          <div align="center">
            <?php echo $dong["lop"] ?>
          </div>
        </td>
        <td style=" text-align:center;">
          <?php echo $dong["hovaten"] ?>
        </td>
        <td width="60" style=" text-align:center;">
          <a href="index.php?quanli=tailieu&ac=sua&trang=<?php echo $trang ?>&id=<?php echo $dong["id"] ?>">
            <img src="Images/Iedit.png" />
          </a>
        </td>
        <td width="57" style=" text-align:center;">
          <a onclick="PTXoa_Tailieu(<?php echo $dong['id'] ?>,'<?php echo $dong['tensach'] ?>', '<?php echo $trang; ?> ')"
            href="#">

            <img src="Images/Idelete.png" />
          </a>
        </td>
        <td width="57" style=" text-align:center;">
          <a href="<?php echo $dong['link'] ?>">
            <img src="Images/tick.png" />
          </a>
        </td>
      </tr>
      <?php
      $so++;
    }
    ?>

  </table>
  <?php
  if ($tk == "")
    include("Modules/TaiLieu/trang.php");
  ?>
  <div class="clear"> </div>
</div>