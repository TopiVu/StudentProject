<!--<a class="hd" href="../admin/ad_Index.php?a=1">Quản lý Account</a>     |-->
<!--<a class="hd" href="../admin/ad_Index.php?a=2">Quản lý Product</a>     |-->
<!--<a class="hd" href="../admin/ad_Index.php?a=3">Quản lý Order by</a>     |-->
<!--<a class="hd" href="../admin/ad_Index.php?a=4">Quản lý Manufacturer</a>     |-->
<!--<a class="hd" href="../admin/ad_Index.php?a=5">Quản lý Product Category</a>-->
<?php if (isset($_GET["a"]) == true)
    $a = $_GET["a"]; ?>
    <a href="../admin/ad_Index.php?a=1&ac=0" <?php if($a == 1) echo "class='selected'"; ?>>Quản lý tài khoản</a> |
    <a href="../admin/ad_Index.php?a=2&ac=0" <?php if($a == 2) echo "class='selected'"; ?>>Quản lý sản phẩm</a> |
    <a href="../admin/ad_Index.php?a=3&ac=0" <?php if($a == 3) echo "class='selected'"; ?>>Quản lý loại</a> |
    <a href="../admin/ad_Index.php?a=4&ac=0" <?php if($a == 4) echo "class='selected'"; ?>>Quản lý hãng</a> |
    <a href="../admin/ad_Index.php?a=5&ac=0" <?php if($a == 5) echo "class='selected'"; ?>>Quản lý đơn đặt hàng</a>

