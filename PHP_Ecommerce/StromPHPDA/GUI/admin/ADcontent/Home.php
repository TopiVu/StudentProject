<h1 style="text-align: center; color: #c80000; font-size: 30px">Chào Mừng Bạn Đến Với Trang Admin</h1>
<?php
    $bd = '2018/1/1';
    $kt = '2019/1/1';
    $chiTietBUS = new ChiTietDonHangBUS();
    $donHangBUS = new DonDatHangBUS();
    $tongKetSL = $chiTietBUS->TongKetSL($bd,$kt);
    $tongKetTien = $donHangBUS->TongKetTien($bd,$kt);
    $tongTK = $donHangBUS->TongKetKH($bd,$kt);
   ?>
<br><br>

<div style="width: 300px; height: 100px; font-size: 20px; text-align: center; background: pink; position: absolute; margin-left: 2% ">
    <p>Sản phẩm:</p> <?php echo "$tongKetSL";?> <br>
</div>
<div style="width: 300px; height: 100px; font-size: 20px;text-align: center; background: pink; position: absolute; margin-left: 38%">

    <p>Doanh thu :</p> <?php echo number_format("$tongKetTien");?> VNĐ <br>

</div>
<div style="width: 300px; height: 100px; font-size: 20px;text-align: center; background: pink ; position: absolute; margin-left: 70%">
    <p>Lượng khách hàng</p> <?php echo "$tongTK";?>
</div>

<p style="text-align: center; font-size: 20px; margin-top: 200px">Bảng báo cáo năm từ tháng 1/2018 - 12/2018</p>


