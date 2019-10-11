<?php
include ("../../../../Include.php");

if(isset($_GET["ac"]))
{
    $ac = $_GET["ac"];
    header("ocation:../../ad_Index.php?a=3&ac=1");

}
if((isset($_GET["ac"]))&&((isset($_GET["value"]))!=null))
{
    $text = ($_GET["value"]);
    header("location:../../ad_Index.php?a=3&ac=3&value=$text");
}
else
{
    header('location:../../ad_Index.php?a=3&ac=0');

}
?>