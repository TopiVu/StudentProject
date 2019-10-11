<?php
if ($_GET["txttimkiemtaikhoan"]!= null)
{
    $text = $_GET["txttimkiemtaikhoan"];
    header("location:../../ad_Index.php?a=1&ac=2&value=$text");
}
else
{
    header("location:../../ad_Index.php?a=1&ac=0");
}
?>


