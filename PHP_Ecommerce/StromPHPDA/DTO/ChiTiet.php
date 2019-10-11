<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 30/11/2018
 * Time: 8:37 CH
 */

class ChiTiet
{
    var $MaSanPham;
    var $TenSanPham;
    var $HinhURl;
    var $GiaSanPham;
    var $TenHangSanXuat;
    var $TenLoaiSanPham;
    var $SoLuongTon;
    var $SoLuongBan;
    var $SoLuocXem;
    var $MoTa;
    var $BiXoa;
    public function __construct()
    {
        $this->MaSanPham=0;
        $this->TenSanPham="";
        $this->HinhURl="";
        $this->GiaSanPham=0;
        $this->TenHangSanXuat="";
        $this->TenLoaiSanPham="";
        $this->SoLuongTon=0;
        $this->SoLuongBan=0;
        $this->SoLuocXem=0;
        $this->MoTa="";
        $this->BiXoa=0;
    }
}