<?php  	
	include("../config.php");	
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
	$key=""; $sobv=0; $trang=0; $mand="";
	if (isset($_POST['key']))
		$key= $_POST['key'];
	if (isset($_POST['mand']))
		$mand= $_POST['mand'];	
	if (isset($_POST['sobv']))
		$sobv= $_POST['sobv'];	
	if (isset($_POST['trang']))
		$trang= $_POST['trang'];	
	$m=0;		
	if (isset($_POST['method']))
		$m= $_POST['method'];
	if ($m==1)	// LAY TAT CA HS
	{
		$lop= 0;
	  	if (isset($_POST['lop']))  	
		  $lop= $_POST['lop'];	
		$sql="select * from tbldethi where lop='$lop' order by id desc";		
		$dethi= mysqli_query($con,$sql);			
?>
		<select name="list-chude" id="list-chude">
			  <?php
				while ($dong= mysqli_fetch_assoc($dethi))
				{
			  ?>
					<option value="<?php echo $dong['madethi']?>"> 
						<?php echo "Lớp ".$lop." - ".$dong['madethi']." - ".$dong['chude']?> 
                    </option> 
			  <?php
				}
			  ?>  
		</select>
<?php	  
	exit();
	}
	
	$madt=""; $namhoc="";
	if (isset($_POST['madethi']))
		$madt= $_POST['madethi'];
	if (isset($_POST['namhoc']))
		$namhoc= $_POST['namhoc'];			
	if ($m==2)	// LAY THEO MA DE THI
	{
		if (($madt!="")&&($namhoc!=""))
			$sql="select * from tbldiem where madethi='$madt' and namhoc='$namhoc' order by id desc";
		else
			$sql="select * from tbldiem order by id desc";		
		$diem= mysqli_query($con,$sql);
	}
	
	if ($m==3)	// XOA HS TRONG DE THI
	{
		if (($madt!="")&&($namhoc!=""))
		{
			$sql="delete from tbldiem where madethi='$madt' and namhoc='$namhoc'";
			mysqli_query($con,$sql);
		}
		$sql="select * from tbldiem order by id desc";
		$diem= mysqli_query($con,$sql);
	}
	
	if ($m==4)	// XOA HS DA CHON THEO MA DE THI
	{
		if ($madt!="")
		{
			$sql="delete from tbldiem where madethi='$madt'";
			mysqli_query($con,$sql);
		}
		$sql="select * from tbldiem order by id desc";
		$diem= mysqli_query($con,$sql);
	}
	
	if ($m==5)	// XOA HS DA CHON THEO TUNG HS
	{
		$key=""; $sobv=0; $trang=0; $mand=""; $q=-1;
		if (isset($_POST['key']))
			$key= $_POST['key'];
		if (isset($_POST['mand']))
			$mand= $_POST['mand'];	
		if (isset($_POST['sobv']))
			$sobv= $_POST['sobv'];	
		if (isset($_POST['trang']))
			$trang= $_POST['trang'];
		if (isset($_POST['quyen']))
			$q= $_POST['quyen'];		
		$A= explode("-",$key);
		$dk="id= ".$A[0];;
		for ($i=1; $i < sizeof($A); $i++)
		   $dk= $dk." or id = ".$A[$i];
		$sql="delete from tbldiem where ".$dk;
		mysqli_query($con,$sql);		
		$sql="select d.* from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' order by d.id desc";
		if ($q==1)
			$sql="select d.* from tbldiem d order by d.id desc";
		$diem= mysqli_query($con,$sql);		
	}
?>
  <table class="table" width="1283" border="1" cellspacing="0" cellpadding="0">   
    <tr>
      <td width="20" height="37">  <input type="checkbox" id="chkall" name="chkall"/></td>
      <td width="47" ><div align="center"><strong>STT</strong></div></td>
      <td width="49"><div align="center"><strong>ID</strong></div></td>
      <td width="233"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
      <td width="62"><div align="center"><strong>ĐIỂM</strong></div></td>
      <td width="42"><div align="center"><strong>LỚP</strong></div></td>
      <td width="148"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
      <td width="254"><div align="center"><strong>DATE</strong></div></td>
      <td width="86"><div align="center"><strong>WTIME</strong></div></td>
      <td width="190"><div align="center"><strong>MXL</strong></div></td>
      <td width="64"><div align="center"><strong>FILE</strong></div></td>
      <td width="62"><div align="center"><strong>XEM</strong></div></td>     
    </tr>
    <?php
		$so=1;
  		while($dong=mysqli_fetch_assoc($diem))
		{							
	?>                 								
    			 <tr 
                 <?php                    
                   					
             		 ?> 
                 >
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
                        </a> </td>                             
                  </tr>       
    <?php 			
		$so++;
		}
	?>
   
  </table>