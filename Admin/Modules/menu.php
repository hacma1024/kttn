<?php

	$q= $_SESSION["quyen"];

	$mand= $_SESSION["mand"];

?>

<script type="text/javascript" language="javascript">

$(document).ready(function(e) {

    $('#btnexit').click(function(e) {	// THOAT

        var kq= confirm("Bạn có muốn thoát không?");

		if (kq==true)

			window.location="login.php?ac=thoat";

    });

	

	$('#btnhome').click(function(e) {

        var kq= confirm("Bạn có muốn về trang chủ?");

		if (kq==true)

			window.location="../index.php";

    });

});

</script>

<div id="menu" style=" width: 8%; background-color: #F0F0F0;	float: left;	">

	<a id="btnhome" href="#">

      <div class="box-button">

        <img src="Images/home.png" alt="Home" title="Home" />    

        <p> Home </p>

      </div>

    </a>   

   
     <a href="index.php?quanli=dethi&ac=them">

      <div class="box-button">

        <img src="Images/list.png" alt="Danh mục" title="Danh mục" />    

        <p> Quản lí đề thi </p>

      </div>

    </a>


     <a href="index.php?quanli=cauhoi&ac=them">

      <div class="box-button">

        <img src="Images/question.png" alt="Bài viết" title="Bài viết" />    

        <p> Quản lí câu hỏi </p>

      </div>

    </a>

    <a href="index.php?quanli=diem&ac=them">

      <div class="box-button">

        <img src="Images/10.png" alt="điểm" title="điểm"/>    

        <p> Quản lí điểm </p>

      </div>

    </a>    
     <a href="index.php?quanli=tailieu&ac=them">

      <div class="box-button">

        <img src="Images/book.png" alt="Tài liệu" title="Tài liệu" />    

        <p> Quản lí tài liệu </p>

      </div>

    </a>	 
    <?php

	if ($q==1)

	{

	?>
   <a href="index.php?quanli=gopy&ac=them">
  
        <div class="box-button">
  
          <img src="Images/dethi.png" alt="Góp ý" title="Góp ý" />    
  
          <p> Xem góp ý </p>
  
        </div>
  
      </a>
     <a href="index.php?quanli=nguoidung&ac=them">

      <div class="box-button">

        <img src="Images/user.png" alt="Người dùng" title="Người dùng"/>    

        <p> QL Người dùng</p>

      </div>

    </a>        

    <?php

	}

	?>
	<a href="index.php?quanli=doimatkhau">

      <div class="box-button">

        <img src="Images/change-password.png" alt="Đổi mật khẩu" title="Đổi mật khẩu"/>    

        <p> Đổi mật khẩu </p>

      </div>

    </a>    
    <a id="btnexit" href="#">

      <div class="box-button">

        <img src="Images/icon-exit.png" alt="Thoát" title="Thoát"/>    

        <p> Thoát </p>

      </div>

    </a>

</div>