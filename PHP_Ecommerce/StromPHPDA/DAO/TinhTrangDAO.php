<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 11/12/2018
 * Time: 11:37 CH
 */

class TinhTrangDAO extends DB
{
    public function GetAll()
    {
        $sql ="Select MaTinhTrang,TenTinhTrang from tinhtrang";
        $result = $this->ExecuteQuery($sql);
        $lstTinhTrang = array();
        while ($row = mysqli_fetch_array($result)) {
            $tinhTrang = new TinhTrang();
            $tinhTrang->MaTinhTrang = $row["MaTinhTrang"];
            $tinhTrang->TenTinhTrang = $row["TenTinhTrang"];
            $lstTinhTrang[] = $tinhTrang;
        }
        return $lstTinhTrang;
    }
    public function GetByID($ma)
    {
        $sql ="Select MaTinhTrang,TenTinhTrang from tinhtrang where MaTinhTrang =$ma";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $tinhTrang = new TinhTrang();
        $tinhTrang->MaTinhTrang = $row["MaTinhTrang"];
        $tinhTrang->TenTinhTrang = $row["TenTinhTrang"];
        return $tinhTrang;
    }
}