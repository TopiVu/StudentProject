<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Topi Shop</title>
    <link rel="stylesheet" href="../css/style.css" type="text/css">
    <link href="../js/lightbox2/dist/css/lightbox.css" rel="stylesheet">
</head>
<body>
<script src="../js/jquery.js"></script>
<script src="../js/lightbox2/dist/js/lightbox.js"></script>
<?php include ("../../Include.php");
?>
<div id="wrapper_ad">
    <div id ="ad_header">
        <?php   include ("module/ad_header.php"); ?>
    </div>
    <div id ="ad_menu">
        <?php include ("module/ad_menu.php"); ?>
    </div>
    <div id ="ad_content">
        <?php
        $a = 0;
        if (isset($_GET["a"]) == true)
            $a = $_GET["a"];
        switch ($a)
        {
            case 0:
                include "ADcontent/Home.php";
                break;
            case 1:
                include "ADcontent/Account/AC_DanhSach.php";
                break;
            case 2:
                include "ADcontent/Product/PD_DanhSach.php";
                break;
            case 3:
                include "ADcontent/Category/CA_DanhSach.php";
                break;
            case 4:
                include "ADcontent/Manufacturer/Ma_DanhSach.php";
                break;
            case 5:
                include "ADcontent/Order/OD_DanhSach.php";
                break;
            case 6:
                include "ADcontent/Account/AC_Add.php";
                break;
            case 7:
                include "ADcontent/Category/CA_Add.php";
                break;
            case 8:
                include "ADcontent/Manufacturer/Ma_Add.php";
                break;
            case 9:
                include ("ADcontent/Product/PD_Add.php");
                break;
            case 10:
                include ("ADcontent/Order/OD_ChiTiet.php");
                break;
            case 11:
                include ("ADcontent/Account/AC_Update.php");
                break;
            case 12:
                include ("ADcontent/Account/AC_DoiMK.php");
                break;
            default:
                include "ADcontent/AD_Error.php";
                break;
        }
        ?>
    </div>
    <div id= "ad_footer">
        <?php include ("module/ad_footer.php"); ?>
    </div>
</div>
</body>
</html>