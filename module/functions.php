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
        $stmt = $conn-> prepare("SELECT * FROM chitietdathang as `ctdh`  ORDER BY `ctdh`.`so_luong` DESC  LIMIT 0 , 10");
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

    function Select5Producer()
    {
        global $conn;
        $stmt = $conn-> prepare("SELECT * FROM sanpham as `sp` WHERE `sp`.`NSX_idNSX` = ? LIMIT 0,5 ");
        $stmt->execute(array($id));
	    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    }

?>

