<?php
	include('../config.php');
	$tenloaisp=$_POST['loaisp'];
	
	if(isset($_POST['them'])){
		//them
		$sql_them=("insert into danhmuc (ten_danhmuc) value('$tenloaisp')");
		mysqli_query($conn, $sql_them);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua = "update danhmuc set ten_danhmuc='$tenloaisp' where idDanhMuc='$_GET[id]'";
		mysqli_query($conn, $sql_sua);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}else{
		$sql_xoa = "delete from danhmuc where idDanhMuc = $_GET[id]";
		mysqli_query($conn, $sql_xoa);
		header('location:../../index.php?quanly=loaisp&ac=lietke');
	}
?>
