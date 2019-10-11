<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $loaiSanPham = new LoaiSanPhamBUS();
    $loaiSanPham->Delete($id);
}
?>
<script>
    window.history.back();
</script>
