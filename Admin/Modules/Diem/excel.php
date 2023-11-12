<?php  // PHP BAN DAU PHAI VIET SAT VAO LE. KO DUOC DE KI TU TRONG. KO LA NO KO THE CHUYEN TRANG BANG HEADER DUOC
 	 ob_start();
    include("../config.php");	  
 	$madt= $_GET["madethi"]; 	
	$namhoc= $_GET["namhoc"]; 
	$madt_ten= $_GET["madethi_ten"]; 	
	$namhoc_ten= strtoupper($_GET["namhoc_ten"]); 
	$sql="select * from tbldiem where madethi='$madt' and namhoc='$namhoc' order by id desc";
	if (($madt==0)&&($namhoc==0))
		$sql="select * from tbldiem order by id desc";	
	$diem= mysqli_query($con,$sql);
	$sodong= mysqli_num_rows($diem);
	$xuat='';	$sott=0;	
	$xuat=' 	
		  <table width="1051" border="1" cellspacing="0" cellpadding="0" style="font-family: Tahoma;">   
		  <tr >
			   <td height="40" colspan="9" style="text-align: center; font-weight: bold; font-size: 18px;"> DANH SÁCH ĐIỂM HỌC SINH - '.$madt_ten.' - NH: '.$namhoc_ten.'</td>
		  </tr>
		  <tr height="30" style="font-size: 16px; font-weight: bold; text-align: center;">     
				<td width="51" >STT</td>
				<td width="56" >ID</td>
				<td width="246">HỌ VÀ TÊN</td>
				<td width="59">ĐIỂM</td>
				<td width="60">LỚP</td>
				<td width="110">MÃ ĐỀ THI</td>
				<td width="178">DATE</td>
				<td width="82">WTIME </td>
				<td width="160">MXL</td>         
			  </tr>	  		
	';
	if (($madt==0)&&($namhoc==0))
	{
		$xuat=' 	
			  <table width="1051" border="1" cellspacing="0" cellpadding="0" style="font-family: Tahoma;">   
			  <tr >
				   <td height="40" colspan="9" style="text-align: center; font-weight: bold; font-size: 18px;"> DANH SÁCH ĐIỂM TẤT CẢ HỌC SINH </td>
			  </tr>
			  <tr height="30" style="font-size: 16px; font-weight: bold; text-align: center;">     
				<td width="51" >STT</td>
				<td width="56" >ID</td>
				<td width="246">HỌ VÀ TÊN</td>
				<td width="70">ĐIỂM</td>
				<td width="70">LỚP</td>
				<td width="110">MÃ ĐỀ THI</td>
				<td width="178">DATE</td>
				<td width="82">WTIME </td>
				<td width="160">MXL</td>         
			  </tr>	  		
			  ';
	}
	
	while ($dong= mysqli_fetch_assoc($diem))
	{
		$sott++;
		$xuat.='
		 <tr  height="30" style=" text-align:center; font-size: 14px;">
					 <td>'.$sott.'  </td>
					 <td>'.$dong["id"].'</td>
					 <td style=" text-align:left;">'.$dong["hoten"].'</td>                  
                    <td >'.$dong["diem"].'</td>
                    <td>- '.$dong["lop"].' - </td>
                    <td>'.$dong["madethi"].'</td>
                    <td>'.$dong["thoigian"].'</td>
                    <td>'.$dong["thoigianlambai"].'</td>
                    <td>-  '.$dong["maxemlai"].'  -</td>    
	     </tr>  
		';
	}
	$xuat.='</table>';	
	header('Content-Encoding: UTF-8');	
	header('Content-Type: application/xls; charset=UTF-8');	
	header('Content-Disposition: attachment; filename=DiemHS.xls');	
	echo "\xEF\xBB\xBF";
	echo $xuat; 	
	exit();
?>  