<?php
	include("Modules/functions.php");
	$tk=""; $dang="diemhs";
	if (isset($_GET["stk"]))		$tk= $_GET["stk"];
	if (isset($_GET["d"]))	$dang= $_GET["d"];
	$sqlmon="select * from tblmon";
	$mon= mysqli_query($con, $sqlmon);
?>
<script language="javascript" type="text/javascript">
  function PTTimKiem(stk, dang, mon)
  {		 
	 if ((stk!="")&&(dang=="baihoc"))
	 {
		 window.location="index.php?xem=loaitin&id="+mon+"&lop=0&stk="+stk;
		 return;
	 }
	 if ((stk!="")&&(dang=="diemhs"))
	 {
		 window.location="index.php?xem=timkiem&d="+dang+"&stk="+stk;
		 return;
	 }
	 if ((stk!="")&&(dang=="dekt"))
	 {
		 window.location="index.php?xem=timkiem&mon="+mon+"&d="+dang+"&stk="+stk;
		 return;
	 }
  }	 

$(document).ready(function(e) {
	 // danh dau DANG
	 var dang= "<?php echo $dang;?>"; var mon=0;	 var stk="";
	 switch (dang)
	 {
		 case "baihoc":
			 $('#rdbaihoc').prop("checked",true);
			 $('#xmon').show();		
		 break;
		 case "dekt":
			 $('#rddekiemtra').prop("checked",true);
		  	 $('#xmon').show();		
		 break;
		 default: 
		 $('#rddiemhs').prop("checked",true);
		 $('#xmon').hide();	
		 break;
	 }	
	 //---------------------
	 $('#xbaihoc').click(function(e) {		 
         $('#rdbaihoc').prop("checked",true);
		 dang="baihoc";
		 $('#xmon').show();		 
    });
	
	$('#xdekiemtra').click(function(e) {
         $('#rddekiemtra').prop("checked",true);
		 dang="dekt";
		 $('#xmon').show();
    });
	
	$('#xdiemhs').click(function(e) {
         $('#rddiemhs').prop("checked",true);
		 dang="diemhs";
		 $('#xmon').hide();
		 $("#list-mon option[value=0]").prop('selected', true);
    });
	 
	 $('#txttimkiem').keydown(function(e) {		
		if (e.keyCode==13)
		{
			mon= $('#list-mon option:selected').val();
			stk= $('#txttimkiem').val();	
			if ((dang!="diemhs")&&(mon==0))			
			{
				alert("BẠN CHƯA CHỌN MÔN HỌC! VUI LÒNG KIỂM TRA LẠI");
				return false;	
			}				
			PTTimKiem(stk,dang,mon);
		}
	});	 	
	
	$('#txttimkiem').click(function(e) {
		$(this).val("");
	});				 
});

	
</script>

<div style="width: 80%; height: auto; float: left; padding-left: 180px; padding-top: 50px;">
  <div class="thanhtimkiem" style="width: 200px; height: 200px; float: left;">
  	<img src="Images/2timkiem.png" height="150" width="150" />
  </div>    
   <a href="#">
   <div id="xdiemhs"  class="rdtimkiem-css">
       <input type="radio" id="rddiemhs" name="rdtimkiem" checked="checked" value="1" /> Điểm học sinh
   </div>  
   </a>
   <a href="#">
   <div id="xbaihoc"  class="rdtimkiem-css">
       <input type="radio" id="rdbaihoc" name="rdtimkiem" checked="checked" value="1" /> Bài học
   </div>  
   </a>
   <a href="#">                                                  
  <div id="xdekiemtra" class="rdtimkiem-css"> 
      <input type="radio" id="rddekiemtra" name="rdtimkiem" value="3" /> Đề kiểm tra 
  </div> </a>  
  <div id="xmon" class="rdtimkiem-css" style="display:none;">
  Môn:   
  <select name="list-mon" id="list-mon" style="padding: 3px; font-size: 18px;">
        <option value="0" > -- Chọn -- </option> 
        <?php
			while ($dong2=mysqli_fetch_assoc($mon))
			{
				?>
                 <option value="<?php echo $dong2['id'];?>"> <?php echo $dong2['mon']; ?> </option>   
                <?php
			}
		?>                                     
      </select>
  </div>
  
  
  <br />
  <div id="texttimkiem" style="float: left;">
  	<input type="text" class="textbox" name="txttimkiem" id="txttimkiem"  size="40px" placeholder=" Nhập tên nội dung tìm kiếm..." style="padding: 10px; font-size: 25px; margin-top: 30px;"/>   
  </div>                	                                                        
</div>
<div class="clear">
</div>

<?php	
	if (($tk!="")&&($dang=="diemhs"))	// tim kiem theo DIEM HS
	{
		$namhoc= PTTimNamHoc();
		$tk= $_GET["stk"];	
	  	$sql="select d.* from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi where d.hoten like '%$tk%' and namhoc='$namhoc' order by d.id desc"; 		
		$diem= mysqli_query($con,$sql);
		$sodong= mysqli_num_rows($diem);
		if ($sodong > 0)
		{
?>
<div class="tieude-bang" style="float: left; width: 95%; text-align:center; font-family: Times New Roman;	font-weight: bold; font-size: 22px;	width: 95%; margin-bottom: 20px;"> DANH SÁCH ĐIỂM HỌC SINH </div>
<div id="ds-hocsinh" style="margin-top: 60px;">
  <blockquote>&nbsp;</blockquote>
  <table class="table" width="1173" border="1" cellspacing="0" cellpadding="0" style="font-family: Tahoma;">   
    <tr>
      <td width="73" height="36" ><div align="center"><strong>STT</strong></div></td>
      <td width="289"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
      <td width="81"><div align="center"><strong>ĐIỂM</strong></div></td>
      <td width="78"><div align="center"><strong>LỚP</strong></div></td>
      <td width="138"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
      <td width="189"><div align="center"><strong>NGÀY</strong></div></td>
      <td width="123"><div align="center"><strong>THỜI GIAN<br />
      </strong></div></td>
      <td width="184"><div align="center"><strong>MÃ XEM LẠI</strong></div></td>
    </tr>
    <?php
		$so=1;
  		while($dong=mysqli_fetch_assoc($diem))
		{	
			if ($so%2==1)
			{												
	?>
    			<tr style="background-color: #F3F3F3;">
    			   <td height="30" style=" text-align:center;"><?php echo $so?></td>
                    <td><?php echo $dong['hoten']?></td>
                    <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                    <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                    <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                    <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>
                    <td style=" text-align:center;"><?php echo $dong['thoigianlambai']?></td>
                    <td style=" text-align:center;"><?php echo $dong['maxemlai']?></td>
                  </tr>  
				<?php					
			}
			else
			{								
				?>
			  <tr>
				 <td height="30" style=" text-align:center;"><?php echo $so?></td>
				<td><?php echo $dong['hoten']?></td>
				<td style=" text-align:center;"><?php echo $dong['diem']?></td>
				<td style=" text-align:center;"><?php echo $dong['lop']?></td>
				<td style=" text-align:center;"><?php echo $dong['madethi']?></td>
				<td style=" text-align:center;"><?php echo $dong['thoigian']?></td>
				<td style=" text-align:center;"><?php echo $dong['thoigianlambai']?></td>
				<td style=" text-align:center;"><?php echo $dong['maxemlai']?></td>
			</tr> 
				<?php					
			}
		$so++;
		}
	?>
   
  </table>
          
  </div>	
            <?php
		}
		else
		{
			?>
            	<div class="tieude-bang" style=" height: 300px;"> KHÔNG TÌM THẤY HỌC SINH VỪA NHẬP, VUI LÒNG KIỂM TRA LẠI! </div>
            <?php
		}
	}	
	//==============================================
	if (($tk!="")&&($dang=="dekt"))	// tim kiem theo DE KIEM TRA
	{		
		$namhoc= PTTimNamHoc();
		$tk= $_GET["stk"];	$mon= $_GET['mon'];
	  	$sql="select dt.madethi, dt.chude, m.mon, dt.lop, dt.trangthai from tbldethi dt inner join tblmon m on m.id= dt.mon where dt.mon='$mon' and chude like '%$tk%' order by dt.id desc"; 		
		$diem= mysqli_query($con,$sql);
		$sodong= mysqli_num_rows($diem);		
		if ($sodong > 0)
		{
			?>
<div class="tieude-bang" style="float: left; width: 95%; text-align:center; font-family: Times New Roman;	font-weight: bold; font-size: 22px;	width: 95%; margin-bottom: 20px;"> DANH SÁCH CÁC ĐỀ KIỂM TRA </div>
<div id="ds-hocsinh" style="margin-top: 60px; margin-left:120px;">
  <blockquote>&nbsp;</blockquote>
  <table class="table" width="943" border="1" cellspacing="0" cellpadding="0" style="font-family: Tahoma;">   
    <tr>
      <td width="59" height="36" ><div align="center"><strong>STT</strong></div></td>
      <td width="117"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
      <td width="292"><div align="center"><strong>CHỦ ĐỀ</strong></div></td>
      <td width="102"><div align="center"><strong>MÔN</strong></div></td>
      <td width="111"><div align="center"><strong>LỚP</strong></div></td>
      <td width="142"><div align="center"><strong>TRẠNG THÁI</strong></div></td>
      <td width="104"><div align="center"><strong>LÀM BÀI</strong></div></td>
    </tr>
    <?php
		$so=1;
  		while($dong=mysqli_fetch_assoc($diem))
		{	
			if ($so%2==1)
			{												
	?>
    			<tr style="background-color: #F3F3F3;">
    			   <td height="30" style=" text-align:center;"><?php echo $so?></td>
                    <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                    <td style=" text-align: justify;"><?php echo $dong['chude']?></td>
                    <td style=" text-align:center;"><?php echo $dong['mon']?></td>
                    <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                    <td style=" text-align:center;"><?php echo PTTimTrangThai($dong['trangthai'])?></td>
                    <td style=" text-align:center;">
                    	<a href="index.php?xem=kiemtra&madt=<?php echo $dong['madethi']?>"> 
                        	<img src="Images/tick.png" />
                        </a>
                    </td>
                  </tr>  
				<?php					
			}
			else
			{								
				?>
			  <tr>
    			   <td height="30" style=" text-align:center;"><?php echo $so?></td>
                    <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                    <td style=" text-align: justify;"><?php echo $dong['chude']?></td>
                    <td style=" text-align:center;"><?php echo $dong['mon']?></td>
                    <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                    <td style=" text-align:center;"><?php echo PTTimTrangThai($dong['trangthai'])?></td>
                    <td style=" text-align:center;">
                    	<a href="index.php?xem=kiemtra&madt=<?php echo $dong['madethi']?>"> 
                        	<img src="Images/tick.png" />
                        </a>
                    </td>
                  </tr>  
				<?php					
			}
		$so++;
		}
	?>
   
  </table>
          
  </div>	
            <?php
		}
		else
		{
			?>
            	<div class="tieude-bang" style=" height: 300px;"> KHÔNG TÌM THẤY ĐỀ THI VỪA NHẬP, VUI LÒNG KIỂM TRA LẠI! </div>
            <?php
		}
	}
?>
