<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:32 CH
 */

class DonDatHangBUS
{
    var $donDatHangDAO;
    public function __construct()
    {
        $this->donDatHangDAO = new DonDatHangDAO();
    }
    public function GetAll()
    {
        return $this->donDatHangDAO->GetALL();
    }
    public function GetByID($id)
    {
        return $this->donDatHangDAO->GetByID($id);
    }
    public function ktDonDatHang($ngaymua)
    {
        return $this->donDatHangDAO->ktDonDatHang($ngaymua);
    }
    public function Insert($a,$b,$c,$d,$e)
    {
        $donHang = new DonDatHang();

        $donHang->MaDonDatHang= $a;
        $donHang->NgayLap=$b;
        $donHang->TongThanhTien=$c;
        $donHang->MaTaiKhoan=$d;
        $donHang->MaTinhTrang=$e;
        $this->donDatHangDAO->Insert($donHang);
    }
    public function UGiaoHang($id)
    {
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang=$id;
        $donHang->MaTinhTrang=2;
        $this->donDatHangDAO->update($donHang);
    }
    public function UThanhToan($id)
    {
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang=$id;
        $donHang->MaTinhTrang=3;
        $this->donDatHangDAO->update($donHang);
    }
    public function UHuy($id)
    {
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang=$id;
        $donHang->MaTinhTrang=4;
        $this->donDatHangDAO->update($donHang);
    }
    public function UDatHang($id)
    {
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang=$id;
        $donHang->MaTinhTrang=1;
        $this->donDatHangDAO->update($donHang);
    }
    public function  timkiem($timKiem)
    {
        return $this->donDatHangDAO->timkiem($timKiem);
    }
    public function Delete($donHang)
    {
        $this->donDatHangDAO->Delete($donHang);
    }
    public function GetALLuser($mataikhoan)
    {
        return $this->donDatHangDAO->GetALLuser($mataikhoan);
    }
    public function GetDatHang()
    {
        return $this->donDatHangDAO->GetDatHang();
    }
    public function TKGetDatHang($timKiem)
    {
        return $this->donDatHangDAO->TKGetDatHang($timKiem);
    }
    public function TKGetDatHuy($timKiem)
    {
        return $this->donDatHangDAO->TKGetDatHuy($timKiem);
    }
    public function TongKetTien($bd,$kt)
    {
        return $this->donDatHangDAO->TongKetTien($bd,$kt);
    }
    public function TongKetKH($bd,$kt)
    {
        return $this->donDatHangDAO->TongKetKH($bd,$kt);
    }
}