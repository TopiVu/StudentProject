<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ DƠN HÀNG</h1>
<br>
<div id ="timkiemdonhang" style="position: absolute; margin-left: 40%">
    <form name="ftimkiemdonhang" action="ADcontent/Order/OD_xlTimkiem.php" method="GET">
        <input type="search" name="txttimkiemdonhang" size="25" maxlength="80" placeholder="Tìm kiếm" />
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
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 280px" title="Trở về trang trước" alt="" onclick=" Back()">
<a href="ADcontent/Order/OD_xlLoc.php?ac=1&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; margin-left: 350px" title="Lọc theo đơn hàng cần duyệt" alt="" >
</a>
<a href="ADcontent/Order/OD_xlLocx.php?ac=4&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; margin-left: 10px" title="Lọc theo đơn hàng bị hủy" alt="" >
</a>
<!--<a href="ad_Index?a=6">-->
<!--    <img src="../../img/add.png" alt="" style="width: 50px;height: 50px; margin-left: 80%" >-->
<!--</a>-->
<table id="qlhang" cellspacing="0" border="1" style="margin-left: 20%">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0" >
        <th width="100">Mã</th>
        <th width="130">Ngày lập</th>
        <th width="100">Tổng tiền</th>
        <th width="100">Tài khoản mua </th>
        <th width="100">Tình Trạng</th>
        <th width="350">Thao tác</th>
    </tr>
    <?php
    $hoaDonBUS = new DonDatHangBUS();
    if(isset($_GET["ac"]))
    {
    $ac = $_GET["ac"];
    if ($ac == 1)
    {
        $lstHoaDon = $hoaDonBUS->GetDatHang();
    }
    if($ac==0)
    {
        $lstHoaDon = $hoaDonBUS->GetAll();
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
        $lstHoaDon = $hoaDonBUS->timkiem($text);
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
        $lstHoaDon = $hoaDonBUS->TKGetDatHang($text);
    }
    if($ac==4)
        {
            if (isset($_GET["value"]))
            {
                $text = $_GET["value"];
            }
            else{
                $text ="";
            }
            $lstHoaDon = $hoaDonBUS->TKGetDatHuy($text);
        }
    foreach ($lstHoaDon as $hoaDon)
    {?>
        <tr style="font-size: 11px">
            <td><?php echo "$hoaDon->MaDonDatHang "; ?></td>
            <td><?php echo "$hoaDon->NgayLap"; ?></td>
            <td><?php echo number_format("$hoaDon->TongThanhTien");?> VNĐ</td>
            <td><?php echo "$hoaDon->MaTaiKhoan";?></td>
            <td><?php
                $tinhTrangBUS = new TinhTrangBUS();
                $tinhTrang = $tinhTrangBUS->GetByID($hoaDon->MaTinhTrang);
                echo "$tinhTrang->TenTinhTrang"; ?></td>
            <td>
                <a href="ADcontent/Order/OD_xlUpdate.php?up=2&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/giaohang.png" title="Giao hàng" alt="" style="width: 35px;height: 35px; margin-left: 20px">
                </a>
                <a href="ADcontent/Order/OD_xlUpdate.php?up=3&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/thanhtoan.png" title="Thanh toán" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                </a>
                <a href="ADcontent/Order/OD_xlUpdate.php?up=4&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/cancal.jpg" title="Hủy" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                </a>
                <a href="ADcontent/Order/OD_xlUpdate.php?up=1&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/quaylaigh.jpg" title="Quay về trạng thái đặt hàng" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                </a>
                <a href="ADcontent/Order/OD_xlXoa.php?d=<?php echo "$hoaDon->MaTinhTrang" ?>&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/xoadh.jpg" title="Xóa nếu tình trạng đơn hàng hủy" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                </a>
                <a href="ad_Index.php?a=10&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                    <img src="../../img/chitiet.jpg" title="Chi tiết đơn đặt hàng" alt="" style="width: 35px;height: 35px;margin-left: 20px">
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