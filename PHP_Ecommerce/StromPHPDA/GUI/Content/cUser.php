<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ CÁ NHÂN</h1>
<a href="Index.php?a=11" style="position: absolute; margin-left: 10px;margin-top: -90px"> <input type="button" value="Đổi mật khẩu"/>
</a>
<a href="Index.php?a=12" style="position: absolute; margin-left: 120px;margin-top: -90px"> <input type="button" value="Cập nhật thông tin"/>
</a>
<br>
<table id="qlhang" cellspacing="0" border="1" style="margin-left: 28%">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0" >
        <th width="100">Mã</th>
        <th width="130">Ngày lập</th>
        <th width="100">Tổng tiền</th>
        <th width="100">Tình Trạng</th>
        <th width="150">Thao tác</th>
    </tr>
    <?php
        $hoaDonBUS = new DonDatHangBUS();
        $maTaiKhoan = $_SESSION["MaTaiKhoan"];
        $lstHoaDon = $hoaDonBUS->GetALLuser($maTaiKhoan);
        foreach ($lstHoaDon as $hoaDon)
        {?>
            <tr style="font-size: 11px">
                <td><?php echo "$hoaDon->MaDonDatHang "; ?></td>
                <td><?php echo "$hoaDon->NgayLap"; ?></td>
                <td><?php echo number_format("$hoaDon->TongThanhTien");?> VNĐ</td>
                <td><?php
                    $tinhTrangBUS = new TinhTrangBUS();
                    $tinhTrang = $tinhTrangBUS->GetByID($hoaDon->MaTinhTrang);
                    echo "$tinhTrang->TenTinhTrang"; ?></td>
                <td>

                    <a href="GUI/EXFuncion/xlHuyDH.php?up=<?php echo $hoaDon->MaTinhTrang;?>&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                        <img src="img/cancal.jpg" title="Hủy" alt="" style="width: 35px;height: 35px;margin-left: 30px">
                    </a>
                    <a href="Index.php?a=10&id=<?php echo"$hoaDon->MaDonDatHang";?>">
                        <img src="img/chitiet.jpg" title="Chi tiết đơn đặt hàng" alt="" style="width: 35px;height: 35px;margin-left: 30px">
                    </a>
                </td>
            </tr>
            <?php
        }?>
</table>
