<?php  		
	include("../config.php");		
	include("../functions.php");		
	$x=""; $madt=""; $trang=1;
	if(isset($_POST["trangthai"]))	   
		$x= $_POST["trangthai"];	//submit
	
	if ($x=="tim")
	{		
		$madt= $_POST['madethi'];
		PTHienThiKetQua($con,$madt);	// tim kiem
		exit();
	}		
						
	if ($x=="them")
	{
		$mach= PTTimMaKeTiep_TheoId("tblcauhoi","CH",$con);		
		$cauhoi= trim($_POST["txtnoidung"]);						
		$da1= $_POST["txtdapan1"];
		$da2= $_POST["txtdapan2"];
		$da3= $_POST["txtdapan3"];
		$da4= $_POST["txtdapan4"];
		$dangch= $_POST["list-cauhoi"];
		$dadung= $_POST["list-dadung"];	
		$chuthich= trim($_POST["txtchuthich"]);	
		$dethi= $_POST["list-dethi"];		
		$xao= 0;
		if (isset($_POST['chkxao']))
			if($_POST['chkxao']=="on") $xao=1;;			
		$dichden="";			     
		// ANH MINH HOA
		$tenanh=$_FILES["hinhanh"]["name"];	
		if ($tenanh!="")
		{
			$time= date("Ymdhis");
			$tenanh= $time.$tenanh;
			$dichden="../../../Upload/".$tenanh;
			copy($_FILES["hinhanh"]["tmp_name"],$dichden);
			$dichden=substr($dichden,9);
		}		
		$sql= "insert into tblcauhoi (mach, cauhoi, madethi, hinhanh, dapan1, dapan2, dapan3, dapan4, dapandung, xao,chuthich, dangch)";
		$sql= $sql."values ('$mach', '$cauhoi', '$dethi', '$dichden', '$da1', '$da2', '$da3', '$da4', '$dadung', '$xao','$chuthich','$dangch')";						
		mysqli_query($con,$sql);					
		PTHienThiKetQua($con,"");	// them
		exit();
	}		
//===========================================================================	

	function PTHienThiKetQua($con, $ma)
	{					
		$trang=1; 		
		$so_bv=20;	$batdau=($trang-1)*$so_bv;
		$sql="";				
		if ($ma!='')		// tim kiem theo ma de thi		
		{
			$sql="select ch.* from tblcauhoi ch inner join tbldethi dt on dt.madethi= ch.madethi inner join tblnguoidung nd on nd.id= dt.mand where ch.madethi='$ma' order by trangthai desc, id desc";	
			$sql_tt="select count(*) from tblcauhoi where madethi='$ma' and trangthai=1";
			$cauhoi_tt= mysqli_query($con, $sql_tt);	
			$sodong_tt= mysqli_fetch_array($cauhoi_tt);
		}
		else	// lay tat ca 		
		{			
			$trang= $_POST["txttrang"];		
			$mand= $_POST["txtmand"]; $q= $_POST["txtquyen"];		
			$so_bv=20;	$batdau=($trang-1)*$so_bv;
			$sql="select ch.* from tblcauhoi ch inner join tbldethi dt on dt.madethi= ch.madethi inner join tblnguoidung nd on nd.id= dt.mand where dt.mand='$mand' order by id desc limit $batdau, $so_bv";	
			if ($q==1)
				$sql="select * from tblcauhoi order by id desc limit $batdau, $so_bv";	
		}				
		$cauhoi= mysqli_query($con,$sql);	
		$sodong= mysqli_num_rows($cauhoi);		
		$quanli=""; $ac="";	
		if (isset($_POST["quanli"])) $quanli= $_POST["quanli"];
		if (isset($_POST["ac"])) $ac= $_POST["ac"];			
		$id= -1;
		if (isset($_GET["id"]))
			  $id= $_GET["id"];	
		if ($ma!="")	// tim kiem					
		{
			?>
            <div style="width: 100%; font-style: italic; font-size: 12px; text-align: center; padding: 10px 0px; color:#710000;"> 
            	(Tổng số câu hỏi là <?php echo $sodong?> - <?php echo $sodong_tt[0]?> Đang sử dụng - <?php echo ($sodong -  $sodong_tt[0])?> Không sử dụng)
            </div>
            <?php
		}
		
	?>    	
<table class="table" width="1137" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">   
    <tr>
      <td width="41" height="36"><div align="center"><strong>STT</strong></div></td>
      <td width="471"><div align="center"><strong>CÂU HỎI</strong></div></td>
      <td width="136"><div align="center"><strong>ẢNH</strong></div></td>
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
                    <td style=" text-align:center;">
                    <?php if ($dong["hinhanh"]!="")
						{
					?>
                    	<img src="../<?php echo $dong["hinhanh"]?>" style="width: 80px;" /> 
                    <?php  }
						else
						{						
					?>      
                    	<img src="Images/no-image.jpg" style="width: 80px;" />  
                    <?php  }?>           
                    </td>
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
                        <a onclick="PTXoa_CauHoi(<?php echo $dong['id']?>,'<?php echo $dong['cauhoi']?>')" href="#">
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
		if ($ma=="")
			include("trang.php");
	}
?>
