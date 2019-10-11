<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2018
 * Time: 9:45 CH
 */

class LoaiSanPham
{
    var $MaLoaiSanPham;
    var $TenLoaiSanPham;
    var $LogoURL;
    var $BiXoa;
    public function __construct()
    {
        $this ->MaLoaiSanPham=0;
        $this->TenLoaiSanPham="";
        $this->LogoURL="";
        $this->BiXoa=0;
    }
}