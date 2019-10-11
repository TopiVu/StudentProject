<div >
    <div id ="timkiem" style="position: absolute">
    <form name="ftimkiem" action="GUI/EXFuncion/xlTimKiem.php" method="GET">
        <input type="search" name="txttimkiem" size="25" maxlength="80" placeholder="Tìm kiếm" />
        <input type="submit" value="Tìm Kiếm"/>
    </form></div>
<a href="Index.php" >
    <img src="img/logoshoptopi.jpg" title="Về Trang Chủ TopiShop"  />
</a>
    <?php
         @session_start();
            ?>
    <div id="login_nav">
        <?php

            if(isset($_SESSION["MaTaiKhoan"]))
            {
                if ($_SESSION["MaLoaiTaiKhoan"]==1)
                {
                    header("location:GUI/admin/ad_Index.php?a=0");
                }
                else
                {
                    ?>
                    <a class="user" href="Index.php?a=9" style="position: absolute ">
                        <img src="img/user.png" height="50" title="Quản lý cá nhân" />
                    </a>
                    <div id="login" >
                        Hello, <?php echo $_SESSION["TenHienThi"]; ?>
                        <a href="GUI/EXFuncion/xlDangXuat.php">Đăng xuất</a>
                        <a href="Index.php?a=8" style="position: absolute">
                            <img src="img/manage_shopping.png" height="50" title="Giỏ Hàng" />
                        </a>

                    </div>
                <?php
                }

            }
            else
            {
                ?>
                    <form name="frmLogin" action="GUI/EXFuncion/xlDangNhap.php" method="post">
                        Tài khoản: <input name="txtUS" type="text" id="txtUS" size="12" maxlength="30" width="15">
                        Mật khẩu: <input name="txtPS" type="password" id="txtPS" size="12" maxlength="30" width="15">
                        <input type="submit" value="Đăng nhập">
                        <input type="button" value="Đăng ký" onclick="ChuyenTrangDangKy()" />
                    </form>
                    <script type="text/javascript">
                        function ChuyenTrangDangKy () {
                            location = "Index.php?a=6";
                        }
                    </script>
                <?php
            }
        ?>
    </div>
