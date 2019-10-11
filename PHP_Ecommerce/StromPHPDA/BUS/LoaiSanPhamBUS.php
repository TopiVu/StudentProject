<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2018
 * Time: 10:32 CH
 */

class LoaiSanPhamBUS
{
    var $loaiSanphamDAO;
    public function __construct()
    {
        $this->loaiSanphamDAO= new LoaiSanPhamDAO();
    }
    public function GetALL()
    {
        return $this->loaiSanphamDAO->GetAll();
    }
    public function GetALLAvailable()
    {
        return $this->loaiSanphamDAO->GetAllAvailable();
    }
    public function GetByID($maLoaiSanPham)
    {
        return $this->loaiSanphamDAO->GetByID($maLoaiSanPham);
    }
    public function GetIDTen($tenLoai)
    {
        return $this->loaiSanphamDAO->GetIDTen($tenLoai);
    }

    public function Insert($loaiSanPham)
    {
        $this->loaiSanphamDAO->Insert($loaiSanPham);
    }
    public  function KTloaitontai($tenLoai)
    {
        return $this->loaiSanphamDAO->KTloaitontai($tenLoai);
    }
    public function CreateCategoryCode()
    {
        $kq = $this->loaiSanphamDAO->CreateCategoryCode();
        return $kq+1;
    }
    public function InsertName($maloai,$tenLoaiSanPham)
    {
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham=$maloai;
        $loaiSanPham->TenLoaiSanPham=$tenLoaiSanPham;
        $loaiSanPham->LogoURL="";
        $loaiSanPham->BiXoa=0;
        $this->loaiSanphamDAO->Insert($loaiSanPham);
    }
    public function UpdateName($id,$name)
    {
        $this->loaiSanphamDAO->UpdateName($id,$name);
    }
    public function  Delete($maloaiSanPham)
    {
        $kt = $this->loaiSanphamDAO->KTLoaiHD($maloaiSanPham);
        if ($kt == 0)
        {
            return $this->loaiSanphamDAO->Delete($maloaiSanPham);
        }
        else
        {
            return $this->loaiSanphamDAO->SetDelete($maloaiSanPham);
        }

    }
    public  function  SetDelete($maLoaiSanPham)
    {
        $this->loaiSanphamDAO->SetDelete($maLoaiSanPham);
    }
    public function UnsetDelete($maloaiSanPham)
    {
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham = $maloaiSanPham;
        $this->loaiSanphamDAO->UnsetDelete($loaiSanPham);
    }
    public function Update($maloaiSanPham)
    {
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham = $maloaiSanPham;
        $this->loaiSanphamDAO->Update($loaiSanPham);
    }
    public function timkiemCategory($timKiem)
    {
        return $this->loaiSanphamDAO->timkiemCategory($timKiem);
    }
    public function timkiemCategoryHD($timKiem)
    {
        return $this->loaiSanphamDAO->timkiemCategoryHD($timKiem);
    }

}