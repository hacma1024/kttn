<div class="trang">
<?php 
	$sql="select id from tbltailieu";	
	$baiviet= mysqli_query($con, $sql);
	$sodong=mysqli_num_rows($baiviet);
	$sotrang= ceil($sodong/$so_bv);
	$i=1;
	$tr=-1;
	if (isset($_GET["trang"]))
		$tr= $_GET["trang"];
	if ($tr>5)
	{
?>	
      <!--tro ve dong dau tien-->
      <a href="index.php?quanli=chiase&ac=them&trang=1">
         <div class="box-phantrang"> 
              <b>&laquo;</b>
         </div>
      </a>
<?php		
	}
	
	while ($i<=$sotrang)
	{
		if ($i==$tr)
		{
?>
			<a href="index.php?quanli=<?php echo $quanli?>&ac=<?php echo $ac?>&id=<?php echo $id?>&trang=<?php echo $i ?>">
              <div class="box-phantrang" style="background-color:#D9FDF9;"> 
                   <b><?php echo $i?></b>
              </div>
            </a>
<?php
		}
		else
		{		
?>
          <a href="index.php?quanli=<?php echo $quanli?>&ac=<?php echo $ac?>&id=<?php echo $id?>&trang=<?php echo $i ?>">
              <div class="box-phantrang"><?php echo $i?></div>
          </a>
<?php	
		}
		$i++;
	}
	
	if (($tr>0) && ($tr<=3))
	{
?>
      <!--tro ve dong cuoi cung-->
      <a href="index.php?quanli=chiase&ac=them&trang=<?php echo ($sotrang - 1)?>">
         <div class="box-phantrang"> 
              <b>&raquo;</b>
         </div>
      </a>
<?php
	}
?>

</div>