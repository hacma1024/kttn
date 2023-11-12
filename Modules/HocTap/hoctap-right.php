<?php 
	$id=0;
	if (isset($_GET['id']))
		$id= $_GET['id'];	
	$sql1="select * from tbltailieu where id='$id'";
	$baiviet1= mysqli_query($con,$sql1);
	$dong1= mysqli_fetch_assoc($baiviet1);	
	$sql2="select * from tbltailieu where mon='".$dong1['mon']."' and lop='".$dong1['lop']."' order by thutu desc limit 10";
	$baiviet2= mysqli_query($con,$sql2);		
?>
<div id="hoctap-right">
	<div class="tieudebox" style="margin-top: 5px;"> Các bài viết liên quan </div>   
	<?php
	while ($dong= mysqli_fetch_assoc($baiviet2))
	{
		?>
        <a href="index.php?xem=tailieu&id=<?php echo $dong['id']?>"> 
        	&raquo; <?php echo $dong['tensach']; ?>
        </a> <br>
        <?php
	}
	?>
</div>