<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $hangSanXuat = new HangSanXuatBUS();
    $hangSanXuat->Delete($id);
}
?>
<script>
    window.history.back();
</script>
