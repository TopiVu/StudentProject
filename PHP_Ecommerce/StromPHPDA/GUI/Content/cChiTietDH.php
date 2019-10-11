<h1 style="color: #c80000;text-align: center;font-size: 40px">CHI TIẾT ĐƠN ĐẶT HÀNG</h1>
<br>
<br><br>
<img src="img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 40px;margin-top: -50px" title="Trở về trang trước" alt="" onclick=" Back()">
<br>
<table id="qlchitiet" cellspacing="0" border="1" style="margin-left: 25%; margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0" >
        <th width="100">Mã</th>
        <th width="150">Số lượng</th>
        <th width="150">Giá bán</th>
        <th width="250">Sản phẩm</th>
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
        <tr style="font-size: 11px">
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
</script>