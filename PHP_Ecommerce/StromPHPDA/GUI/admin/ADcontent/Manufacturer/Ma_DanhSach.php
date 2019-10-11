<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ HÃNG SẢN XUẤT</h1>
<br>
<div id ="timkiemhang" style="position: absolute; margin-left: 40%">
    <form name="ftimkiemhang" action="ADcontent/Manufacturer/Ma_xlTimkiem.php" method="GET">
        <input type="search" name="txttimkiemhang" size="25" maxlength="80" placeholder="Tìm kiếm" />
        <input type="submit" value="Tìm Kiếm"/>
    </form>
</div>
<br><br>
<?php
if (isset($_GET["value"]))
{
    $text = $_GET["value"];
}
else
{
    $text=null;
}
?>
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 330px" title="Trở về trang trước" alt="" onclick=" Back()">
<a href="ADcontent/Manufacturer/Ma_xlLoc.php?ac=1&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; position: absolute; margin-left: 390px" title="Lọc theo hãng còn kinh doanh" alt="" >
</a>
<a href="ad_Index.php?a=8&xl=0">
    <img src="../../img/add.png" alt="" style="width: 50px;height: 50px; margin-left: 70%" >
</a>
<table id="qlhang" cellspacing="0" border="1" style="margin-left: 24%;margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0" >
        <th width="100">Mã</th>
        <th width="100">Tên hãng</th>
        <th width="100">Logo</th>
        <th width="100">Tình trạng</th>
        <th width="250">Thao tác</th>
    </tr>
    <?php
    $hangSanXuatBUS = new HangSanXuatBUS();
    if(isset($_GET["ac"]))
    {
    $ac = $_GET["ac"];
    if ($ac == 1)
    {
        $lstHangSanXuat = $hangSanXuatBUS->GetAllAvailable();
    }
    if($ac==0) {
        $lstHangSanXuat = $hangSanXuatBUS->GetAll();
    }
    if($ac==2)
    {
        if (isset($_GET["value"]))
        {
            $text = $_GET["value"];
        }
        else{
            $text ="";
        }
        $lstHangSanXuat = $hangSanXuatBUS->timkiemManufacturer($text);
    }
    if($ac==3)
    {
        if (isset($_GET["value"]))
        {
            $text = $_GET["value"];
        }
        else{
            $text ="";
        }
        $lstHangSanXuat = $hangSanXuatBUS->timkiemManufacturerHD($text);
    }

    foreach ($lstHangSanXuat as $hangSanXuat)
    {?>
        <tr style="font-size: 11px">
            <td><?php echo "$hangSanXuat->MaHangSanXuat "; ?></td>
            <td><?php echo "$hangSanXuat->TenHangSanXuat"; ?></td>
            <td><img src="../../images/<?php echo "$hangSanXuat->LogoURL"; ?>" width="45px" height="15px"></td>
            <td><?php
                if (($hangSanXuat->BiXoa) == 0)
                {?>
                    <img src="../../img/khoa_mo.jpg" alt="" style="width: 35px;height: 35px"><?php
                }
                else { ?>
                    <img src="../../img/khoa_dong.jpg" alt="" style="width: 35px;height: 35px"><?php
                }?></td>
            <td>
                <a href="ADcontent/Manufacturer/Ma_xlDisable.php?id=<?php echo"$hangSanXuat->MaHangSanXuat";?>">
                    <img src="../../img/khoa.png" title="Vô hiệu hóa/ Kích hoạt" alt="" style="width: 35px;height: 35px; margin-left: 20px">
                </a>
                <a href="ad_Index.php?a=8&xl=1&id=<?php echo"$hangSanXuat->MaHangSanXuat";?>">
                    <img src="../../img/cole.jpg" title="Sửa lại logo hãng" alt="" style="width: 35px;height: 35px;margin-left: 40px">
                </a>
                <a href="ADcontent/Manufacturer/Ma_xlXoa.php?id=<?php echo"$hangSanXuat->MaHangSanXuat";?>">
                    <img src="../../img/thungrac.png" title="Xóa/ Vô hiệu hóa nếu hãng có sản phẩm" alt="" style="width: 35px;height: 35px;margin-left: 40px">
                </a>
            </td>
        </tr>
        <?php
    }}?>
</table>
<script>
    function Back() {
        window.history.back();
    }
</script>