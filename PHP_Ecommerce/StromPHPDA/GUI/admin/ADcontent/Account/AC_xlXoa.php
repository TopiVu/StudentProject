<?php
include ("../../../../Include.php");

if(isset($_GET["id"]))
{
    $id = $_GET["id"];
    $taiKhoanBUS = new TaiKhoanBUS();
    $taiKhoan = $taiKhoanBUS->GetbyID($id);
    if ($taiKhoan->TenDangNhap!="admin"){
        $taiKhoanBUS->Delete($id);
    }
}
?>
<script>
    window.history.back();
</script>
