<?php
	$sql="select madethi from tbldethi where trangthai=1";
	$dethi= mysqli_query($con,$sql);			
?>
<script type="text/javascript" language="javascript">	
	//-------------------------------------------------------------------
	var tenhocsinh=""; var lop=""; var madethi=""; var diem=0;
	var dethi= new Array(); var chude= new Array();
	
	//-------------------------------------------------	
	function PTDuaVaoMaDeThi()
	{
		var dt="";
		<?php
			while ($dong=mysqli_fetch_assoc($dethi))
			{	?>
			     dt="<?php echo $dong['madethi']?>"; 
				 dethi.push(dt);			
		<?php	
			}	?>
	}
	//-------------------------------------------------
	function PTKiemTraMaDeThi(ma)
	{
		var kq= false;
		var h= dethi.length;
		for (var i=0; i<h; i++)
			if (ma==dethi[i])
			{
				kq= true; 
				return kq;
			}
		return kq;
	}
	
	//-------------------------------------------------------------------
	function PTLuuDiem(hoten, lop, diem, madt, tglam, ketqua, maxemlai)
	{							
		var url="Modules/xuli.php";
		var data= {"ten": hoten, "lop":lop, "diem":diem, "madt":madt, "tglam":tglam, "ketqua":ketqua,"maxemlai":maxemlai};
		$('#test').load(url,data);			
	}	
	//-------------------------------------------------	
	function PTLoadCauHoi()
	{				
		var url="Modules/KiemTra/bailam.php";
		var data={"madethi": madethi, "hovaten": tenhocsinh, "lop":lop};
		$('#bailam').load(url, data);
	}										
	//-------- LOAD -----------------------------------------------------------
	$(document).ready(function(e) 
	{							
		PTDuaVaoMaDeThi();								
		//--------BUTTON XAC NHAN -----------------------------------------------------------
		function PTXacNhan()
		{
			tenhocsinh= $('#txtten').val().trim();
			lop= $('#txtlop').val().trim();
			madethi= $('#txtmadethi').val().trim().toUpperCase();			
			if (tenhocsinh=="")
			{
				alert("Vui lòng nhập tên của học sinh");
				return;
			}			
			if (lop=="")
			{
				alert("Vui lòng nhập lớp của mình");
				return;
			}		
			if (PTKiemTraMaDeThi(madethi)==false)
			{
				alert("MÃ ĐỀ THI KHÔNG HỢP LỆ HOẶC ĐANG BỊ KHÓA, VUI LÒNG KIỂM TRA LẠI!");
				return;
			}
			
			$('#logo-hinhanh').hide();
			$('#xacnhanthongtin').hide();
			var thongtinhs= "Tên học sinh: <b>"+tenhocsinh+"</b>  -  Lớp: <b>"+lop+"</b>  -  Mã đề thi: <b>"+madethi+"</b>";			
			$('#thongtinhocsinh').html(thongtinhs);						
			PTLoadCauHoi();			
		}
		//--------------- BUTTON XAC NHAN ------------------------------------------		
		$('#btnxacnhan').click(function(e) {
			PTXacNhan();			
		});						
		// ---------------- 
		 $('#txtmadethi').keydown(function(e) {
            if (e.keyCode==13)
				PTXacNhan();	
        });
						
	});
//-------------------------------------------------------------------
</script>

<div id="goiy">
        <marquee width="100%" direction="left" onmouseover="this.stop()" onmouseout="this.start()" Scrollamount="7" loop="2" style="font-style:italic; color:#0E5F0C;"> 
        Các em học sinh hãy đọc đề cẩn thận trước khi làm bài. Câu nào làm không được thì bấm bỏ qua, sau đó quay lại để làm lại. Nhấn double click (click nhanh 2 lần) để vừa chọn và qua câu tiếp theo. Để biết câu nào chưa làm hãy bấm nạp bài, máy sẽ chuyển đến câu chưa làm gần nhất. Nhấn "phím Ctrl" + "phím -" để thu nhỏ màn hình hoặc nhấn "phím Ctrl" + "phím +" để phóng to màn hình. Chúc các em làm bài tốt!
        </marquee>
    </div>   
<div id="logo">
	<img id="logo-hinhanh" src="Images/multiple-choice.png" />
</div>
<div id="xacnhanthongtin" style="margin-left: 170px;">
    <table width="800" border="0">
      <tr>
        <td width="121" height="44">Tên học sinh: </td>
        <td width="669">        	
            <input class="textbox" type="text" name="txtten" id="txtten" size="40px" placeholder=" Nhập tên...">
        </td>
      </tr>
      <tr>
        <td height="44">Lớp:</td>
        <td>
            <input type="text" class="textbox"  name="txtlop" id="txtlop" size="15px" placeholder= " Nhập lớp..." >
        </td>
      </tr>
      <tr>
        <td height="44">Mã đề thi:</td>
        <td>
        <?php		
		if (isset($_GET['madt']))
		{			
			?>
            <input class="textbox" type="text" name="txtmadethi" id="txtmadethi" size="15px" value="<?php echo $_GET['madt'];?>" >
            <?php
		}
		else
		{
		?>
            <input class="textbox" type="text" name="txtmadethi" id="txtmadethi" size="15px" placeholder= " Nhập mã đề thi..." >
            <?php
		}
		?>           
        </td>
      </tr>
      <tr>
        <td height="44"></td>
        <td>
            <input class="button" type="button" name="btnxacnhan" id="btnxacnhan" value="   Xác nhận   ">
        </td>
      </tr>	  
  </table>     
</div>

<div id="bailam">

	<!--BAL LAM TRAC NGHIEM-->
     
</div>
