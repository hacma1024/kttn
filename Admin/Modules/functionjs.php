<script type="text/javascript" language="javascript">		

	

	function ptxoa_loaitin(id,ten, sodong)

	{				

		var kq = confirm("BẠN CÓ MUỐN XÓA BẢN GHI " + ten + " NÀY KHÔNG?");

		if (kq==true)

		{

			

			if ( sodong > 0 )

				alert("Loại tin đang được sử dụng trong bài viết, bạn không thể xóa!");

			else

				window.location="Modules/LoaiTin/xuli.php?quanli=loaitin&ac=xoa&id=" + id;

		}

	}	

		

	function PTXoa_Dethi(id,ten)

	{				

		var kq = confirm("BẠN CÓ MUỐN XÓA BẢN GHI " + ten + " NÀY KHÔNG?");

		if (kq==true)								

			window.location="Modules/DeThi/xuli.php?quanli=dethi&ac=xoa&id="+id;		

	}	



	function PTXoa_CauHoi(id,ten)

	{				

		var kq = confirm("BẠN CÓ MUỐN XÓA BẢN GHI " + ten + " NÀY KHÔNG?");

		if (kq==true)								

			window.location="Modules/CauHoi/xuli.php?quanli=cauhoi&ac=xoa&id="+id;		

	}					

	function PTXoa_Tailieu(id,ten,trang)

	{				

		var kq = confirm("BẠN CÓ MUỐN XÓA BẢN GHI " + ten + " NÀY KHÔNG?");

		if (kq==true)								

			window.location="Modules/TaiLieu/xuli.php?quanli=tailieu&ac=xoa&id="+id+"&trang="+trang;		

	}	
</script>