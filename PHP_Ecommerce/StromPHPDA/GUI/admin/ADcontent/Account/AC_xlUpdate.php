<?php
include ("../../../../Include.php");
if(isset($_GET["ids"]))
{
    $taiKhoanBus = new TaiKhoanBUS();
    $id = $_GET["ids"];
    $us = $_GET["us"];
    $pa = $_GET["pass"];
    $hoten = $_GET["showname"];
    if (($_GET["birthday"])==null)
    {
        date_default_timezone_set("Asia/Ho_Chi_Minh");
        $ngaySinh        =date("Y-m-d");
    }
    else
        $ngaysinh = $_GET["birthday"];
    $diachi = $_GET["ips"];
    $phone = $_GET["phone"];
    if (($_GET["mail"])==null)
    {
        $mail = null;
    }
    $mail = $_GET["mail"];
    $taiKhoanBus->UpdateAccount($id,$us,$pa,$hoten,$ngaysinh,$diachi,$phone,$mail);
}
?>
<script>
    window.history.go(-2);
</script>
