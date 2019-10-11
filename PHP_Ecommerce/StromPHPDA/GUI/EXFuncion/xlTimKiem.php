<?php
if (isset($_GET["txttimkiem"]))
{
    $text = $_GET["txttimkiem"];
    if (isset($_GET["idh"]))
    {
        $idh = $_GET["idh"];
    }
    else
    {
        $idh = null;
    }
    if (isset($_GET["idl"]))
    {
        $idl = $_GET["idl"];
    }
    else
    {
        $idl = null;
    }
    if (isset($_GET["value"]) != null)
    {
        $text = $_GET["value"];
    }

    header("location:../../Index.php?a=2&ac=1&value=$text&idl=$idl&idh=$idh");
}
else
{
    header("location:../../Index.php");
}
?>


