
<?php
	if(isset($_POST['timkiem'])){
	$search=$_POST['ma_sp'];
	echo 'Mã tìm kiếm :<strong>'.' '.$search.'</strong><br/>';
	$sql_timkiem="select * from sanpham,danhmuc,nsx where sanpham.DanhMuc_idDanhMuc=danhmuc.idDanhMuc and sanpham.NSX_idNSX=nsx.idNSX and ma_sp='".$search."'";
	$row_timkiem=mysqli_query($conn, $sql_timkiem);
	$count=mysqli_num_rows($row_timkiem);
	if($count>0){
	
?>
<h3>Kết quả tìm kiếm</h3>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên sản phẩm</td>
    <td>Mã sp</td>
    <td>Hình ảnh</td>
    <td>Giá đề xuất</td>
    <td>Số lượng</td>
    <td>Loại hàng</td>
    <td>Nhà SX</td>
    <td>Tình trạng</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_timkiem)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['ten_sp'] ?></td>
    <td><?php echo $dong['ma_sp'] ?></td>
    <td><img src="modules/quanlysanpham/uploads/<?php echo $dong['hinhanh'] ?>" width="80" height="80" /></td>
    <td><?php echo $dong['gia'] ?></td>
    <td><?php echo $dong['so_luong'] ?></td>
    <td><?php echo $dong['ten_danhmuc'] ?></td>
    <td><?php echo $dong['ten_NSX'] ?></td>
    <td><?php $sql_tinhtrang = "select tinh_trang from sanpham";
	$row_tinhtrang = mysqli_query($conn, $sql_tinhtrang);
	$dong_tinhtrang=mysqli_fetch_array($row_tinhtrang);
	if($dong_tinhtrang['tinh_trang'] == 1 ){
		echo 'Kích hoạt';
	}elseif($dong_tinhtrang['tinh_trang'] ==2){
		echo 'Không kích hoạt';
	}
    ?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['id_sp'] ?>"><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
    <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['idsp']?>"><center><img src="../imgs/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
	}else{
	  echo 'Không tìm thấy kết quả';
  }
  }
  ?>
</table>
