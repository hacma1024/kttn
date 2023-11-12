<script language="javascript" type="text/javascript">
$(document).ready(function(e) {
	function PTTimKiem()
	 {
		 var stk= $('#txttimkiem').val();	   
		 if (stk!="")
			window.location="index.php?xem=xemlai&stk="+stk;
	 }
	 
	 $('#txttimkiem').keydown(function(e) {
		if (e.keyCode==13)	// enter
			PTTimKiem();
	});	 	
	
	$('#txttimkiem').click(function(e) {
		$(this).val("");
	});				 
});
</script>
<?php 
	$tk="";
	if (isset($_GET["stk"]))
		$tk= $_GET["stk"];
	if ($tk!="")
	{
		$sql="select d.id, d.hoten, d.lop, d.diem, d.madethi, d.thoigian, d.thoigianlambai, d.lichsu, dt.socauhoi from tbldiem d inner join tbldethi dt on dt.madethi= d.madethi where dt.ktxemlai=1 and d.maxemlai='$tk'";	
		$diem= mysqli_query($con,$sql);
		$sodong= mysqli_num_rows($diem);		
		if ($sodong < 1)
		{
			?>
            <div style="width: 100%; height: 220px; float: left; padding-left: 180px; padding-top: 50px; ">
            <div class="thanhtimkiem" style="width: 200px; height: 200px;">
              <img id="imgxemlai" src="Images/4xemlai.png" height="150" width="150" />
            </div>
            <div class="thanhtimkiem" style="width: 500px; height:200px;">
              <input type="text" class="textbox" name="txttimkiem" id="txttimkiem"  size="40px" placeholder=" Nhập mã xem lại bài thi ..." style="padding: 10px; font-size: 25px;"/>    
            </div>
        </div>
        <div class="clear">
        </div>
            <p style="font-family: Tahoma; color:#820000; width:100%; text-align: center; font-size: 25px; font-style:italic;">Đề thi này đang tạm khóa hoặc mã xem lại không đúng, vui lòng kiểm tra lại!</p>
            <?php			
		}
		else
		{
			$dong_d= mysqli_fetch_assoc($diem);
			$socauhoi= $dong_d["socauhoi"];
			$socaudung= round(($dong_d["diem"]*$socauhoi)/10);
	?>
            <div id="xemlai-hienthi" style="margin-left: 100px;	padding-top: 50px;">
                <table class="table-them" width="997" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td width="997" height="70">
                      <div style="text-align:center; color:#035F13; font-size: 22px; text-shadow: 2px 2px #EEE; font-family: Verdana;"> __________&nbsp;&nbsp;&nbsp; <b> KẾT QUẢ BÀI LÀM </b> &nbsp;&nbsp;&nbsp;__________ </div>
                      </td>
                    </tr>
                    <tr>
                      <td>
                      <p style="margin: 10px;  line-height: 25px; color:#035F13; font-family: Verdana; font-size: 18px; border: inset 1px #035F13; padding: 10px 50px; width: 80%; font-style: italic;"> 
                        - Họ và tên: <b> <?php echo $dong_d["hoten"]?> </b><br />
                        - Lớp: <?php echo $dong_d["lop"]?> <br />
                        - Điểm: <?php echo $dong_d["diem"]?> <br />
                        - Mã đề thi: <?php echo $dong_d["madethi"]?> <br />
                        - Ngày thi: <?php echo $dong_d["thoigian"]?> <br />
                        - Thời gian: <?php echo $dong_d["thoigianlambai"]?> <br />
                      </p>
                       <div id="txtketqua" cols="25" rows="20" style="font-size:20px; color: #0000C6; margin-left: 10px; line-height: 30px; width: 100%;">
                            <?php 
                                $dong_d["lichsu"]= str_replace("../Upload","Upload",$dong_d["lichsu"]);			
                                echo $dong_d["lichsu"];
                            ?>
                            <p style="font-size: 24px; margin: 10px; border: solid 1px #0000C6; text-align: center; padding: 10px; font-weight: bold;"> Tổng số: <?php echo $socaudung." / ".$socauhoi?></p>
                       </div>
                        </td>
                    </tr>   
                  </table>
            </div>
	  <?php
         }		
	}
	else
	{
		?>
        <div style="width: 100%; height: 220px; float: left; padding-left: 180px; padding-top: 50px; ">
            <div class="thanhtimkiem" style="width: 200px; height: 200px;">
              <img id="imgxemlai" src="Images/4xemlai.png" height="150" width="150" />
            </div>
            <div class="thanhtimkiem" style="width: 500px; height:200px;">
              <input type="text" class="textbox" name="txttimkiem" id="txttimkiem"  size="40px" placeholder=" Nhập mã xem lại bài thi ..." style="padding: 10px; font-size: 25px;"/>    
            </div>
        </div>
        <div class="clear">
        </div>
        <?php
	}
?>
