<div class="TopTen">
    <h2 style="background-color: #CCFF99; text-align: center;"> TOP 10 SẢN PHẨM MỚI NHẤT </h2>
    <?php

$sanPhamBUS = new SanPhamBUS();
$lstSanPham = $sanPhamBUS->TopSanPhamNew();
foreach ($lstSanPham as $sanPham)
{   $idl= $sanPham->MaLoaiSanPham;
    ?>
    <div class="box">
        <a href="images/<?php echo "$sanPham->HinhURL"; ?>" data-lightbox="hinh1" data-title="My caption"><img src="images/<?php echo "$sanPham->HinhURL"; ?>" /></a>
        <div class="pname"><?php echo "$sanPham->TenSanPham"; ?></div>
        <div class="pprice">Giá: <?php echo number_format($sanPham->GiaSanPham); ?>đ (<?php echo "$sanPham->NgayNhap";?>)</div>
        <div class="action">
            <a href="Index.php?a=4&id=<?php echo "$sanPham->MaSanPham"; ?>&idl=<?php echo "$idl";?>">Chi tiết</a>
        </div>
    </div>
    <?php
}?>
    <div class="TopTen">
        <h2 style="background-color: #CCFF99; text-align: center;"> TOP 10 SẢN PHẨM ĐƯỢC MUA NHIỀU NHẤT </h2>
        <?php
        $sanPhamBUS = new SanPhamBUS();
        $lstSanPham = $sanPhamBUS->TopBanHang();
        foreach ($lstSanPham as $sanPham)
        {$idl= $sanPham->MaLoaiSanPham;?>
            <div class="box">
                <a href="images/<?php echo "$sanPham->HinhURL"; ?>" data-lightbox="hinh1" data-title="My caption"><img src="images/<?php echo "$sanPham->HinhURL"; ?>" /></a>
                <div class="pname"><?php echo "$sanPham->TenSanPham"; ?></div>
                <div class="pprice">Giá: <?php echo number_format($sanPham->GiaSanPham); ?>đ (<?php echo "$sanPham->SoLuongBan";?> lượt bán)</div>
                <div class="action">
                    <a href="Index.php?a=4&id=<?php echo "$sanPham->MaSanPham"; ?>&idl=<?php echo "$idl";?>">Chi tiết</a>
                </div>
            </div>
            <?php
        }?>
