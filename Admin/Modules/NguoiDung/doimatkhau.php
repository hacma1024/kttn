<?php 
	include("Modules/functions.php");	
	$q= $_SESSION["quyen"];
	$mand= $_SESSION["mand"];
	$mk= $_SESSION["matkhau"];		
	$ten =$_SESSION["tendangnhap"];	
	$hovaten= $_SESSION['hovaten'];
?>
<script language="javascript" type="text/javascript">

$(document).ready(function(e)
{
	function PTDoiMatKhau(id, matkhau)
	{		
		var url="Modules/NguoiDung/xuli_doimatkhau.php";
		var data= {"idnd": id, "matkhau": matkhau};
		$('#doimatkhau-thongbao').load(url,data);			
	}
	
	$('#btnXacNhan').click(function(e) {
        var mkcu1="<?php echo $mk?>";
		var id="<?php echo $mand?>";		
		var mkcu2= $('#txtmkcu').val();
		var mkmoi1=$('#txtmkmoi1').val(); 
		var mkmoi2=$('#txtmkmoi2').val();
		if ((mkcu2.length < 6)||(mkmoi1.length < 6)||(mkmoi2.length < 6))
		{
			alert("Mật khẩu chứa ít nhất sáu kí tự, vui lòng kiểm tra lại");
			return;
		}
		if ((mkcu2=="")||(mkmoi1=="")||(mkmoi2==""))
		{
			alert("Mật khẩu không đang bị để trống, vui lòng kiểm tra lại");
			return;
		}
		if (mkcu1!=mkcu2)
		{
			alert("Mật khẩu cũ không chính xác, vui lòng kiểm tra lại");
			return;			
		}
		if (mkmoi1!=mkmoi2)
		{
			alert("Mật khẩu mới chưa khớp, vui lòng kiểm tra lại");
			return;			
		}	
		PTDoiMatKhau(id, mkmoi1);
		window.location="index.php?quanli=doimatkhau&dmk=1";
    });  
	
	$('#btnThoatdmk').click(function(e) 
	{
        window.location="index.php";
    });  
});
</script>
<div id="left-cauhoi" style="margin-left: 60px;">
<div class="tieudebox" style="font-family:'Times New Roman'; font-weight: bold; font-size: 26px; margin: 30px; text-align: center;"> Thay đổi mật khẩu người dùng </div>
    <table width="445" border="0">
      <tr class="doimatkhau">
        <td colspan="2">
            <div id="doimk-thongtin" style="text-align: center; font-family:'Times New Roman'; font-weight: bold;font-size: 20px; ">
			    <?php echo "Xin chào ".$hovaten?>
            </div>
        </td>
      </tr>
      <tr class="doimatkhau">
        <td width="190" height="43">Mật khẩu hiện tại:</td>
        <td width="245">
            <input type="password" id="txtmkcu" class="textbox" />               
        </td>
      </tr>
      <tr class="doimatkhau">
        <td height="47">Mật khẩu mới:</td>
        <td> <input type="password" id="txtmkmoi1" class="textbox" /> </td>
      </tr>
      <tr class="doimatkhau">
        <td height="43">Xác nhận mật khẩu mới</td>
        <td><input type="password" id="txtmkmoi2" class="textbox" /></td>
      </tr>
      <tr>
        <td height="49"></td>
        <td>
            <input type="button" id="btnXacNhan" class="button" value="Xác nhận"/>
            <input type="button" id="btnThoatdmk" class="button" value="Thoát"/>
        </td>
      </tr> 
    </table>
</div>
<div id="doimatkhau-thongbao">
<?php
	$tb=-1;
	if (isset($_GET["dmk"]))
		$tb= $_GET["dmk"];
	if ($tb==1)
		echo "Đổi mật khẩu thành công";
	if ($tb==0)
		echo "Đổi mật khẩu thất bại";
?>
</div>