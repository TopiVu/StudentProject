<?php
if ($_GET["txttimkiemsanpham"]!= null)
{
    $text = $_GET["txttimkiemsanpham"];
    header("location:../../ad_Index.php?a=2&ac=2&value=$text");
}
else
{
    header("location:../../ad_Index.php?a=2&ac=0");
}
?>


