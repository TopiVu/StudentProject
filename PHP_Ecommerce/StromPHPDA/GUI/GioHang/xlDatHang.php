<?php
session_start();
include ("../../Include.php");
if(isset($_SESSION["GioHang"]))
{
    $gioHang = unserialize($_SESSION["GioHang"]);
    $maTaiKhoan = $_SESSION["MaTaiKhoan"];

    date_default_timezone_set("Asia/Ho_Chi_Minh");
    $ngayLap = date("Y-m-d H:i:s");
    $ngaymua = date("Y-m-d");
    $maTinhTrang = 1;
    $tongGia = $_SESSION["TongGia"];

    //Xử lý tạo mã đơn đặt hàng với ddmmyyxxx
    $donhangBUS = new DonDatHangBUS();
    $donHang = $donhangBUS->ktDonDatHang($ngaymua);
    $sttMaDonDatHang = 0;
    if($donHang != null)
    {
        $sttMaDonDatHang = substr($donHang->MaDonDatHang, 6, 3);
    }
    $sttMaDonDatHang += 1;
    $sttMaDonDatHang = sprintf("%03s",$sttMaDonDatHang);

    $maDonDatHang = date("d").date("m").substr(date("Y"),2,2).$sttMaDonDatHang;

    //Tạo đơn đặt hàng mới và lưu xuống CSDL bảng DonDatHang
    $donhangBUS->Insert($maDonDatHang,$ngayLap,$tongGia,$maTaiKhoan,$maTinhTrang);

    //---------------------------------------------
    //Xử lý thêm chi tiết đơn hàng

    $soLuongSanPham = count($gioHang->listProduct);
    for($i = 0; $i < $soLuongSanPham; $i++)
    {
        $id = $gioHang->listProduct[$i]->id;
        $sl = $gioHang->listProduct[$i]->soluong;

        //2.1 Lấy thông tin sản phẩm: Giá Sản phẩm, số lượng tồn.
        $sanPhamBUS = new SanPhamBUS();
        $sanPham = $sanPhamBUS->GetByID($id);

        $soLuongTonHienTai = $sanPham->SoLuongTon;
        $giaSanPham = $sanPham->GiaSanPham;

        $sttChiTietDonDatHang = sprintf("%02s",$i);
        $maChiTietDonDatHang = $maDonDatHang.$sttChiTietDonDatHang;

        //2.2 Thêm 1 dòng mới vào bảng ChiTietDonDatHang
        $ctDonHangBUS =new ChiTietDonHangBUS();
        $ctDonHang= $ctDonHangBUS->Insert($maChiTietDonDatHang,$sl,$giaSanPham,$maDonDatHang,$id);

        //2.3 Update lại số lượng tồn và của bảng SanPham
        $sanPhamBUS ->UpdateTon($id,$sl);
        $sanPhamBUS ->UpdateBan($id,$sl);
    }

    unset($_SESSION["GioHang"]);
    header("location:../../Index.php?a=8&sub=2");
}
else
    header("location:../../Index.php?a=404");
?>