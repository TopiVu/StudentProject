<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2018
 * Time: 9:50 CH
 */

class HangSanXuat
{
    var $MaHangSanXuat;
    var $TenHangSanXuat;
    var $LogoURL;
    var $BiXoa;
    public function __construct()
    {
        $this->MaHangSanXuat=0;
        $this->TenHangSanXuat="";
        $this->LogoURL="";
        $this->BiXoa=0;
    }
}