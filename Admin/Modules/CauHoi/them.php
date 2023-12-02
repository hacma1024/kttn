<?php	
	include("Modules/functions.php");	
	$q= $_SESSION["quyen"];
	$mand= $_SESSION["mand"];
	$sql="select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand inner join tblmon m on m.id=dt.mon where dt.mand='$mand' order by dt.id desc";	
	if ($q==1)
		$sql="select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblmon m on m.id=dt.mon order by dt.id desc";
	$dethi= mysqli_query($con,$sql);
	$trang=1;
	if (isset($_GET["trang"]))
		 $trang= $_GET["trang"];
?>

<script type="text/javascript" language="javascript">		
	
	function PTReset(dang)
	{			
		if (dang==1)	
		{
			$('#cauhoitracnghiem').show();
			$('#cauhoituluan').hide();
			
			$('#txtdapan1').val("");
			$('#txtdapan2').val("");
			$('#txtdapan3').val("");
			$('#txtdapan4').val("");
			$('#chkxao').prop('checked', true);
			$('textarea').val(null);
			$('#txtnoidung').val("");		
			$('#list-dadung option').eq(0).prop("selected",true);		
			$('#hinhanh').val('');
			$('#anhminhhoa').attr("src","Images/no-image.jpg");	
			$('#lbdadung').text("");
			$('#txtchuthich').text("");
		}
		if (dang==2)
		{
			$('#cauhoitracnghiem').hide();
			$('#cauhoituluan').show();
			
			$('#txtdapan-tl').val("");					
			$('textarea').val(null);
			$('#txtnoidung-tl').val("");						
			$('#hinhanh-tl').val('');
			$('#anhminhhoa-tl').attr("src","Images/no-image.jpg");	
			$('#txtchuthich-tl').text("");
		}
			
	}	
		
	function PTThayTheKiHieuDacBiet(st)
	{
		var kq="", c="";
		for (var i=0; i<st.length; i++)
		{
			c= st[i];
			if (st.charCodeAt(i)==10)
				c= "<br>";						
			kq+= c;
		}		
		return kq;
	}
	
	function KiemTraEnterKepDon(tieude, st)
	{		
		var kq= false;
		if (st=="")
		{	
			alert(tieude+" không được để trống!");				
			return true;
		}		
		
		for (var i=0; i<st.length; i++)
		{							
			/*if (st.charCodeAt(i)==10)	// ENTER
			{
				alert(tieude+" không được chứa kí tự xuống dòng Enter!");	return true;
			}*/
			if (st.charCodeAt(i)==39)	// "
			{
				alert(tieude+ " không được chứa kí tự nháy đơn ( \' ) !");	return true;
			}		
			if (st.charCodeAt(i)==34)	// "
			{
				alert(tieude+" không được chứa kí tự nháy kép ( \" ) !");	return true;
			}											
		}
		
		return kq;
	}
	
	function KiemTraChuThich(st)
	{		
		var kq= false;					
		for (var i=0; i<st.length; i++)
		{							
			/*if (st.charCodeAt(i)==10)	// ENTER
			{
				alert(tieude+" không được chứa kí tự xuống dòng Enter!");	return true;
			}*/
			if (st.charCodeAt(i)==39)	// "
			{
				alert("Chú thích không được chứa kí tự nháy đơn ( \' ) !");	return true;
			}		
			if (st.charCodeAt(i)==34)	// "
			{
				alert("Chú thích không được chứa kí tự nháy kép ( \" ) !");	return true;
			}											
		}
		
		return kq;
	}
	
	function PTKiemTraLuu(dang)
	{
		var kq= true;	
		var xau="";	
		if (dang==1)
		{					
			if (KiemTraEnterKepDon("Nội dung",$('#txtnoidung').val())) 
				return false;						
			if (KiemTraEnterKepDon("Đáp án 1",$('#txtdapan1').val())) 
				return false;							
			if (KiemTraEnterKepDon("Đáp án 2",$('#txtdapan2').val())) 
				return false;							
			if (KiemTraEnterKepDon("Đáp án 3",$('#txtdapan3').val())) 
				return false;							
			if (KiemTraEnterKepDon("Đáp án 4",$('#txtdapan4').val())) 
				return false;	
			if (KiemTraChuThich($('#txtchuthich').val())) 
				return false;			
			xau= $('#list-dadung').val();
			if (xau==0)
			{
				alert("Bạn chưa chọn đáp án đúng!");	return false;
			}		
		}
		if (dang==2)
		{				
			if (KiemTraEnterKepDon("Nội dung",$('#txtnoidung-tl').val())) 
				return false;										
			if (KiemTraEnterKepDon("Đáp án",$('#txtdapan-tl').val())) 
				return false;	
			if (KiemTraChuThich($('#txtchuthich-tl').val())) 
				return false;								
		}
					
		return kq;
	}			
	
	function PTLoadDanhSachCH()
	{
		var url="Modules/CauHoi/ajax.php";
		var noidung=""; var da1="", da2="", da3="", da4="", dadung= 0, tenanh="", dethi="", mucdo= 0, xao=1;;
		noidung= $('#txtnoidung').val();		
		da1= $('#txtdapan1').val();
		da2= $('#txtdapan2').val();
		da3= $('#txtdapan3').val();
		da4= $('#txtdapan4').val();
		dadung= $('#list-dadung').val();
		dethi= $('#list-dethi').val();
		//mucdo= $('#list-mucdo').val();
		// tenanh=$('#hinhanh').val().substr(12);//C:fakepathmultiple-choice.jpg		
		
		// if ($('#chkxao').attr('checked')==false)
		// 	xao= 0;
		// // DATA 2 la load lop
		// var fd= new FormData($('#hinhanh'));
		var data={
					"method": 1, "txtnoidung": noidung, "txtdapan1": da1, "txtdapan2": da2, "txtdapan3": da3,
					"txtdapan4": da4, "list-dadung": dadung, "list-dethi": dethi, "chkxao": xao, "trangthai": "them", "tenanh": tenanh
				};
		$('#right-cauhoi').load(url, data);
	}	
	
	function PTLoadDanhSach_Ajax(dang)
	{
		var s_url=""; var dangch=0; var frm;
		if (dang==1)
		{
			s_url= "Modules/CauHoi/ajax-tn.php";
			frm= new FormData(document.getElementById('frmCauHoi'));
		}
		if (dang==2)
		{
			s_url= "Modules/CauHoi/ajax-tl.php";
			frm= new FormData(document.getElementById('frmCauHoi-tl'));
		}
		
		var nd="<?php echo $mand?>";
		var quyen="<?php echo $q?>";
		var trang="<?php echo $trang?>";
		frm.append('trangthai','them');
		frm.append('quanli','cauhoi');
		frm.append('ac','them');
		frm.append('list-cauhoi',dang);										
		$.ajax({
					url: s_url,
					type: "POST",
					data: frm,
					success: function(kq)
					{
						$('#danhsachcauhoi').html(kq);
					},
					cache:false,
					contentType: false,
					processData: false		
		});		
	}
	
	function PTLoadDanhSach_TimDeThi(dang)
	{
		var frm= new FormData(); 
		var madt=0; var st_url="";
		if (dang==1) 
		{
			madt= $('#list-dethi').val();
			st_url="Modules/CauHoi/ajax-tn.php";
		}
		if (dang==2)
		{
			 madt= $('#list-dethi-tl').val();
			 st_url="Modules/CauHoi/ajax-tl.php";
		}
		frm.append('trangthai','tim');
		frm.append('quanli','cauhoi');
		frm.append('ac','them');
		frm.append('madethi',madt);				
		$.ajax({
					url: st_url,
					type: "POST",
					data: frm,
					success: function(kq)
					{
						$('#danhsachcauhoi').html(kq);
					},
					cache:false,
					contentType: false,
					processData: false		
		});
	}	
	
	$(document).ready(function(e) 
	{      											
		PTReset(1);						
		$('#btnthem-tn').click(function(e) {
            if (PTKiemTraLuu(1)) 				
			{				
				$('#txtnoidung').val(PTThayTheKiHieuDacBiet($('#txtnoidung').val()));														
				$('#txtchuthich').val(PTThayTheKiHieuDacBiet($('#txtchuthich').val()));					
				PTLoadDanhSach_Ajax(1);
				PTReset(1);
			}			
        });
		
		$('#btnthem-tl').click(function(e) {
            if (PTKiemTraLuu(2)) 				
			{
				$('#txtnoidung-tl').val(PTThayTheKiHieuDacBiet($('#txtnoidung-tl').val()));																							
				$('#txtchuthich-tl').val(PTThayTheKiHieuDacBiet($('#txtchuthich-tl').val()));	
				PTLoadDanhSach_Ajax(2);
				PTReset(2);
			}			
        });
		
		$('#btntim').click(function(e) {
            PTLoadDanhSach_TimDeThi(1);
        });
		
		$('#btntim-tl').click(function(e) {
            PTLoadDanhSach_TimDeThi(2);
        });
		
		$('#list-cauhoi').change(function(e) {
            var dang= $(this).find("option:selected");
			var x= dang.val();
			if (x==1)
			{
				$('#cauhoituluan').hide();
				$('#cauhoitracnghiem').show();
			}
			if (x==2)
			{				
				$('#cauhoitracnghiem').hide();
				$('#cauhoituluan').show();
			}
        });
		
		$('#list-dadung').change(function(e) {            
		   var da = $(this).find("option:selected");
		   var gt  = parseInt(da.val());
		   var st= " => ";		   
		   switch (gt)
		   {
			   case 1: st+= $('#txtdapan1').val();
			   break;
			   case 2: st+= $('#txtdapan2').val();
			   break;			 
			   case 3: st+= $('#txtdapan3').val();
			   break;			  
			   case 4: st+= $('#txtdapan4').val();
			   break;			  		  
		   }		 
		   $('#lbdadung').text(st);
		  /* <select name="sweets" multiple="multiple">
			  <option>Chocolate</option>
			  <option selected="selected">Candy</option>
			  <option>Taffy</option>
			  <option selected="selected">Caramel</option>
			  <option>Fudge</option>
			  <option>Cookie</option>
			</select>
			<div></div>
			 
			<script>
			$( "select" )
			  .change(function () {
				var str = "";
				$( "select option:selected" ).each(function() {
				  str += $( this ).text() + " ";
				});
				$( "div" ).text( str );
			  })
			  .change();
			 */
        });
				
    });	
	
	function PTTimAnh(pic)
	{
		var reader= new FileReader();
		reader.onload= function (e)
		{
			var img= document.getElementById("anhminhhoa");			
			img.src= e.target.result;
			img.style.display="inline";			
		};
		reader.readAsDataURL(pic.files[0]);
	}	
	
	function PTTimAnhTl(pic)
	{
		var reader= new FileReader();
		reader.onload= function (e)
		{
			var img= document.getElementById("anhminhhoa-tl");			
			img.src= e.target.result;
			img.style.display="inline";			
		};
		reader.readAsDataURL(pic.files[0]);
	}						
</script>

<div id="dangcauhoi" style="margin-left: 20px; margin-top: 20px; margin-bottom: 0px;"> Dạng câu hỏi: 
	 <select name="list-cauhoi" id="list-cauhoi" style="margin-left: 40px;">       
        <option value="1" selected="selected"> Câu hỏi Trắc nghiệm </option>
        <option value="2"> Câu hỏi Tự luận </option>
        <option value="3"> Câu hỏi Nhóm </option>      
     </select>
</div>

<!--//TRAC NGHIEM-->

<div id="cauhoitracnghiem" style="width:100%;">
<form id="frmCauHoi" name="frmCauHoi" action="Modules/CauHoi/xuli.php" method="post" enctype="multipart/form-data">
  <div id="left-cauhoi">
    <table class="table-them" width="718" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="50" colspan="2"><div align="center"><strong>  CÂU HỎI TRẮC NGHIỆM</strong></div></td>
      </tr>      
      <tr>
        <td width="169" height="34"><p>Nội dung</p>
          <p> câu hỏi:</p></td>
        <td width="549">
        <p style="color: #A8000D; font-size:14px; font-style:italic;">
          <textarea name="txtnoidung" id="txtnoidung" cols="64" rows="5" style="font-size:16px; color: #000; "> </textarea>
      <br />(Chú ý: nội dung câu hỏi và đáp án không chứa dấu nháy đơn và kép (' và "))
        </p>
        </td>
      </tr>
      <tr>
        <td height="32">Đáp án 1:</td>
        <td><input type="text" name="txtdapan1" id="txtdapan1" size="72px"/></td>
      </tr>
      <tr>
        <td height="32">Đáp án 2:</td>
        <td><input type="text" name="txtdapan2" id="txtdapan2" size="72px"/></td>
      </tr>
      <tr>
        <td height="32">Đáp án 3:</td>
        <td><input type="text" name="txtdapan3" id="txtdapan3" size="72px"/></td>
      </tr>
      <tr>
        <td height="32">Đáp án 4:</td>
        <td><input type="text" name="txtdapan4" id="txtdapan4" size="72px"/></td>
      </tr>
      <tr>
        <td height="41">Đáp án đúng:</td>
        <td>
        <select name="list-dadung" id="list-dadung">
          <option value="0" selected="selected"> --- Chọn --- </option>
          <option value="1"> 1 </option>
          <option value="2"> 2 </option>
          <option value="3"> 3 </option>
          <option value="4"> 4 </option>
        </select>     
          <label id="lbdadung" name="lbdadung" style="color: #A8000D; font-size:14px; font-style:italic; margin-left: 10px;"></label>      
        </td>
      </tr>
      <tr>
        <td height="38">Chú thích:</td>
        <td>
        <span style="color: #A8000D; font-size:14px; font-style:italic;">
          <textarea name="txtchuthich" id="txtchuthich" cols="64" rows="3" style="font-size:16px; color: #000; "> </textarea>
        </span>
        </td>
      </tr>
      <tr>
        <td height="38">Đề thi:</td>
        <td>     
        <?php
			
			$dethi= mysqli_query($con,$sql);
		?>
            <select name="list-dethi" id="list-dethi">
              <option value="0" selected="selected"> ------------------------------ Chọn ---------------------------- </option>
              <?php			
                  while ($dong= mysqli_fetch_assoc($dethi))
                  {
				  	$tenchude= $dong['madethi']." - L".$dong['lop']." - ".$dong['mon']." - ".$dong['chude'];
				  	$tenchude= PTDinhDangXau($tenchude,50);
              ?>
                  <option value="<?php echo $dong['madethi']?>" > 
                      <?php echo $tenchude;?> 
                  </option>
              <?php			
                  }
              ?>
            </select> &nbsp;&nbsp;
            <input class="button" type="button" name="btntim" id="btntim" value="   TÌM   ">  
        </td>    
        </tr>    
      <tr>
        <td height="37" >Trạng thái:</td>
        <td>
          <select name="list-trangthai" id="list-trangthai">      
            <option value="1" selected="selected"> Sử dụng </option>    
            <option value="0">  Không sử dụng  </option>         
          </select>
        </td>
      </tr>
      <tr>
        <td height="25"> Xáo:</td>
        <td><input type="checkbox" id="chkxao" name="chkxao" /> </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td>       
          <input class="button" type="button" name="btnthem-tn" id="btnthem-tn" value="   THÊM   "> 
          &nbsp;&nbsp;&nbsp;
          <input class="button" type="button" name="btnthoat-tn" id="btnthoat-tn" value="   THOÁT   " />
          </td>
      </tr>
      <tr>
        <td height="37" colspan="2">     
        <input type="text" name="txtquyen" id="txtquyen" size="10px" value="<?php echo $_SESSION["quyen"];?>" style="display: none;"/> 
        <input type="text" name="txtmand" id="txtmand" size="10px" value="<?php echo $_SESSION["mand"];?>" style="display: none;"/>
        <input type="text" name="txttrang" id="txttrang" size="10px" value="<?php echo $trang?>" style="display: none;"/>
        </td>
        </tr>   
    </table>  
      <?php	
          PTInTrangThai();
      ?> 
  </div>
  
  </form>
</div> <!--END  CAU HOI TRAC NGHIEM-->


<!--//TU LUAN-->
<div id="cauhoituluan"> 
  <form id="frmCauHoi-tl" name="frmCauHoi-tl" action="Modules/CauHoi/xuli.php" method="post" enctype="multipart/form-data">
  <div id="left-cauhoi">
    <table class="table-them" width="716" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td height="50" colspan="2"><div align="center"><strong> CÂU HỎI TỰ LUẬN</strong></div></td>
      </tr>
      <tr>
        <td width="169" height="34"><p>Nội dung</p>
          <p> câu hỏi:</p></td>
        <td width="547">
          <p style="color: #A8000D; font-size:14px; font-style:italic;">
            <textarea name="txtnoidung-tl" id="txtnoidung-tl" cols="64" rows="5" style="font-size:16px; color: #000; ">
          </textarea>
            <br />(Chú ý: nội dung câu hỏi và đáp án không chứa dấu nháy đơn và kép (' và "))
            </p>
          </td>
      </tr>
      <tr>
        <td height="47">Đáp án:</td>
        <td><input type="text" name="txtdapan-tl" id="txtdapan-tl" size="72px"/></td>
      </tr>
      <tr>
        <td height="38">Chú thích:</td>
        <td>
          <span style="color: #A8000D; font-size:14px; font-style:italic;">
            <textarea name="txtchuthich-tl" id="txtchuthich-tl" cols="64" rows="3" style="font-size:16px; color: #000; ">
          </textarea>
            </span>
          </td>
      </tr>
      <tr>
        <td height="38">Đề thi:</td>
        <td>     
        <?php
			$sql="select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand inner join tblmon m on m.id=dt.mon where dt.mand='$mand' order by dt.id desc";	
			if ($q==1)
				$sql="select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblmon m on m.id=dt.mon order by dt.id desc";
			$dethi= mysqli_query($con,$sql);
		?>
            <select name="list-dethi-tl" id="list-dethi-tl">
              <option value="0" selected="selected"> ------------------------- Chọn ---------------------------- </option>
              <?php			
                  while ($dong= mysqli_fetch_assoc($dethi))
                  {
					  $tenchude= $dong['madethi']." - L".$dong['lop']." - ".$dong['mon']." - ".$dong['chude'];
				  	  $tenchude= PTDinhDangXau($tenchude,50);
              ?>
                  <option value="<?php echo $dong['madethi']?>" > 
                      <?php echo $tenchude;?> 
                  </option>
              <?php			
                  }
              ?>
            </select> &nbsp;&nbsp;
            <input class="button" type="button" name="btntim-tl" id="btntim-tl" value="   TÌM   ">  
        </td>    
        </tr>     
      <tr>
        <td height="37" >Trạng thái:</td>
        <td>
          <select name="list-trangthai-tl" id="list-trangthai-tl">      
            <option value="1" selected="selected"> Sử dụng </option>    
            <option value="0">  Không sử dụng  </option>         
            </select>
          </td>
      </tr>
      <tr>
        <td height="37"></td>
        <td>       
          <input class="button" type="button" name="btnthem-tl" id="btnthem-tl" value="   THÊM   "> 
          &nbsp;&nbsp;&nbsp;
          <input class="button" type="button" name="btnthoat-tl" id="btnthoat-tl" value="   THOÁT   " />
          </td>
      </tr>
      <tr>
        <td height="37" colspan="2">     
        <input type="text" name="txtquyen" id="txtquyen-tl" size="10px" value="<?php echo $_SESSION["quyen"];?>" style="display: none;"/> 
        <input type="text" name="txtmand" id="txtmand-tl" size="10px" value="<?php echo $_SESSION["mand"];?>" style="display: none;"/>
        <input type="text" name="txttrang" id="txttrang-tl" size="10px" value="<?php echo $trang?>" style="display: none;"/>
        </td>
        </tr>   
    </table>  
      <?php	
          PTInTrangThai();
      ?> 
  </div>
 </form> 
</div> <!-- end Cau hoi tu luan-->




