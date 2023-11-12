<?php	
	mysqli_set_charset($con, "utf8");
	$sql="select * from tblnguoidung where id='$_GET[id]'";	
	$baiviet= mysqli_query($con,$sql);
	$dong= mysqli_fetch_assoc($baiviet);	
	include("Modules/functions.php");					
?>
<form action="Modules/NguoiDung/xuli.php?ac=sua&amp;id=<?php echo $dong["id"]?>" method="post" enctype="multipart/form-data">
<div id="left-baiviet"  style="float: left; margin-right: 50px; margin-left: 30px;">
  <table class="table-them" width="518" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="41" colspan="2"><div align="center"><strong>QUẢN LÍ NGƯỜI DÙNG</strong></div></td>
    </tr>
     <tr>
      <td width="157" height="34">Họ và tên:</td>
      <td width="361"><input type="text" name="txthovaten" id="txthovaten" size="30px" value="<?php echo $dong["hovaten"]?>"></td>
    </tr>     
    <tr>
      <td height="38">Giới tính:</td>
      <td>
      	&nbsp; 
        <?php
			if ($dong["gioitinh"]==1)
			{
        ?>
        	<input type="radio" name="rdgioitinh" value="1" checked="checked"  /> Nam &nbsp;&nbsp;&nbsp;
        	<input type="radio" name="rdgioitinh" value="0" /> Nữ
		<?php
			}
			else
			{
		?>
        	<input type="radio" name="rdgioitinh" value="1" /> Nam &nbsp;&nbsp;&nbsp;
        	<input type="radio" name="rdgioitinh" value="0" checked="checked"  /> Nữ
		<?php
			}
        ?>
      </td>    
    </tr>
     <tr>
      <td width="157" height="45">Tên đăng nhập:</td>
      <td width="361"><input type="text" name="txttendangnhap" id="txttendangnhap" size="30px" value="<?php echo $dong["tendangnhap"]?>"></td>
    </tr>   
    <tr>
      <td height="37" >Mật khẩu:</td>
      <td><input type="password" name="txtmatkhau" id="txtmatkhau" size="30px" value="<?php echo $dong["matkhau"]?>"/></td>
    </tr>
    <tr>
      <td height="39">Email:</td>
      <td><input type="text" name="txtemail" id="txtemail" size="30px" value="<?php echo $dong["email"]?>"></td>
    </tr>
    <tr>
      <td height="36">Quyền:</td>
      <td>
      <select name="oquyen" id="oquyen" class="option">
        <option value="xxx"> -- chọn -- </option>
   		<?php     		   		 
   		  for ($i=1; $i<=5; $i++)
		  {  		   
		  	if ($dong["quyen"]==$i)
			{
		   ?>          
          		<option value="<?php echo $i?>" selected="selected"> <?php echo $i ?> </option>                  
    <?php   
			}
			else
			{
				?>
                <option value="<?php echo $i?>"> <?php echo $i ?> </option>  
                <?php
			}
		  }
	 ?>              
      </select>
      </td>
    </tr>
    <tr>
      <td height="50"></td>
      <td>       
        <input class="button" type="submit" name="btncapnhat" id="btncapnhat" value="   CẬP NHẬT   "> 
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

