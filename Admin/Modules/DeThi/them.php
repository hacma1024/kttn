<script type="text/javascript" language="javascript">
$(document).ready(function(e) {
    $('#btnthoat').click(function(e)
	{	// THOAT
        var kq= confirm("Bạn có muốn thoát không?");		
		if (kq==true)
			window.location="index.php";
    });			
	
});
</script>
<?php  
	mysqli_set_charset($con, "utf8");
	$sql="select * from tbldethi order by id desc";	
	$loaitin= mysqli_query($con,$sql);	
	$sqlmon="select * from tblmon";
	$mon= mysqli_query($con, $sqlmon);		
?>
<form action="Modules/DeThi/xuli.php" method="post">
<div id="left-loaitin" style="margin-right: 10px;">
  <table class="table-them" width="607" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="32" colspan="2"><div align="center"><strong>QUẢN LÍ ĐỀ THI</strong></div></td>
    </tr>
    <tr>
      <td width="160" height="46">Chủ đề:</td>
      <td width="447"><input type="text" name="txtchude" id="txtchude" size="40px"></td>
    </tr>
    <tr>
      <td height="50">Số lượng câu hỏi:</td>
      <td><input type="text" name="txtsoluong" id="txtsoluong" size="10px" value="0"></td>
    </tr>
    <tr>
      <td height="46" >Môn:</td>
      <td>
      <select name="list-mon" id="list-mon" style="padding: 3px; font-size: 18px;">
      <option value="0" > --- Chọn --- </option> 
        <?php
			while ($dong2=mysqli_fetch_assoc($mon))
			{
				?>
                 <option value="<?php echo $dong2['id'];?>"> <?php echo $dong2['mon']; ?> </option>   
                <?php
			}
		?>                            
      </select>
      </td>
    </tr>
    <tr>
      <td height="47" >Lớp:</td>
      <td>
        <select name="list-lop" id="list-lop">
          <option value="0" > --- Chọn --- </option> 
          <option value="6" > 6 </option> 
          <option value="7">  7 </option>  
          <option value="8">  8 </option>   
          <option value="9">  9 </option>                                                   
        </select>
       </td>
    </tr>
    <tr>
      <td height="49">Thời gian (p):</td>
      <td><input type="text" name="txtthoigian" id="txtthoigian" size="10px" value="0"/></td>
    </tr>
    <tr>
      <td height="50">Thời gian HS xem lại (p):</td>
      <td><input type="text" name="txtktthoigian" id="txtktthoigian" size="10px" value="0"/></td>
    </tr>
    <tr>
      <td height="49">Sử dụng:</td>
      <td><input type="checkbox" id="chktrangthai" name="chktrangthai" /> </td>
    </tr>
    <tr>
      <td height="44">Xem đáp án:</td>
      <td><input type="checkbox" id="chkxemda" name="chkxemda" /> </td>
    </tr>    
    <tr>
      <td height="47">Xem lại bài:</td>
      <td><input type="checkbox" id="chkxemlaibai" name="chkxemlaibai" /></td>
    </tr>
    <tr>
      <td height="37">Upload File:</td>
      <td><input type="checkbox" id="chkuploadfile" name="chkuploadfile" /></td>
    </tr>
    <tr>
      <td height="37"></td>
      <td>       
        <input class="button" type="submit" name="btnthem" id="btnthem" value="   THÊM   "> &nbsp;&nbsp;&nbsp;
        <input class="button" type="button" name="btnthoat" id="btnthoat" value="   THOÁT   " />
        </td>
    </tr>
    <tr>
      <td height="37"></td>
      <td>
      <input type="text" name="txtquyen" id="txtquyen" size="10px" value="<?php echo $_SESSION["quyen"];?>" style="display: none;"/> 
      <input type="text" name="txtmand" id="txtmand" size="10px" value="<?php echo $_SESSION["mand"];?>" style="display: none;"/>
      </td>
    </tr>   
  </table>
<?php 
	include("Modules/functions.php");
	PTInTrangThai();
?> 
</div>

</form>

