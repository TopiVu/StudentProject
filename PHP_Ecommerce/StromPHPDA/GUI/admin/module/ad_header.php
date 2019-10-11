<div>
<a href="ad_Index.php?a=0" title="Về trang Admin"><img src="../../img/logoshoptopi.jpg"  />
</a>
</div>
<?php            session_start();
?>
<div id="ad_login_nav">

    <?php
    if (($_SESSION["TenHienThi"])!= null && $_SESSION["MaLoaiTaiKhoan"]==1)
        {?>
            <div id="login">
                Hello, <?php echo $_SESSION["TenHienThi"]; ?>
                <a href="../EXFuncion/xlDangXuat.php">Đăng xuất</a>
            </div>
    <?php
        }
    else
        header("location:../../Index.php");

