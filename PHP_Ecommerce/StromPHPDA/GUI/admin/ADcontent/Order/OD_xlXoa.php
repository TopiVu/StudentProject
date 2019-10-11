<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $d = $_GET["d"];
    if ($d ==4)
    {
        $id = $_GET["id"];
        $donHangBUS = new DonDatHangBUS();
        $chiTietDHBUS = new ChiTietDonHangBUS();
        $lstSoLuong = $chiTietDHBUS->LaySoLuong($id);
        foreach ($lstSoLuong as $soLuong)
        {
            $sl = $soLuong->SoLuong;
            $maSanPham = $soLuong->MaSanPham;
            $chiTietDHBUS->UpdateSLTon($sl,$maSanPham);

        }
        $chiTietDHBUS->Delete($id);
        $donHangBUS->Delete($id);
    }
}
?>
<script>
    window.history.back();
</script>
