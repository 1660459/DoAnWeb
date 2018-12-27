
<form action="modules/quanlysanpham/xuly.php" method="post" enctype="multipart/form-data">
<h3>&nbsp;</h3>
<table width="600" border="1">
  <tr>
    <td colspan="2" style="text-align:center;font-size:25px;">Thêm  sản phẩm</td>
  </tr>
  <tr>
    <td width="97">Tên sản phẫm</td>
    <td width="87"><input type="text" name="ten_sp"></td>
  </tr>
  <tr>
    <td>Mã SP</td>
    <td><input type="text" name="ma_sp"></td>
  </tr>
  <tr>
    <td>Hình ảnh</td>
    <td><input type="file" name="hinh_anh" /></td>
  </tr>
  <tr>
    <td>Giá đề xuất</td>
    <td><input type="text" name="gia"></td>
  </tr>
  <tr>
    <td>Nội dung</td>
    <td><textarea name="mo_ta" cols="40" rows="10"></textarea></td>
  </tr>
  <tr>
    <td>Số lượng</td>
    <td><input type="text" name="so_luong"></td>
  </tr>
  <tr>
  <?php
  $sql_loaisp = "select idDanhMuc,ten_danhmuc from danhmuc";
  $row_loaisp=mysqli_query($conn, $sql_loaisp);
  ?>
    <td>Loại sản phẩm</td>
    <td><select name="danhmuc">
    <?php
	while($dong_loaisp=mysqli_fetch_array($row_loaisp)){
	?>
    	<option value="<?php echo $dong_loaisp['idDanhMuc'] ?>"><?php echo $dong_loaisp['ten_danhmuc'] ?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
      <?php
  $sql_hieusp = "select * from nsx";
  $row_hieusp=mysqli_query($conn, $sql_hieusp);
  ?>
    <td>Tên nhà sx</td>
    <td><select name="nsx">
    <?php
	while($dong_hieusp=mysqli_fetch_array($row_hieusp)){
	?>
    	<option value="<?php echo $dong_hieusp['idNSX'] ?>"><?php echo $dong_hieusp['ten_NSX'] ?></option>
        <?php
	}
		?>
    </select></td>
  </tr>
  <tr>
    <td>Tình trạng</td>
    <td><select name="tinh_trang">
   
    <option value="1">Kích hoạt</option>
     <option value="2">Không kích hoạt</option>
    </select></td>
  </tr>
  <tr>
    <td colspan="2"><div align="center">
      <input type="submit" name="them" value="Thêm sản phẩm">
    </div></td>
  </tr>
</table>
</form>


