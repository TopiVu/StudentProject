
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website Topi Shop</title>
    <link rel="stylesheet" href="GUI/css/style.css" type="text/css">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script language="javascript" src="http://code.jquery.com/jquery-2.0.0.min.js"></script>
    <script type="text/javascript" src="GUI/js/jquery.js"></script>
    <script type="text/javascript" src="GUI/js/jquery_lazyload/jquery.lazyload.min.js"></script>
    <link href="GUI/js/lightbox2/dist/css/lightbox.css" rel="stylesheet">
    <script src="GUI/js/lightbox2/dist/js/lightbox.js"></script>
</head>
<body>
<div id="loading" style="display:none">
    <img src="img/load.gif" alt="Loading..."/>
</div>
<?php
    include ("Include.php");
?>
<div id="wrapper">
    <div id ="header">
        <?php include("GUI/Template/header.php"); ?>
    </div>
    <div id="sidebar">
        <?php include("GUI/Template/menu.php");
        ?>
    </div>
    <div id ="action">
        <?php include("GUI/Template/Action.php");?>
    </div>
    <div id ="content">
        <?php
        $a = 1;
        if (isset($_GET["a"]) == true)
            $a = $_GET["a"];
        switch ($a) {
            case 1:
                include "GUI/Content/cIndex.php";
                break;
            case 2:
                include "GUI/Content/cContent.php";
                break;
            case 4:
                include "GUI/Content/cChiTiet.php";
                break;
            case 6:
                include "GUI/Content/cNewAccount.php";
                break;
            case 8:
                include "GUI/GioHang/GIndex.php";
                break;
            case 9:
                include "GUI/Content/cUser.php";
                break;
            case 10:
                include "GUI/Content/cChiTietDH.php";
                break;
            case 11:
                include "GUI/Content/cDoiMatKhau.php";
                break;
            case 12:
                include "GUI/Content/cUpdateAccount.php";
                break;
            default:
                include "GUI/Content/cError.php";
                break;
        }
        ?>
    </div>
    <div id= "footer">
        <?php include("GUI/Template/footer.php"); ?>
    </div>
</div>
<script >
    $(document).ready(function(){
        $(document).ajaxStart(function() {
            $("#loading").show();
            });
            $(document).ajaxStop(function() {
                $("#loading").hide();
        });
    });
</script>

</body>
</html>