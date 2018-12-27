<?php
	include('../config.php');
	$tensp=$_POST['ten_sp'];
	$masp=$_POST['ma_sp'];
	$hinhanh=$_FILES['hinh_anh']['name'];
	$hinhanh_tmp=$_FILES['hinh_anh']['tmp_name'];
	move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
	$giadexuat=$_POST['gia'];
	$soluong=$_POST['so_luong'];
	$noidung=$_POST['mo_ta'];
	$loaisp=$_POST['danhmuc'];
	$nhasx=$_POST['nsx'];
	$tinhtrang=$_POST['tinh_trang'];
	$trang=$_GET['trang'];
	
	if(isset($_POST['them'])){
		//them
		 $sql_them=("insert into sanpham (ten_sp,ma_sp,hinh_anh,gia,so_luong,mo_ta,DanhMuc_idDanhMuc,NSX_idNSX,tinh_trang) value('$tensp','$masp','$hinhanh','$giadexuat','$soluong','$noidung','$loaisp','$nhasx','$tinhtrang')");
		mysqli_query($conn, $sql_them);
		echo $sql_them;
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		if($hinhanh!=''){
	  $sql_sua = "update sanpham set ten_sp='$tensp',ma_sp='$masp',hinh_anh='$hinhanh',gia='$giadexuat',so_luong='$soluong',mo_ta='$noidung',DanhMuc_idDanhMuc='$loaisp',NSX_idNSX='$nhasx',tinh_trang='$tinhtrang' where id_sp='$_GET[id]'";
		}else{
			$sql_sua = "update sanpham set ten_sp='$tensp',ma_sp='$masp',gia='$giadexuat',so_luong='$soluong',mo_ta='$noidung',DanhMuc_idDanhMuc='$loaisp',NSX_idNSX='$nhasx',tinh_trang='$tinhtrang' where id_sp='$_GET[id]'";
		}
		mysqli_query($conn, $sql_sua);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}else{
		$sql_xoa = "delete from sanpham where id_sp = $_GET[id]";
		mysqli_query($conn, $sql_xoa);
		header('location:../../index.php?quanly=sanpham&ac=lietke');
	}
?>
