<h1 style="color: #74A7B7; font-size: 20px">Thông tin chi tiết sản phẩm</h1>
<script src="http://code.jquery.com/jquery-latest.js"></script>
<?php
if(isset($_SESSION["MaTaiKhoan"]))
{
    ?>
    <script language="JavaScript">
        $(function () {
            $('.btnmua').hide();
        });
    </script>
    <?php
}
?>
<?php
if(isset($_GET["id"]))
    $id = $_GET["id"];
else
    header("location:Index.php?a=404");

$sanPhamBUS = new SanPhamBUS();
$sanPham = $sanPhamBUS->ChiTietSP($id);
if($sanPham->MaSanPham == null)
   header(" location:Index.php?a=404");
?>
<div id="chitietsp">
    <div class='zoom' id="chitietleft">
        <img src="images/<?php echo "$sanPham->HinhURL"; ?> ">
    </div>
    <div id="chitietright">
        <div>
            <span class="productname"><?php echo "$sanPham->TenSanPham"; ?></span>
        </div>
        <br><br>
        <div>
            <span class="label">Giá :</span>
            <span class="price"><?php echo number_format($sanPham->GiaSanPham); ?> đ</span>
        </div>
        <div>
            <span class="label">Hãng Sản Xuất:</span>
            <span class="factory"><?php echo"$sanPham->TenHangSanXuat"; ?></span>
        </div>
        <div>
            <span class="label">Loại :</span>
            <span class="data"><?php echo "$sanPham->TenLoaiSanPham"; ?></span>
        </div>
        <div>
            <span class="label">Đã Bán:</span>
            <span class="data"><?php echo $sanPham->SoLuongBan; ?> Sản phẩm</span>
        </div>
        <div>
            <span class="label">Số lược xem:</span>
            <span class="data"><?php echo $sanPham->SoLuocXem + 1; $sanPhamBUS->UpdateLuocXem($id);?> Lược</span>
        </div>
        <div class="btnmua">
            <span class="label">
                <input name="btnmua" type="button" value="Mua" onclick="<?php
                        if(isset($_SESSION["MaTaiKhoan"]) == FALSE)
                        {
                            echo "alert('Bạn cần đăng nhập để mua hàng');";
                        }?>"/>
            </span>
        </div>
        <div>
            <span class="data">
        	<?php
            if(isset($_SESSION["MaTaiKhoan"]))
            {
                ?>
                <a href="Index.php?a=8&id=<?php echo "$sanPham->MaSanPham"; ?>">
			                <img src="img/shopping_cart.png" width="32" title="Mua hàng">
                                    </a>
                <?php
            }
            ?>
            </span>
        </div>
        <br><br>
        <div id="mota">
            <span class="label">Mô Tả:</span><br>
            <?php echo $sanPham->MoTa; ?>
        </div>
    </div>
<div id="chitiet5sp">
<?php
if(isset($_GET["idl"]))
    $idl = $_GET["idl"];
else
    header("location:Index.php?a=404");
    $sanPhamBUS = new SanPhamBUS();
    $lstSanPham = $sanPhamBUS->GetAllAvailableLoai5($idl);
    foreach ($lstSanPham as $sanPham)
    {$idl= $sanPham->MaLoaiSanPham;?>
        <!--    <h2 style="background-color: #CCFF99; text-align: center;">--><?php //echo "$sanPham->TenLoaiSanPham";?>
        <!--    </h2>-->
        <div class="box">
            <a href="images/<?php echo "$sanPham->HinhURL"; ?>" data-lightbox="hinh1" data-title="My caption"><img src="images/<?php echo "$sanPham->HinhURL"; ?>" /></a>
            <div class="pname"><?php echo "$sanPham->TenSanPham"; ?></div>
            <div class="pprice">Giá: <?php echo number_format($sanPham->GiaSanPham); ?>đ</div>
            <div class="action">
                <a href="Index.php?a=4&id=<?php echo "$sanPham->MaSanPham"; ?>&idl=<?php echo "$idl"?>">Chi tiết</a>
            </div>
        </div>
        <?php
    }?></div>
    <script src ="https://cdnjs.cloudflare.com/.../jquery/2.1.3/jquery.min.js"></script>
    <script src='https://cdn.rawgit.com/jac.../zoom/master/jquery.zoom.min.js'></script>
    <script src='https://cdn.rawgit.com/jackmoore/zoom/master/jquery.zoom.min.js'></script>
    <script>
        $(document).ready(function(){
            $('#chitietleft').zoom();
        });
    </script>



