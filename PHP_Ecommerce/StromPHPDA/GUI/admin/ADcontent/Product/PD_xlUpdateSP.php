<?php
include ("../../../../Include.php");
if (isset($_GET["id"]))
{
    $id             =$_GET["id"];
    $tenSanPham     =$_GET["txtten"];
    $hinhURL        =$_GET["url"];
    $gia            =$_GET["gia"];
    $ngay           =$_GET["ngaynhap"];
    $soLuong        =$_GET["sl"];
    $moTa           =$_GET["mota"];
    $loai           =$_GET["loai"];
    $hang           =$_GET["hang"];
    $sanPhamBUS = new SanPhamBUS();
    $ngayup = date("Y-m-d H:i:s",$ngay);
    $sanPhamBUS->Update($id,$tenSanPham,$hinhURL,$gia,$ngay,$soLuong,$moTa,$loai,$hang);
    header("location:../../ad_Index.php?a=2&ac=0");
}
else
{
    header("Location:../../ad_Index.php?a=404&id=404");

}
?>