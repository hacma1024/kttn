<?php 	
	$idloaitin= 0; $lop= 0;	$i=1; $trang=1;
	$timkiem=""; $sobv_macdinh=20;	
	
	$idloaitin=0; $lop=0;
	if(isset($_GET["id"]))   $idloaitin= $_GET["id"];	
	if(isset($_GET["lop"]))  $lop= $_GET["lop"]; 	
	$sql1="select m.* from tblmon m where m.id='$idloaitin' limit 1";
	$baiviet1= mysqli_query($con,$sql1);
	$dong1= mysqli_fetch_assoc($baiviet1);	
	$tieude= "Lớp ".$lop." - ".$dong1['mon'];		
	
	if (isset($_GET["trang"]))	$trang=$_GET["trang"];	
	$batdau= ($trang - 1)*$sobv_macdinh;		
	if (isset($_GET["stk"]))	$timkiem=$_GET["stk"];	
	
	$sql="select tl.tensach, tl.id, tl.link, tl.tomtat, tl.hinhanh, m.mon from tbltailieu tl inner join tblmon m on tl.mon=m.id where tl.lop='".$lop."' and tl.mon='".$idloaitin."' order by tl.thutu desc limit $batdau, $sobv_macdinh";		
	
	if ($lop==0)	// tim kiem BAI HOC
	{
		$sql= "select tl.tensach, tl.id, tl.link, tl.tomtat, tl.hinhanh, m.mon from tbltailieu tl inner join tblmon m on tl.mon=m.id where tl.mon='$idloaitin' and tl.tensach like '%$timkiem%' order by tl.thutu desc";	
		$tieude="Kết quả tìm kiếm tài liệu môn ".$dong1['mon'];	 
	}	
	
	if ($lop==10)	// TIEU DE MENU
	{			
		$tieude= "Ôn thi vào lớp ".$lop." - ".$dong1['mon'];
	}	 
			
	$baiviet2= mysqli_query($con, $sql);
	$sodong= mysqli_num_rows($baiviet2);		
	$ngaythang= PTngayThang();			
?>

<div class="box">
<div class="tieudebox"><?php echo $tieude;?></div>
<p class="ngaythang"><?php echo $ngaythang?></p>
<?php 		 	
	while ($dong= mysqli_fetch_assoc($baiviet2))
	{	
?>
	<div class="boxtin">     	
		<a href="index.php?xem=tailieu&id=<?php echo $dong["id"]?>">      
		<?php  PTChonAnh($dong['hinhanh'])?>			
		<p class="boxtin-tieude"><?php echo $dong["tensach"]?></p>
		</a>
		<div class="boxtin-tomtat"><?php echo PTDinhDangXau($dong["tomtat"],450)?></div>            
		<?php				
		?>		            
		<a href="index.php?xem=tailieu&id=<?php echo $dong["id"]?>"> 
			<p class="doctiep">Đọc tiếp &raquo;</p>			
		</a>
	</div>   
<?php 
	}		     	 			
	include("Modules/HocTap/trang.php");	
	?>       
	<div class="clear">
    </div>  
</div>