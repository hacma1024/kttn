<?php
	mysqli_set_charset($con, "utf8");
	$q= $_SESSION["quyen"];
	$mand= $_SESSION["mand"];
	$sql="select dt.* from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' order by dt.id desc";
	if ($q==1)
		$sql="select * from tbldethi order by id desc";
	$dethi_cd= mysqli_query($con,$sql);
	$id= 0;
	if (isset($_GET["id"]))
		$id= $_GET["id"];	
	$sql="select d.id, d.hoten, d.lop, d.diem, d.madethi, d.thoigian, d.thoigianlambai, d.lichsu, dt.socauhoi from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi where d.id= $id";	
	$diem= mysqli_query($con,$sql);
	$dong_d= mysqli_fetch_assoc($diem);
	$socauhoi= $dong_d["socauhoi"];
	$socaudung= round(($dong_d["diem"]*$socauhoi)/10);
	
	$sql_diem="select * from tbldiem";
	$diem= mysqli_query($con,$sql_diem);
?>
<script type="text/javascript" language="javascript">
var diem= new Array();
	var madethi= new Array();
	var namhoc= new Array();
	
	function PTLoadChuDe(lop)
	{
		var url="Modules/Diem/ajax.php";
		// DATA 1 la load lop
		var data={"method": 1, "lop": lop};
		$('#chude').load(url, data);
	}		
	function PTLoadDanhSachHS(me, ma,nh)
	{
		var url="Modules/Diem/ajax.php";
		// DATA 2 la load ds hoc sinh theo madethi
		var data={"method": me, "madethi": ma,"namhoc":nh};
		$('#ds-hocsinh').load(url, data);
	}		
	function PTTimNamHoc()
	{
		var kq="";
		var d= new Date();		
		if ((d.getMonth()+1)>=9)
			kq=d.getFullYear()+"-"+(d.getFullYear()+1);
		else
			kq= (d.getFullYear()-1)+"-"+(d.getFullYear());
		return kq;
	}
	
	function PTLayDuLieuThongke()
	{		
		var d=0; var madt="",nam="";	
		<?php
		while ($dong= mysqli_fetch_assoc($diem))
		{
			?>
			d= "<?php echo $dong['diem'];?>"; diem.push(d);
			madt="<?php echo $dong['madethi'];?>"; madethi.push(madt);
			nam="<?php echo $dong['namhoc'];?>"; namhoc .push(nam);
			<?php
		}
		?>
	}
	//---------------------------------------------------------------
$(document).ready(function(e) {
   
	$('#bieudo').hide();
    $('#btnthoat').click(function(e)
	{	// THOAT
        var kq= confirm("Bạn có muốn thoát không?");		
		if (kq==true)
			window.location="index.php";
    });	
	
	$('#btnthongke').click(function(e) {
		var madt="", nam="";
		madt=$('#list-chude :selected').val();
		nam= $('#list-namhoc :selected').val();
		$('#bieudo').show();	
        PTHienThiBD(madt, nam);
    });				
		
	
	$('#btnxem').click(function(e) {
        var ma= $('#list-chude').val();		
		var nh= $('#list-namhoc').val();		
		PTLoadDanhSachHS(2,ma,nh); //method 2
    });
	
	$('#btnlop').click(function(e) {
		var lop= $('#list-lop').val();			
        PTLoadChuDe(lop);
    });
	
	$('#btnall').click(function(e) {
       var url="Modules/Diem/ajax.php";
		// DATA 2 la load lop
		var data={"method": 2};
		$('#ds-hocsinh').load(url, data);
    });
	
	$('#btnxoa').click(function(e) {       
  		var ma= $('#list-chude').val();	
		var nh= $('#list-namhoc').val();	
		var nd= $('#list-chude :selected').text();	
		var kq= confirm("Bạn có muốn xóa đề thi "+nd+" không?");	    
		if (kq==true) 
			PTLoadDanhSachHS(3,ma,nh); //method 3					
    });		
});
window.onload= PTLayDuLieuThongke();
</script>

<form action="Modules/Diem/xuli.php" method="post">
<div id="left-loaitin" style="width: 35%;">
  <table class="table-them" width="496" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="42" colspan="2"><div align="center"><strong>QUẢN LÍ ĐIỂM</strong></div></td>
    </tr>
    <tr>
      <td width="80" height="44" >Lớp:</td>
      <td width="416">
      <select name="list-lop" id="list-lop">
        <option selected="selected" value="6" > 6 </option> 
        <option value="7">  7 </option>  
        <option value="8">  8 </option>   
        <option value="9">  9 </option>                                          
      </select>
      &nbsp;&nbsp;&nbsp;<input class="button" type="button" name="btnlop" id="btnlop" value="   Tìm   "> 
      </td>
    </tr>
    <tr>
      <td height="63" >Chủ đề</td>
      <td>
      <div id="chude" style="width: 100%;">
      	<select name="list-chude" id="list-chude">
        <option value=0> ---------------------  Chọn  --------------------- </option> 
		<?php
          while ($dong= mysqli_fetch_assoc($dethi_cd))
          {
        ?>
              <option value="<?php echo $dong['madethi']?>"  > <?php echo "Lớp ".$dong['lop']." - ".$dong['madethi']." - ".$dong['chude']?> </option> 
        <?php
          }
        ?>  
        </select>
      </div>  
      </td>
    </tr>
    <tr>
      <td height="63" >Năm học: </td>
      <td>
      <select name="list-namhoc" id="list-namhoc">
          <option value="0" selected="selected"> ------  Chọn  ------ </option>         
          <option value="2023-2024"> 2023 - 2024 </option>
          <option value="2017-2018" > 2024 - 2025 </option>
          <option value="2018-2019"> 2025 - 2026 </option>
        </select>
      </td>
    </tr>
    <tr>      
      <td height="74" colspan="2">       
        <div align="center">
          <input class="button" type="button" name="btnxem" id="btnxem" value="  XEM  ">          
          <input class="button" type="button" name="btnall" id="btnall" value="  TẤT CẢ  ">           
          <input class="button" type="button" name="btnxoa" id="btnxoa" value="  XÓA  " />           
          <input class="button" type="button" name="btnthongke" id="btnthongke" value="  THỐNG KÊ  " />         
          <input class="button" type="button" name="btnthoat" id="btnthoat" value="  THOÁT  " />
        </div>
        </td>
    </tr>
    <tr>
      <td height="74" colspan="2">
      <div style="width: 100%; font-weight: bold; text-align: center; color: #B00000; display: none; margin-bottom: 10px; margin-top: 30px; font-family: 'Times New Roman'; " id="title"> BIỂU ĐỒ ĐIỂM HỌC SINH </div>  
      	<div style="float: left; width: 100px; font-weight: bold; margin-top: 30px; margin-bottom: -30px; margin-left: 30px; display: none;" id="coty"> Số lượng HS </div>
        <canvas id="bieudo" width="420" height="400" style="margin-top: 50px; margin-left: 20px;"></canvas> 
        <div style="float: right; width: 150px; font-weight: bold; margin-top: 5px; margin-bottom: 30px; display: none;" id="cotx"> Điểm </div>
      </td>
    </tr>
    <tr>
      <td height="44" colspan="2"><div style="text-align:center; color:#BD0909; font-weight: bold; font-size: 20px;">Kết quả làm bài:</div></td>
    </tr>
    <tr>
      <td colspan="2">
      <p style="margin: 10px;  line-height: 25px; color:#BD0909; font-family: Times New Roman; font-size: 20px; border: solid 1px #BD0909; padding: 10px; width: 90%;"> 
      	- Họ và tên: <?php echo $dong_d["hoten"]?> <br />
        - Lớp: <?php echo $dong_d["lop"]?> <br />
        - Điểm: <?php echo $dong_d["diem"]?> <br />
        - Mã đề thi: <?php echo $dong_d["madethi"]?> <br />
        - Ngày thi: <?php echo $dong_d["thoigian"]?> <br />
        - Thời gian: <?php echo $dong_d["thoigianlambai"]?> <br />
      </p>
       <div id="txtketqua" cols="25" rows="20" style="font-size:14px; color: #0000C6; margin-left: 10px; line-height: 30px; width: 100%;">
        	<?php echo $dong_d["lichsu"]?>
            <p style="font-size: 24px; margin: 10px; border: solid 1px #0000C6; text-align: center; padding: 10px; font-weight: bold;"> Tổng số: <?php echo $socaudung." / ".$socauhoi?></p>
       </div>
        </td>
    </tr>   
  </table>
<?php 
	include("Modules/functions.php");
	PTInTrangThai();
?> 
</div>

</form>

<script type="text/javascript">
	function PTHienThiBD(madt, nam)
	{
		$('#cotx').show();
		$('#coty').show();
		$('#title').show();
		var d1=0, d2= 0, d3= 0, d4= 0;
		if ((madt==0)&&(nam==0))
		{
			for (var i=0; i<diem.length; i++)							
				  if (diem[i] >=8) d4++;
				  else
					  if (diem[i]>= 6.5) d3++;
					  else
						  if (diem[i]>=5) d2++;
						  else
							  d1++;				
		}
		else
		{
			for (var i=0; i<diem.length; i++)			
				if ((madethi[i]==madt)&&(namhoc[i]==nam))
				{
				  if (diem[i] >=8) d4++;
				  else
					  if (diem[i]>= 6.5) d3++;
					  else
						  if (diem[i]>=5) d2++;
						  else
							  d1++;
				}
							
		}				
		// bar chart data
		var barData = 
		{
			labels : ["[0 - 5)", "[5 - 6.5)","[6.5 - 8)","[8 - 10]"],
			title:{
			text: "Olympic Medals of all Times (till 2012 Olympics)"
		  },		
			datasets : 
			[
			  {
				  fillColor : "#005CCE",
				  strokeColor : "#48A4D1",
				  data : [d1,d2,d3,d4,]
			  }
			]
		}
		
		// get bar chart canvas
		var bd = document.getElementById("bieudo").getContext("2d");
		
		// draw bar chart
		new Chart(bd).Bar(barData);
	}
</script>