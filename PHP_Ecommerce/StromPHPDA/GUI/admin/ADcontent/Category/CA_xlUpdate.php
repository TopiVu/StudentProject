<?php
include ("../../../../Include.php");
if ($_GET["id"]!= null)
{

    $id = $_GET["id"];
    $tenLoai = $_GET["txtTen"];
    $loaiSanPhamBUS = new LoaiSanPhamBUS();
    $kt = $loaiSanPhamBUS->KTloaitontai($tenLoai);
    if ($kt==1)
    {
        header("location:../../ad_Index.php?a=7&xl=1&error=1&id=$id");
    }
    else
    {
        $loaiSanPhamBUS->UpdateName($id,$tenLoai);
        header("location:../../ad_Index.php?a=3&ac=0");
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