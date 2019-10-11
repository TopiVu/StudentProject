<?php
include ("../../Include.php");
    if(isset($_GET["up"]) &&isset($_GET["id"]))
    {
        $id = $_GET["id"];
        $up = $_GET["up"];
        $donHangBUS = new DonDatHangBUS();
        if($up == 1)
        {
            $donHangBUS->UHuy($id);
        }
    }
?>
<script>
    window.history.back();
</script>
