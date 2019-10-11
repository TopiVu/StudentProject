<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ LOẠI SẢN PHẨM</h1>
<br>
<div id ="timkiemloai" style="position: absolute; margin-left: 40%">
    <form name="ftimkiemloai" action="ADcontent/Category/CA_xlTimkiem.php" method="GET">
        <input type="search" name="txttimkiemloai" size="25" maxlength="80" placeholder="Tìm kiếm" />
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
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 340px" title="Trở về trang trước" alt="" onclick=" Back()">
<a href="ADcontent/Category/CA_xlLoc.php?ac=1&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; position: absolute; margin-left: 400px" title="Lọc theo loại còn kinh doanh" alt="" >
</a>
<a href="ad_Index.php?a=7&xl=0">
    <img src="../../img/add.png" title="Thêm loại mới" alt="" style="width: 50px;height: 50px; margin-left: 70%" >
</a>
<table id="qlloai" cellspacing="0" border="1" style="margin-left: 25%; margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0" >
        <th width="100">Mã</th>
        <th width="150">Tên Loại</th>
<!--        <th width="100">Logo</th>-->
        <th width="150">Tình trạng</th>
        <th width="250">Thao tác</th>

    </tr>
    <?php
    $loaiSanPhamBUS = new LoaiSanPhamBUS();
    if(isset($_GET["ac"]))
    {
        $ac = $_GET["ac"];
        if ($ac == 1)
        {
            $lstLoaiSanPham = $loaiSanPhamBUS->GetAllAvailable();
        }
        if($ac==0) {
            $lstLoaiSanPham = $loaiSanPhamBUS->GetAll();
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
            $lstLoaiSanPham = $loaiSanPhamBUS->timkiemCategory($text);
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
            $lstLoaiSanPham = $loaiSanPhamBUS->timkiemCategoryHD($text);
        }
        foreach ($lstLoaiSanPham as $loaiSanPham)
        {?>
            <tr style="font-size: 11px">
                <td><?php echo "$loaiSanPham->MaLoaiSanPham "; ?></td>
                <td><?php echo "$loaiSanPham->TenLoaiSanPham"; ?></td>
    <!--            <td><img src="../../img/--><?php //echo "$loaiSanPham->LogoURL";?><!--" width="45px" height="45px"></td>-->
                <td><?php
                    if (($loaiSanPham->BiXoa) == 0)
                    {?>
                        <img src="../../img/khoa_mo.jpg" alt="" style="width: 35px;height: 35px"><?php
                    }
                    else { ?>
                        <img src="../../img/khoa_dong.jpg" alt="" style="width: 35px;height: 35px"><?php
                    }?></td>
                <td>
                    <a href="ADcontent/Category/CA_xlDisable.php?id=<?php echo"$loaiSanPham->MaLoaiSanPham";?>">
                        <img src="../../img/khoa.png" title="Vô hiệu hóa/ Kích hoạt" alt="" style="width: 35px;height: 35px; margin-left: 20px">
                    </a>
                    <a href="ad_Index.php?a=7&xl=1&id=<?php echo"$loaiSanPham->MaLoaiSanPham";?>">
                        <img src="../../img/cole.jpg" title="Sửa lại tên loại" alt="" style="width: 35px;height: 35px;margin-left: 40px">
                    </a>
                    <a href="ADcontent/Category/CA_xlXoa.php?id=<?php echo"$loaiSanPham->MaLoaiSanPham";?>">
                        <img src="../../img/thungrac.png" title="Xóa/ Vô hiệu hóa nếu loại có sản phẩm" alt="" style="width: 35px;height: 35px;margin-left: 40px">
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