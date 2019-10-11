<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 11/12/2018
 * Time: 11:50 CH
 */

class TinhTrangBUS
{
    var $tinhTrangDAO;
    public function __construct()
    {
        $this->tinhTrangDAO = new TinhTrangDAO();
    }
    public function GetAll()
    {
        return $this->tinhTrangDAO->GetAll();
    }
    public function GetByID($ma)
    {
        return $this->tinhTrangDAO->GetByID($ma);
    }
}