<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:43 CH
 */

class ChiTietDonHangBUS
{
    var $chiTietDonHangDAO;
    public function __construct()
    {
        $this->chiTietDonHangDAO =new ChiTietDonHangDAO();
    }
    public function GetAll()
    {
        return $this->chiTietDonHangDAO->GetAll();
    }
    public function GetAllChiTiet($id)
    {
        return $this->chiTietDonHangDAO->GetAllChiTiet($id);
    }
    public  function Insert($a,$b,$c,$d,$e)
    {
        $ctDonHang = new ChiTietDonHang();
        $ctDonHang->MaChiTietDonDatHang= $a;
        $ctDonHang->SoLuong=$b;
        $ctDonHang->GiaBan=$c;
        $ctDonHang->MaDonDatHang=$d;
        $ctDonHang->MaSanPham=$e;
        $this->chiTietDonHangDAO->Insert($ctDonHang);
    }
    public function Delete($donHang)
    {
        $this->chiTietDonHangDAO->Delete($donHang);
    }
    public function LaySoLuong($donHang)
    {
        return $this->chiTietDonHangDAO->LaySoLuong($donHang);
    }
    public function UpdateSLTon($sl,$hoaDon)
    {
        $this->chiTietDonHangDAO->UpdateSL($sl,$hoaDon);
    }
    public function TongKetSL($bd,$kt)
    {
        return $this->chiTietDonHangDAO->TongKetSL($bd,$kt);
    }
}