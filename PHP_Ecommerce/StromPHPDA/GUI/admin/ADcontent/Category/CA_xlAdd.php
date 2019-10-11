<?php
include ("../../../../Include.php");
if ($_GET["txtTen"]!= null)
{
    $tenLoai = $_GET["txtTen"];
    $loaiSanPhamBUS = new LoaiSanPhamBUS();
    $kt = $loaiSanPhamBUS->KTloaitontai($tenLoai);
    if ($kt==1)
    {
        header("location:../../ad_Index.php?a=7&error=1");
    }
    else
    {
        $maLoai = $loaiSanPhamBUS->CreateCategoryCode();
        $loaiSanPhamBUS->InsertName($maLoai,$tenLoai);
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