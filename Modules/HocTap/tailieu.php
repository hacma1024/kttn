<div id="hoctap-left" style="width: 75%; height: auto; float: left;">
<?php 		
	$cd="";	$loaitin= "";	$dong_lt= ""; $ac="";
	$idtailieu= $_GET["id"];  
	if (isset($_GET["ttnd"]))	$ttnd= $_GET["ttnd"];
	if (isset($_GET["xem"]))	$ac= $_GET["xem"];	
	$tieude="";	
	if ($ac=="tailieu")
	{
		$sql="select tl.ngay, tl.tensach, tl.tomtat, tl.link, tl.tacgia, tl.id, tl.lop, tl.linkdown, m.mon from tbltailieu tl inner join tblmon m on tl.mon= m.id where tl.id='$idtailieu'";		
		$baiviet= mysqli_query($con, $sql);
		$dong= mysqli_fetch_assoc($baiviet);				
		$tieude= "Lớp ".$dong['lop']." - Môn ".$dong['mon'];
	}			
?>
    <div class="box">	<!--danh cho bai viet-->
        <div class="tieudebox"> <?php  echo $tieude;?> </div>
        <p class="ngaythang"> <?php  echo $dong['ngay']?> </p>
        <p class="chitiet-tieude"> <?php  echo $dong['tensach']?> </p>
        <div class="chitiet-tomtat"> <?php  echo $dong['tomtat']; ?>  </div>	   
        <div class="chitiet-noidung" style="margin: 80px 5px;"> 
        <?php 
		$link= $dong['link'];
		if (strpos(($link),'view') > 0)
			$link= str_replace('view','preview',$link);		
		?>		 
            <iframe src="<?php echo $link;?>" width="800" height="700">
            </iframe>                       
        </div>  
        
        <?php  if ($dong['tacgia']!="")
            {	?>
                <p class="chitiet-tacgia">Tác giả: <?php  echo $dong['tacgia']?></p>
                <?php 
            }
        ?>	
        <div id="download" >
            <a href="<?php echo $dong['linkdown']?>"> 
                <img src="Images/download.png" height="50" width="150"/> 
            </a>
        </div>
       <!-- --------------------------------------------------- GHI CHU ------------------------------------->
       <div id="ghichu" style="font-family:'Times New Roman'; font-size:20px;color:#026422; font-style:italic; text-align:justify; line-height:30px; margin-top:30px; border: 2px solid #060; padding:10px; border-radius: 10px; background-color: #CEFFDD;" >
       
       </div>                
       <div class="clear"> </div>            
    </div>		
</div>

<?php
	include("Modules/HocTap/hoctap-right.php");
?>