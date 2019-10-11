<?php
if(isset($_GET["id"]))
{
    switch ($_GET["id"]) {
        case 1:
            echo "<h2 style='text-align: center;color: #c80000'>Tên đăng nhập hoặc mật khẩu không tồn tại</h2>";
            break;
        case 2:
            echo  "<h2 style='text-align: center;color: #c80000'> Tạo tài khoản thành công </h2>";
            break;
        case 3:
            echo  "<h2 style='text-align: center;color: #c80000'> Tên tài khoản đã tồn tại </h2>";
            break;
        case 4:
            echo  "<h2 style='text-align: center;color: #c80000'> Cập nhật thành công </h2>";
            break;
        case 5:
            echo  "<h2 style='text-align: center;color: #c80000'> Không đủ số lượng hàng đáp ứng </h2>";
            break;
        default:
            echo  "<h2 style='text-align: center;color: #c80000'> Hệ thống đang bảo trì !!! </h2>";
            break;
    }
}
?>