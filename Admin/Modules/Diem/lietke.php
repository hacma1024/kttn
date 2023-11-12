<?php 		
	function PTimAnhLink($st)
	{
		$kq="<img src='Images/filelink.png' height='30'/>";
		$d= strlen($st);
		$x= substr( $st,($d-4),4);
		$x= strtolower($x);
		if (($x==".doc")||($x=="docx"))
		{
			$kq="<img src='Images/wordlink.png' height='30' />";
		}
		if (($x==".xls")||($x=="xlsx"))
		{
			$kq="<img src='Images/excellink.png' height='30'/>";
		}
		return $kq;
	}
	mysqli_set_charset($con, "utf8");
	$quanli=""; $ac="";	$id= -1;
	$q= $_SESSION["quyen"];	$mand= $_SESSION["mand"];	
	if (isset($_GET["quanli"])) $quanli= $_GET["quanli"];
	if (isset($_GET["ac"])) $ac= $_GET["ac"];				
    if (isset($_GET["id"])) $id= $_GET["id"];		
		  
	$so_bv= 100;	$trang=1;
	if (isset($_GET["trang"]))
		 $trang= $_GET["trang"];
	$batdau=($trang-1)*$so_bv;	
	$tk="";	
	if (isset($_GET["stk"]))
	{
	  $tk= $_GET["stk"];	
	  $sql="select d.* from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' and d.hoten like '%$tk%'order by d.id desc"; 	
	  if ($q==1)
	  	$sql="select d.* from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi inner join tblnguoidung nd on nd.id= dt.mand where d.hoten like '%$tk%'order by d.id desc"; 
	}
	else
	{
		$sql="select d.* from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' order by d.id desc limit $batdau, $so_bv";
	if ($q==1)
		$sql="select * from tbldiem order by id desc limit $batdau, $so_bv";	
	}		
	mysqli_set_charset($con, "utf8");
	$diem= mysqli_query($con,$sql);		
	//------------------------------------------------------							
	include("Modules/functionjs.php");	
?>
<script type="text/javascript" language="javascript">		
	
	function PTXoaCacDong()
	{
		var x="",mand=""; var sobv=0,trang=0; var q=-1;
		$('.table tr').has('input[type="checkbox"]:checked').map(function() {
            x+="-"+$('td:eq(2)',this).text();	// chu y: text()
        });		
		x =x.slice(1, x.length);
		var kq= confirm("Bạn có muốn xóa các ID "+x+" không?");
		if (kq==true)
		{
			mand="<?php echo $mand;?>";
			q="<?php echo $q;?>";
			sobv=<?php echo $so_bv;?>;
			trang=<?php echo $trang;?>;
			var url="Modules/Diem/ajax.php";				
			var data={"method": 5, "key": x,"mand":mand,"":sobv, "trang":trang,"quyen":q};
			$('#ds-hocsinh').load(url, data);
		}				
	}
	
	 function PTTimKiem()
	 {
		 var stk= $('#txttimkiem').val();	   
		 if (stk!="")
			window.location="index.php?quanli=diem&ac=them&stk="+stk;
	 }
	
	$(document).ready(function(e) {
       $('#btnxoadong').click(function(e) {
        	PTXoaCacDong();
    	});
		 $('#txttimkiem').keydown(function(e) {
            if (e.keyCode==13)
				PTTimKiem();
        });
		 
		$('#imgtimkiem').click(function(e) {
            PTTimKiem();
        });
		
		$('#txttimkiem').click(function(e) {
            $(this).val("");
        });		
		
		function PTKetXuatExcel(madt, nh)
		{
			var url="Modules/Diem/excel.php";			
			var data={"madethi": madt, "namhoc": nh};
			$('#excel').load(url, data);
		}	
		$('#btnexcel').click(function(e) {
			var madt=$('#list-chude :selected').val();
			var nam= $('#list-namhoc :selected').val();	
			var madt_ten=$('#list-chude :selected').text();
			var nam_ten= $('#list-namhoc :selected').text(); 			       
			var chuyentrang= "Modules/Diem/excel.php?madethi="+madt+"&madethi_ten="+madt_ten+"&namhoc="+nam+"&namhoc_ten="+nam_ten;
			window.location= chuyentrang;
        });
    });
	
</script>
<br />
<div id="right-loaitin" style="width: 65%;">
<div id="timkiem">
      <img id="imgtimkiem" name="imgtimkiem" src="../Images/Search.png" style="width: 35px; height: 35px;"/>
      <input type="text" class="textbox" id="txttimkiem" name="txttimkiem" size="100" style="font-size: 16px;padding: 7px;" placeholder=" Nhập tên học sinh..." />
</div>
<div class="tieude-bang" style=" float: left; width: 95%; text-align:center;"> DANH SÁCH ĐIỂM HỌC SINH </div>
<div id="ds-hocsinh" style="font-size: 16px;">
  <blockquote>&nbsp;</blockquote>
  <table class="table" width="1274" border="1" cellspacing="0" cellpadding="0">   
    <tr>
      <td width="20" height="36">  <input type="checkbox" id="chkall" name="chkall"/> </td>
      <td width="49" ><div align="center"><strong>STT</strong></div></td>
      <td width="49"><div align="center"><strong>ID</strong></div></td>
      <td width="264"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
      <td width="75"><div align="center"><strong>ĐIỂM</strong></div></td>
      <td width="69" style="text-align: center; font-weight: bold; max-width: 70px;">LỚP</td>
      <td width="129"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
      <td width="219"><div align="center"><strong>DATE</strong></div></td>
      <td width="83"><div align="center"><strong>WTIME<br />
      </strong></div>  </td>
      <td width="183"><div align="center"><strong>MXL</strong></div></td>
      <td width="60"><div align="center"><strong>FILE</strong></div></td>
      <td width="48"><div align="center"><strong>XEM</strong></div></td>     
    </tr>
    <?php
		$so=1;
  		while($dong=mysqli_fetch_assoc($diem))
		{				
	?>  
                    <tr 
                     <?php 
                    if ($dong["id"]==$id) { ?> class="maunenchon" <?php } 
                    if ($so%2==1) { ?> class="maunenle" <?php } 						
             		 ?>                    
                    > <!--DONG TR-->
    			   <td height="30" style=" text-align:center;"> <input type="checkbox" /> </td>
                     <td style=" text-align:center;"><?php echo $so?></td>
                     <td style=" text-align:center;"><?php echo $dong['id']?></td>
                    <td><?php echo $dong['hoten']?></td>
                    <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                    <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                    <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                    <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>
                    <td style=" text-align:center;"><?php echo $dong['thoigianlambai']?></td>
                    <td style=" text-align:center;"><?php echo $dong['maxemlai']?></td>
                    <td style=" text-align:center;">
                    <?php
						if ($dong['linkfile']!="")
						{
							?>
                             <a href="<?php echo $dong['linkfile']?>"> 
                    			<?php
								echo PTimAnhLink($dong['linkfile']);
								?>
                    		 </a>
                            <?php
						}						
					?>
                   
                    </td>
                    <td style=" text-align:center;">
                    	<a href="index.php?quanli=diem&ac=sua&id=<?php echo $dong["id"]?>"> 
                          <img src="Images/tick.png" />  
                        </a> 
                    </td>                             
                  </tr>  
     <?php								
		$so++;
		}
	?>
   
  </table>
          
  </div>	
<!-- end ds hoc sinh -->
  <?php 	
		include("Modules/Diem/trang.php");
?>
	&nbsp;&nbsp;&nbsp;   
  <input class="button" type="button" name="btnxoadong" id="btnxoadong" value="   XÓA DÒNG   " style="height: 33px;" />
  <input class="button" type="button" name="btnexcel" id="btnexcel" value="   Kết xuất Excel   " style="background-color: #0D510B; color: #FFF; margin-left: 30px; height: 35px;"/>
  <div id="excel"> </div>
</div><!-- right loaitin -->