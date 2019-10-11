<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 29/11/2018
 * Time: 1:46 CH
 */

class HangSanXuatBUS
{
    var $hangSanXuatDAO;
    public function __construct()
    {
        $this->hangSanXuatDAO= new HangSanXuatDAO();
    }
    public function GetALL()
    {
        return $this->hangSanXuatDAO->GetAll();
    }
    public function GetALLAvailable()
    {
        return $this->hangSanXuatDAO->GetAllAvailable();
    }
    public function GetByID($maHangSanXuat)
    {
        return $this->hangSanXuatDAO->GetByID($maHangSanXuat);
    }
    public function GetIDTen($tenHang)
    {
        return $this->hangSanXuatDAO->GetIDTen($tenHang);
    }
    public function Insert($a,$b,$c)
    {
        $hangSanXuat = new HangSanXuat();
        $hangSanXuat->MaHangSanXuat=$a;
        $hangSanXuat->TenHangSanXuat=$b;
        $hangSanXuat->LogoURL=$c;
        $hangSanXuat->BiXoa=0;
        $this->hangSanXuatDAO->Insert($hangSanXuat);
    }
    public function UpdateNamelogo($id,$name,$logo)
    {
        $this->hangSanXuatDAO->UpdateNameLogo($id,$name,$logo);
    }
    public  function  SetDelete($maHangSanXuat)
    {
        $this->hangSanXuatDAO->SetDelete($maHangSanXuat);
    }
    public function UnsetDelete($maHangSanXuat)
    {
        $hangSanXuat = new LoaiSanPham();
        $hangSanXuat->MaHangSanXuat = $maHangSanXuat;
        $this->hangSanXuatDAO->UnsetDelete($hangSanXuat);
    }
    public function  Delete($maHangSanXuat)
    {
        $kt = $this->hangSanXuatDAO->KTHangHD($maHangSanXuat);
        if ($kt == 0)
        {
            return $this->hangSanXuatDAO->Delete($maHangSanXuat);
        }
        else
        {
            return $this->hangSanXuatDAO->SetDelete($maHangSanXuat);
        }
    }
    public function timkiemManufacturer($timKiem)
    {
        return $this->hangSanXuatDAO->timkiemManufacturer($timKiem);
    }
    public function timkiemManufacturerHD($timKiem)
    {
        return $this->hangSanXuatDAO->timkiemManufacturerHD($timKiem);
    }
    public function CreateManufacturerCode()
    {
        $kq = $this->hangSanXuatDAO->CreateManufacturerCode();
        return $kq+1;
    }
    public function KThangtontai($tenHang)
    {
        return $this->hangSanXuatDAO->KThangtontai($tenHang);
    }
}