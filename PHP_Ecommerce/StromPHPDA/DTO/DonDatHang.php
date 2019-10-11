<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:19 CH
 */

class DonDatHang
{
    var $MaDonDatHang;
    var $NgayLap;
    var $TongThanhTien;
    var $MaTaiKhoan;
    var $MaTinhTrang;
    var $TongTien;
    var $LuongKH;
    public function __construct()
    {
        $this->MaDonDatHang='';
        $this->NgayLap='';
        $this->TongThanhTien=0;
        $this->MaTaiKhoan='';
        $this->MaTinhTrang=1;
        $this->TongTien=0;
        $this->LuongKH=0;
    }
}