<?php
session_start();
include ("../../Include.php");
if (isset($_SESSION["MaTaiKhoan"]))
{

    $id = $_SESSION["MaTaiKhoan"];
    $mkcu = $_POST["passcu"];
    $mkmoi = $_POST["paw"];
    $taiKhoanBUS = new TaiKhoanBUS();
    $ktmk = $taiKhoanBUS->KTMK($id,$mkcu);
    if ($ktmk == 0)
    {
        header("location:../../Index.php?a=11&error=1");
    }
    else
    {
        $taiKhoanBUS->UpdateMK($id,$mkmoi);
        header("location:../../Index.php?a=404&id=4");
    }
}
else
{
    header("Location:../../Index.php?a=404&id=404");
}
?>