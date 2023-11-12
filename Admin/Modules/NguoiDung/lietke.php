<?php		
	$so_bv=20;	$trang=1;
	if (isset($_GET["trang"]))
		 $trang= $_GET["trang"];
	$batdau=($trang-1)*$so_bv;
	$tk="";
	
	if (isset($_GET["stk"]))
	{
	  $tk=$_GET["stk"];
	  $sql="select * from tblnguoidung where tendangnhap like '%$tk%' order by quyen asc, id desc";	 
	}
	else
	{	  
	  $sql="select * from tblnguoidung order by quyen asc, id desc";	 	   		
	}	
	mysqli_set_charset($con, "utf8");
	$baiviet= mysqli_query($con,$sql);		
	$quanli=$_GET["quanli"];
	$ac=$_GET["ac"];			
	$id= -1;
	  if (isset($_GET["id"]))
		  $id= $_GET["id"];			
					
	function PTTimSoDeThi($con,$mand)
	{										
		$kq=0;
		$sql="select count(*) from tbldethi where mand='".$mand."'";		
		$dethi= mysqli_query($con,$sql);
		$dong=mysqli_fetch_array($dethi);
		$kq= $dong[0];
		return $kq;		
	}
	function PTTimSoCauHoi($con,$mand)
	{							
		$kq=0;
		$sql="select count(*) from tblcauhoi ch inner join tbldethi dt on ch.madethi= dt.madethi ";
		$sql=$sql."where dt.mand='".$mand."'";
		$cauhoi= mysqli_query($con,$sql);
		$dong=mysqli_fetch_array($cauhoi);
		$kq= $dong[0];
		return $kq;	
	}
?>
<script language="javascript" type="text/javascript"> 			
	$(document).ready(function(e) {
        function PTTimKiem()
		 {
			 var stk= $('#txttimkiem').val();	   
			 if (stk!="")
			  	window.location="index.php?quanli=nguoidung&ac=them&stk="+stk;
		 }
		 
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
    });
</script>
<div id="right-baiviet" style="float: left;">
<div id="timkiem" style=" width: 100%;">
      <img id="imgtimkiem" name="imgtimkiem" src="Images/Search.png" style="width: 35px; height: 35px;"/>
      <input type="text" id="txttimkiem" name="txttimkiem" size="40" style="font-size: 16px;"/>
</div>
<div class="tieude-bang" style="text-align: center;"> DANH SÁCH NGƯỜI DÙNG </div>
  <table class="table" width="1145" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">   
    <tr>
      <td width="40" height="36"><div align="center"><strong>STT</strong></div></td>
      <td width="44"><div align="center"><strong>MÃ</strong></div></td>
      <td width="258"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
      <td width="52"><div align="center"><strong>GT</strong></div></td>
      <td width="291"><div align="center"><strong>TÊN ĐĂNG NHẬP</strong></div></td>
      <td width="101"><div align="center"><strong>SL ĐỀ THI</strong></div></td>
      <td width="111"><div align="center"><strong>SL CÂU HỎI</strong></div></td>
      <td width="88"><div align="center"><strong>QUYỀN</strong></div></td>
      <td colspan="2"><div align="center"><strong>QUẢN LÍ</strong></div></td>
    </tr>
    <?php				
		$so=1;
  		while($dong=mysqli_fetch_assoc($baiviet))
		{						
	?>
                   <tr 
                                       
                    > <!--DONG TR-->
                  
                    <td style=" text-align:center;"><?php echo $so?></td>
                    <td><div align="center"><?php echo $dong["id"]?></div></td>
                    <td><?php echo $dong["hovaten"] ?></td>
                    <td style=" text-align:center;"><?php echo PTDoiGioiTinh($dong["gioitinh"]) ?></td>
                    <td><?php echo $dong["tendangnhap"] ?></td>
                    <td style=" text-align:center;"><?php echo PTTimSoDeThi($con,$dong["id"]);?></td>
                    <td style=" text-align:center;"><?php echo PTTimSoCauHoi($con,$dong["id"]);?></td>
                    <td style=" text-align:center;"><?php echo $dong["quyen"] ?></td>
                    <td width="72" style=" text-align:center;">
                        <a href="index.php?quanli=nguoidung&ac=sua&id=<?php echo $dong["id"]?>"> 
                          <img src="Images/Iedit.png" />  
                        </a>      
                    </td>          
                    <td width="66" style=" text-align:center;">
                        <a href="Modules/NguoiDung/xuli.php?quanli=nguoidung&ac=xoa&id=<?php echo $dong["id"]?>">
                          <img src="Images/Idelete.png" />
                        </a>
                    </td>      
                  </tr> 
    <?php				
		$so++;
		}
	?>
   
  </table>
  <div class="clear"> </div> 
  

</div>