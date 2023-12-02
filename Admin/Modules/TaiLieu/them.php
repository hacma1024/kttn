<?php
  include("Modules/functions.php");
  $sql = "select thutu from tbltailieu order by thutu desc limit 1";
  $baiviet = mysqli_query($con, $sql);
  $dong = mysqli_fetch_assoc($baiviet);
  $thutu = $dong["thutu"] + 1;
  $trang = 1;
  if (isset($_GET["trang"]))
    $trang = $_GET["trang"];
  $sqlmon = "select * from tblmon";
  $mon = mysqli_query($con, $sqlmon);
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
<form action="Modules/TaiLieu/xuli.php" method="post" enctype="multipart/form-data">
  <div id="left-baiviet" style="margin-left: 30px;">
    <table class="table-them" width="613" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="66" colspan="2">
          <div align="center"><strong>QUẢN LÍ TÀI LIỆU</strong></div>
        </td>
      </tr>
      <tr>
        <td width="141" height="34">Tên Sách:</td>
        <td width="472">
          <textarea name="txttensach" id="txttensach" cols="43" rows="3"></textarea>
        </td>
      </tr>
      <tr>
        <td height="144">Tóm tắt:</td>
        <td><textarea name="txttomtat" id="xttomtat" cols="46"
            rows="8">Chúc các bạn ôn tập tốt và kiểm tra đạt điểm cao!</textarea></td>
      </tr>

      <tr>
        <td height="54">Môn:</td>
        <td>
          <select name="list-mon" id="list-mon" style="padding: 3px; font-size: 16px;">
            <option value="0"> --- Chọn --- </option>
            <?php
            while ($dong2 = mysqli_fetch_assoc($mon)) {
              ?>
              <option value="<?php echo $dong2['id']; ?>">
                <?php echo $dong2['mon']; ?>
              </option>
              <?php
            }
            ?>
          </select>
        </td>
      </tr>
      <tr>
        <td height="46">Lớp:</td>
        <td>
          <select name="list-lop" id="list-lop" style="padding: 3px; font-size: 16px;">
            <option value="0"> --- Chọn --- </option>
            <option value="6"> 6 </option>
            <option value="7"> 7 </option>
            <option value="8"> 8 </option>
            <option value="9"> 9 </option>
            <option value="10"> Thi HSG </option>
          </select>
        </td>
      </tr>
      <tr>
        <td height="37">Tác giả:</td>
        <td><input type="text" name="txttacgia" id="txttacgia" size="46px" value="ST" /></td>
      </tr>
      <tr>
        <td height="72">Link Google drive (view):</td>
        <td>
          <textarea name="txtlink" id="txtlink" cols="46" rows="3" placeholder="https://drive.google.com/file/d/14oXsHOXEqAaoUVksUncWW7fcAyaa5T9J/view"></textarea>
        </td>
      </tr>
      <tr>
        <td height="35">Ngày:</td>
        <td><input type="text" name="txtthoigian" id="txtthoigian" size="45px" value="<?php echo PTngayThang() ?>" />
        </td>
      </tr>
      <tr>
        <td height="38">Thứ tự:</td>
        <td>
          <input type="text" name="txtthutu" id="txtthutu" size="10px" value="<?php echo $thutu ?>" />
        </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td>
          <input class="button" type="submit" name="btnthem" id="btnthem" value="   THÊM   ">
          <input class="button" type="button" name="btnthoat" id="btnthoat" value="   THOÁT   " />
        </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td>
          <input type="text" name="txtnguoiviet" id="txtnguoiviet" size="40px" value="<?php echo $_SESSION['mand']; ?>"
            style="display: none;" />
        </td>
      </tr>
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