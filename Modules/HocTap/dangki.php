<?php	
	$ngaythang= PTngayThang();
?>
<script type="text/javascript" language="javascript">
	var a, b, c, d, s;
	var hoten, lop, gt, tendn, matkhau, email;
	function PTTaoCauHoi()
	{
		var st="";
		a= Math.floor(Math.random()*10);
		b= Math.floor(Math.random()*10);
		c= Math.floor(Math.random()*10);
		d= Math.floor(Math.random()*10);
		st= a+" - "+b+" + "+c+" - "+d+" = ";
		$('#cauhoi').html(st);
	}
	//======================================================
	function PTKTCauHoi(dapan)
	{
		s= a - b + c - d;
		if (s==dapan)
			return true;
		else
		 return false;
	}			
	//======================================================	
	function PTLuuthanhvien(hoten, gt, tendn, matkhau, email)
	{							
		var url="Modules/HocTap/dangki_xuli.php";
		var data= {"hoten": hoten, "gioitinh": gt, "tendn":tendn, "matkhau":matkhau, "email":email};
		$('#themthanhvien').load(url,data);			
	}	
	//======================================================	
	function PTKiemTraDangKy()
	{
		var ok= true;
		var dapan= $('#txtketqua').val();
		if (!PTKTCauHoi(dapan))
		{
			 alert("ĐÁP ÁN CÂU HỎI KHÔNG CHÍNH XÁC, VUI LÒNG KIỂM TRA LẠI");			 
			 return false;	
		}						
		if (($('#txthoten').val()=="")||($('#txtemail').val()=="")||($('#txttendangnhap').val()==""))
		{
			alert("DỮ LIỆU KHÔNG ĐƯỢC ĐỂ TRỐNG! VUI LÒNG KIỂM TRA LẠI");
			return false;		
		}
		if ($('#txtmatkhau').val()!= $('#txtxacnhanmatkhau').val())
		{
			alert("MẬT KHẨU KHÔNG KHỚP!");
			return false;	
		}
		if (($('#txtemail').val().indexOf("@") < 0)|| (($('#txtemail').val().indexOf(".com") < 0)))
		{
			alert("EMAIL KHÔNG HỢP LỆ!");
			return false;	
		}		       
		return ok;
	}
	
</script>
<div class="thongbao"> </div>
<div class="tieudebox"> ĐĂNG KÝ THÀNH VIÊN </div>
<p class="ngaythang"><?php  echo $ngaythang?></p>
<form method="post" action="" enctype="multipart/form-data">
<table width="786" border="0" style="text-align: left; font-size: 20px; margin-left: 200px;">
  <tr>
    <td width="226" height="37">Họ và tên:</td>
    <td colspan="2">
      <input class="textbox" type="text" name="txthoten" id="txthoten" size="40"></td>
  </tr>
  <tr>
    <td height="36">Giới tính:    
    </td>    
    <td width="445">  &nbsp;&nbsp;
<input type="radio" name="rdgioitinh" id="rdnam" checked="checked" value="1"/>   &nbsp; Nam  &nbsp;  |
      <input type="radio" name="rdgioitinh" id="rdnu" value="0"/>  &nbsp; Nữ  
     </td>
  </tr>
  <tr>
    <td height="37">Tên đăng nhập</td>
    <td colspan="2"><input class="textbox" type="text" name="txttendangnhap" id="txttendangnhap" size="40"></td>
  </tr>
  <tr>
    <td height="38">Mật khẩu:</td>
    <td colspan="2"><input class="textbox" type="password" name="txtmatkhau" id="txtmatkhau" size="40"></td>
  </tr>
  <tr>
    <td height="36">Xác nhận lại mật khẩu:</td>
    <td colspan="2"><input class="textbox" type="password" name="txtxacnhanmatkhau" id="txtxacnhanmatkhau" size="40"></td>
  </tr>
  <tr>
    <td height="39">Email:</td>
    <td colspan="2"><input class="textbox" type="text" name="txtemail" id="txtemail" size="40"></td>
  </tr>
  <tr>
    <td height="41">Câu hỏi kiểm tra:</td>
    <td colspan="2"> 
       <div id="cauhoi" style="float: left; width: 30%;"></div>
       <input class="textbox" type="text" name="txtketqua" id="txtketqua" size="5" style=" float: left;">
     </td>
  </tr>
  <tr>
    <td> </td>
    <td colspan="2">
    	<input class="button" type="button" name="btndangky" id="btndangky" value="  Đăng ký  ">      	
    </td>
  </tr>
</table>

<div id="themthanhvien"></div>	<!--dung de xu li du lieu them thanh vien bang ajax-->

<script type="text/javascript" language="javascript">
	//================== XU LY ================
	//-------------------------------------------------------------------	
	$(document).ready(function(e) 
	{	
	//=================================================	       
		PTTaoCauHoi();		// ma kiem tra		
		//=========================================
		$('#btndangky').click(function(e) 
		{			
			if (PTKiemTraDangKy())
			{
				gt= 0; 
				if ($('#rdnam').is(':checked'))	
					gt= 1; 
				hoten= $('#txthoten').val();																		
				tendn= $('#txttendangnhap').val();
				matkhau= $('#txtmatkhau').val();
				email= $('#txtemail').val();
				PTLuuthanhvien(hoten, gt, tendn,matkhau,email);				
				window.location="index.php?xem=thongbao&ms=1004";	
			}						
        });
		
    });
</script>
</form>
