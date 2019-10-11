<?php
include ("../../../../Include.php");
if (isset($_GET["id"]))
{
    $id             =$_GET["id"];
    $gia            =$_GET["gia"];
    $sl             =$_GET["sl"];
    $sanPhamBUS = new SanPhamBUS();
    $sanPhamBUS->UpdateGia($id,$sl,$gia);
    header("location:../../ad_Index.php?a=2&ac=0");
}
else
{?>
    <script>
        window.history.back();
    </script>
    <?php
}
?>