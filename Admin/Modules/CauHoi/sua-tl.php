<?php	
    mysqli_set_charset($con, "utf8");	
	include("Modules/functions.php");	
	$sql="select * from tblcauhoi where id='$_GET[id]'";	
	$cauhoi= mysqli_query($con,$sql);
	$dong= mysqli_fetch_assoc($cauhoi);		
	$q= $_SESSION["quyen"];	$mand= $_SESSION["mand"];
	$trang= 1;
	if (isset($_GET["trang"])) 	$trang=$_GET["trang"];
	$sql_dt= "select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblnguoidung nd on nd.id= dt.mand inner join tblmon m on m.id=dt.mon where dt.mand='$mand' order by dt.id desc";
	if ($q==1)
		$sql_dt="select dt.madethi, dt.chude, dt.lop, m.mon from tbldethi dt inner join tblmon m on m.id=dt.mon order by dt.id desc";			
	$dethi= mysqli_query($con,$sql_dt);				
?>
<script language="javascript" type="text/javascript">	
	function PTTimAnh(pic)
	{
		var reader= new FileReader();
		reader.onload= function (e)
		{
			var img= document.getElementById("anhminhhoa");			
			img.src= e.target.result;
			img.style.display="inline";			
		};
		reader.readAsDataURL(pic.files[0]);
	}	
	
	function PTReset()
	{
		var x= "";
		x= $('#txtnoidung').text().trim();
		$('#txtnoidung').val(x);
		x= $('#txtchuthich').text().trim();		
		$('#txtchuthich').val(x);
	}
	
	$(document).ready(function(e) {
		
		PTReset();
		
        $('#list-dadung').change(function(e) {            
		   var da = $(this).find("option:selected");
		   var gt  = parseInt(da.val());
		   var st= "";		   
		   switch (gt)
		   {
			   case 1: st= $('#txtdapan1').val();
			   break;
			   case 2: st= $('#txtdapan2').val();
			   break;			 
			   case 3: st= $('#txtdapan3').val();
			   break;			  
			   case 4: st= $('#txtdapan4').val();
			   break;			  		  
		   }		 
		   $('#lbdadung').text(st);
		  /* <select name="sweets" multiple="multiple">
			  <option>Chocolate</option>
			  <option selected="selected">Candy</option>
			  <option>Taffy</option>
			  <option selected="selected">Caramel</option>
			  <option>Fudge</option>
			  <option>Cookie</option>
			</select>
			<div></div>
			 
			<script>
			$( "select" )
			  .change(function () {
				var str = "";
				$( "select option:selected" ).each(function() {
				  str += $( this ).text() + " ";
				});
				$( "div" ).text( str );
			  })
			  .change();
			 */
        });
    });					
</script>
<form action="Modules/CauHoi/xuli-tl.php?quanli=cauhoi&ac=sua&trang=<?php echo $trang?>&id=<?php echo $dong["id"]?>" method="post" enctype="multipart/form-data">
<div id="left-cauhoi">
  <table class="table-them" width="682" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="50" colspan="2"><div align="center"><strong> QUẢN LÍ CÂU HỎI </strong></div></td>
    </tr>
    <tr>
      <td width="138" height="34"><p>Nội dung</p>
        <p> câu hỏi:</p></td>
      <td width="503">
       <p style="color: #A8000D; font-size:14px; font-style:italic;">
      <textarea name="txtnoidung" id="txtnoidung" cols="64" rows="5" style="font-size:16px; color: #000;"> <?php echo $dong['cauhoi']?> </textarea>
        <br />(Chú ý: nội dung câu hỏi và đáp án không chứa dấu nháy đơn và kép (' và "))
        </p>
      </td>
    </tr>
    <tr>
      <td height="32">Đáp án:</td>
      <td>
      <input type="text" name="txtdapan" id="txtdapan" size="72px" value="<?php echo $dong["dapan1"]?>"/>
      </td>
    </tr>
     <tr>
      <td height="80">Chú thích:</td>
      <td>
      <span style="color: #A8000D; font-size:14px; font-style:italic;">
        <textarea name="txtchuthich" id="txtchuthich" cols="64" rows="3" style="font-size:16px; color: #000; "> <?php echo $dong['chuthich'];?> </textarea>
      </span>
      </td>
    </tr>
    <tr>
      <td height="49">Đề thi:</td>
      <td>     
          <select name="list-dethi" id="list-dethi">           
            <?php			
                while ($dong_dt= mysqli_fetch_assoc($dethi))			
                {
					$tenchude= $dong_dt['madethi']." - L".$dong_dt['lop']." - ".$dong_dt['mon']." - ".$dong_dt['chude'];
				  	$tenchude= PTDinhDangXau($tenchude,50);	
					if ($dong_dt['madethi']==$dong['madethi'])
                    {
            ?>
                    <option value="<?php echo $dong_dt['madethi']?>" selected="selected"> 
                        <?php echo $tenchude;?> 
                    </option>
            <?php
                    }
                    else
                    {
            ?>
                    <option value="<?php echo $dong_dt['madethi']?>" > 
                        <?php echo $tenchude;?> 
                    </option>	
            <?php		
                    }
				}
            ?>        	      
          </select>     
      </td> 
      </tr>  
    <tr>
      <td height="51" >Trạng thái:</td>
      <td>
        <select name="list-trangthai" id="list-trangthai">      
          <?php
            $tthai= $dong['trangthai'];
            switch ($tthai)
            {
                case 1:				
            ?>        		
                    <option value="1" selected="selected"> Sử dụng </option>
                    <option value="0"> Không sử dụng </option>					
            <?php
                    break;
                    
                    case 0:				
            ?>
                    <option value="1" > Sử dụng </option>
                    <option value="0" selected="selected"> Không sử dụng </option>	
            <?php
                    break; 
            }
            ?>        
        </select>
      </td>
    </tr>
    <tr>
      <td height="37"></td>
      <td>       
        <input class="button" type="submit" name="btncapnhat" id="btnthem" value="   CẬP NHẬT   "> 
        &nbsp;&nbsp;&nbsp;
        <input class="button" type="button" name="btnthoat" id="btnthoat" value="   THOÁT   " />
        </td>
    </tr>
    <tr>
      <td height="37" colspan="2">
      <input type="text" name="txtquyen" id="txtquyen" size="10px" value="<?php echo $_SESSION["quyen"];?>" style="display: none;"/> 
      <input type="text" name="txtmand" id="txtmand" size="10px" value="<?php echo $_SESSION["mand"];?>" style="display: none;"/>     
      </td>
      </tr>   
  </table>
  <?php    
    PTInTrangThai();
?> 
</div>
        
</form>

