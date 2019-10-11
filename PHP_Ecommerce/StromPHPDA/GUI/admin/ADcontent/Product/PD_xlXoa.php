<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $sanPham = new SanPhamBUS();
    $sanPham->Delete($id);
}
?>
<script>
    window.history.back();
</script>
