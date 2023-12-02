<?php
	$sql6="select tl.* from tbltailieu tl where tl.lop=6 order by tl.thutu desc limit 5";
	$baiviet6= mysqli_query($con,$sql6);
	$sql7="select tl.* from tbltailieu tl where tl.lop=7 order by tl.thutu desc limit 5";
	$baiviet7= mysqli_query($con,$sql7);
	$sql8="select tl.* from tbltailieu tl where tl.lop=8 order by tl.thutu desc limit 5";
	$baiviet8= mysqli_query($con,$sql8);
	$sql9="select tl.* from tbltailieu tl where tl.lop=9 order by tl.thutu desc limit 5";
	$baiviet9= mysqli_query($con,$sql9);
	
	function PTHienThiHinhAnh($anh)
	{
		$kq="";
		 if ($anh!="")
		 {                     
		    $kq="<img src='".$anh."' />";
		 }
         else
         {						                           
             $kq="<img src='Images/no-image.jpg'/>";
		 }
		return $kq;
	}	
?>	
<div id="lop6" class="lopx" style="float: left; width: 46%;">
     <div class="tieudebox"> KIẾN THỨC LỚP 6</div>
     <?php
        while ($dong= mysqli_fetch_assoc($baiviet6))
        {
    ?>
        <div class="boxtin">     	
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">      
            <?php echo PTHienThiHinhAnh($dong['hinhanh']);?>               		   
            <p class="boxtin-tieude"> <?php echo $dong['tensach']?> </p>
            </a>
            <div class="boxtin-tomtat"> <?php echo $dong['tomtat']?>  </div>            
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">  
            <p class="doctiep" style="">Đọc tiếp &raquo;</p>			
            </a>
        </div>  
        <?php
        }
        ?> 		  
</div>

<div id="lop7" class="lopx" style="float: left; width: 46%;">
     <div class="tieudebox"> KIẾN THỨC LỚP 7</div> 
      <?php
        while ($dong= mysqli_fetch_assoc($baiviet7))
        {
    ?>
        <div class="boxtin">     	
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">      
            <?php echo PTHienThiHinhAnh($dong['hinhanh']);?>               		   
            <p class="boxtin-tieude"> <?php echo $dong['tensach']?> </p>
            </a>
            <div class="boxtin-tomtat"> <?php echo $dong['tomtat']?>  </div>            
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">  
            <p class="doctiep" style="">Đọc tiếp &raquo;</p>			
            </a>
        </div>  
        <?php
        }
        ?> 		  
</div>

<div id="lop8" class="lopx" style="float: left; width: 46%;">
   <div class="tieudebox"> KIẾN THỨC LỚP 8</div>
    <?php
        while ($dong= mysqli_fetch_assoc($baiviet8))
        {
    ?>
        <div class="boxtin">     	
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">      
            <?php echo PTHienThiHinhAnh($dong['hinhanh']);?>               		   
            <p class="boxtin-tieude"> <?php echo $dong['tensach']?> </p>
            </a>
            <div class="boxtin-tomtat"> <?php echo $dong['tomtat']?>  </div>            
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">  
            <p class="doctiep" style="">Đọc tiếp &raquo;</p>			
            </a>
        </div>  
        <?php
        }
        ?> 		          
</div>

<div id="lop9" class="lopx" style="float: left; width: 46%;">
    <div class="tieudebox"> KIẾN THỨC LỚP 9</div>
     <?php
        while ($dong= mysqli_fetch_assoc($baiviet9))
        {
    ?>
        <div class="boxtin">     	
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">      
            <?php echo PTHienThiHinhAnh($dong['hinhanh']);?>               		   
            <p class="boxtin-tieude"> <?php echo $dong['tensach']?> </p>
            </a>
            <div class="boxtin-tomtat"> <?php echo $dong['tomtat']?>  </div>            
            <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>">  
            <p class="doctiep" style="">Đọc tiếp &raquo;</p>			
            </a>
        </div>  
        <?php
        }
        ?> 		  
</div> 

<div class="clear"> </div>

<div>
<?php
   //include("DAT/vd5.php");
?>
</div>