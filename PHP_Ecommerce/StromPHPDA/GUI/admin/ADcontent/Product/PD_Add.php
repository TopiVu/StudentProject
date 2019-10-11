<?php
if (isset($_GET["xl"]))
{
    $xl = $_GET["xl"];
}
else
    $xl= 0;
if (isset($_GET["id"]))
{
    $id = $_GET["id"];
}
else
{
    $id=null;
}
$sanPhamBUS = new SanPhamBUS();
$sanpham = $sanPhamBUS->GetByID($id);
if($xl==0)
{?>
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Thêm sản phẩm mới</h1>
    <br><br>
    <form action="ADcontent/Product/PD_xlAdd.php" method="GET">
        <table name="ttsanpham" style="margin-left: 500px; font-size: 12px">
        <tr>
            <td>Tên sản phẩm:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name ="txtten" value="" required/><?php
                if(isset($_GET["error"])) {
                    echo "<td style='color: red; text-align: center;fonts-weight: bold'>Tên sản phẩm đã tồn tại!!!</td>";
                }
                ?> <br> </td>
        </tr>
        <tr>
            <td>URL hình:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="url" value="" required/><br> </td>
        </tr>
        <tr>
            <td>Giá sản phẩm :<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="gia" value="" required/><br> </td>
        </tr>
        <tr>
            <td>Số lượng tồn:<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="sl" value="" required/><br> </td>
        </tr>
         <tr>
            <td>Mô tả:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="mota" value="" /><br> </td>
        </tr>
        <tr>
            <td>Loại:<b style="color: #c80000">*</b></td>
<!--            <td> <input type="text" name="loai" value="" required/><br> </td>-->
            <td>
                <select name="loai">
                    <?php
                    $loaiBUS = new LoaiSanPhamBUS();
                    $loailist= $loaiBUS->GetALLAvailable();
                    foreach ($loailist as $loaisp)
                    {?>
                        <option><?php echo "$loaisp->TenLoaiSanPham";?></option> <?php
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Hãng:<b style="color: #c80000">*</b></td>
<!--            <td> <input type="text" name="hang" value="" required/><br> </td>-->
            <td>
                <select name="hang">
                    <?php
                    $hangBUS = new HangSanXuatBUS();
                    $hanglist= $hangBUS->GetALLAvailable();
                    foreach ($hanglist as $hang)
                    {?>
                        <option><?php echo "$hang->TenHangSanXuat";?></option> <?php
                    }
                    ?>
                </select>
            </td>
        </tr>

    </table>
        <br><br><br>
     <input style="margin-left: 700px" type="submit" value="Thêm mới">
    </form>
    <?php
}
elseif ($xl==1)
{
    ?>
        <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Cập nhật giá và sô lượng mới</h1>
        <br><br>
        <form action="ADcontent/Product/PD_xlUpdate.php" method="GET">
            <div style="text-align: center">
                <input type="hidden" name="id" value="<?php echo "$id";?>">
                <table name="tdsanpham" style="margin-left: 500px; font-size: 12px">
                    <tr>
                        <td>Giá sản phẩm mới :<b style="color: #c80000">*</b></td>
                        <td><input type="number" name="gia" value="<?php echo "$sanpham->GiaSanPham";?>" required/><br></td>
                    </tr>
                    <tr>
                        <td>Số lượng nhập thêm:<b style="color: #c80000">*</b></td>
                        <td><input type="number" name="sl" value="0" required/><br></td>
                    </tr>
                </table>
                <br><br>
                <input style="margin-left: 300px" type="submit" value="Cập nhật">
            </div>
        </form>
    <?php
}
elseif($xl==2)
{
    ?>
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Cập nhật thông tin sản phẩm</h1>
    <br><br>
    <form action="ADcontent/Product/PD_xlUpdateSP.php" method="GET">
        <table name="ttsanpham" style="margin-left: 500px; font-size: 12px">
            <input type="hidden" name="id" value="<?php echo "$id";?>">
            <tr>
            <td>Tên sản phẩm:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name ="txtten" value="<?php echo $sanpham->TenSanPham; ?>" required/><?php
                if(isset($_GET["error"])) {
                    echo "<td style='color: red; text-align: center;fonts-weight: bold'>Tên sản phẩm đã tồn tại!!!</td>";
                }
                ?> <br> </td>
        </tr>
        <tr>
            <td>URL hình:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="url" value="<?php echo $sanpham->HinhURL; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Giá sản phẩm :<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="gia" value="<?php echo $sanpham->GiaSanPham; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Ngày nhập:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="ngaynhap" value="<?php echo $sanpham->NgayNhap; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Số lượng tồn:<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="sl" value="<?php echo $sanpham->SoLuongTon; ?>" required/><br> </td>
        </tr>
         <tr>
            <td>Mô tả:<b style="color: #c80000">*</b></td>
            <td> <textarea name="mota"  cols="30" rows="10" ><?php echo $sanpham->MoTa; ?></textarea><br> </td>
        </tr>
        <tr>
            <td>Loại:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="loai" value="<?php echo $sanpham->MaLoaiSanPham; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Hãng:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="hang" value="<?php echo $sanpham->MaHangSanXuat; ?>" required/><br> </td>
        </tr>
    </table>
        <br><br><br>
     <input style="margin-left: 700px" type="submit" value="Cập nhật">
    </form>
    <?php
}
else
    header("location:ad_Index.php?a=404");
