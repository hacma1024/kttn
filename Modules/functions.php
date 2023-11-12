<?php 	   
   // PT TIM THU TRONG TUAN
	function PTTimThu($thu)
	{
		$kq=0;
		switch ($thu)
		{
		  case 1: $kq="Thứ hai";
		  	break;
		  case 2: $kq="Thứ ba";
		  	break;
		  case 3: $kq="Thứ tư";
		  	break;
		  case 4: $kq="Thứ năm";
		  	break;
		  case 5: $kq="Thứ sáu";
		  	break;
		  case 6: $kq="Thứ bảy";
		  	break;
		  default: $kq = "Chủ nhật";
        	break;		  
		}
		return $kq;
	}	
	
	function PTTimNamHoc()
	{		
		$now= getdate();
		$nam= $now["year"]; $thang=$now["mon"]; $namhoc="";
		if ($thang >= 8) $namhoc=$nam."-".($nam+1);
		else
			$namhoc=($nam-1)."-".$nam;
		return $namhoc;
	}

	//	PT TIM NGAY THANG

	function PTngayThang()
	{
		$kq="";
		$time=getdate();
		$d=$time["mday"];
		$m=$time["mon"];
		$y=$time["year"];	
		$h=$time["hours"];
		$mn=$time["minutes"];
		$wday=$time["wday"];
		$kq= PTTimThu($wday).", ngày ".$d."/".$m."/".$y." | ".$h.":".$mn;
		return $kq;
	}

//------------------------------------------------------
	function PTTimTrangThai($tt)
	{
		$kq="Không";
		if ($tt==1)
			$kq="Sử dụng";
		return $kq;
	}
	
	function PTDoiGioiTinh($gt)
	{
		$kq="Nam";
		if ($gt==0)
			$kq="Nữ";
		return $kq;
	}		
	//------------------------------------------------------
	function PTCoKhong($xem)
	{
		$kq="Không";
		if ($xem==1)
			$kq="Có";
		return $kq;
	}	
	function PTTimMucDo($ma)
	{
		$kq="";
		switch ($ma)
		{
			case 1: $kq="Dễ";
			break;
			case 2: $kq="Vừa";
			break;
			case 3: $kq="Khó";
			break;
			default: $kq="Lỗi";
			break;
		}		
		return $kq	;
	}
	
	function PTHienThiXao($s)
	{
		$kq="";
		switch ($s)
		{
			case 1: $kq="Ok";
			break;
			case 0: $kq="No";
			break;			
			default: $kq="Lỗi";
			break;
		}		
		return $kq	;
	}	
	
	function PTHienThiTT($s)
	{
		$kq="";
		switch ($s)
		{
			case 1: $kq="Ok";
			break;
			case 0: $kq="No";
			break;			
			default: $kq="Lỗi";
			break;
		}		
		return $kq	;
	}	
	
	function PTHienThiDang($d)
	{
		$kq="";
		switch ($d)
		{
			case 1: $kq="T Ng";
			break;
			case 2: $kq="T Ln";
			break;			
			default: $kq="Lỗi";
			break;
		}		
		return $kq	;
	}	
	
	// PT Chon Anh Trong
	function PTChonAnh($dcanh)
	{
		if ($dcanh!="") 									
    		echo "<img src='".$dcanh."' height='200' width='160' />";        							
		else													
        	echo "<img src='Images/no-image.jpg' height='200' width='160' />";		 					   
	}
	
	//PT DINH DANG TOM TAT
	function PTDinhDangXau($tomtat,$dodai)
	{				
		$d= strlen($tomtat); 
		$kq=$tomtat;
		if ($d<$dodai)
			return $kq;
		for ($i=$dodai; $i<$d; $i++ )
		{
			if ($tomtat[$i]==" ")
				{
					$kq=substr($tomtat,0,$i)."...";			
					return $kq;
				}
		}
		return $kq;
	}		 

?>