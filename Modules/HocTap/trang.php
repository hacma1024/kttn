<div class="trang">
<?php 	//Trang duoc load theo chitietloaitin	, id loai tin da duoc lay ben xemloaitin.php	
	$sql= "select tl.id from tbltailieu tl inner join tblmon m on tl.mon= m.id where tl.mon='$idloaitin'";		 		
	$bv= mysqli_query($con,$sql);
	$sodong= mysqli_num_rows($bv);
	$sotrang= ceil($sodong/$sobv_macdinh);
	$i=1; $tr=0;
	if (isset($_GET["trang"]))	$tr=$_GET["trang"];
		
	if ($tr>5)
	{
?>	
      <!--tro ve dong dau tien-->
      <a href="index.php?xem=loaitin&id=<?php echo $_GET['id'] ?>&lop=<?php echo $_GET['lop']?>&trang=1">
         <div class="box-phantrang"> 
              <b>&laquo;</b>
         </div>
      </a>
<?php 		
	}
	while ($i <= $sotrang)
	{							
?>
        <a href="index.php?xem=loaitin&id=<?php echo $_GET['id'] ?>&lop=<?php echo $_GET['lop']?>&trang=<?php echo $i ?>">
          <div class="box-phantrang" <?php if ($i==$tr) {?> style="background-color:#D9FDF9; <?php }?>"> 
               <b><?php  echo $i?></b>
          </div>
        </a>
 <?php 			
		$i++;
	}	
	
	if (($tr>0) && ($tr<=3))
	{
?>
      <!--tro ve dong cuoi cung-->
      <a href="index.php?xem=loaitin&id=<?php echo $_GET['id'] ?>&lop=<?php echo $_GET['lop']?>&trang=<?php  echo ($sotrang - 1)?>">
         <div class="box-phantrang"> 
              <b>&raquo;</b>
         </div>
      </a>
<?php 
	}
?>
</div>