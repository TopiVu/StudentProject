<a href="ad_Index.php?a=12" style="position: absolute; margin-left: 10px;"> <input type="button" value="Đổi mật khẩu"/>
</a>
<h1 style="color: #c80000;text-align: center;font-size: 40px">QUẢN LÝ TÀI KHOẢN</h1>
<br>
<div id ="timkiemtaikhoan" style="position: absolute; margin-left: 40%">
        <form name="ftimkiemtaikhoan" action="ADcontent/Account/AC_xlTimkiem.php" method="GET">
            <input type="search" name="txttimkiemtaikhoan" size="25" maxlength="80" placeholder="Tìm kiếm" />
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
<img src="../../img/back.png" style="width: 40px;height: 40px; position: absolute; margin-left: 10px" title="Trở về trang trước" alt="" onclick=" Back()">
<a href="ADcontent/Account/AC_xlLoc.php?ac=1&value=<?php echo "$text";?>">
    <img src="../../img/loc.png" style="width: 40px;height: 40px; position: absolute; margin-left: 70px" title="Lọc theo tài khoản còn hoạt động" alt="" >
</a>
<a href="ad_Index.php?a=6">
    <img src="../../img/accountadd.png" title="Thêm một tài khoản" alt="" style="width: 50px;height: 50px; margin-left: 95%" >
</a>
<table id="qltaikhoan" cellspacing="0" border="1" style="margin-left: 15px; margin-bottom: 50px">
    <tr style="text-align: center;color: blue;font-size: 12px;background: #f2f3a0">
        <th width="100">Mã tài khoản</th>
        <th width="130">Tên đăng nhập</th>
        <th width="100">Mật Khẩu</th>
        <th width="100">Tên hiển thị</th>
        <th width="100">Địa chỉ</th>
        <th width="100">Điện thoại</th>
        <th width="200">Email</th>
        <th width="100">Tình trạng</th>
        <th width="100">Loại tài khoản</th>
        <th width="250">Thao tác</th>
    </tr>
    <?php
    $taiKhoanBUS = new TaiKhoanBUS();
    if(isset($_GET["ac"]))
    {
        $ac = $_GET["ac"];
        if ($ac == 1)
        {
            $lstTaiKhoan = $taiKhoanBUS->GetAllAvailable();
        }
        if($ac==0) {
            $lstTaiKhoan = $taiKhoanBUS->GetAll();
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
            $lstTaiKhoan = $taiKhoanBUS->timkiemAcount($text);
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
            $lstTaiKhoan = $taiKhoanBUS->timkiemAcountHD($text);
        }
        foreach ($lstTaiKhoan as $taiKhoan)
        {?>
            <tr>
                <td><?php echo "$taiKhoan->MaTaiKhoan"; ?></td>
                <td><?php echo "$taiKhoan->TenDangNhap"; ?></td>
                <td><?php echo "$taiKhoan->MatKhau"; ?></td>
                <td><?php echo "$taiKhoan->TenHienThi"; ?></td>
                <td><?php echo "$taiKhoan->DiaChi"; ?></td>
                <td><?php echo "$taiKhoan->DienThoai"; ?></td>
                <td><?php echo "$taiKhoan->Email"; ?></td>
                <td>
                    <?php
                    if (($taiKhoan->BiXoa) == 0)
                    {?>
                        <img src="../../img/khoa_mo.jpg" alt="" style="width: 35px;height: 35px"><?php
                    }
                    else { ?>
                        <img src="../../img/khoa_dong.jpg" alt="" style="width: 35px;height: 35px"><?php
                    }?></td>
                   <td>
                       <?php
                       if (($taiKhoan->MaLoaiTaiKhoan) ==1)
                           echo "Admin";
                       else
                            echo "User";
                   ?></td>
                   <td>

                       <a href="ADcontent/Account/AC_xlDisable.php?id=<?php echo"$taiKhoan->MaTaiKhoan";?>">
                           <img src="../../img/khoa.png" alt="" title="Vô hiệu/ Kích hoạt tài khoản" style="width: 35px;height: 35px; margin-left: 20px">
                       </a>
                       <a href="ADcontent/Account/AC_xlCapQuyen.php?id=<?php echo"$taiKhoan->MaTaiKhoan";?>">
                           <img src="../../img/capquyen.png" title="Cấp quyền admin/ Hủy" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                       </a>
                       <a href="ad_index.php?a=11&id=<?php echo"$taiKhoan->MaTaiKhoan";?>">
                           <img src="../../img/cole.jpg" title="Cập nhật lại tài khoản" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                       </a>
                       <a href="ADcontent/Account/AC_xlXoa.php?id=<?php echo"$taiKhoan->MaTaiKhoan";?>">
                           <img src="../../img/thungrac.png" title="Xóa/Vô hiệu hóa nếu tài khoản có đơn hàng" alt="" style="width: 35px;height: 35px;margin-left: 20px">
                       </a>
                   </td>
               </tr>
        <?php
           }
    }?>
</table>
<script>
    function Back() {
        window.history.back();
    }
</script>
