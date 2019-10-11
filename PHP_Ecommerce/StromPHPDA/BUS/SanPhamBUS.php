<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 29/11/2018
 * Time: 11:31 CH
 */

class SanPhamBUS
{
    var $sanPhamDAO;
    public function __construct()
    {
        $this->sanPhamDAO= new SanPhamDAO();
    }
    public function GetAll()
    {
        return $this->sanPhamDAO->GetAll();
    }
    public function GetALLAvailable()
    {
        return $this->sanPhamDAO->GetAllAvailable();
    }
    public function GetByID($maSanPham)
    {
        return $this->sanPhamDAO->GetByID($maSanPham);
    }
    public function GetAllAvailableLoai($maLoaiSanPham)
    {
        return $this->sanPhamDAO->GetAllAvailableLoai($maLoaiSanPham);
    }
    public function GetAllAvailableLoai5($maLoaiSanPham)
    {
        return $this->sanPhamDAO->GetAllAvailableLoai5($maLoaiSanPham);
    }
    public function GetAllAvailableHang($maHangSanXuat)
    {
        return $this->sanPhamDAO->GetAllAvailableHang($maHangSanXuat);
    }
    public function GetAllAvailableTH($maHangSanXuat,$maLoaiSanPham,$timkiem,$xl)
    {
        If ($xl==1)
        {
            $g1 = 0;
            $g2 = 1000000;
        }
        if ($xl==2)
        {
            $g1 = 1000001;
            $g2 = 5000000;
        }
        if ($xl==3)
        {
            $g1 = 5000001;
            $g2 = 10000000;
        }
        if ($xl==4)
        {
            $g1 = 10000001;
            $g2 = 20000000;
        }
        if ($xl==5)
        {
            $g1 = 20000000;
            $g2 = 1000000000000;
        }
        if ($xl==null)
        {
            $g1 = 0;
            $g2 = 0;
        }
        if ($maHangSanXuat == null && $maLoaiSanPham!= null && $timkiem == null && $xl==null) //Loai
            return $this->sanPhamDAO->GetAllAvailableLoai($maLoaiSanPham);
        elseif ($maHangSanXuat != null && $maLoaiSanPham== null && $timkiem == null && $xl==null) //Hãng
            return $this->sanPhamDAO->GetAllAvailableHang($maHangSanXuat);
        elseif ($maHangSanXuat == null && $maLoaiSanPham== null && $timkiem != null && $xl==null) // tìm kiếm
            return $this->sanPhamDAO->timkiemDG($timkiem);
        elseif($maHangSanXuat != null && $maLoaiSanPham!= null && $timkiem == null && $xl==null) // Hãng - Loại
            return $this->sanPhamDAO->GetAllAvailableHang_Loai($maHangSanXuat,$maLoaiSanPham);
        elseif ($maHangSanXuat != null && $maLoaiSanPham== null && $timkiem != null && $xl==null) // Hãng - tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableHang_TK($maHangSanXuat,$timkiem );
        elseif ($maHangSanXuat == null && $maLoaiSanPham!= null && $timkiem != null && $xl==null) // Loại - Tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableLoai_KT($maLoaiSanPham,$timkiem );
        elseif ($maHangSanXuat != null && $maLoaiSanPham!= null && $timkiem != null && $xl==null) // Loại - Hãng - tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableHang_Loai_TK($maHangSanXuat,$maLoaiSanPham,$timkiem);
        elseif ($maHangSanXuat == null && $maLoaiSanPham== null && $timkiem == null && $xl!=null) // Giá
            return $this->sanPhamDAO->GetAllAvailableGia($g1,$g2);
        elseif ($maHangSanXuat != null && $maLoaiSanPham== null && $timkiem == null && $xl!=null) // Giá - Hãng
            return $this->sanPhamDAO->GetAllAvailableGia_H($maHangSanXuat,$g1,$g2);
        elseif ($maHangSanXuat == null && $maLoaiSanPham!= null && $timkiem == null && $xl!=null) // Giá - Loại
            return $this->sanPhamDAO->GetAllAvailableGia_L($maLoaiSanPham,$g1,$g2);
        elseif ($maHangSanXuat == null && $maLoaiSanPham== null && $timkiem != null && $xl!=null) // Giá - Tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableGia_TK($timkiem,$g1,$g2);
        elseif ($maHangSanXuat != null && $maLoaiSanPham== null && $timkiem != null && $xl!=null) // Giá - Hãng -Tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableGia_TK_H($timkiem,$maHangSanXuat,$g1,$g2);
        elseif ($maHangSanXuat == null && $maLoaiSanPham!= null && $timkiem != null && $xl!=null) // Giá -Loai - tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableGia_TK_L($timkiem,$maLoaiSanPham,$g1,$g2);
        elseif ($maHangSanXuat != null && $maLoaiSanPham!= null && $timkiem == null && $xl!=null) // Giá - Hãng -Loai
            return $this->sanPhamDAO->GetAllAvailableGia_H_L($maHangSanXuat,$maLoaiSanPham,$g1,$g2);
        elseif ($maHangSanXuat != null && $maLoaiSanPham!= null && $timkiem != null && $xl!=null) // Giá - Hãng - Loại - tìm kiếm
            return $this->sanPhamDAO->GetAllAvailableGia_TK_H_L($timkiem,$maHangSanXuat,$maLoaiSanPham,$g1,$g2);
    }
    public function Insert($a,$b,$c,$d,$e,$f,$g,$h,$o)
    {
        $sanPham = new SanPham();
        $sanPham->MaSanPham=$a;
        $sanPham->TenSanPham=$b;
        $sanPham->HinhURL=$c;
        $sanPham->GiaSanPham=$d;
        $sanPham->NgayNhap=$e;
        $sanPham->SoLuongTon=$f;
        $sanPham->SoLuongBan=0;
        $sanPham->SoLuocXem=0;
        $sanPham->MoTa=$g;
        $sanPham->BiXoa=0;
        $sanPham->MaLoaiSanPham=$h;
        $sanPham->MaHangSanXuat=$o;
        return $this->sanPhamDAO->Insert($sanPham);
    }
    public function InsertName($tenSanPham)
    {
        $sanPham = new SanPham();
        $sanPham->TenSanPham= $tenSanPham;
    }
    public function  Delete($sanham)
    {
        $kt = $this->sanPhamDAO->KTSanPhamHD($sanham);
        if ($kt == 0)
        {
            return $this->sanPhamDAO->Delete($sanham);
        }
        else
        {
            return $this->sanPhamDAO->SetDelete($sanham);
        }
    }
    public  function  SetDelete($sanham)
    {
        return $this->sanPhamDAO->SetDelete($sanham);
    }
    public function UnsetDelete($maSanPham)
    {
        $sanPham = new LoaiSanPham();
        $sanPham->MaLoaiSanPham=$maSanPham;
        $this->sanPhamDAO->UnSetDelete($sanPham);
    }
    public function Update($a,$b,$c,$d,$e,$f,$g,$h,$o)
    {
        $sanPham = new SanPham();
        $sanPham->MaSanPham=$a;
        $sanPham->TenSanPham=$b;
        $sanPham->HinhURL=$c;
        $sanPham->GiaSanPham=$d;
        $sanPham->NgayNhap=$e;
        $sanPham->SoLuongTon=$f;
        $sanPham->MoTa=$g;
        $sanPham->MaLoaiSanPham=$h;
        $sanPham->MaHangSanXuat=$o;
        return $this->sanPhamDAO->Update($sanPham);
    }
    public function ChiTietSP($maSanPham)
    {
        return $this->sanPhamDAO->ChiTietSP($maSanPham);
    }
    public function UpdateLuocXem($maSanPham)
    {
        return $this->sanPhamDAO->UpdateLuocXem($maSanPham);
    }
    public function UpdateTon($maSanPham,$sl)
    {
        return $this->sanPhamDAO->UpdateTon($maSanPham,$sl);
    }
    public function UpdateBan($maSanPham,$sl)
    {
        return $this->sanPhamDAO->UpdateBan($maSanPham,$sl);
    }
    public function TopSanPhamNew()
    {
        return $this->sanPhamDAO->TopSanPhamNew();
    }
    public function TopBanHang()
    {
        return $this->sanPhamDAO->TopBanHang();
    }
    public function timkiemDG($timKiem)
    {
        return $this->sanPhamDAO->timkiemDG($timKiem);
    }
    public function timkiem($timKiem)
    {
        return $this->sanPhamDAO->timkiem($timKiem);
    }
    public function CreateProductCode()
    {
        $kq =$this->sanPhamDAO->CreateProductCode();
        return $kq+1;
    }
    public function KTsanphamtontai($sanPham)
    {
        return $this->sanPhamDAO->KTSanPhamtontai($sanPham);
    }
    public function UpdateGia($a,$b,$c)
    {
        return $this->sanPhamDAO->UpdateGia($a,$b,$c);
    }
    public function GET1()
    {
        return $this->sanPhamDAO->GetAllAvailableGia(0,1000000);
    }
    public function GET2()
    {
        return $this->sanPhamDAO->GetAllAvailableGia(1000001,5000000);
    }
    public function GET3()
    {
        return $this->sanPhamDAO->GetAllAvailableGia(5000001,10000000);
    }
    public function GET4()
    {
        return $this->sanPhamDAO->GetAllAvailableGia(10000001,20000000);
    }
    public function GET5()
    {
        return $this->sanPhamDAO->GetAllAvailableGia(20000001,1000000000000);
    }
    public function LocSanPham($xl)
    {
        if ($xl == 1)
        {
            return $this->GET1();
        }
        elseif ($xl == 2)
        {
            return $this->GET2();
        }
        elseif ($xl == 3)
        {
            return $this->GET3();
        }
        elseif ($xl == 4)
        {
            return $this->GET4();
        }
        elseif ($xl == 5)
        {
            return $this->GET5();
        }
        else
        {
            return $this->GetALLAvailable();
        }
    }
    public function KTsanphamtontt($sanPham)
    {
        $kq= $this->sanPhamDAO->KTsanphamton($sanPham);
        return $kq;
    }
}