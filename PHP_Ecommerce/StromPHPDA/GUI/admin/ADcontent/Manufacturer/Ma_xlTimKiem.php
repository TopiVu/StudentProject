<?php
if ($_GET["txttimkiemhang"]!= null)
{
    $text = $_GET["txttimkiemhang"];
    header("location:../../ad_Index.php?a=4&ac=2&value=$text");
}
else
{
    header("location:../../ad_Index.php?a=4&ac=0");
}
?>


