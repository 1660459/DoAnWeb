-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 12, 2018 lúc 11:25 AM
-- Phiên bản máy phục vụ: 10.1.37-MariaDB
-- Phiên bản PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `quanlybanhang`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) NOT NULL,
  `ma_sp` varchar(50) DEFAULT NULL,
  `ten_sp` varchar(45) DEFAULT NULL,
  `mo_ta` varchar(255) DEFAULT NULL,
  `so_luong` int(11) DEFAULT NULL,
  `hinh_anh` varchar(100) DEFAULT NULL,
  `NgayTiepNhan` date NOT NULL,
  `luot_xem` int(11) DEFAULT NULL,
  `tinh_trang` tinyint(4) DEFAULT NULL,
  `gia` decimal(10,0) DEFAULT NULL,
  `DanhMuc_idDanhMuc` int(11) NOT NULL,
  `NSX_idNSX` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `ma_sp`, `ten_sp`, `mo_ta`, `so_luong`, `hinh_anh`, `NgayTiepNhan`, `luot_xem`, `tinh_trang`, `gia`, `DanhMuc_idDanhMuc`, `NSX_idNSX`) VALUES
(1, 'D01', 'Gucci GG0262S', 'Blue Aviator Sunglasses', 50, 'img/gcc.jpg', '2018-12-03', 2000, 1, '7000000', 1, 1),
(2, 'D02', 'GG0212S 002', 'Maximum protection for your eyes avoids 100% UVA and UVB rays\r\nYoung style; fashionable', 20, 'img/gc1.jpg', '2018-12-07', 1000000, 1, '12500000', 1, 1),
(3, 'D03', 'Gucci GG 4215/S LJ4JJ', 'Modern design and personality', 30, 'img/k.jpg', '2018-11-18', 3000, 1, '5100000', 1, 1),
(4, 'D04', 'Gucci Women\'s GG0076S', 'Buy with confidence! Authorized Retailer. Authenticity Guaranteed. Full retail package with all accessories.', 10, 'img/gc.jpg', '2018-11-12', 254000, 1, '4923929', 1, 1),
(5, 'D05', 'GG0061S 015', 'Gucci Sunglasses. Series number: GG0061S. Color code: 015. Size: 56. Shape: Round. Lens Width: 56 mm. Lens Bridge: 22 mm. Arm Length: 140 mm. 100% UV protection. Non-Polarized.', 15, 'img/g4.jpg', '2018-12-09', 8550, 1, '7800000', 1, 1),
(6, 'D06', 'GUCCI  GG0200S 00', 'Green Square Sunglasses,  Series number: GG0200S. Color code: 001. Size: 57. Shape: Square. Lens Width: 57 mm. Lens Bridge: 14 mm. Arm Length: 145 mm. 100% UV protection', 15, 'img/m4.jpg', '2018-11-21', 1458, 1, '8990000', 1, 1),
(7, 'D07', 'GUCCI Gold Glitter', ' 100% UV protection. Non-Polarized. Frame Material: Metal. Frame Color: Gold, Gold Glitter. Lenses Type: Brown Gradient', 15, 'img/gucci.jpg', '2018-12-13', 14507, 1, '5999000', 1, 1),
(8, 'D08', 'GUCCI Green Gradient', '100% UV protection. Non-Polarized. Frame Material: Metal. Frame Color: Gold, Gold Glitter. Lenses Type: Brown Gradient.', 50, 'img/m1.jpg', '2018-11-13', 15500, 1, '5499000', 1, 1),
(9, 'M01', 'Dior MID NIGHTK-SBRHA', '\r\nModern & young design\r\nFashion show, trendy.\r\nPremium materials\r\nLens: polycarb', 50, 'img/d1.jpg', '2018-11-06', 34560, 1, '3599000', 2, 3),
(10, 'M02', 'DIOR DIORSIDERAL1', 'Material: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy\r\n', 24, 'img/d2.jpg', '2018-12-05', 67855, 1, '7999000', 2, 3),
(11, 'M03', 'Dior DIORGAIA PJPKU', '\r\nPlastic material, titanium alloy.\r\n- Absolute protection against ultraviolet rays.\r\n- Warranty 3 years.', 15, 'img/d3.jpg', '2018-12-06', 45637, 1, '5700000', 2, 3),
(12, 'M04', 'DIOR SCALES1.0/S', '\r\nPlastic material, titanium alloy.\r\n- Absolute protection against ultraviolet rays.', 38, 'img/d4.jpg', '2018-10-11', 40769, 1, '7500000', 2, 3),
(13, 'M05', 'DIOR DIORIZON2 PJP70', 'Anti-UV (UV)\r\n• Color layers (tinting and gradient)\r\n• Hard coating (HC)\r\n• Anti-reflective (Hard Coating-HMC)', 35, 'img/d5.jpg', '2018-09-13', 45951, 1, '4500000', 2, 3),
(14, 'M06', 'Dior DIORMIDNIGHTK SBRHA', 'Material: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; Polycarbonate resin lacquer meets international standards including 8 coating, anti UV (UV)\r\n', 67, 'img/d6.jpg', '2018-12-05', 45670, 1, '8900000', 2, 3),
(15, 'M07', ' DIOR DIORASTRAL 6K3I7', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; .\r\n• Tough polycarbonate lace meets international standards including 8 coats', 24, 'img.d7.jpg', '2018-12-13', 2000, 1, '7888000', 2, 3),
(16, 'M08', 'Dior DIORSOREALPOP KJ1IR', 'Owning a modern eye design, combined with high durable materials, bring out the fashion and personality for you. In addition, high-grade glass, which protects the wearer\'s eyes from harmful light.\r\n', 12, 'img/d8.jpg', '2018-09-21', 1450, 1, '10115000', 2, 3),
(17, 'R01', 'RAYBAN RB4298 710/51', '\r\nWith a rugged frame design that fits in perfectly with the G15, with the industry\'s leading in transparency and UV protection.', 20, 'img/r1.jpg', '2018-10-27', 2900, 1, '4450000', 3, 2),
(18, 'R02', 'RAYBAN RB3026 L2821', '\r\nFRAME: Pilot\r\nFACE MIRROR: Round Face, Heart Face, Square Face\r\nSIZE: Large\r\nGLASS MATERIAL: Metal\r\nGLASS FEATURES: Anti radiation / UV', 10, 'img/r2.jpg', '2018-11-01', 2999, 2, '3850000', 3, 2),
(19, 'R03', 'RAYBAN RB3026 197/71', '\r\nFRAME: Pilot\r\nFACE MIRROR: Round Face, Heart Face, Square Face\r\nSIZE: Standard\r\nGLASS MATERIAL: Metal\r\nGLASS FEATURES: Anti radiation / UV\r\n', 37, 'img/r4.jpg', '2018-11-09', 590, 1, '3900000', 3, 2),
(20, 'R04', 'Rayban RB 3025K 160/N5', '\r\nHigh grade material 18k gold\r\nPolarized lenses are gilded\r\nAnti-dust and sunscreen\r\nMaximum protection for the double', 5, 'img/r5.jpg', '2018-11-04', 2888, 1, '140000000', 3, 2),
(21, 'R05', ' RAYBAN RB 6317- 2832', '\r\nGenuine counterfeit counterfeit products of BCA.\r\nMaterial: Frames are mainly from high grade acetate, stainless steel, pure titanium or titanium alloy, ... genuine. ', 25, 'img/r6.jpg', '2018-10-13', 599, 1, '3160000', 3, 2),
(22, 'R06', ' RB4222 S-RAY 4222-6224/13', 'Eye material: Plastic\r\nMaterial: Nylon\r\nEye Color: Brown / Gradient\r\nFrame: Brown\r\nUV400 Filter: Yes', 45, 'img/r3.jpg', '2018-08-15', 4333, 1, '1975000', 3, 2),
(23, 'R07', 'RAYBAN 2132F 901', '\r\nFashion sunglasses brand Ray-Ban\r\nMaximum protection for your eyes avoids 100% UVA and UVB rays\r\nAnti-dust and sunscreen', 50, 'img/r7.jpg', '2018-07-19', 569, 1, '4550000', 3, 2),
(24, 'R08', 'RAY-BAN  S-RAY 4125F-901s/30', '\r\nProduct Type: Glasses.\r\n- Design: Fashion, stylish, fit every style.\r\n- Material: high quality materials.\r\n- Contact type: Anti-glare.', 60, 'img/r8.jpg', '2018-10-12', 6789, 1, '2625000', 3, 2),
(25, 'P01', 'PRADA VPR16SF 1AB1O1', 'FRAME: Rectangle\r\nFACE MIRROR: Heart face\r\nSIZE: Standard\r\nGLASS FILM: Nylon plastic\r\nGROWTH: 54', 40, 'img/p1.jpg', '2018-11-14', 3222, 1, '5560000', 4, 1),
(26, 'P02', 'Prada  PR54TS-7OE6O2', '\r\nLens Color: Purple - Frame Color: Yellow - Frame Color: Yellow / Frames - Metal Material: Metal. Eyepieces: Silicon- Lens Material: Plastic- Lens Width: 55mm- Bridge Width: 18mm- Length: 135mm', 65, 'img/p2.jpg', '2018-11-20', 990, 1, '7565000', 4, 1),
(27, 'P03', 'PRADA – OPR64TS-7OEAD2', '\r\nAIR7 technology includes 7 superior features: high quality materials; lightweight; heat-resistant; good elastic; colorful; Environmental friendliness; not fade.', 32, 'img/p3.jpg', '2018-11-25', 800, 1, '8100000', 4, 1),
(28, 'P04', 'PRADA – OPR68TS-ZVN117', 'Material: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy;\r\nStylish young fashion', 60, 'img/p4.jpg', '2018-06-16', 7809, 1, '7860000', 4, 1),
(29, 'P05', 'PRADA SPR62U ROK 219', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; .\r\nPolycarbonate resin meets international standards including 8 coatings\r\nAnti-UV (UV)\r\nElectro Magnetic Intereference (EMI)', 90, 'img/p5.jpg', '2018-11-14', 760, 1, '6630000', 4, 1),
(30, 'P06', 'PRADA VPR53I GAQ 101', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; LIFE FORM 0', 60, 'img/p6.jpg', '2018-11-18', 900, 1, '4726000', 4, 1),
(31, 'P07', 'PRADA SPS50T 1BC 125', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; .\r\nPolycarbonate resin meets international standards including 8 coatings\r\nAnti-UV (UV)\r\nElectro Magnetic Intereference (EMI)\r\nAnti-reflective (Hard Coating-HMC)', 90, 'img/p7.jpg', '2018-08-17', 7100, 1, '7000000', 4, 1),
(32, 'P08', 'PRADA SPS50S GAQ 5X1', 'Hard coating (HC)\r\nColoring (tinting and gradient)\r\nWaterproof (Hydrophobic)\r\nPhotochormic - corning (transition; sun sensor)\r\nOther plating (ex Polyvinyl Alcohol, polarized)', 70, 'img/p8.jpg', '2018-07-20', 1200, 1, '5950000', 4, 1),
(33, 'P09', 'PRADA PR19SSF-HAQ5P2', '100% UV protection\r\nPolazired No Yes\r\nDiameter of 19mm\r\nLong earrings: 140mm\r\nGlass Width According To Glass Size\r\nGlass height 40mm', 55, 'img/p9.jpg', '2018-10-22', 1020, 1, '7250000', 4, 1),
(34, 'P10', 'Prada SPS811B', '\r\nFeatures: Anti-corrosion metal alloy. Ultra-flexible frame.\r\n\r\nLens: Polycarbonate, high grade - UV high, with engraved Prada, polarized anti-glare', 90, 'img/p10.jpg', '2018-09-23', 1350, 1, '860000', 4, 1),
(35, 'A01', 'DOLCE & GABBANA GOLD  DG2133K-02/39', '\r\nSex: Unisex\r\nEye Material: Glass\r\nFrame Material: Gold Plated\r\nEye Color: Yellow / Mirror\r\nFrame: Black / Yellow\r\nUV400 Filter: Yes', 100, 'img/j1.jpg', '2018-11-18', 1100, 1, '18500000', 5, 5),
(36, 'A02', 'DOLCE & GABBANA DG4268F 2888-6G', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; .\r\nPolycarbonate resin meets international standards including 8 coatings\r\nAnti-UV (UV)\r\nColoring (tinting and gradient)\r\nHard coating (Hard coatingHC)', 150, 'img/j2.jpg', '2018-11-21', 2134, 1, '4488000', 5, 5),
(37, 'A03', 'DOLCE & GABBANA DG4280F 29558B', '\r\nAntireflective (Hard Multive CoatingHMC)\r\nElectro Magnetic Intereference (EMI)\r\nWaterproof (Hydrophobic)\r\nPhotochormic - corning (transition; sun sensor)\r\nOther plating (ex Polyvinyl Alcohol, polarized)', 200, 'img/j3.jpg', '2018-11-01', 1234, 1, '3128000', 5, 5),
(38, 'A04', 'DOLCE & GABBANA DG4269F 501-8G', '\r\nAntireflective (Hard Multive CoatingHMC)\r\nElectro Magnetic Intereference (EMI)\r\nWaterproof (Hydrophobic)\r\nPhotochormic - corning (transition; sun sensor)\r\nOther plating (ex Polyvinyl Alcohol, polarized)', 500, 'img/j4.jpg', '2018-10-12', 1800, 1, '4488000', 5, 5),
(39, 'A05', 'DOLCE & GABBANA DG4279F 502-13', '\r\nMaterial: Frame mainly from high acetate; Stainless Steel; pure titanium or titanium alloy; .\r\nPolycarbonate resin meets international standards including 8 coatings\r\nAnti-UV (UV)\r\nColoring (tinting and gradient)', 600, 'img/j5.jpg', '2018-09-20', 1145, 1, '3808000', 5, 5),
(40, 'A06', 'Dolce & Gabbana Women\'s Grosgrain ', 'Height 2.25in / 6cm\r\nProduct Dimensions\r\n6 x 2 x 2 inches\r\nShipping Weight\r\n8.8 ounces\r\nASIN\r\nB06ZZJ18YV\r\nItem model number\r\n2179', 200, 'img/j6.jpg', '2018-11-14', 435, 1, '4836503', 5, 5),
(41, 'A07', 'DOLCE & GABBANA DG2143-488/T3', 'Gender: Female\r\nEye material: Plastic\r\nMaterial Metal: Metal\r\nEye Color: Gray / Gradient / Anti-Glare\r\nFrame: Black / Yellow\r\nUV400 Filter: Yes', 450, 'img/j7.jpg', '2018-11-17', 667, 1, '8100000', 5, 5),
(42, 'A08', 'DOLCE & GABBANA DG2144-02/F9', '\r\nGender: Female\r\nEye material: Plastic\r\nMaterial Metal: Metal\r\nEye Color: Yellow / Mirror\r\nFrame Color: Yellow\r\nUV400 Filter: Yes', 450, 'img/j8.jpg', '2018-06-15', 1789, 1, '7200000', 5, 5),
(43, 'A09', 'DOLCE & GABBANA GOLD  DG2133K-488/58', '\r\nSex: Unisex\r\nEye Material: Glass\r\nFrame Material: Gold Plated\r\nEye Color: Green Anti-Glare\r\nFrame Color: Yellow\r\nUV400 Filter: Yes', 350, 'img/j9.jpg', '2018-05-30', 5670, 1, '18500000', 5, 5),
(44, 'A10', 'Dolce Gabbana Gold Edition DG06 ', '\r\nProduct Type: Eyeglasses\r\n- Brand: Dolce & Gabbana\r\n- Model: DG06\r\n- Objects: Male + Female\r\n- Material: Meka + High alloy\r\n- Frame Color: Black, Brown Tea\r\n- Eye Color: Black, Brown Tea, Mirror Color\r\n- Products include: Full box (01 glass 01 + accesso', 700, 'img/j10.jpg', '2018-09-02', 6666, 1, '1150000', 5, 5),
(45, 'A11', 'DOLCE & GABBANA DG3223F 501', '\r\nTYPE OF GLASS - GUARANTEED FOR USE - LOOSE - VIEN\r\nPLASTIC MATERIALS: PLASTIC\r\nWHITE CRYSTALLIZED - NOT QUALIFIED\r\nCOLOR: SUGGESTION (Bold or light, due to light when shooting)\r\nAll products are taken by phone, not wed\r\nLAST: ITALIA', 400, 'img/j11.jpg', '2018-10-19', 991, 1, '3760000', 5, 5),
(46, 'A12', 'DOLCE & GABBANA DG3243F 501', '\r\nTYPE OF GLASS - GUARANTEED FOR USE - LOOSE - VIEN\r\nPLASTIC MATERIALS: PLASTIC\r\nWHITE CRYSTALLIZED - NOT QUALIFIED', 900, 'img/j12.jpg', '2018-10-10', 567, 1, '4400000', 5, 5),
(47, 'A13', 'DOLCE & GABBANA DG3262F 501', 'TYPE OF GLASS - GUARANTEED FOR USE - LOOSE - VIEN\r\nPLASTIC MATERIALS: PLASTIC\r\nWHITE CRYSTALLIZED - NOT QUALIFIED', 500, 'img/j13.jpg', '2018-10-24', 777, 1, '4960000', 5, 5),
(48, 'D09', 'GG3665FS-51NYR', 'Black frame / Grey lenses', 70, 'img/g9.jpg', '2018-10-03', 1167, 1, '6200000', 1, 1),
(49, 'D10', 'GG0078SK-001', 'Black frame / Grey lenses	', 999, 'img/g10.jpg', '2018-08-10', 1156, 1, '6200000', 1, 1),
(50, 'D11', 'GG3796FS-ANTHA', 'Silver black / Blue mirror ', 766, 'img/g12.jpg', '2018-09-12', 888, 1, '7900000', 1, 1);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `fk_SanPham_DanhMuc1` (`DanhMuc_idDanhMuc`),
  ADD KEY `fk_SanPham_NSX1` (`NSX_idNSX`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_SanPham_DanhMuc1` FOREIGN KEY (`DanhMuc_idDanhMuc`) REFERENCES `danhmuc` (`idDanhMuc`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SanPham_NSX1` FOREIGN KEY (`NSX_idNSX`) REFERENCES `nsx` (`idNSX`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
