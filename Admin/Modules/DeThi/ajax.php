<?php  		
	include("../config.php");	
	$m=0;	
	if (isset($_POST['method']))
		$m= $_POST['method'];
	if ($m==1)
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
					<option value="<?php echo $dong['madethi']?>"  > <?php echo $dong['chude']?> </option> 
			  <?php
				}
			  ?>  
		</select>
<?php	  
	}
	
	if ($m==2)
	{
		$madt="";
		if (isset($_POST['madethi']))
			$madt= $_POST['madethi'];
		$id= -1;
		if (isset($_GET["id"]))
			$id= $_GET["id"];	
		if ($madt!="") 
			$sql="select * from tbldiem where madethi='$madt' order by id desc";
		else
			$sql="select * from tbldiem order by id desc";		
		$diem= mysqli_query($con,$sql);
?>
 <table class="table" width="822" border="1" cellspacing="0" cellpadding="0" style="font-size: 16px;">   
        <tr>
          <td width="53" ><div align="center"><strong>STT</strong></div></td>
          <td width="245"><div align="center"><strong>HỌ VÀ TÊN</strong></div></td>
          <td width="65"><div align="center"><strong>ĐIỂM</strong></div></td>
          <td width="66"><div align="center"><strong>LỚP</strong></div></td>
          <td width="101"><div align="center"><strong>MÃ ĐỀ THI</strong></div></td>
          <td width="171"><div align="center"><strong>THỜI GIAN</strong></div></td>     
        </tr>
        <?php
            $so= 1;
            while($dong= mysqli_fetch_assoc($diem))
            {	
                if ($so%2==1)
                {if ($dong["id"]==$id)	
                    {
        ?>
                      <tr class="maunenchon">
                        <td style=" text-align:center;"><?php echo $so?></td>
                        <td><?php echo $dong['hoten']?></td>
                        <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                        <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                        <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                        <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>                         
                      </tr> 
        <?php
                    }
                    else
                    {
        ?>
                     <tr class="maunenle">
                         <td style=" text-align:center;"><?php echo $so?></td>
                        <td><?php echo $dong['hoten']?></td>
                        <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                        <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                        <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                        <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>                             
                      </tr> 
        <?php 
                    }
                    
        ?>      
        <?php 
                }
                else
                {
                    if ($dong["id"]==$id)
                    {
        ?>
                        <tr class="maunenchon">
                        <td style=" text-align:center;"><?php echo $so?></td>
                        <td><?php echo $dong['hoten']?></td>
                        <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                        <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                        <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                        <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>                             
                        </tr> 
        <?php 
                    }
                    else
                    {
        ?>
                         <tr>
                         <td style=" text-align:center;"><?php echo $so?></td>
                        <td><?php echo $dong['hoten']?></td>
                        <td style=" text-align:center;"><?php echo $dong['diem']?></td>
                        <td style=" text-align:center;"><?php echo $dong['lop']?></td>
                        <td style=" text-align:center;"><?php echo $dong['madethi']?></td>
                        <td style=" text-align:center;"><?php echo $dong['thoigian']?></td>                        
                        </tr>   
        <?php 
                    }				
        ?>     
        <?php 
                }
            $so++;
            }
        ?>
       
      </table>
<?php		
	}
?>
