<?php
	$sql_lietkesp="select * from nsx order by idNSX desc ";
	$row_lietkesp=mysqli_query($conn, $sql_lietkesp);

?>

<table width="100%" border="1">
  <tr>
    <td>ID</td>
    <td>Tên nhà sản xuất</td>
    <td>Nơi sản xuất</td>
    <td colspan="2">Quản lý</td>
  </tr>
  <?php
  $i=1;
  while($dong=mysqli_fetch_array($row_lietkesp)){

  ?>
  <tr>
    <td><?php  echo $i;?></td>
    <td><?php echo $dong['ten_NSX'] ?></td>
    <td><?php echo $dong['noi_sx'] ?></td>    
    <td><a href="index.php?quanly=hieusp&ac=sua&id=<?php echo $dong['idNSX'] ?>">Edit</a></td>
    <td><a href="modules/quanlyhieusp/xuly.php?id=<?php echo $dong['idNSX']?>" class="delete_link">Del</a></td>
  </tr>
  <?php
  $i++;
  }
  ?>
</table>
