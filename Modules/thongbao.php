<?php
	$id=0;
	if (isset($_GET["ms"]))
		$id= $_GET["ms"];
?>
<div class="clear"></div>
<div class="box">
	<div style="width: 100%; font-family: 'Times New Roman'; font-weight: bold; font-size: 30px; text-align: center; color: #1C8C00;"> THÔNG BÁO </div>        
	<p style="margin-top: 50px; font-family: Times New Roman; font-weight:bold; font-size:24px; color:#990C04; text-align: center;"> 
	  <?php
      if ($id==1000)
      { 
          echo "File đã chuyển thành công! Xin cảm ơn!";
      ?>
      	  <br />         
          <img src="Images/tb-ok.png" style="margin-top: 50px;" width="200" height="200"/>           
      <?php
      }
	  
      if ($id==1001)
      {
          echo "File đã chuyển thất bại, vui lòng kiểm tra lại!";
      ?>
      	  <br />         
          <img src="Images/tb-cancel.png" style="margin-top: 50px;" width="200" height="200"/>          
      <?php
      }	  	
	  
	  if ($id==1002)
      { 
          echo "Thư đã chuyển thành công! Cảm ơn bạn đã góp ý để website tốt hơn!";
      ?>
      	  <br />         
          <img src="Images/tb-ok.png" style="margin-top: 50px;" width="200" height="200"/>           
      <?php
      }  
	  
	  if ($id==1004)
      { 
          echo "Đăng kí thành công! Bạn có thể đăng nhập để sử dụng website.";
      ?>
      	  <br />         
          <img src="Images/tb-ok.png" style="margin-top: 50px;" width="200" height="200"/>           
      <?php
      }  
      ?>         	               	
    </p>	
</div>
<div class="clear"></div>