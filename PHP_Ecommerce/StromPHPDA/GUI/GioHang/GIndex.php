<?php
	//Thêm sản phẩm vào giỏ hàng
//include ("../../Include.php");

	if(isset($_SESSION["GioHang"]) != null)
	{
		$gioHang = unserialize($_SESSION["GioHang"]);
	}
	else
		$gioHang = new GioHangBUS();

	if(isset($_GET["id"]))
	{
		$id = $_GET["id"];

		$gioHang->Add($id);

		$_SESSION["GioHang"] = serialize($gioHang);

		header ("location:Index.php?a=8");
	}
    $sub = 1;
    if(isset($_GET["sub"]))
    $sub = $_GET["sub"];

    switch ($sub)
    {
    case 1:
        include "GioHang.php";
        break;
    case 2:
        include "ThongBaoGH.php";
        break;
    default:
        header("../Content/cError.php");
    break;
    }
?>