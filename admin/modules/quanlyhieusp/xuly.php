<?php
	include('../config.php');
	$tenhieusp=$_POST['hieusp'];
	$noisx=$_POST['noi_sx'];
	
	if(isset($_POST['them'])){
		//them
		$sql_lietkesp="select * from nsx order by idNSX desc ";
		$row_lietkesp=mysqli_query($conn, $sql_lietkesp);
		$id = mysqli_num_rows($row_lietkesp) + 1;
		$sql_them=("insert into nsx (idNSX,ten_NSX,noi_sx) value('$id','$tenhieusp','$noisx')");
		mysqli_query($conn, $sql_them);
		header('location:../../index.php?quanly=hieusp&ac=lietke');
	}elseif(isset($_POST['sua'])){
		//sua
		$sql_sua = "update nsx set ten_NSX='$tenhieusp',noi_sx='$noisx' where idNSX='$_GET[id]'";
		mysqli_query($conn, $sql_sua);
		header('location:../../index.php?quanly=hieusp&ac=lietke');
	}else{
		$sql_xoa = "delete from nsx where idNSX = $_GET[id]";
		mysqli_query($conn, $sql_xoa);
		header('location:../../index.php?quanly=hieusp&ac=lietke');
	}
?>
