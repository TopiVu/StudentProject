<h1 style="color: #c80000;text-align: center;font-size: 40px">CHI TIẾT ĐƠN ĐẶT HÀNG</h1>
<br>
<br><br>
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 40px;margin-top: -50px" title="Trở về trang trước" alt="" onclick=" Back()">
<img src="../../img/print.png" style="width: 40px;height: 40px; position: absolute; margin-left: 110px;margin-top: -50px" title="In hóa đơn" alt="" onclick=" Print()">
<br>
<table id="qlhangchitiet" cellspacing="0" border="1" style="margin-left: 20%">
    <?php
    if (isset($_GET["id"]))
    {
        $id =$_GET["id"];
    }
    $hoaDonBUS = new DonDatHangBUS();
    $taiKhoanBUS = new TaiKhoanBUS();
    $hoaDon = $hoaDonBUS->GetByID($id);
    $taiKhoan = $taiKhoanBUS->GetbyID($hoaDon->MaTaiKhoan);
    date_default_timezone_set("Asia/Ho_Chi_Minh");
    ?>
<div style="font-size: 15px; text-align: center">
    <div style="margin-bottom: 20px">
        <b style=" margin-right: 50px">Mã Đơn Hàng :         <?php echo "$hoaDon->MaDonDatHang "; ?> </b>
        <b>Tên khách hàng:        <?php echo "$taiKhoan->TenHienThi";?>(MS:<?php echo"$hoaDon->MaTaiKhoan";?>) </b>
    </div>
    <div style="margin-bottom: 30px">
        <b style=" margin-right: 50px" > Ngày lập hóa đơn:  <?php $date= date("Y-m-d H:i:s"); echo "$date"; ?></b>
        <b style=" margin-right: 50px">Ngày mua: <?php echo "$hoaDon->NgayLap"; ?> </b>
        <b>Tổng hóa đơn:         <?php echo number_format("$hoaDon->TongThanhTien");?> VNĐ </b>
    </div>
</div>

<table id="qlchitiet" cellspacing="0" border="1" style="margin-left: 23%; margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 15px;background: #f2f3a0" >
        <th width="120">Mã</th>
        <th width="150">Số lượng</th>
        <th width="170">Giá bán</th>
        <th width="280">Sản phẩm</th>
    </tr>
    <?php
        if (isset($_GET["id"]))
        {
            $id =$_GET["id"];
        }
        $chiTietBUS = new ChiTietDonHangBUS();
        $lstchiTiet = $chiTietBUS->GetAllChiTiet($id);
        foreach ($lstchiTiet as $chiTiet)
        {?>
            <tr style="font-size: 14px">
                <td><?php echo "$chiTiet->MaChiTietDonDatHang"; ?></td>
                <td><?php echo "$chiTiet->SoLuong"; ?></td>
                <td><?php echo number_format("$chiTiet->GiaBan");?> VNĐ</td>
                <td><?php
                    $sanPhamBUS = new SanPhamBUS();
                    $sanPham = $sanPhamBUS->GetByID($chiTiet->MaSanPham);
                    echo $sanPham->TenSanPham;
                    ?></td>
            </tr>
            <?php
        }?>
</table>
<script>
    function Back() {
        window.history.back();
    }
    function Print() {
        window.print();
    }
</script>