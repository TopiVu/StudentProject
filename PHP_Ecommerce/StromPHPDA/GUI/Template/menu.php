
<div id="sidebarloai" >
    <?php
    if (isset($_GET["idh"]))
    {
        $idh = $_GET["idh"];
    }
    else
    {
        $idh = null;
    }
    if(isset($_GET["value"]))
        $value = $_GET["value"];
    else
        $value = null;
    if(isset($_GET["xl"]))
        $xl = $_GET["xl"];
    else
        $xl = null;
    $loaiSanPhamBUS = new LoaiSanPhamBUS();
    $lstLoaiSanPham = $loaiSanPhamBUS->GetALLAvailable();
    foreach ($lstLoaiSanPham as $loaiSanPham)
    {
        ?>

        <a id="<?php echo "$loaiSanPham->MaLoaiSanPham"?>" href="Index.php?a=2&ac=1&idl=<?php echo "$loaiSanPham->MaLoaiSanPham"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=<?php echo "$xl";?>" >
            <?php echo "$loaiSanPham->TenLoaiSanPham";?>
        </a>
        <?php
    }
    ?>
</div>

<div id ="sidebarhang">
    <?php
    if (isset($_GET["idl"]))
    {
        $idl = $_GET["idl"];
    }
    else
    {
        $idl = null;
    }
    $hangSanXuatBUS = new HangSanXuatBUS();
    $lstHangSanXuat =  $hangSanXuatBUS->GetALLAvailable();
    foreach ($lstHangSanXuat as $hangSanXuat)
    {
        ?>
        <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"?>&idh=<?php echo "$hangSanXuat->MaHangSanXuat"; ?>&value=<?php echo "$value";?>&xl=<?php echo "$xl";?>">
            <img src="images/<?php echo "$hangSanXuat->LogoURL";?>">
        </a>
        <?php
    }
    ?>
</div>

