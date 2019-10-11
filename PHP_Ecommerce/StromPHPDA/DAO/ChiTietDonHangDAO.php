<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:37 CH
 */

class ChiTietDonHangDAO extends DB
{
    public function GetAll()
    {
        $sql ="SELECT MaChiTietDonDatHang,SoLuong,GiaBan,MaDonDatHang,MaSanPham from chitietdondathang";
        $result= $this->ExecuteQuery($sql);
        $lstCTDonHang = array();
        while ($row =mysqli_fetch_array($result))
        {
            $ctDonHang = new ChiTietDonHang();
            $ctDonHang->MaChiTietDonDatHang   = $row["MaChiTietDonDatHang"];
            $ctDonHang->SoLuong               = $row["SoLuong"];
            $ctDonHang->GiaBan                = $row["GiaBan"];
            $ctDonHang->MaDonDatHang          = $row["MaDonDatHang"];
            $ctDonHang->MaSanPham             = $row["MaSanPham"];
            $lstCTDonHang[] = $ctDonHang;
        }
        return $lstCTDonHang;
    }
    public function Insert($ctDonHang)
    {
        $sql= "INSERT into chitietdondathang(MaChiTietDonDatHang,SoLuong,GiaBan,MaDonDatHang,MaSanPham) values ('$ctDonHang->MaChiTietDonDatHang',$ctDonHang->SoLuong,$ctDonHang->GiaBan,'$ctDonHang->MaDonDatHang','$ctDonHang->MaSanPham')";
        $this->ExecuteQuery($sql);
    }
    public function GetAllChiTiet($id)
    {
        $sql ="SELECT MaChiTietDonDatHang,SoLuong,GiaBan,MaDonDatHang,MaSanPham from chitietdondathang where MaDonDatHang=$id";
        $result= $this->ExecuteQuery($sql);
        $lstCTDonHang = array();
        while ($row =mysqli_fetch_array($result))
        {
            $ctDonHang = new ChiTietDonHang();
            $ctDonHang->MaChiTietDonDatHang   = $row["MaChiTietDonDatHang"];
            $ctDonHang->SoLuong               = $row["SoLuong"];
            $ctDonHang->GiaBan                = $row["GiaBan"];
            $ctDonHang->MaDonDatHang          = $row["MaDonDatHang"];
            $ctDonHang->MaSanPham             = $row["MaSanPham"];
            $lstCTDonHang[] = $ctDonHang;
        }
        return $lstCTDonHang;
    }
    public  function Delete($donHang)
    {
        $sql = " DELETE From chitietdondathang where MaDonDatHang = '$donHang'";
        $this->ExecuteQuery($sql);
    }
    public function LaySoLuong($hoaDon)
    {
        $sql ="Select MaChiTietDonDatHang,GiaBan,MaDonDatHang,SoLuong,MaSanPham from chitietdondathang where MaDonDatHang='$hoaDon'";
        $result= $this->ExecuteQuery($sql);
        $lstCTDonHang = array();
        while ($row =mysqli_fetch_array($result))
        {
            $ctDonHang = new ChiTietDonHang();
            $ctDonHang->MaChiTietDonDatHang   = $row["MaChiTietDonDatHang"];
            $ctDonHang->SoLuong               = $row["SoLuong"];
            $ctDonHang->GiaBan                = $row["GiaBan"];
            $ctDonHang->MaDonDatHang          = $row["MaDonDatHang"];
            $ctDonHang->MaSanPham             = $row["MaSanPham"];
            $lstCTDonHang[] = $ctDonHang;
        }
        return $lstCTDonHang;
    }
    public function Updatesl($sl,$hoaDon)
    {
        $sql =" Update sanpham set SoLuongTon=SoLuongTon+$sl, SoLuongBan = SoLuongBan - $sl where MaSanPham='$hoaDon'";
        $this->ExecuteQuery($sql);
    }
    public function TongKetSL($bd,$kt)
    {
        $sql ="select sum(ct.SoLuong) as TongSL from chitietdondathang ct, dondathang dh where ct.MaDonDatHang= dh.MaDonDatHang and dh.NgayLap>='$bd' AND dh.NgayLap <'$kt'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        return $row["TongSL"];
    }
}