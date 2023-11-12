<?php
include("Modules/functions.php");
$idtl = $_GET["id"];
$sql = "select tl.* from tbltailieu tl where tl.id= $idtl";
$baiviet = mysqli_query($con, $sql);
$dong = mysqli_fetch_assoc($baiviet);
$sql_mon = "select * from tblmon";
$mon = mysqli_query($con, $sql_mon);
$trang = 1;
if (isset($_GET["trang"]))
  $trang = $_GET["trang"];

function PTHienThiHinhAnh_sua($anh)
{
  $kq = "";
  if ($anh != "") {
    $kq = "<img id='anhtailieu' src='../" . $anh . "' height='150' width='160' />";
  } else {
    $kq = "<img id='anhtailieu' src='Images/no-image.jpg' height='150' width='160'/>";
  }
  return $kq;
}
?>
<script language="javascript" type="text/javascript">
  function PTTimAnh(pic) {
    var reader = new FileReader();
    reader.onload = function (e) {
      var img = document.getElementById("anhtailieu");
      img.src = e.target.result;
      img.style.display = "inline";
    };
    reader.readAsDataURL(pic.files[0]);
  }
  $(document).ready(function (e) {
    $('#btnthoat').click(function (e) {	// THOAT
      var kq = confirm("Bạn có muốn thoát không?");
      if (kq == true)
        window.location = "index.php";
    });
  });							
</script>
<form action="Modules/TaiLieu/xuli.php?quanli=chiase&ac=sua&id=<?php echo $dong["id"] ?>" method="post"
  enctype="multipart/form-data">
  <div id="left-baiviet" style="margin-right: 30px; margin-left: 30px;">
    <table class="table-them" width="459" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="32" colspan="2">
          <div align="center"><strong> QUẢN LÍ TÀI LIỆU </strong></div>
        </td>
      </tr>
      <tr>
        <td width="129" height="34">Tên sách:</td>
        <td width="330">
          <textarea name="txttensach" id="txttensach" cols="46" rows="3"><?php echo $dong['tensach'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td height="171">Ảnh:</td>
        <td>
          <?php
          echo PTHienThiHinhAnh_sua($dong["hinhanh"]);
          ?>
          <input type="file" id="fileanh" name="anhminhhoa" size="48px" onchange="PTTimAnh(this)"
            style="display:none;" />
          <input class="button" type="button" id="btnchonanh" onclick="document.getElementById('fileanh').click()"
            value="Chọn ảnh" />
        </td>
      </tr>
      <tr>
        <td height="95">Tóm tắt:</td>
        <td>
          <textarea name="txttomtat" id="txttomtat" cols="46" rows="8"><?php echo $dong["tomtat"] ?></textarea>
        </td>
      </tr>

      <tr>
        <td height="54">Môn:</td>
        <td>
          <select name="list-mon" id="list-mon">
            <option value="0"> --- Chọn --- </option>
            <?php
            while ($dong2 = mysqli_fetch_assoc($mon)) {
              if ($dong2['id'] == $dong['mon']) {
                ?>
                <option value="<?php echo $dong2['id']; ?>" selected="selected">
                  <?php echo $dong2['mon']; ?>
                </option>
                <?php
              } else {
                ?>
                <option value="<?php echo $dong2['id']; ?>">
                  <?php echo $dong2['mon']; ?>
                </option>
                <?php
              }

            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td height="46">Lớp:</td>
        <td>
          <select name="list-lop" id="list-lop">
            <option value="0"> --- Chọn --- </option>
            <option value="6" <?php if ($dong['lop'] == 6) { ?> selected="selected" <?php } ?>> 6 </option>
            <option value="7" <?php if ($dong['lop'] == 7) { ?> selected="selected" <?php } ?>> 7 </option>
            <option value="8" <?php if ($dong['lop'] == 8) { ?> selected="selected" <?php } ?>> 8 </option>
            <option value="9" <?php if ($dong['lop'] == 9) { ?> selected="selected" <?php } ?>> 9 </option>
            <option value="10" <?php if ($dong['lop'] == 10) { ?> selected="selected" <?php } ?>> Thi HSG </option>
          </select>
        </td>
      </tr>
      <tr>
        <td height="37">Tác giả:</td>
        <td><input type="text" name="txttacgia" id="txttacgia" size="45px" value="<?php echo $dong['tacgia'] ?>" /></td>
      </tr>
      <tr>
        <td height="39">Link Google drive:</td>
        <td>
          <textarea name="txtlink" id="txtlink" cols="46" rows="3"><?php echo $dong['link'] ?></textarea>
        </td>
      </tr>
      <tr>
        <td height="35">Ngày:</td>
        <td><input type="text" name="txtthoigian" id="txtthoigian" size="45px" value="<?php echo $dong['ngay'] ?>" />
        </td>
      </tr>
      <tr>
        <td height="38">Thứ tự:</td>
        <td>
          <input type="text" name="txtthutu" id="txtthutu" size="10px" value="<?php echo $dong['thutu'] ?>" />
        </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td>
          <input class="button" type="submit" name="btncapnhat" id="btncapnhat" value="   CẬP NHẬT   ">
          <input class="button" type="submit" name="btnthoat" id="btnthoat" value="   THOÁT   " />
        </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td><input type="text" name="txtnguoiviet" id="txtnguoiviet" size="40px" value="<?php echo $dong["mand"]; ?>"
            style="display: none;" /></td>
      </tr>
      <tr>
      <tr>
        <td height="37" colspan="2">
          <input type="text" name="txttrang" id="txttrang" size="10px" value="<?php echo $trang ?>"
            style="display:none;" />
        </td>
      </tr>
    </table>
    <?php
    PTInTrangThai();
    ?>
  </div>
</form>