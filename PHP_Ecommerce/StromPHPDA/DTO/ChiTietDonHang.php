<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:34 CH
 */

class ChiTietDonHang
{
    var $MaChiTietDonDatHang;
    var $SoLuong;
    var $GiaBan;
    var $MaDonDatHang;
    var $MaSanPham;
    var $TongSL;
    public function __construct()
    {
        $this->MaChiTietDonDatHang='';
        $this->SoLuong=0;
        $this->GiaBan=0;
        $this->MaDonDatHang='';
        $this->MaSanPham='';
        $this->TongSL=0;
    }

}