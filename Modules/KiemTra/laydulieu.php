<?php		
	$socauhoi= $dong_dt['socauhoi'];	
	$tieude= "BÀI ".$dong_dt['chude']." - ".$dong_dt['mon']." - L".$dong_dt['lop']." - TG: ".$dong_dt['thoigian']."'";		
		
	$sql="select * from tblcauhoi where madethi='$madt' and trangthai=1 order by id desc limit ".$socauhoi;	
	$cauhoi= mysqli_query($con,$sql);
	$sodong= mysqli_num_rows($cauhoi);	
	if ($sodong < $socauhoi)
	{
		echo "ĐỀ KIỂM TRA CHƯA HOÀN THIỆN VỀ SỐ CÂU HỎI! VUI LÒNG KIỂM TRA LẠI!";
		exit();
	}
		
?>
<script type="text/javascript" language="javascript">
	//-------------------------------------------------------------------
	var tencauhoi=new Array();
	var dapan1= new Array();	var dapan2= new Array();
	var dapan3= new Array();	var dapan4= new Array();
	var dapanlam= new Array();  var dangch= new Array();
	var dapandung= new Array();
	var chuthich= new Array();	
	var hinhanh= new Array();
	var xao= new Array();
	var cau= 0; var so= ""; var socauhoi=0; var sodong=0;	var dem= 0;	 var thongbao="";
	var time; var p= 0, g= 0; var hienthi="";	// phut giay va ket qua hien thi
	var tglambai=0, pkt=0; var ketqua=""; var socaudung= 0; var diem=0; 
	//-------------------------------------------------------------------
	//XOA CAC KI TU TRONG DU THUA
	function trimSpace(str)
	{    	
    	return str.replace(/(?:(?:^|\n)\s+|\s+(?:$|\n))/g,"").replace(/\s+/g," ");
	}
	function PTTronCauHoi()
	{
		var ten=""; var da1=""; var da2=""; var da3=""; var da4="";
		var dalam=""; var dadung=""; var ha=""; var x= 0; var ct="";
		var ran= 0; var dang= 0;
		for (var i=0; i<socauhoi; i++)
		{
			ran= Math.floor(Math.random()*socauhoi);			
			ten= tencauhoi[ran];
			da1= dapan1[ran];
			da2= dapan2[ran];
			da3= dapan3[ran];
			da4= dapan4[ran];
			dadung= dapandung[ran];
			ct= chuthich[ran];
			dalam= dapanlam[ran];
			ha= hinhanh[ran];
			x=xao[ran];
			dang= dangch[ran];
			
			tencauhoi[ran] = tencauhoi[socauhoi-1];
			dapan1[ran] = dapan1[socauhoi-1];
			dapan2[ran]= dapan2[socauhoi-1];
			dapan3[ran]= dapan3[socauhoi-1];
			dapan4[ran]= dapan4[socauhoi-1];
			dapandung[ran]= dapandung[socauhoi-1];
			chuthich[ran]= chuthich[socauhoi-1];
			dapanlam[ran]= dapanlam[socauhoi-1];
			hinhanh[ran]= hinhanh[socauhoi-1];
			xao[ran]= xao[socauhoi-1];
			dangch[ran]= dangch[socauhoi-1];
			
			tencauhoi[socauhoi-1] = ten;
			dapan1[socauhoi-1] = da1;
			dapan2[socauhoi-1]= da2;
			dapan3[socauhoi-1]= da3;
			dapan4[socauhoi-1]= da4;
			dapandung[socauhoi-1]= dadung;
			chuthich[socauhoi-1]= ct;
			dapanlam[socauhoi-1]= dalam;
			hinhanh[socauhoi-1]= ha;
			xao[socauhoi-1]= x;
			dangch[socauhoi-1]= dang;
		}			
	}
	//--------------------------------------------------------------------
	function PTTronDapAn()
	{
		var da1=""; var da2=""; var da3=""; var da4="";		
		var ran= 0;
		for (var i=0; i<socauhoi; i++)
		  if ((xao[i]==1)&&(dangch[i]==1))		// cau TN moi xao dap an	  
			  for (var j=1; j<= 5; j++)
			  {
				  ran= Math.floor(Math.random()*4+1);				  
				  switch (ran)
				  {
					  case 1: 
					  	da1= dapan1[i];
						dapan1[i]= dapan4[i];
						dapan4[i]= da1;						
						if (dapandung[i]==1)	dapandung[i]= 4;
						else
							if (dapandung[i]==4)	dapandung[i]= 1;
					  break;
					  
					  case 2: 
					  	da2= dapan2[i];
						dapan2[i]= dapan4[i];						
						dapan4[i]= da2; 
						if (dapandung[i]==2)	dapandung[i]= 4;
						else
							if (dapandung[i]==4)	dapandung[i]= 2;
					  break;
					  
					  case 3: 
					  	da3= dapan3[i];
						dapan3[i]= dapan4[i];												
						dapan4[i]= da3; 
						if (dapandung[i]==3)	dapandung[i]= 4;
						else
							if (dapandung[i]==4)	dapandung[i]= 3;						
					  break;					 
				  }				 
			  }			 			  		  
	}
	//--------------------------------------------------------------------	
	// lay du lieu cho bang cau hoi
	function PTDuaVaoCauHoi()
	{
		var ten=""; var da1=""; var da2=""; var da3=""; var da4="";
		var dalam="", dadung="", ha="", x=0;  var ct=""; dang=0;
		socauhoi= <?php echo $socauhoi?>;	// SO CAU HOI CUA DE THI		
		<?php 		
		while ($dong= mysqli_fetch_assoc($cauhoi))
		{
		?>
		  ten= "<?php echo $dong["cauhoi"]?>"; tencauhoi.push(ten);
		  da1= "<?php echo $dong["dapan1"]?>"; dapan1.push(da1);
		  da2= "<?php echo $dong["dapan2"]?>"; dapan2.push(da2);
		  da3= "<?php echo $dong["dapan3"]?>"; dapan3.push(da3);
		  da4= "<?php echo $dong["dapan4"]?>"; dapan4.push(da4);
		  dalam= 0;	dapanlam.push(dalam);
		  dadung= "<?php echo $dong['dapandung']?>"; dapandung.push(dadung);
		  ct= "<?php echo $dong['chuthich']?>"; chuthich.push(ct);	
		  ha="<?php echo $dong["hinhanh"]?>"; hinhanh.push(ha);			 	
		  dang=<?php echo $dong['dangch']?>; dangch.push(dang);	
		  x=<?php echo $dong['xao']?>;	
		  if (dang==2)
		  	x= 0;
		  xao.push(x); 		 
		<?php 
		}
		?>								
		
		PTTronCauHoi();	
		PTTronDapAn();				
	}	
	//--------------------------------------------------------------------		
	function PTDatGiaTriRadio(tt)
	{
		$('#rdcauhoi1').prop("checked",tt);
		$('#rdcauhoi2').prop("checked",tt);
		$('#rdcauhoi3').prop("checked",tt);
		$('#rdcauhoi4').prop("checked",tt);
		if (!tt)
		{
			$('txtdapantuluan').text("");
		}
	}	
		
	//--------------------- PT LAY DE THI -------------------
	function PTDanhDau(cau)		
	{
		$('#dapan1').css('background-color','#FFF');
		$('#dapan2').css('background-color','#FFF');
		$('#dapan3').css('background-color','#FFF');
		$('#dapan4').css('background-color','#FFF');
		$('#dapan1').css('border','none');
		$('#dapan2').css('border','none');
		$('#dapan3').css('border','none');
		$('#dapan4').css('border','none');	
		
		switch (cau)
		{
			case 1:
				$('#dapan1').css('border','solid 1px #9E9E9E');
				$('#dapan1').css('background-color','#F0FFFD');				
			break;
			case 2:
				$('#dapan2').css('border','solid 1px #9E9E9E');
				$('#dapan2').css('background-color','#F0FFFD');			
			break;
			case 3:
				$('#dapan3').css('border','solid 1px #9E9E9E');
				$('#dapan3').css('background-color','#F0FFFD');				
			break;
			case 4:
				$('#dapan4').css('border','solid 1px #9E9E9E');
				$('#dapan4').css('background-color','#F0FFFD');							
			break;				
		}
	}
	//===============================================================
	function PTHienDapAn(cau)
	{					
		if(dapandung[cau]==1)
		{
			$('#dapan1').css('border','solid 1px #800000');
			$('#dapan1').css('background-color','#FFFA24');
		}
		if(dapandung[cau]==2)
		{
			$('#dapan2').css('border','solid 1px #800000');
			$('#dapan2').css('background-color','#FFFA24');
		}
		if(dapandung[cau]==3)
		{
			$('#dapan3').css('border','solid 1px #800000');
			$('#dapan3').css('background-color','#FFFA24');
		}
		if(dapandung[cau]==4)
		{
			$('#dapan4').css('border','solid 1px #800000');
			$('#dapan4').css('background-color','#FFFA24');	
		}
		
	}
	//===============================================================
	function PTHienThiCauHoi(causo)
	{		
		var so=""; 		
		if (causo < 9)	
				so="0"+(causo + 1);
			else
				so= causo + 1;
		var ch= "Câu số "+so+": "+tencauhoi[causo];									
		if (hinhanh[causo]!="")		
			$('#ch-hinhanh').html("<i>(Đáp án chọn ở phía dưới)</i></br><img src='"+hinhanh[causo]+"' />");					
		else
			$('#ch-hinhanh').html("");
		$('#lbcauhoi').html(ch);
		if (dangch[causo]==1)
		{
			$('#dapan12').show();
			$('#dapan34').show();
			$('#dapantuluan').hide();
		}
		if (dangch[causo]==2)
		{
			$('#dapan12').hide();
			$('#dapan34').hide();
			$('#dapantuluan').show();
		}
		$('#lbdapan1').text(dapan1[causo]);			
		$('#lbdapan2').text(dapan2[causo]);
		$('#lbdapan3').text(dapan3[causo]);
		$('#lbdapan4').text(dapan4[causo]);	
		$('#txtdapantuluan').val(trimSpace(dapan2[causo]));	
		// dap an dung cua tu luan la 1, dap an lam cua tu luan la 2		
		switch (dapanlam[cau])
		{
			case 1: $('#rdcauhoi1').prop("checked",true);
			PTDanhDau(1);
			break;
			case 2: $('#rdcauhoi2').prop("checked",true);
			PTDanhDau(2);
			break;
			case 3: $('#rdcauhoi3').prop("checked",true);
			PTDanhDau(3);
			break;
			case 4: $('#rdcauhoi4').prop("checked",true);
			PTDanhDau(4);
			break;
			default: PTDatGiaTriRadio(false);
			PTDanhDau(0);
			break;
		}	
	}
	//-------------------------------------------------------------------
	function PTLayDeThi()
	{
		$('#tieude').html("<?php echo $tieude?>");
		cau= 0;
		PTHienThiCauHoi(cau);
	}	
	//-------------------------------------------------------------------
	function PTTinhDiem()
	{
		diem=0; var caudung=0;
		var h= dapandung.length;
		for (var i=0; i<h; i++)		
		{
			if (dangch[i]==1)
			{
				if (dapandung[i]==dapanlam[i])
					caudung++;	
			}
			if (dangch[i]==2)
			{				
				if (dapan1[i].toLowerCase()==dapan2[i].toLowerCase())
					caudung++;	
			}
		}			
		socaudung= caudung;
		diem= (caudung*10/socauhoi).toFixed(2);		
	}
	//-------------------------------------------------------------------
	function PTTimDapAnLam(i, da)
	{
		var kq="";			
		if (da==1)		
			kq= dapan1[i];		
		if (da==2)	
			kq= dapan2[i];
		if (da==3)	
			kq= dapan3[i];
		if (da==4)	
			kq= dapan4[i];		
		return kq;								
	}
	//-------------------------------------------------------------------
	
	function PTTimHinhAnhCauHoi(ha)
	{
		var kq="", kq_x=""; var h=0;				
		if (ha!="../")
		{
			kq="<br> <img src=\""+ha+"\" style=\"height:200px; width:320px; margin-left: 220px; padding: 2px; border: 1px solid #cecece;\" /> ";
			h= kq.length;				
		}			
		kq_x= kq.substr(0,h-4);
		kq= kq_x;			
		if (kq!="") 
			kq+="<br>"
		return kq;
	}
	
	//-------------------------------------------------------------------
	function PTLuuDiem(hoten, lop, diem, madt, tglam, ketqua, maxemlai)
	{							
		var url="Modules/KiemTra/xuli.php";
		var data= {"ten": hoten, "lop":lop, "diem":diem, "madt":madt, "tglam":tglam, "ketqua":ketqua,"maxemlai":maxemlai};
		$('#test').load(url,data);			
	}			
	//-------------------------------------------------------------------
	function PTLuuKetQua()
	{
		ketqua="";
		var h= dapanlam.length; var kq="";
		var dachon="", dachinh="";
		for (var i=0; i<h; i++)		
		{		
			if (dangch[i]==1)
			{
				dachon= PTTimDapAnLam(i, dapanlam[i]);	
				dachinh= PTTimDapAnLam(i, dapandung[i]);				
				kq="&nbsp; &rArr; Sai | ĐA đúng: "+dachinh;
				if (dachon==dachinh)
					kq=" &nbsp; &rArr; Đúng";
				if (chuthich[i]!="")
					kq+=" (Gợi ý: "+ chuthich[i]+") ";
				ketqua+= "<b>* Câu "+(i+1)+": "+ tencauhoi[i]+" </b> "+PTTimHinhAnhCauHoi("../"+hinhanh[i])+" <br> - ĐA chọn: "+ dachon+" <span style= \" color:#E90106; \" >"+kq+"</span> <br>";
			}
			// dapan1 la dapan chinh; dapan2 la dapan lam	
			if (dangch[i]==2)										
			{				
				dachon= dapan2[i];	
				dachinh= dapan1[i];											
				kq="&nbsp; &rArr; Sai | "+dachinh;
				if (dachon.toLowerCase()==dachinh.toLowerCase())
					kq=" &nbsp; &rArr; Đúng";
				if (chuthich[i]!="")
					kq+=" (Gợi ý: "+ chuthich[i]+") ";
				ketqua+= "<b>* Câu "+(i+1)+": "+ tencauhoi[i]+" </b> "+PTTimHinhAnhCauHoi("../"+hinhanh[i])+" <br> - ĐA: "+dachon+" <span style= \" color:#E90106; \" >"+kq+"</span> <br>";
			}
		}			
	}
	//----------------------------------------------------------------
	function PTlamLai()
	{	
		var kq= confirm("Bạn có muốn làm lại BÀI KIỂM TRA không?");
		if (kq==true)			
			window.location="index.php?xem=kiemtra";	
	}						
		//----------------------------------------------------------------
	function PTNapBaiKT()
	{			
		PTTinhDiem();
		PTLuuKetQua();	// luu lich su bai lam
		thongbao="<i>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; Chúc mừng bạn đã hoàn thành bài tập của mình, chúc bạn đạt điểm cao!</i></br></br>";
		
		var ran= Math.floor(Math.random()*9);	
		switch (ran)
		{
			case 0: 
				thongbao+="<img src='Images/Larvar.jpg' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 1: 
				thongbao+="<img src='Images/Doremon.jpg' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 2: 
				thongbao+="<img src='Images/Tom&Jerry.png' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 3: 
				thongbao+="<img src='Images/spider_man.jpg' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 4: 
				thongbao+="<img src='Images/captain.jpg' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 5: 
				thongbao+="<img src='Images/ironman.png' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 6: 
				thongbao+="<img src='Images/hulk.png' height='450' style='margin-left:140px;'/></br></br>";
				break;
			case 7: 
				thongbao+="<img src='Images/ninjarua.png' height='450' style='margin-left:140px;'/></br></br>";
				break;
			default:						
				thongbao+="<img src='Images/Popeye.jpg' height='450' /></br></br>";
				break;
		}		
		var maxemlai=""; 	var d= new Date();
		maxemlai= d.getDate().toString()+(d.getMonth()+1).toString()+d.getYear().toString()+d.getHours().toString()+d.getMinutes().toString()+d.getSeconds().toString()+d.getMilliseconds().toString();										
		var tglambaikt=  Math.floor(tglambai/60)+"m "+(tglambai%60)+"s";			
		thongbao+="<i> Bạn đã làm đúng "+socaudung+"/"+socauhoi+" câu. Số điểm của bạn đạt được: "+ diem+" - Thời gian: "+tglambaikt+" <br> Bạn muốn xem lại bài làm của mình hãy nhập mã sau vào chức năng xem lại: "+maxemlai+"</i>";		
		thongbao+="&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <input type='button' id='btnlamlai' name='btnlamlai' value='   Làm l&#7841;i   ' class='button' onclick='PTlamLai()'/>";			
		$('#bailam').html(thongbao);						
		PTLuuDiem(tenhocsinh, lop, diem, madethi, tglambai, ketqua,maxemlai);				
		$('#napbai').hide();
		$('#clock').hide();
		clearTimeout(time);
	}
	//-------------------------------------------------------------------	
	function PTClock()
	{						
		hienthi= "";	
		tglambai++;							
		if (g<0)
		{	g= 59; p--;	}
		
		if ((p==0) && (g==0))
		{		
			tglambai--;	
			clearTimeout(time);
			$('#clock').html("00:00");
			alert("ĐÃ HẾT GIỜ LÀM BÀI!");
			PTNapBaiKT();	
			return;			
		}	
			
		if (p<10)	hienthi="0"+p;		
		else hienthi= p;
		if (g<10)	hienthi+=":0"+g;
		else hienthi+=":"+g;					
		$('#clock').html(hienthi);	
		g--;		
		time= setTimeout('PTClock()',1000);										
	}		
														
	//-------------------------------------------------------------------
	// RD DAP AN 1	
		function PTChonDA1()
		{			
			if ($('#rdcauhoi1').is(':checked'))					
			{
				dapanlam[cau]= 1;	PTDanhDau(1);						
			}
			else
			{	PTDanhDau(0);}	
			PTThongBao();					
		}
		function PTChonDA2()
		{			
            if ($('#rdcauhoi2').is(':checked'))					
			{	dapanlam[cau]= 2;	PTDanhDau(2);				
			}
			else
			{	PTDanhDau(0);	}
			PTThongBao();					
		}
		//-----------------------------------------------
		function PTChonDA3()
		{			
            if ($('#rdcauhoi3').is(':checked'))					
			{
				dapanlam[cau]= 3;	
				PTDanhDau(3)						
			}
			else
			{	PTDanhDau(0);		}	
			PTThongBao();					
		}
		
		function PTChonDA4()
		{					 
            if ($('#rdcauhoi4').is(':checked'))					
			{
				dapanlam[cau]= 4;
				PTDanhDau(4)						
			}
			else
			{	PTDanhDau(0);	}	
			PTThongBao();				
		}
		
		function PTThongBao()
		{					
			var socau= 0;
			for (var i=0; i<socauhoi; i++)	
			{
				if ((dangch[i]==1)&&(dapanlam[i]!=0)) socau++;
				if ((dangch[i]==2)&&(dapan2[i]!="")) socau++;
			}		
			dem= socau;
			$('#lbthongbao').text("Bạn đã làm được "+socau+"/"+(socauhoi)+" câu hỏi. ");		
		}	
	//==================================================================================
	$(document).ready(function(e) 
	{					
		$('#thongtinhocsinh').append("<div id='clock' style='position: fixed; width: 120px; top: 20px; left: 20px;'> </div>");
		p=<?php echo $dong_dt['thoigian']?>; p++;		
		pkt=<?php echo $dong_dt['ktthoigian']?>;
		if (p>0)					
			PTClock();	
		else
			$('#clock').hide();								
		//-------------------------------------------------------------------									
		// BUTTON TRUOC		
        $('#btntruoc').click(function(e) {
            //lay dap an lam dua vao tu luan			
			dapan2[cau]= trimSpace($('#txtdapantuluan').val());			
			if (cau==0)
				cau= socauhoi - 1;
			else
				cau--;		
					
			PTHienThiCauHoi(cau);								
			$('#txtdapantuluan').focus();
			PTThongBao();			
        });
		// BUTTON SAU
		$('#btnsau').click(function(e) {			
			dapan2[cau]= trimSpace($('#txtdapantuluan').val());
            if (cau==(socauhoi - 1))
				cau= 0;
			else
				cau++;	
			PTHienThiCauHoi(cau);						
			$('#txtdapantuluan').focus();		
			PTThongBao();												
        });
		//--------------------------------------------------------
		$('#txtdapantuluan').keydown(function(e) {            			
			 if (e.keyCode==13)			 	 				 	 															
				$('#btnsau').click();								 
        });
		//-------------------------------------------------------------------				
		
		$('#rdcauhoi1').change(function(e) {
           PTChonDA1();
        });
		
		$('#dapan1').click(function(e) {
            $('#rdcauhoi1').prop("checked",true);
			PTChonDA1();
        });				
		//-------------------------------------------				
		$('#rdcauhoi2').change(function(e) {
			PTChonDA2();							
        });
		
		$('#dapan2').click(function(e) {
            $('#rdcauhoi2').prop("checked",true);
			PTChonDA2();
        });
				
		$('#rdcauhoi3').change(function(e) {
			 PTChonDA3();					
        });
		
		$('#dapan3').click(function(e) {
            $('#rdcauhoi3').prop("checked",true);
			PTChonDA3();
        });
		//-----------------------------------------------------------		
		
		$('#rdcauhoi4').change(function(e) {
			 PTChonDA4();			
        });	
		
		$('#dapan4').click(function(e) {
            $('#rdcauhoi4').prop("checked",true);			
			PTChonDA4();
        });			
		//------- BUTTON NAP BAI --------------------------------------------												
		//========================================================		
		$('#btnnapbai').click(function(e) {		
			// goi Thong bao de dem so cau hoi	
			PTThongBao();					
			if (dem < socauhoi)
			{
				alert("Bạn chưa làm đủ "+socauhoi+" câu hỏi, vui lòng kiểm tra lại!");				
				// DEN CAU CHUA LAM GAN NHAT
				for (var i=0; i<socauhoi; i++)		
				{									
					if ((dapanlam[i]==0)&&(dangch[i]==1))
					{						
						cau= i;	
						PTHienThiCauHoi(cau);					
						break;
					}	
					if ((dapan2[i]=="")&&(dangch[i]==2))
					{						
						cau= i;	
						PTHienThiCauHoi(cau);					
						break;
					}					
				}											
				return;
			}
			var x= Math.floor(tglambai/60);
			if (x < pkt)
			{
				alert("BẠN CẦN DÒ LẠI BÀI LÀM CẨN THẬN. SAU "+(pkt-x)+" PHÚT NỮA RỒI NẠP BÀI. \r\n CHÚC MAY MẮN!");
				return;
			}						
			PTNapBaiKT();							
		});	
		//===================================================	
		$('#btnxemda').click(function(e) {
            PTHienDapAn(cau);
        });	
		
		$('#dapan1').dblclick(function(e) {
            if (cau==(socauhoi - 1))
				cau= 0;
			else
				cau++;	
			PTHienThiCauHoi(cau);			
        });		
		$('#dapan2').dblclick(function(e) {
            if (cau==(socauhoi - 1))
				cau= 0;
			else
				cau++;	
			PTHienThiCauHoi(cau);
        });		
		$('#dapan3').dblclick(function(e) {
            if (cau==(socauhoi - 1))
				cau= 0;
			else
				cau++;	
			PTHienThiCauHoi(cau);
        });		
		$('#dapan4').dblclick(function(e) {
            if (cau==(socauhoi - 1))
				cau= 0;
			else
				cau++;	
			PTHienThiCauHoi(cau);
        });						
    });	
	//---------------------- END LOAD ---------------------------------------------
	window.onload= PTDuaVaoCauHoi();
</script> 