<?php			
	include("Modules/functions.php");	
	mysqli_set_charset($con, "utf8");
?>
<form action="Modules/NguoiDung/xuli.php" method="post" enctype="multipart/form-data">
<div id="left-baiviet" style="float: left; margin-right: 30px; margin-left: 30px;">
  <table class="table-them" width="426" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="32" colspan="2"><div align="center"><strong>QUẢN LÍ NGƯỜI DÙNG</strong></div></td>
    </tr>
     <tr>
      <td width="154" height="40">Họ và tên:</td>
      <td width="272"><input type="text" name="txthovaten" id="txthovaten" size="30px"></td>
    </tr>    
    <tr>
      <td height="38">Giới tính:</td>
      <td>
      	&nbsp; <input type="radio" name="rdgioitinh" checked="checked" value="1" /> Nam &nbsp;&nbsp;&nbsp;
        <input type="radio" name="rdgioitinh" value="0" /> Nữ
      </td>    
    </tr>
     <tr>
      <td width="154" height="40">Tên đăng nhập:</td>
      <td width="272"><input type="text" name="txttendangnhap" id="txttendangnhap" size="30px"></td>
    </tr>   
    <tr>
      <td height="37" >Mật khẩu:</td>
      <td><input type="password" name="txtmatkhau" id="txtmatkhau" size="30px"/></td>
    </tr>
    <tr>
      <td height="37">Email:</td>
      <td><input type="text" name="txtemail" id="txtemail" size="30px"></td>
    </tr>
    <tr>
      <td height="35">Quyền:</td>
      <td>
      <select name="oquyen" id="oquyen" class="option">
        <option value="xxx"> -- chọn -- </option>
   		<?php     		   		 
   		  for ($i=1; $i<=5; $i++)
		  {  		   
		   ?>
          <option value="<?php echo $i?>"> <?php echo "   ".$i."   " ?> </option>;                  
    <?php } ?>              
      </select>
      </td>
    </tr>
    <tr>
      <td height="46"></td>
      <td>       
        <input class="button" type="submit" name="btnthem" id="btnthem" value="   THÊM   "> 
        &nbsp;&nbsp;&nbsp;
        <input class="button" type="submit" name="btnthoat" id="btnthoat" value="   THOÁT   " />
        </td>
    </tr>
    <tr>
      <td height="37" colspan="2">     
      </td>
      </tr>   
  </table>  
    <?php	
		PTInTrangThai();
	?> 
</div>
</form>

