<?php
	$sql6="select * from tblmon";
	$baiviet6= mysqli_query($con,$sql6);
	$sql7="select * from tblmon";
	$baiviet7= mysqli_query($con,$sql7);
	$sql8="select * from tblmon";
	$baiviet8= mysqli_query($con,$sql8);
	$sql9="select * from tblmon";
	$baiviet9= mysqli_query($con,$sql9);
?>
<div id="menu" style="font-size: 16px; margin-bottom: 20px;"> 
	<div style="float:left;">
        <ul>      
        	<a href="index.php?xem=hoctap"> 
            	<li> Home </li>  	
            </a>
            <li> Lớp 6 
            	<ul >
                <?php 
					while ($dong6= mysqli_fetch_assoc($baiviet6))
					{
					?>
                    	<a href="index.php?xem=loaitin&id=<?php echo $dong6['id']?>&lop=6"> 
                        	<li> <?php echo $dong6['mon'];?> </li> 
                         </a>
                    <?php	
					}
				?>                	
                </ul>
            </li>
            <li> Lớp 7 
            	<ul>
                	 <?php 
					while ($dong7= mysqli_fetch_assoc($baiviet7))
					{
					?>
                    	<a href="index.php?xem=loaitin&id=<?php echo $dong7['id']?>&lop=7"> 
                        	<li> <?php echo $dong7['mon'];?> </li> 
                         </a>
                    <?php	
					}
				?>     
                </ul>
            </li>
            <li> Lớp 8 
            	<ul>
                	 <?php 
					while ($dong8= mysqli_fetch_assoc($baiviet8))
					{
					?>
                    	<a href="index.php?xem=loaitin&id=<?php echo $dong8['id']?>&lop=8"> 
                        	<li> <?php echo $dong8['mon'];?> </li> 
                         </a>
                    <?php	
					}
				?>     
                </ul>
            </li>
            <li> Lớp 9 
           		 <ul>
                	 <?php 
					while ($dong9= mysqli_fetch_assoc($baiviet9))
					{
					?>
                    	<a href="index.php?xem=loaitin&id=<?php echo $dong9['id']?>&lop=9"> 
                        	<li> <?php echo $dong9['mon'];?> </li> 
                         </a>
                    <?php	
					}
				?>     
                </ul>
            </li>
            <li> Thi HSG 
            <ul>
                   <a href="index.php?xem=loaitin&id=1&lop=10"> <li> Toán </li></a>
                   <a href="index.php?xem=loaitin&id=2&lop=10"> <li> Ngữ văn </li></a>
                   <a href="index.php?xem=loaitin&id=3&lop=10"> <li> Anh văn </li></a>
				   <a href=index.php?xem=loaitin&id=3&lop=10"> <li> Tin Học </li></a>
                   
                </ul>
            </li>
            <a href="index.php?xem=gopy"> 
            	<li> Góp ý </li>  	
            </a>                
        </ul> 
   </div> 
</div>
<div class="clear">	</div>
