<?php
if ($_GET["txttimkiemloai"]!= null)
{
    $text = $_GET["txttimkiemloai"];
    header("location:../../ad_Index.php?a=3&ac=2&value=$text");
}
else
{
    header("location:../../ad_Index.php?a=3&ac=0");
}
?>


