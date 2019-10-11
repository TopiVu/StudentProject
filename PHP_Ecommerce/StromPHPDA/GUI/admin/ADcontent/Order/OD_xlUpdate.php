<?php
include ("../../../../Include.php");

if(isset($_GET["up"]) &&isset($_GET["id"]))
{
    $id = $_GET["id"];
    $up = $_GET["up"];
    $donHangBUS = new DonDatHangBUS();
    if ($up==2)
    {
        $donHangBUS->UGiaoHang($id);
    }
    elseif ($up==3)
    {
        $donHangBUS->UThanhToan($id);
    }
    elseif($up==4)
    {
        $donHangBUS->UHuy($id);
    }
    else
    {
        $donHangBUS->UDatHang($id);
    }

}
?>
<script>
    window.history.back();
</script>