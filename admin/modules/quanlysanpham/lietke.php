
<?php
	if(isset($_GET['trang'])){
		$trang=$_GET['trang'];
	}else{
		$trang='';
	}
	if($trang =='' || $trang =='1'){
		$trang1=0;
	}else{
		$trang1=($trang*5)-5;
  }
  
	$sql_lietkesp="select * from sanpham,danhmuc,nsx where danhmuc.idDanhMuc=sanpham.DanhMuc_idDanhMuc and nsx.idNSX=sanpham.NSX_idNSX order by sanpham.id_sp desc limit $trang1,30 ";
	$row_lietkesp=mysqli_query($conn, $sql_lietkesp);
?>

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
  while($dong=mysqli_fetch_array($row_lietkesp)){
  ?>
  <tr>
  	
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['ten_sp'] ?></td>
    <td><?php echo $dong['ma_sp'] ?></td>
    <td>
    </td>
    <td><?php echo number_format($dong['gia']) ?></td>
    <td><?php echo $dong['so_luong'] ?></td>
    <td><?php echo $dong['ten_danhmuc'] ?></td>
    <td><?php echo $dong['ten_NSX'] ?></td>
    <td><?php $sql_tinhtrang = "select tinh_trang from sanpham";
    
	$row_tinhtrang = mysqli_query($conn, $sql_tinhtrang);
	$dong_tinhtrang=mysqli_fetch_array($row_tinhtrang);
	if($dong_tinhtrang['tinh_trang'] == 1 ){
		echo 'Còn hàng';
	}elseif($dong_tinhtrang['tinh_trang'] ==2){
		echo 'Hết hàng';
	}
    ?></td>
    <td><a href="index.php?quanly=sanpham&ac=sua&id=<?php echo $dong['id_sp'] ?>" ><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
    <td><a href="modules/quanlysanpham/xuly.php?id=<?php echo $dong['id_sp']?>" class="delete_link"><center><img src="/../../../img/X.png" width="30" height="30"   /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
<div class="trang">
	Trang :
    <?php
	$sql_trang=mysqli_query($conn, "select * from sanpham");
	$count_trang=mysqli_num_rows($sql_trang);
	$a=ceil($count_trang/5);
	for($b=1;$b<=$a;$b++){
		
		if($trang==$b){
		
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:underline;color:red;">'.$b.' ' .'</a>';
        
	}else{
		echo '<a href="index.php?quanly=sanpham&ac=lietke&trang='.$b.'" style="text-decoration:none;color:#000;">'.$b.' ' .'</a>';
	}
	}
	?>
</div>
