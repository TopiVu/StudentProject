<h1 style="text-align: center">Quản lý giỏ hàng</h1>
<div id="quanlygiohang" style="margin-left:12%">
    <table border="1">
        <tr>
            <th width="50">STT</th>
            <th width="300">Tên Sản Phẩm</th>
            <th width="200">Giá sản phẩm</th>
            <th width="200">Số lượng</th>
            <th width="250">Thao tác</th>
        </tr>
        <?php
            $tongGia = 0;
            if(isset($_SESSION["GioHang"]))
            {

                $soSanPham = count($gioHang->listProduct);
                $stt =1;
                for($i = 0; $i < $soSanPham; $i++){
                    $id = $gioHang->listProduct[$i]->id;
                    $sanPhamBus = new SanPhamBUS();
                    $sanPham =$sanPhamBus->GetByID($id);
                    ?>
                    <form name="frmGioHang" action="GUI/GioHang/xlCapNhat.php" method="post">
                        <tr>
                            <td><?php echo "$stt"; $stt++; ?></td>
                            <td>
                                <?php echo "$sanPham->TenSanPham" ?>
                            </td>
                            <td>
                                <?php echo number_format("$sanPham->GiaSanPham"); ?>đ
                            </td>
                            <td>
                                <input id="sluong" type="number" name="txtSL" value="<?php echo $gioHang->listProduct[$i]->soluong; ?>" width="45" size="5" title="Enter để cập nhật lại" />
                                <input type="hidden" name="hdID" value="<?php echo $gioHang->listProduct[$i]->id; ?>" />
                            </td>
                            <td>
                                <input id="submit"type="submit" value="Cập nhật" />
<!--                                <input type="button" value="Xóa"/>-->
<!--                                <input type="button" value="Tiếp Tục Mua Hàng">-->
                            </td>
                        </tr>
                    </form>
                    <?php
                    $tongGia += ($sanPham->GiaSanPham) * ($gioHang->listProduct[$i]->soluong);
                }
            }
            $_SESSION["TongGia"] = $tongGia;
            ?>
    </table>
</div>
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>

<script>
    $('#sluong').keypress(function(event){
    var keycode = (event.keyCode ? event.keyCode : event.which);
    if(keycode == '13')
    {
        $('#submit').focus();
    }

    });
</script>
<div class="pprice" style="text-align: center;font-weight: bold;font-size: 20px">
    Tổng thành tiền: <?php echo number_format($tongGia); ?> đ
</div>
<a href="GUI/GioHang/xlDatHang.php" style="margin-left:44.5% ">
    <img src="img/dathang.png" width="150px" height="40px" style="margin-top: 50px">
</a>

