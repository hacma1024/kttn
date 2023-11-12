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
	$id=0;
	if (isset($_GET['id']))
		$id=$_GET['id'];
	$sql="select dt.id, dt.madethi, dt.chude, dt.socauhoi, m.mon, dt.lop, dt.trangthai, dt.thoigian, dt.xemda, dt.ktxemlai, dt.ttfile, dt.mand, dt.ktthoigian  from tbldethi dt inner join tblmon m on dt.mon= m.id where dt.id='$id'";	
	$dethi= mysqli_query($con,$sql);
	$dong=mysqli_fetch_assoc($dethi);	
	
	$sqlmon="select * from tblmon";
	$mon= mysqli_query($con, $sqlmon);		
?>
<form action="Modules/DeThi/xuli.php?id=<?php echo $id?>" method="post">
<div id="left-loaitin" style="margin-right: 10px;">
  <table class="table-them" width="489" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="32" colspan="2"><div align="center"><strong>QUẢN LÍ ĐỀ THI</strong></div></td>
    </tr>
    <tr>
      <td width="131" height="34">Chủ đề:</td>
      <td width="358"><input type="text" name="txtchude" id="txtchude" size="40px" value="<?php echo $dong['chude']?>"></td>
    </tr>
    <tr>
      <td height="38">Số lượng:</td>
      <td>
      <input type="text" name="txtsoluong" id="txtsoluong" value="<?php echo $dong['socauhoi']?>" size="10px">
      </td>
    </tr>
    <tr>
      <td height="37" >Môn:</td>
      <td>
      <select name="list-mon" id="list-mon">
     <option value="0" > --- Chọn --- </option> 
        <?php
			while ($dong2=mysqli_fetch_assoc($mon))
			{
				if ($dong2['mon']==$dong['mon'])
				{
				?>
                 <option value="<?php echo $dong2['id'];?>" selected="selected"> <?php echo $dong2['mon']; ?> </option>   
                <?php
				}
				else
				{
					?>
                    <option value="<?php echo $dong2['id'];?>"> <?php echo $dong2['mon']; ?> </option>   
                    <?php
				}
			}
		?>       	                                           
      </select>
    </td>
    </tr>
    <tr>
      <td height="37" >Lớp:</td>
      <td>
      <select name="list-lop" id="list-lop">
        <option value="6" <?php if ($dong['lop']==6) { ?> selected="selected" <?php } ?> > 6 </option> 
        <option value="7" <?php if ($dong['lop']==7) { ?> selected="selected" <?php } ?> > 7 </option>  
        <option value="8" <?php if ($dong['lop']==8) { ?> selected="selected" <?php } ?> > 8 </option>   
        <option value="9" <?php if ($dong['lop']==9) { ?> selected="selected" <?php } ?> > 9 </option> 
      </select>
      </td>
    </tr>
     <tr>
      <td height="38">Thời gian (p):</td>
      <td><input type="text" name="txtthoigian" id="txtthoigian" size="10px" value="<?php echo $dong['thoigian']?>"/></td>
    </tr>
    <tr>
      <td height="37">KT Thời gian (p):</td>
      <td>
      <input type="text" name="txtktthoigian" id="txtktthoigian" size="10px" value="<?php echo $dong['ktthoigian']?>"/>
      </td>
    </tr>
    <tr>
      <td height="38">Sử dụng:</td>
      <td>
      <?php
	  	if ($dong['trangthai']==1)
		{
      	?> 	
        	<input type="checkbox" id="chktrangthai" name="chktrangthai" checked="checked" />
        <?php
		} else
		{
		?> 
        	<input type="checkbox" id="chktrangthai" name="chktrangthai" />
        <?php
		}
		?>
       </td>
    </tr>
    <tr>
      <td height="37">Xem đáp án:</td>
      <td>
        <?php
	  	if ($dong['xemda']==1)
		{
      	?> 	 
        	<input type="checkbox" id="chkxemda" name="chkxemda" checked="checked"/>
        <?php
		} else
		{
		?>  
        	<input type="checkbox" id="chkxemda" name="chkxemda" />
        <?php
		}
		?>     
      </td>
    </tr>    
    <tr>
      <td height="37">Xem lại bài:</td>
      <td>
      <?php
	  	if ($dong['ktxemlai']==1)
		{
      	?> 	 
        	<input type="checkbox" id="chkxemlaibai" name="chkxemlaibai"  checked="checked"/>
        <?php
		} else
		{
		?>  
        	<input type="checkbox" id="chkxemlaibai" name="chkxemlaibai" />
        <?php
		}
		?>    
      </td>
     <tr>
      <td height="37">Upload File:</td>
      <td>
      <?php
	  	if ($dong['ttfile']==1)
		{
      	?> 	 
        	<input type="checkbox" id="chkuploadfile" name="chkuploadfile"  checked="checked"/>
        <?php
		} else
		{
		?>  
        	<input type="checkbox" id="chkuploadfile" name="chkuploadfile" />
        <?php
		}
		?>    
      </td>
    </tr>
    </tr>
    <tr>
      <td height="37"></td>
      <td>       
        <input class="button" type="submit" name="btncapnhat" id="btncapnhat" value="   CẬP NHẬT   "> &nbsp;&nbsp;&nbsp;
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