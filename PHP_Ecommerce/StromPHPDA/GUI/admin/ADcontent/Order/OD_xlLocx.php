<?php
include ("../../../../Include.php");

if((isset($_GET["ac"]))&&((isset($_GET["value"]))!=null))
{
    $text = ($_GET["value"]);
    header("location:../../ad_Index.php?a=5&ac=4&value=$text");
}
else
{
    header('location:../../ad_Index.php?a=5&ac=0');

}
?>