<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ SẢN PHẨM</h1>
<br>
<div id ="timkiemsanpham" style="position: absolute; margin-left: 40%">
    <form name="ftimkiemsanpham" action="ADcontent/Product/PD_xlTimkiem.php" method="GET">
        <input type="search" name="txttimkiemsanpham" size="25" maxlength="80" placeholder="Tìm kiếm" />
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
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 5px" title="Trở về trang trước" alt="" onclick=" Back()">
<a href="ADcontent/Product/PD_xlLoc.php?ac=1&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; position: absolute; margin-left: 60px" title="Lọc theo sản phẩm còn bán" alt="" >
</a>
<a href="ad_Index.php?a=9&xl=0">
    <img src="../../img/add.png" title="Thêm sản phẩm mới" alt="" style="width: 50px;height: 50px; margin-left: 96%" >
</a>
<table id="qlsanpham" cellspacing="0" border="1" style="margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0">
        <th width="50">Mã</th>
        <th width="200">Tên sản phẩm</th>
        <th width="50">Hình</th>
        <th width="100">Giá sản phẩm</th>
        <th width="120">Ngày nhập</th>
        <th width="70">Tồn kho</th>
        <th width="70">Lượt bán</th>
        <th width="70">Lượt xem</th>
        <th width="100">Tình trạng</th>
        <th width="90">Loại</th>
        <th width="90">Hãng</th>
        <th width="230">Thao tác</th>

    </tr>
    <?php
    $sanPhamBUS = new SanPhamBUS();
    if(isset($_GET["ac"]))
    {
    $ac = $_GET["ac"];
    if ($ac == 1)
    {
        $lstSanPham = $sanPhamBUS->GetAllAvailable();
    }
    if($ac==0) {
        $lstSanPham = $sanPhamBUS->GetAll();
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
        $lstSanPham = $sanPhamBUS->timkiem($text);
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
        $lstSanPham = $sanPhamBUS->timkiemDG($text);
    }
    foreach ($lstSanPham as $sanPham)
    {?>
        <tr style="font-size: 11px">
            <td><?php echo "$sanPham->MaSanPham    "; ?></td>
            <td><?php echo "$sanPham->TenSanPham   "; ?></td>
            <td><a href="../../images/<?php echo "$sanPham->HinhURL"; ?>" data-lightbox="hinh1" data-title="My caption">  <img src="../../images/<?php echo "$sanPham->HinhURL"; ?>" height="15px" width="15px"/> </a>
                </td>
            <td><?php echo "$sanPham->GiaSanPham   "; ?></td>
            <td><?php echo "$sanPham->NgayNhap     "; ?></td>
            <td><?php echo "$sanPham->SoLuongTon   "; ?></td>
            <td><?php echo "$sanPham->SoLuongBan   "; ?></td>
            <td><?php echo "$sanPham->SoLuocXem    "; ?></td>
            <td>
                <?php
                if (($sanPham->BiXoa)==1)
                    echo "Ngưng bán";
                else
                    echo "Đang bán";
                ?></td>
            <td><?php
                $loaiSanPhamBUS =new LoaiSanPhamBUS();
                $loaiSanPham= $loaiSanPhamBUS->GetByID($sanPham->MaLoaiSanPham);
                echo "$loaiSanPham->TenLoaiSanPham"; ?></td>
            <td><?php
                $hangSanXuatBUS = new HangSanXuatBUS();
                $hangSanXuat = $hangSanXuatBUS->GetByID($sanPham->MaHangSanXuat);
                echo "$hangSanXuat->TenHangSanXuat"; ?></td>
            <td>
                <a href="ADcontent/Product/PD_xlDisable.php?id=<?php echo"$sanPham->MaSanPham";?>">
                    <img src="../../img/khoa.png" title="Vô hiệu hóa/ Kích hoạt" alt="" style="width: 35px;height: 35px; margin-left: 10px">
                </a>
                <a href="ad_Index.php?a=9&id=<?php echo"$sanPham->MaSanPham";?>&xl=1">
                    <img src="../../img/update.jpg" title="Cập nhật giá và thêm số sản phẩm" alt="" style="width: 35px;height: 35px;margin-left: 25px">
                </a>
                <a href="ad_Index.php?a=9&id=<?php echo"$sanPham->MaSanPham";?>&xl=2">
                    <img src="../../img/cole.jpg" title="Cập nhật thông tin" alt="" style="width: 35px;height: 35px;margin-left: 25px">
                </a>
                <a href="ADcontent/Product/PD_xlXoa.php?id=<?php echo"$sanPham->MaSanPham";?>">
                    <img src="../../img/thungrac.png" title="Xóa/ Vô hiệu hóa nếu hãng có đơn hàng" alt="" style="width: 35px;height: 35px;margin-left: 25px">
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
