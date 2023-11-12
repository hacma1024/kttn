<?php 
	//------------------------------------------------------								
	$sql="select * from tblgopy order by id desc";	
	$gopy= mysqli_query($con,$sql);		
?>
<div id="right-loaitin">
<div class="tieude-bang" style=" width: 1800px;"> DANH SÁCH CÁC BÀI GÓP Ý</div>
  <table class="table" width="1828" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">   
    <tr>
      <td width="56" ><div align="center"><strong>STT</strong></div></td>  
      <td width="1010"><div align="center"><strong>NỘI DUNG</strong></div></td>
      <td width="205"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
      <td width="279"><div align="center"><strong>EMAIL</strong></div></td>
      <td width="266"><div align="center"><strong>NGÀY</strong></div></td>      
    </tr>
    <?php
		$so=1;
  		while($dong= mysqli_fetch_assoc($gopy))
		{	
			if ($so%2==1)
			{
	?>
    			 <tr class="maunenle">
                    <td style=" text-align:center;"><?php echo $so?></td>
                    <td><?php echo $dong['noidung']?></td>
                    <td><?php echo $dong['hovaten']?></td>
                    <td><?php echo $dong['email']?></td>
                    <td><?php echo $dong['ngay']?></td>
                  </tr>   
    <?php 
			}
			else
			{				
	?>
    				 <tr>
                     <td style=" text-align:center;"><?php echo $so?></td>
                    <td><?php echo $dong['noidung']?></td>
                    <td><?php echo $dong['hovaten']?></td>
                    <td><?php echo $dong['email']?></td>
                    <td><?php echo $dong['ngay']?></td>
                    </tr>         
    <?php 
			}
		$so++;
		}
	?>
   
  </table>
</div>