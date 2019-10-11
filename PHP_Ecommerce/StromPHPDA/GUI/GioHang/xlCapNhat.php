<?php
session_start();
include ("../../Include.php");
if(isset($_POST["txtSL"]))
{
    $sl = $_POST["txtSL"];
    if(is_nan($sl) == false)
    {
        //Nếu số lượng là Số thì mới xử lý
        $id = $_POST["hdID"];
        $gioHang = unserialize($_SESSION["GioHang"]);
        $sanPhamBUS = new SanPhamBUS();
        $soluongton = $sanPhamBUS->KTsanphamtontt($id);
        if($sl > 0 && $sl <=$soluongton)
        {
            //Xử lý cập nhật số lượng mới

            $gioHang->update($id, $sl);
            $_SESSION["GioHang"] = serialize($gioHang);
        }
        else
        {
            if(($sl <= 0) || ($sl>$soluongton))
            {
                $gioHang->delete($id);

                $_SESSION["GioHang"] = serialize($gioHang);
            }
        }

        header ("location:../../Index.php?a=8");
    }
    else
    {
        //Nếu số lượng mới không là số thì không xử lý mặt định đá về trang quản lý giỏ hàng
        header ("location:../../Index.php?a=8");
    }
}
else
{
    header ("location:../../Index.php?a=404");
}
?>