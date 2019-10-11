<p style="font-size: 30px;color: #c80000;text-align: center;font-weight: bold">Tạo tài khoản mới</p><br><br>
<form  name="frmdangky" action="ADcontent/Account/AC_xlAdd.php" method="POST" onsubmit="return validate()">
    <p style="color: blue;font-weight: bold;font-size: 14px; margin-left: 500px">Thông Tin tài Khoản: </p>
    <table name="tttaikhoan" style="margin-left: 600px; font-size: 12px">
        <tr>
            <td>Tên tài khoản:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name ="ues" value="" required/><?php
                if(isset($_GET["error"])) {
                    echo "<td style='color: red; text-align: center;fonts-weight: bold'>Tên đăng nhập đã tồn tại!!!</td>";
                }
                ?> <br> </td>
        </tr>
        <tr>
            <td>Mật Khẩu:<b style="color: #c80000">*</b></td>
            <td> <input id="paw" type="password" name="paw" value=""required/><br> </td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu:<b style="color: #c80000">*</b></td>
            <td> <input id="paw2" type="password" name="paw2" value="" required/><br> </td>
        </tr>
    </table>
    <p style="color: blue;font-weight: bold;font-size: 14px; margin-left: 500px">Thông Tin Cá Nhân: </p>
    <table name="ttcanhan" style="margin-left: 600px; font-size: 13px">
        <tr>
            <td>Họ tên:<b style="color: #c80000">*</b></td>
            <td> <input type="text" name="showname" value="" required/><br> </td>
        </tr>
        <tr>
            <td>Ngày Sinh:</td>
            <td> <input type="date" name="birthday" value=""/><br> </td>
        </tr>
        <tr>
            <td>Địa chỉ:</td>
            <td> <input type="text" name="ips" value=""/><br> </td>
        </tr>
        <tr>
            <td>Số điện thoại:<b style="color: #c80000">*</b></td>
            <td> <input type="number" name="phone" vavlue="" required/><br> </td>
        </tr>
        <tr>
            <td>Email:</td>
            <td> <input type="email" name="mail" placeholder="topishop@gmail.com"/><br> </td>
        </tr>
    </table>
    <br><br>
    <input type="submit" value="Đăng ký" style="margin-left: 800px">
</form>
<script>
    function validate() {
        var n1 = document.getElementById("paw");
        var n2 = document.getElementById("paw2");
        if(n1.value != "" && n2.value != "") {
            if(n1.value == n2.value) {
                return true;
            }
        }
        alert("Dữ liệu mật khẩu không giống nhau giống nhau");
        return false;
    }
</script>
