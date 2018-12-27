<?php
    function SelectAllProduct()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham");
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    return $products;
    }

    function NewArrivals()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp`  ORDER BY `sp`.`NgayTiepNhan` DESC  LIMIT 0 , 12");
        $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    return $products;
    }

    function BestSeller()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham, chitietdathang  as `ctdh`  ORDER BY `ctdh`.`so_luong` DESC  LIMIT 0 , 10");
        $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    return $products;
    }

    function HightViewer()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp`  ORDER BY `sp`.`luot_xem` DESC  LIMIT 0 , 10");
        $stmt->execute();
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
	    return $products;
    }

    function SelectCategoryProduct()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM danhmuc ");
        $stmt->execute();
	    $cateproducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $cateproducts;
        
    }
    function SelectProductsByCategory($id)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`DanhMuc_idDanhMuc` = ? ");
        $stmt->execute(array($id));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    function SelectProductById($id)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`id_sp` = ? ");
        $stmt->execute(array($id));
	    $products = $stmt->fetch(PDO::FETCH_ASSOC);
        return $products;
    }

    function SelectProduct()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM danhmuc ");
        $stmt->execute();
	    $product = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $product;
    }
   
    function SelectProducer()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM nsx ");
        $stmt->execute();
	    $producer = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $producer;
    }

    function SelectProductByProducer($id)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`NSX_idNSX` = ?");
        $stmt->execute(array($id));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    function Select5Type($id)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`DanhMuc_idDanhMuc` = ? LIMIT 0,5 ");
        $stmt->execute(array($id));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    function Select5Producer($id)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`NSX_idNSX` = ? LIMIT 0,5 ");
        $stmt->execute(array($id));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

    function SearchProduct($tensp, $tendanhmuc){
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham sp, danhmuc d WHERE( sp.ten_sp LIKE ?
                            OR d.ten_danhmuc LIKE ?)
                            AND sp.DanhMuc_idDanhMuc = d.idDanhMuc");
        $stmt->execute(array('%'.$tensp.'%', '%'.$tendanhmuc.'%'));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }
    
    function SelectProductCart($id_sp)
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`id_sp` = ? ");
        $stmt->execute(array($id_sp));
	    $products = $stmt->fetch(PDO::FETCH_ASSOC);
        return $products;
    }

    //check out
    function InsertDonhang($tongtien, $id_nguoidung)
    {
        global $conn;
        $stmt = $conn->prepare("insert into dathang(tong_gia, NguoiDung_idNguoiDung) VALUES(?, ?) ");
        $stmt->execute(array($tongtien, $id_nguoidung ));
        return $conn->lastInsertID();
    }
    

    function InsertChiTietDonHang($so_luong, $gia, $id_dathang, $id_sanpham)
    {
        global $conn;
        $stmt = $conn-> prepare("insert into chitietdathang(so_luong,GIA,Thanhtien,DatHang_idDatHang,SanPham_id_sp) VALUES(?, ?, $so_luong * $gia, ?, ?)");
        $stmt->execute(array($so_luong, $gia, $id_dathang, $id_sanpham));
	
    }

    function SelectSoLuongSP($id_sanpham)
    {
        global $conn; 
        $stmt = $conn->prepare("SELECT `so_luong` from sanpham as `sp` WHERE `sp`.id_sp =  ?   LIMIT 1");
        $stmt->execute(array($id_sanpham));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    function UpdateSanPham($so_luong, $id_sanpham)
    {
        global $conn;

        $stmt = $conn->prepare("UPDATE sanpham as `sp` SET `so_luong` = ?  WHERE `sp`.id_sp = ? ") ;

        $stmt->execute(array($so_luong, $id_sanpham));
    }


    function KiemTraPost($string){
        return isset($_POST[$string]) ? $_POST[$string] : '';
    }
    if( ! function_exists('xss_clean') ) {
        function xss_clean($data)
        {
            // Fix &entity\n;
            $data = str_replace(array('&amp;','&lt;','&gt;'), array('&amp;amp;','&amp;lt;','&amp;gt;'), $data);
            $data = preg_replace('/(&#*\w+)[\x00-\x20]+;/u', '$1;', $data);
            $data = preg_replace('/(&#x*[0-9A-F]+);*/iu', '$1;', $data);
            $data = html_entity_decode($data, ENT_COMPAT, 'UTF-8');
    
            // Remove any attribute starting with "on" or xmlns
            $data = preg_replace('#(<[^>]+?[\x00-\x20"\'])(?:on|xmlns)[^>]*+>#iu', '$1>', $data);
    
            // Remove javascript: and vbscript: protocols
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=[\x00-\x20]*([`\'"]*)[\x00-\x20]*j[\x00-\x20]*a[\x00-\x20]*v[\x00-\x20]*a[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2nojavascript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*v[\x00-\x20]*b[\x00-\x20]*s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:#iu', '$1=$2novbscript...', $data);
            $data = preg_replace('#([a-z]*)[\x00-\x20]*=([\'"]*)[\x00-\x20]*-moz-binding[\x00-\x20]*:#u', '$1=$2nomozbinding...', $data);
    
            // Only works in IE: <span style="width: expression(alert('Ping!'));"></span>
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?expression[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?behaviour[\x00-\x20]*\([^>]*+>#i', '$1>', $data);
            $data = preg_replace('#(<[^>]+?)style[\x00-\x20]*=[\x00-\x20]*[`\'"]*.*?s[\x00-\x20]*c[\x00-\x20]*r[\x00-\x20]*i[\x00-\x20]*p[\x00-\x20]*t[\x00-\x20]*:*[^>]*+>#iu', '$1>', $data);
    
            // Remove namespaced elements (we do not need them)
            $data = preg_replace('#</*\w+:\w[^>]*+>#i', '', $data);
    
            do
            {
                // Remove really unwanted tags
                $old_data = $data;
                $data = preg_replace('#</*(?:applet|b(?:ase|gsound|link)|embed|frame(?:set)?|i(?:frame|layer)|l(?:ayer|ink)|meta|object|s(?:cript|tyle)|title|xml)[^>]*+>#i', '', $data);
            }
            while ($old_data !== $data);
    
            // we are done...
            return $data;
        }
    }



?>

