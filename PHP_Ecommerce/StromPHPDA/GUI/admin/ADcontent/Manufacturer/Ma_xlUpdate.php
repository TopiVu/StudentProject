<?php
include ("../../../../Include.php");
if ($_GET["id"]!= null)
{

    $id = $_GET["id"];
    $ten = $_GET["txtten"];
    $logo = $_GET["txtlogo"];
    $hangSanXuat = new HangSanXuatBUS();
    $hangSanXuat->UpdateNamelogo($id,$ten,$logo);
    header("location:../../ad_Index.php?a=4&ac=0");
}
else
{?>
    <script>
        window.history.back();
    </script>
    <?php
}
?>