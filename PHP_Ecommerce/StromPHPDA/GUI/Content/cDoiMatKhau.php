<p style="font-size: 30px;color: #c80000;text-align: center;font-weight: bold">Đổi Mật Khẩu</p><br><br>
<form  name="frmdangky" action="GUI/EXFuncion/xlDoiMatKhau.php" method="POST" onsubmit="return validate()">
    <table name="ttdoimk" style="margin-left: 500px; font-size: 12px">
        <tr>
            <td>Mật khẩu cũ:<b style="color: #c80000">*</b></td>
            <td> <input type="password" name ="passcu" value="" required/><?php
                if(isset($_GET["error"])) {
                    echo "<td style='color: red; text-align: center;fonts-weight: bold'>Mật khẩu cũ không đúng!!!</td>";
                }
                ?> <br> </td>
        </tr>
        <tr>
            <td>Mật Khẩu mới:<b style="color: #c80000">*</b></td>
            <td> <input id="paw" type="password" name="paw" value="" required/><br> </td>
        </tr>
        <tr>
            <td>Nhập lại mật khẩu mới:<b style="color: #c80000">*</b></td>
            <td> <input id="paw2" type="password" name="paw2" value="" required/><br> </td>
        </tr>
    </table>
    <br><br>
    <input type="submit" value="Đồng ý" style="margin-left: 770px">
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
        alert("Mật khẩu mới và nhập lại phải giống nhau");
        return false;
    }
</script>