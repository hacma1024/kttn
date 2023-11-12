<?php	
	include("../config.php");	
	$ten="";
	if (isset($_POST['hovaten']))
		$ten= $_POST['hovaten'];
	$lop="";
	if (isset($_POST['lop']))
		$lop= $_POST['lop'];
	$madt="DT00013242";
	if (isset($_POST['madethi']))
		$madt= $_POST['madethi'];	
	$sql_dt="select dt.id, dt.madethi, dt.chude, dt.socauhoi, dt.lop, dt.thoigian, dt.trangthai, dt.mand, dt.xemda, dt.ktthoigian, dt.ktxemlai, dt.ttfile, m.mon from tbldethi dt inner join tblmon m on m.id=dt.mon where dt.madethi='$madt'";	
	$dethi= mysqli_query($con,$sql_dt);
	$dong_dt= mysqli_fetch_assoc($dethi);
	$ttfile= $dong_dt['ttfile'];
	if ($ttfile > 0)
	{
?>  
<script language="javascript" type="text/javascript">
$(document).ready(function(e) {
	// HAM LAY TEN FILE								
	var tenfile="";
	$('input[type="file"]').change(function(e)
	{
		tenfile = e.target.files[0].name;  					       
	});
	
	$('#btnchuyen').click(function(e) {
		if (tenfile=="")
		{
			alert("Bạn chưa chọn FILE để gửi, vui lòng kiểm tra lại!");
			return;
		}
		else
		{
			$('#btnupload').click();	// submit form
		}
	});
});
</script>   	   
	  <div style="width: 80%; height: auto; padding-left: 180px;">
	  <form method="post" action="Modules/fileupload.php" enctype="multipart/form-data"> 
		<div class="thanhtimkiem" style=" float: left; width: 200px; height: 200px; -webkit-border-radius: 110px;
-moz-border-radius: 110px; border-radius: 110px; border: solid 4px #008414;">
			<img src="Images/files.png" height="120" width="120" />
		</div>                  
		  <div id="texttimkiem" style="margin-top: 80px; width: 60%; float: left;">
		  <input type="file" name="fileupload" id="fileupload" style=" padding:10px; font-size: 20px; margin-left: 30px; border: dotted #275E00 2px;" />    
		  <input type="button" id="btnchuyen" name="btnchuyen" value=" Gửi file " style=" padding:5px; font-size: 20px; margin-left: 20px;" />
		  <p style="padding-left:50px; margin-top: 20px; font-size: 14px; font-style: italic;"> Click Choose File để chọn file cần nạp
		  </p>         
		  </div>         
		   <input type="text" id="txtten2" name="txtten2" value="<?php echo $ten;?>" style="display: none;" />
		   <input type="text" id="txtlop2" name="txtlop2" value="<?php echo $lop;?>" style="display: none;"/>
		   <input type="text" id="txtmadethi2" name="txtmadethi2" value="<?php echo $madt;?>" style="display: none;"/>
		   <input type="submit" id="btnupload" name="btnupload" value=" Gửi file " style=" padding:5px; font-size: 20px; margin-left: 20px; display:none;" /> 
		</form>                	                                                        
	  </div>   
	   
	 <?php
	 exit();
	}
	// LAY DU DIEU O DAY =========================================================
	include("laydulieu.php");
	// LAY DU DIEU O DAY =========================================================
?>
<div id="cauhoidangtracnghiem" style="width: 100%; height: auto; ">
  <table width="1079" border="0" id="bangcauhoi" style="margin-left: 70px; ">
        <tr>
          <td width="75" height="100"  id="ex">          </td>
          <td width="915" style="text-align:justify; font-style:italic; line-height: 30px;">            
            <div style=" float:left; width:8%;"> <img src="Images/question.png"/></div>
              <div id="lbcauhoi" class="cauhoi"></div>              
            <div id="ch-hinhanh"> </div>       
          </td>
        </tr>	 
        <tr id="dapan12">	   
          <td height="60" colspan="2">
              <div id="dapan1"> 
                   <input class="radio" type="radio" name="rddapan" id="rdcauhoi1" size="100"> <b>1) &nbsp;</b>
                   <label class="dapan" id="lbdapan1" name="lbdapan1"> <br />             
                   </label> 
              </div>   
              <div id="dapan2"> 
                  <input type="radio" class="rd" name="rddapan" id="rdcauhoi2" > <b>2) &nbsp;</b>
                  <label class="dapan" id="lbdapan2" name="lbdapan2">		  
                  </label>
              </div>
          </td>       
        </tr>
        <tr id="dapan34">	            
          <td height="60" colspan="2">
              <div id="dapan3">
                  <input type="radio" class="radio" name="rddapan" id="rdcauhoi3"> <b>3) &nbsp;</b>
                  <label class="dapan" id="lbdapan3" name="lbdapan3">        	
                  </label>
              </div>
              <div id="dapan4">
                  <input type="radio" class="radio" name="rddapan" id="rdcauhoi4"> <b>4) &nbsp; </b>
                  <label class="dapan" id="lbdapan4" name="lbdapan4">        	
                  </label>
              </div>
          </td>
        </tr>  
        <tr id="dapantuluan">	            
          <td height="84" colspan="2" style="text-align:center;">
             Đáp án:  <input class="textbox" type="text" name="txtdapantuluan" id="txtdapantuluan" size="60px" placeholder= " Đáp án là...">
          </td>
        </tr>        
        <tr>	   
          <td style="padding-left: 400px;" colspan="2">
              <a href="#ex">
                  <div id="btntruoc"> <img src="Images/left.png" width="80" height="40"/><br />Trước</div>
              </a>
              <a href="#ex">
                  <div id="btnsau"> <img src="Images/right.png" width="80" height="40" /><br />Sau</div>
              </a>                    	
          </td>
        </tr>	  
    </table>
</div>

<div id="napbai">
  <label class="thongbao" id="lbthongbao" name=""></label>
    <a href="#">
    	<div id="btnnapbai" name="btnnapbai"> Nạp bài </div>
    </a> 
    <?php	
	if ($dong_dt["xemda"]==1)
	{
	?>
         <a href="#ex">
         	<div id="btnxemda" name="btnxemda"> Xem đáp án </div>
         </a> 
    <?php
	}
	?>	 
</div>
<script type="text/javascript" language="javascript">
 //-------------- SHOW CAU DAU TIEN --------------------------------------
   window.onload= PTLayDeThi();
</script>
