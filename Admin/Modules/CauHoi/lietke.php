<?php		
	include("Modules/functionjs.php");
	$so_bv=20;	$trang=1;
	$q= $_SESSION["quyen"];	$mand= $_SESSION["mand"];
	if (isset($_GET["trang"]))
		 $trang= $_GET["trang"];
	$batdau=($trang-1)*$so_bv;
	$tk="";
	if (isset($_GET["stk"]))
	{
	  $tk= $_GET["stk"];
	  $sql= "select ch.* from tblcauhoi ch inner join tbldethi dt on dt.madethi= ch.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' and cauhoi like '%$tk%' order by id desc";
	   if ($q==1)
			$sql="select * from tblcauhoi where cauhoi like '%$tk%' order by id desc";
	}
	else
	{	  
	  $sql="select ch.* from tblcauhoi ch inner join tbldethi dt on dt.madethi= ch.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' order by id desc limit $batdau, $so_bv";	  
	  if ($q==1)
		$sql="select * from tblcauhoi order by id desc limit $batdau, $so_bv";
	}		
	$cauhoi= mysqli_query($con,$sql);	
	$quanli=""; $ac="";	$id= -1;
	if (isset($_GET["quanli"])) $quanli= $_GET["quanli"];
	if (isset($_GET["ac"])) $ac= $_GET["ac"];			
	if (isset($_GET["id"])) $id= $_GET["id"];		
?>
<div id="right-cauhoi">
<script language="javascript" type="text/javascript"> 			
	$(document).ready(function(e) {
        function PTTimKiem()
		 {
			 var stk= $('#txttimkiem').val();	   
			 if (stk!="")
			  	window.location="index.php?quanli=cauhoi&ac=them&stk="+stk;
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

<div id="timkiem" style="width:100%">
      <img id="imgtimkiem" name="imgtimkiem" src="../Images/Search.png" style="width: 35px; height: 35px; "/>
      <input type="text"  id="txttimkiem" name="txttimkiem" size="80" style="font-size: 16px;" placeholder=" Nhập nội dung câu hỏi..."/>
</div>
<div class="tieude-bang" style="width: 100%;"> DANH SÁCH CÁC CÂU HỎI </div>

<div id="danhsachcauhoi" style="font-size: 16px;">
  <table class="table" width="1137" border="1" cellspacing="0" cellpadding="0">   
    <tr>
      <td width="41" height="36"><div align="center"><strong>STT</strong></div></td>
      <td width="471"><div align="center"><strong>CÂU HỎI</strong></div></td>
      <td width="131"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
      <td width="87"><div align="center"><strong>DẠNG</strong></div></td>
      <td width="61"><div align="center"><strong>SD</strong></div></td>
      <td width="62"><div align="center"><strong>XÁO</strong></div></td>
      <td colspan="2"><div align="center"><strong>QUẢN LÍ</strong></div></td>
    </tr>
    <?php
		$so=1;
  		while($dong= mysqli_fetch_assoc($cauhoi))
		{						
	?>
                  <tr 
                   <?php 
                    if ($dong["id"]==$id) { ?> class="maunenchon" <?php } 
                    if ($so%2==1) { ?> class="maunenle" <?php } 						
             		 ?>                   
                  ><!--DONG TR-->
                    <td style=" text-align:center;"><?php echo $so?></td>
                    <td><?php echo $dong['cauhoi'] ?></td>
                    <td style=" text-align:center;"><?php echo $dong['madethi']?> </td>
                    <td style=" text-align:center;"><?php echo PTHienThiDang($dong['dangch'])?></td>
                    <td style=" text-align:center;"><?php echo PTHienThiTT($dong['trangthai'])?></td>
                    <td style=" text-align:center;"><?php echo PTHienThiXao($dong['xao'])?></td>
                    <td width="65" style=" text-align:center;">
                        <?php
							if ($dong["dangch"]==1)
							{
						?>
                        <a href="index.php?quanli=cauhoi&ac=sua1&id=<?php echo $dong["id"]?>"> 
                          <img src="Images/Iedit.png" />  
                        </a>  
                        <?php
							}
							else
							{
								?>
                                 <a href="index.php?quanli=cauhoi&ac=sua2&id=<?php echo $dong["id"]?>"> 
                          <img src="Images/Iedit.png" />  
                        </a> 
                                <?php
								
							}
						?>    
                    </td>          
                    <td width="63" style=" text-align:center;">                   
                        <a onclick="PTXoa_CauHoi(<?php echo $dong['id']?>,'<?php echo addslashes($dong['cauhoi'])?>')" href="#">
                          <img src="Images/Idelete.png" />
                        </a>
                      </td>      
                  </tr> 
    <?php				
		$so++;
		}
	?>
   
  </table>  
<?php 
	if ($tk=="")
		include("Modules/CauHoi/trang.php");
?>
</div>
  <div class="clear"> </div> 
</div>