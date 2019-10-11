<?php
if ((isset($_GET["idh"])) && (isset($_GET["idl"])) && isset($_GET["value"]) && isset($_GET["xl"]))
{
    $idl = $_GET["idl"];
    $idh = $_GET["idh"];
    $value = $_GET["value"];
    $xl= $_GET["xl"];

}
$sanPhamBUS = new SanPhamBUS();
if (isset($_GET["ac"]))
{
    $ac = $_GET["ac"];
    if ($ac==1)
    {
        $lstSanPham = $sanPhamBUS->GetAllAvailableTH($idh,$idl,$value,$xl);
    }
    if (isset($_GET["value"]))
    {
        if (($_GET["value"])!= null)
        {
            ?>
            <div class="kqtk" style="font-size: 15px">Kết quả tìm kiếm <img class="thoat" src="img/x.jpg" width="20px" title="Thoát tìm kiếm" height="20px" onclick="hide()" alt=""></div>
            <script language="JavaScript">
                function hide(){
                    $('.kqtk').hide();
                    location = "Index.php?";
                }
            </script> <?php
        }
   }
    foreach ($lstSanPham as $sanPham)
    {$idl= $sanPham->MaLoaiSanPham;
    ?>
        <div class="box">
            <a href="images/<?php echo "$sanPham->HinhURL"; ?>" data-lightbox="hinh1" data-title="My caption"><img class="pic" src="images/<?php echo "$sanPham->HinhURL"; ?>" /> </a>
            <div class="pname"><?php echo "$sanPham->TenSanPham"; ?></div>
            <div class="pprice">Giá: <?php echo number_format($sanPham->GiaSanPham); ?>đ</div>
            <div class="action">
                <a href="Index.php?a=4&id=<?php echo "$sanPham->MaSanPham"; ?>&idl=<?php echo "$idl"?>">Chi tiết</a>
            </div>
        </div>
<?php
}}?>
<script type="text/javascript">
    $(function(){
        $("img.pic").lazyload
    });
</script>
