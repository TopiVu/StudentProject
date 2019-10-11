<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 29/11/2018
 * Time: 10:50 CH
 */

class SanPhamDAO extends DB
{
    public function  GetAll()
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham ";
        $result= $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem     = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailable()
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0";
        $result= $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetByID($maSanPham)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaSanPham=$maSanPham";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $sanPham = new SanPham();
        $sanPham->MaSanPham     = $row["MaSanPham"];
        $sanPham->TenSanPham    = $row["TenSanPham"];
        $sanPham->HinhURL       = $row["HinhURL"];
        $sanPham->GiaSanPham    = $row["GiaSanPham"];
        $sanPham->NgayNhap      = $row["NgayNhap"];
        $sanPham->SoLuongTon    = $row["SoLuongTon"];
        $sanPham->SoLuongBan    = $row["SoLuongBan"];
        $sanPham->SoLuocXem    = $row["SoLuocXem"];
        $sanPham->MoTa          = $row["MoTa"];
        $sanPham->BiXoa         = $row["BiXoa"];
        $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
        $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
        return $sanPham;
    }
    public function GetAllAvailableLoai($maLoaiSanPham)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaLoaiSanPham='$maLoaiSanPham' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableLoai5($maLoaiSanPham)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaLoaiSanPham='$maLoaiSanPham' and BiXoa=0 order by Rand() limit 5";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableHang($maHangSanXuat)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaHangSanXuat='$maHangSanXuat' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableHang_Loai($maHangSanXuat,$maLoaiSanPham)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaHangSanXuat='$maHangSanXuat' and MaLoaiSanPham='$maLoaiSanPham' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableHang_TK($maHangSanXuat,$timKiem)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaHangSanXuat='$maHangSanXuat' and (TenSanPham like '%$timKiem%') and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableLoai_KT($maLoaiSanPham,$timKiem)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where (TenSanPham like '%$timKiem%') and MaLoaiSanPham='$maLoaiSanPham' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableHang_Loai_TK($maHangSanXuat,$maLoaiSanPham,$timKiem)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where MaHangSanXuat='$maHangSanXuat' and MaLoaiSanPham='$maLoaiSanPham' and (TenSanPham like '%$timKiem%') and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia($g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_TK($timKiem,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and (TenSanPham like '%$timKiem%')";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_TK_H($timKiem,$maHangSanXuat,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and (TenSanPham like '%$timKiem%') and  MaHangSanXuat='$maHangSanXuat'";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_TK_L($timKiem,$maLoaiSanPham,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and (TenSanPham like '%$timKiem%') and MaLoaiSanPham='$maLoaiSanPham'f";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_TK_H_L($timKiem,$maHangSanXuat,$maLoaiSanPham,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and (TenSanPham like '%$timKiem%') and  MaHangSanXuat='$maHangSanXuat' and MaLoaiSanPham='$maLoaiSanPham'";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_H_L($maHangSanXuat,$maLoaiSanPham,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and  MaHangSanXuat='$maHangSanXuat' and MaLoaiSanPham='$maLoaiSanPham'";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_H($maHangSanXuat,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2  and  MaHangSanXuat='$maHangSanXuat'";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetAllAvailableGia_L($maLoaiSanPham,$g1,$g2)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where BiXoa=0 and GiaSanPham >=$g1 and GiaSanPham <=$g2 and MaLoaiSanPham='$maLoaiSanPham'";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function KTSanPhamHD($sanPham)
    {
        $sql = "Select MaSanPham from sanpham where MaSanPham = '$sanPham' and (MaSanPham in (SELECT MaSanPham from chitietdondathang)) ";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null) {
            return 0;
        }
        return 1;
    }
    public function KTSanPhamtontai($sanPham)
    {
        $sql="Select TenSanPham from sanpham where TenSanPham like '$sanPham'";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function Insert($sanPham)
    {
        $sql= "INSERT into sanpham(MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat) values ($sanPham->MaSanPham,'$sanPham->TenSanPham','$sanPham->HinhURL',$sanPham->GiaSanPham,'$sanPham->NgayNhap',$sanPham->SoLuongTon,$sanPham->SoLuongBan,$sanPham->SoLuocXem,'$sanPham->MoTa',$sanPham->BiXoa,'$sanPham->MaLoaiSanPham','$sanPham->MaHangSanXuat')";
        $this->ExecuteQuery($sql);
    }
    public  function  Delete($sanPham)
    {
        $sql =" DELETE From sanpham WHERE MaSanPham = '$sanPham'";
        $this->ExecuteQuery($sql);
    }
    public function SetDelete($sanPham)
    {
        $sql ="UPDATE sanpham Set BiXoa=1-BiXoa where MaSanPham = '$sanPham'";
        $this->ExecuteQuery($sql);
    }
    public function UnSetDelete($sanPham)
    {
        $sql ="UPDATE sanpham Set BiXoa=0 where MaSanPham = $sanPham->MaSanPham";
        $this->ExecuteQuery($sql);
    }
    public function Update($sanPham)
    {
        $sql ="UPDATE sanpham Set TenSanPham='$sanPham->TenSanPham',HinhURL='$sanPham->HinhURL',GiaSanPham=$sanPham->GiaSanPham,NgayNhap='$sanPham->NgayNhap',SoLuongTon=$sanPham->SoLuongTon,MoTa='$sanPham->MoTa',MaLoaiSanPham=$sanPham->MaLoaiSanPham,MaHangSanXuat=$sanPham->MaHangSanXuat where MaSanPham = $sanPham->MaSanPham";
        $this->ExecuteQuery($sql);
    }
    public function UpdateLuocXem($maSanPham)
    {
       $sql ="UPDATE sanpham set SoLuocXem = SoLuocXem +1 where MaSanPham=$maSanPham";
       $this->ExecuteQuery($sql);
    }
    public function UpdateTon($maSanPham,$sl)
    {
        $sql ="UPDATE sanpham set SoLuongTon = (SoLuongTon -$sl) where MaSanPham=$maSanPham";
        $this->ExecuteQuery($sql);
    }
    public function UpdateBan($maSanPham,$sl)
    {
        $sql ="UPDATE sanpham set SoLuongBan = (SoLuongBan +$sl) where MaSanPham=$maSanPham";
        $this->ExecuteQuery($sql);
    }
    public function UpdateGia($maSanPham,$sl,$gia)
    {
        $sql ="UPDATE sanpham set SoLuongTon = (SoLuongTon+$sl),GiaSanPham =$gia where MaSanPham='$maSanPham'";
        $this->ExecuteQuery($sql);
    }
   public function ChiTietSP($maSanPham)
   {
       $sql = "SELECT sp.MaSanPham ,sp.TenSanPham , sp.HinhURL, sp.GiaSanPham, h.TenHangSanXuat, l.TenLoaiSanPham,sp.SoLuongTon,sp.SoLuongBan,sp.SoLuocXem,sp.MoTa FROM  sanpham sp, loaisanpham l, hangsanxuat h WHERE sp.Bixoa =0 and sp.MaLoaiSanPham = l.MaLoaiSanPham and sp.MaHangSanXuat =h.MaHangSanXuat and sp.MaSanPham = $maSanPham";
       $result = $this->ExecuteQuery($sql);
       if ($result == null)
           return null;
       $row = mysqli_fetch_array($result);
       $sanPham = new ChiTiet();
       $sanPham->MaSanPham =$row["MaSanPham"];
       $sanPham->TenSanPham = $row["TenSanPham"];
       $sanPham->HinhURL =$row["HinhURL"];
       $sanPham->GiaSanPham=$row["GiaSanPham"];
       $sanPham->TenHangSanXuat=$row["TenHangSanXuat"];
       $sanPham->TenLoaiSanPham=$row["TenLoaiSanPham"];
       $sanPham->SoLuongBan=$row["SoLuongBan"];
       $sanPham->SoLuongTon=$row["SoLuongTon"];
       $sanPham->SoLuocXem=$row["SoLuocXem"];
       $sanPham->MoTa=$row["MoTa"];
       return $sanPham;
   }
   public function TopSanPhamNew()
   {
       $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham order by NgayNhap desc limit 10 ";
       $result = $this->ExecuteQuery($sql);
       $lstSanPham = array();
       while ($row =mysqli_fetch_array($result))
       {
           $sanPham = new SanPham();
           $sanPham->MaSanPham     = $row["MaSanPham"];
           $sanPham->TenSanPham    = $row["TenSanPham"];
           $sanPham->HinhURL       = $row["HinhURL"];
           $sanPham->GiaSanPham    = $row["GiaSanPham"];
           $sanPham->NgayNhap      = $row["NgayNhap"];
           $sanPham->SoLuongTon    = $row["SoLuongTon"];
           $sanPham->SoLuongBan    = $row["SoLuongBan"];
           $sanPham->SoLuocXem    = $row["SoLuocXem"];
           $sanPham->MoTa          = $row["MoTa"];
           $sanPham->BiXoa         = $row["BiXoa"];
           $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
           $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
           $lstSanPham[]= $sanPham;
       }
       return $lstSanPham;
   }
    public function TopBanHang()
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham order by SoLuongBan desc limit 10 ";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function timkiemDG($timKiem)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where (TenSanPham like '%$timKiem%') and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function GetBanChay()
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham order by SoLuongBan desc";
        $result = $this->ExecuteQuery($sql);
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public function timkiem($timKiem)
    {
        $sql ="SELECT MaSanPham,TenSanPham,HinhURL,GiaSanPham,NgayNhap,SoLuongTon,SoLuongBan,SoLuocXem,MoTa,BiXoa,MaLoaiSanPham,MaHangSanXuat from sanpham where (TenSanPham like '%$timKiem%')";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $sanPham = new SanPham();
            $sanPham->MaSanPham     = $row["MaSanPham"];
            $sanPham->TenSanPham    = $row["TenSanPham"];
            $sanPham->HinhURL       = $row["HinhURL"];
            $sanPham->GiaSanPham    = $row["GiaSanPham"];
            $sanPham->NgayNhap      = $row["NgayNhap"];
            $sanPham->SoLuongTon    = $row["SoLuongTon"];
            $sanPham->SoLuongBan    = $row["SoLuongBan"];
            $sanPham->SoLuocXem    = $row["SoLuocXem"];
            $sanPham->MoTa          = $row["MoTa"];
            $sanPham->BiXoa         = $row["BiXoa"];
            $sanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
            $sanPham->MaHangSanXuat = $row["MaHangSanXuat"];
            $lstSanPham[]= $sanPham;
        }
        return $lstSanPham;
    }
    public  function CreateProductCode()
    {
        $sql ="Select MaSanPham from sanpham Order by MaSanPham desc limit 1";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return $row["MaSanPham"];
    }

    public function KTsanphamton($sanPham)
    {
        $sql="Select SoLuongTon from sanpham where MaSanPham= $sanPham";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return $row["SoLuongTon"];
    }
}