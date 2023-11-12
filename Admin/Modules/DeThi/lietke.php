<?php 
	//------------------------------------------------------							
	include("Modules/functionjs.php");
	mysqli_set_charset($con, "utf8");
	$q= $_SESSION["quyen"];
	$mand= $_SESSION["mand"];	
	$sql="select dt.id, dt.madethi, dt.chude, dt.socauhoi, dt.lop, dt.trangthai, dt.thoigian, dt.xemda, dt.ktxemlai, dt.ttfile, dt.mand, dt.ktthoigian, m.mon, nd.hovaten from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand inner join tblmon m on m.id=dt.mon where dt.mand='$mand' order by dt.id desc";
	if ($q==1)
	{
		$sql="select dt.id, dt.madethi, dt.chude, dt.socauhoi, dt.lop, dt.trangthai, dt.thoigian, dt.xemda, dt.ktxemlai, dt.ttfile, dt.mand, dt.ktthoigian, m.mon, nd.hovaten from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand inner join tblmon m on m.id=dt.mon order by dt.id desc";
	}
	$tblloaitin= mysqli_query($con,$sql);	
	
	//------------------------------------------------------		
	$id= -1;
	if (isset($_GET["id"]))
		$id= $_GET["id"];	
?>
<div id="right-loaitin">
<div class="tieude-bang" style=" width: 570px;"> DANH SÁCH ĐỀ THI</div>
  <table class="table" width="1301" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">   
    <tr>
      <td width="37" ><div align="center"><strong>STT</strong></div></td>
      <td width="74"><div align="center"><strong>MÃ</strong></div></td>
      <td width="296"><div align="center"><strong>CHỦ ĐỀ</strong></div></td>
      <td width="48"><div align="center"><strong>SL</strong></div></td>
      <td width="79"><div align="center"><strong>MÔN</strong></div></td>
      <td width="71"><div align="center"><strong>LỚP</strong></div></td>
      <td width="82"><div align="center"><strong>TRẠNG THÁI</strong></div></td>
      <td width="60"><div align="center"><strong>TG</strong> <strong>(Phút)</strong></div>
      <div align="center"></div></td>
      <td width="75"><div align="center"><strong>XEM ĐA</strong></div></td>
      <td width="78"><div align="center"><strong>XEM LAI</strong></div></td>
      <td width="49"><div align="center"><strong>FILE</strong></div></td>
      <td width="231"><div align="center"><strong>TÁC GIẢ</strong></div></td>
      <td colspan="2"><div align="center"><strong>QUẢN LÍ</strong></div></td>
    </tr>
    <?php
		$so=1;
  		while($dong= mysqli_fetch_assoc($tblloaitin))
		{				
	?>
            <tr 
			  <?php 
                    if ($dong["id"]==$id) { ?> class="maunenchon" <?php } 
                    if ($so%2==1) { ?> class="maunenle" <?php } 						
              ?>                                    
            > <!--DONG TR-->
              <td style=" text-align:center;"><?php echo $so?></td>
              <td style=" text-align:center;"><?php echo $dong["madethi"]?></td>
              <td><?php echo $dong["chude"]?></td>
              <td style=" text-align:center;"><?php echo $dong["socauhoi"]?></td>
              <td style=" text-align:center;"><?php echo $dong["mon"]?></td>
              <td style=" text-align:center;"><?php echo $dong["lop"]?></td>
              <td style=" text-align:center;"><?php echo PTTimTrangThai($dong["trangthai"])?></td>
              <td style=" text-align:center;"><?php echo $dong["thoigian"]?></td>
              <td style=" text-align:center;"><?php echo PTCoKhong($dong["xemda"])?></td>
              <td style=" text-align:center;"><?php echo PTCoKhong($dong["ktxemlai"])?></td>
              <td style=" text-align:center;"><?php echo PTCoKhong($dong["ttfile"])?></td>
              <td style=" text-align:center;"><?php echo $dong['hovaten']?></td>
              <td width="48" style=" text-align:center;">
                  <a href="index.php?quanli=dethi&ac=sua&id=<?php echo $dong["id"]?>"> 
                    <img src="Images/Iedit.png" />  
                  </a>      
              </td>          
              <td width="43" style=" text-align:center;">
                  <a onclick="PTXoa_Dethi(<?php echo $dong["id"]?>,'<?php echo $dong["chude"]?>')" href="#">
                    <img src="Images/Idelete.png" />
                  </a>
               </td>      
            </tr> 
    <?php
				
		$so++;
		}
	?>
   
  </table>
</div>