<?php
	$sql = "select * from danhmuc where idDanhMuc = '$_GET[id]'";
	$row=mysqli_query($conn, $sql);
	$dong=mysqli_fetch_array($row);
?>

<form action="modules/quanlyloaisp/xuly.php?id=<?php echo $dong['idDanhMuc']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center; font-size:25px">Sửa danh mục</td>
  </tr>
  <tr>
    <td width="97">Tên danh mục</td>
    <td width="87"><input type="text" name="loaisp" value="<?php echo $dong['ten_danhmuc'] ?>"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>


