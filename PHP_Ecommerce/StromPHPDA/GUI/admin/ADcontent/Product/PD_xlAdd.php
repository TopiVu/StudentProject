<?php
include ("../../../../Include.php");
if ($_GET["txtten"]!= null)
{
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $tenSanPham     =$_GET["txtten"];
    $hinhURL        =$_GET["url"];
    $gia            =$_GET["gia"];
    $ngay           = date("Y-m-d H:i:s");
    $soLuong        =$_GET["sl"];
    $moTa           =$_GET["mota"];
    $tLoai           =$_GET["loai"];
    $tHang           =$_GET["hang"];
    $hangBUS = new HangSanXuatBUS();
    $loaiBUS = new LoaiSanPhamBUS();
    $gloai = $loaiBUS->GetIDTen($tLoai);
    $ghang = $hangBUS->GetIDTen($tHang);
    $loai = $gloai->MaLoaiSanPham;
    $hang = $ghang->MaHangSanXuat;
    $sanPhamBUS = new SanPhamBUS();
    $kt = $sanPhamBUS->KTsanphamtontai($tenSanPham);
    if ($kt == 1)
    {
        header("location:../../ad_Index.php?a=9&error=1");
        // Xuất câu thông báo trùng tên đăng nhập
    }
    else
    {
        $maSanPham     = $sanPhamBUS->CreateProductCode();
        $sanPhamBUS->Insert($maSanPham,$tenSanPham,$hinhURL,$gia,$ngay,$soLuong,$moTa,$loai,$hang);
        header("location:../../ad_Index.php?a=2&ac=0");
    }
}
else
{
    header("Location:../../ad_Index.php?a=404&id=404");
}
?>