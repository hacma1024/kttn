<div class="clear"> </div>
<?php	
	$ngaythang= PTngayThang();	
?>
<script language="javascript" type="text/javascript">	
		
	var a, b, c, d, s;
	var hoten, lop, gt, tendn, matkhau, email;
	function PTTaoCauHoi()
	{
		var st="";
		a= Math.floor(Math.random()*10);
		b= Math.floor(Math.random()*10);
		c= Math.floor(Math.random()*10);
		d= Math.floor(Math.random()*10);
		st= a+" - "+b+" + "+c+" - "+d+"= ";
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
	
	function PTKTKiTuTrong(s)
	{
		var kq= true;			
		if (s.indexOf(" ")>0)
			kq= false;		
		return kq;
	}
	
	function PTKiemTraGopY()
	{
		var ok= true;
		var dapan= $('#txtketqua').val();							
		if (($('#txthovaten').val()=="")||($('#txtemail').val()=="")||($('#txtnoidung').val()==""))
		{
			alert("DỮ LIỆU KHÔNG ĐƯỢC ĐỂ TRỐNG! VUI LÒNG KIỂM TRA LẠI");
			return false;		
		}
		
		if ($('#txtemail').val().indexOf("@") < 0)
		{
			alert("EMAIL KHÔNG HỢP LỆ!");
			return false;	
		}	
		if (!PTKTCauHoi(dapan))
		{
			 alert("ĐÁP ÁN CÂU HỎI KHÔNG CHÍNH XÁC, VUI LÒNG KIỂM TRA LẠI");			 
			 return false;	
		}		       
		return ok;
	}
			
</script>	 

<form id="frmChiaSe" action="Modules/HocTap/gopy_xuli.php" method="post" enctype="multipart/form-data">
<div class="tieudebox"> HỘP THƯ GÓP Ý </div>
<p class="ngaythang"><?php  echo $ngaythang?></p>
<table width="682" border="0" class="tbl-chung" style="padding-left: 50px; font-family: Tahoma; font-size: 18px; margin-left: 200px;">
  <tr>
    <td width="238" height="41">Họ và tên:</td>
    <td width="434">
    <input class="textgopy" type="text" name="txthovaten" id="txthovaten" size="48">
    </td>
  </tr>
  <tr>
    <td height="101">Nội dung:</td>
    <td>
    <textarea class="textgopy" name="txtnoidung" id="txtnoidung" cols="46" rows="10"></textarea>
    </td>
  </tr>  
  <tr>
    <td height="41">Email:</td>
    <td><input class="textgopy" type="text" name="txtemail" id="txtemail" size="48"></td>
  </tr> 
  <tr>
    <td height="50">Câu hỏi kiểm tra:</td>
    <td colspan="2"> 
       <div id="cauhoi" style="float: left; width: 25%;"></div>
       <input class="textgopy" type="text" name="txtketqua" id="txtketqua" size="5" style="float: left;">
     </td>
  </tr>
  <tr>
    <td></td>
    <td><input class="button" type="button" name="btnchuyenthu" id="btnchuyenthu" value="   Chuyển thư   " /></td>
  </tr>
  <tr>
    <td></td>
    <td>    	
    	<input class="button" type="submit" name="btnchuyen" id="btnchuyen" value="Chuyển" style="display:none;"> 
      	<input class="textbox" type="text" name="txtid" id="txtid" size="38" style="display:none;"/>     
  </tr>
</table>
<div id="message"> </div>
</form>
<script language="javascript" type="text/javascript">
	//==============================================================
	$(document).ready(function(e)
	{					
		PTTaoCauHoi();		// ma kiem tra	
		$('#btnchuyenthu').click(function(e) 
		{
            if (PTKiemTraGopY())
			{												
				$('#btnchuyen').click();	// submit form			
			}
        });			
    });
</script>