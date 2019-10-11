<?php
include ("../../../../Include.php");
if ($_GET["txtTen"]!= null)
{
    $tenHang = $_GET["txtTen"];
    $logo = $_GET["txtURL"];
    $hangSanXuatBUS = new HangSanXuatBUS();
    $kt = $hangSanXuatBUS->KThangtontai($tenHang);
    if ($kt==1)
    {
        header("location:../../ad_Index.php?a=8&error=1");
    }
    else
    {
        $maHang = $hangSanXuatBUS->CreateManufacturerCode();
        $hangSanXuatBUS->Insert($maHang,$tenHang,$logo);
        header("location:../../ad_Index.php?a=4&ac=0");
    }
}
else
{?>
    <script>
        window.history.back();
    </script>
    <?php
}
?>