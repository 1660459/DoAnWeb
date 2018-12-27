<?php
	$sql = "select * from nsx where idNSX = '$_GET[id]'";
  $row=mysqli_query($conn, $sql);
	$dong=mysqli_fetch_array($row);
?>

<form action="modules/quanlyhieusp/xuly.php?id=<?php echo $dong['idNSX']?>" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="200" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Sửa nhà sản xuất</td>
  </tr>
  <tr>
    <td width="97">Tên nhà sản xuất</td>
    <td width="87"><input type="text" name="hieusp" value="<?php echo $dong['ten_NSX'] ?>"></td>
  </tr>
  <tr>
    <td width="97">Nơi sản xuất</td>
    <td width="87"><input type="text" name="noi_sx" value="<?php echo $dong['noi_sx'] ?>"></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="sua" value="Sửa">
    </div></td>
  </tr>
</table>
</form>


