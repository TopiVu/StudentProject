<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $taiKhoanBUS = new TaiKhoanBUS();
    $taiKhoanBUS->SetCategory($id);
}
//header('location:../../ad_Index.php?a=1&ac=0');
?>
<script>
    window.history.back();
</script>
