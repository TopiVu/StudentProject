<?php
include ("../../Include.php");
@session_start();
    if (isset($_SESSION["MaTaiKhoan"]))
    {
        $id = $_SESSION["MaTaiKhoan"];
        $hoten = $_GET["showname"];
        $ngaysinh = $_GET["birthday"];
        $diachi = $_GET["ips"];
        $phone = $_GET["phone"];
        if (($_GET["mail"])==null)
        {
            $mail = null;
        }
        $mail = $_GET["mail"];
        $taiKhoanBus = new TaiKhoanBUS();
        $taiKhoanBus->UpdateUser($id,$hoten,$ngaysinh,$diachi,$phone,$mail);
        header("location:../../Index.php?a=404&id=4");
    }
    else
    {
        header("Location:../../Index.php?a=404&id=404");
    }

?>