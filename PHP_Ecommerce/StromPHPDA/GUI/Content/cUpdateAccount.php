<?php
    $id = $_SESSION["MaTaiKhoan"];
    $taiKhoanBus = new TaiKhoanBUS();
    $taiKhoan = $taiKhoanBus->GetbyID($id);
?>
<p style="font-size: 30px;color: #c80000;text-align: center;font-weight: bold">Cập nhật lại thông tin tài khoản</p><br><br>
<form  name="frmdangky" action="GUI/EXFuncion/xlUpdateAccount.php" method="GET" ">
    <p style="color: blue;font-weight: bold;font-size: 14px; margin-left: 500px">Thông Tin Cá Nhân: </p>
    <table name="ttcanhan" style="margin-left: 600px; font-size: 13px">
        <tr>
            <td>Họ tên:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="showname" value="<?php echo "$taiKhoan->TenHienThi"; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Ngày Sinh:</td>
            <td> <input type="date" name="birthday" value="<?php echo "$taiKhoan->NgaySinh"; ?>" /><br> </td>
        </tr>
        <tr>
            <td>Địa chỉ:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="ips" value="<?php echo "$taiKhoan->DiaChi"; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Số điện thoại:<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="phone" value="<?php echo "$taiKhoan->DienThoai"; ?>" required/><br> </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td> <input type="email" name="mail" value="<?php echo "$taiKhoan->Email"; ?>" placeholder="topishop@gmail.com"/><br> </td>
        </tr>
    </table>
    <br><br>
    <input type="submit" value="Cập nhật" style="margin-left: 800px">
</form>




