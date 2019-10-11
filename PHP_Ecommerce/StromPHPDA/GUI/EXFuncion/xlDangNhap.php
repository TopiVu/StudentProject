<?php
session_start();
    include ("../../Include.php");
if(isset($_POST["txtUS"]) && isset($_POST["txtPS"]))
{
    $us = $_POST["txtUS"];
    $ps = $_POST["txtPS"];
    $taiKhoanBUS = new TaiKhoanBUS();
    $taiKhoan = $taiKhoanBUS->xllogin($us,$ps);
    if ($taiKhoan == null)
    {
        header("location:../../Index.php?a=404&id=1");
    }
    else
    {
        //Đăng nhập thành công --> Lưu Session
        $_SESSION["MaTaiKhoan"] = $taiKhoan->MaTaiKhoan;
        $_SESSION["MaLoaiTaiKhoan"] = $taiKhoan->MaLoaiTaiKhoan;
        $_SESSION["TenHienThi"] = $taiKhoan->TenHienThi;

        if ($taiKhoan->MaLoaiTaiKhoan == 1)
        {
            //Tài khoản Admin
            header("location:../admin/ad_Index.php?a=0");
        }
        else
        {
            //Tài khoản User thường
            header("location:../../Index.php?a=9");
        }
    }
}
else
{
    header("location:../../Index.php?a=404");
}
?>