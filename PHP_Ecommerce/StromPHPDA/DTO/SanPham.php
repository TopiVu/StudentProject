<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 29/11/2018
 * Time: 3:38 CH
 */

class SanPham
{
    var $MaSanPham;
    var $TenSanPham;
    var $HinhURL;
    var $GiaSanPham;
    var $NgayNhap;
    var $SoLuongTon;
    var $SoLuongBan;
    var $SoLuocXem;
    var $MoTa;
    var $BiXoa;
    var $MaLoaiSanPham;
    var $MaHangSanXuat;
    public function __construct()
    {
        $this->MaSanPham=0;
        $this->TenSanPham="";
        $this->HinhURL="";
        $this->GiaSanPham=0;
        $this->NgayNhap="";
        $this->SoLuongTon=0;
        $this->SoLuongBan=0;
        $this->SoLuocXem=0;
        $this->MoTa="";
        $this->BiXoa=0;
        $this->MaLoaiSanPham=1;
        $this->MaHangSanXuat=1;
    }
}