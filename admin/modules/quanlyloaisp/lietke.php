<?php
	$sql_lietkesp="select * from danhmuc order by idDanhMuc desc ";
	$row_lietkesp=mysqli_query($conn, $sql_lietkesp);

?>
<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên loại sản phẩm</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['ten_danhmuc'] ?></td>
    <td><a href="index.php?quanly=loaisp&ac=sua&id=<?php echo $dong['idDanhMuc'] ?>"><center><img src="../imgs/edit.png" width="30" height="30" /></center></a></td>
    <td><a href="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['idDanhMuc']?>" class="delete_link"><center><img src="../imgs/delete.png" width="30" height="30" /></center></a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
