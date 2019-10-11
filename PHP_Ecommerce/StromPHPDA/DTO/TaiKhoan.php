<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 02/12/2018
 * Time: 1:28 CH
 */

class TaiKhoan
{
    var $MaTaiKhoan;
    var $TenDangNhap;
    var $MatKhau;
    var $TenHienThi;
    var $NgaySinh;
    var $DiaChi;
    var $DienThoai;
    var $Email;
    var $BiXoa;
    var $MaLoaiTaiKhoan;
    var $TongTK;
    public function __construct()
    {
        $this->MaTaiKhoan=0;
        $this->TenDangNhap="";
        $this->MatKhau="";
        $this->TenHienThi="";
        $this->NgaySinh=0;
        $this->DiaChi="";
        $this->DienThoai="";
        $this->Email="";
        $this->BiXoa=0;
        $this->MaLoaiTaiKhoan=2;
        $this->TongTK=0;
    }
}