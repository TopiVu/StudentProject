<?php
if ($_GET["txttimkiemdonhang"]!= null)
{
    $text = $_GET["txttimkiemdonhang"];
    header("location:../../ad_Index.php?a=5&ac=2&value=$text");
}
else
{
    header("location:../../ad_Index.php?a=5&ac=0");
}
?>


