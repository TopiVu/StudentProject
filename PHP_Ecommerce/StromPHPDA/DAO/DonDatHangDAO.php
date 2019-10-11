<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 06/12/2018
 * Time: 1:25 CH
 */

class DonDatHangDAO extends DB
{
    public function GetALL()
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang";
        $result= $this->ExecuteQuery($sql);
        $lstDonHang = array();
        while ($row =mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function GetByID($id)
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where MaDonDatHang =$id ";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang = $row["MaDonDatHang"];
        $donHang->NgayLap = $row["NgayLap"];
        $donHang->TongThanhTien = $row["TongThanhTien"];
        $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
        $donHang->MaTinhTrang = $row["MaTinhTrang"];
        return $donHang;
    }
    public function ktDonDatHang($ngaymua)
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where NgayLap like '$ngaymua%' order by MaDonDatHang desc limit 1 ";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $donHang = new DonDatHang();
        $donHang->MaDonDatHang = $row["MaDonDatHang"];
        $donHang->NgayLap = $row["NgayLap"];
        $donHang->TongThanhTien = $row["TongThanhTien"];
        $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
        $donHang->MaTinhTrang = $row["MaTinhTrang"];
        return $donHang;
    }
    public function Insert($donHang)
    {
        $sql= "INSERT into dondathang(MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang) values ('$donHang->MaDonDatHang','$donHang->NgayLap',$donHang->TongThanhTien,$donHang->MaTaiKhoan,$donHang->MaTinhTrang)";
        $this->ExecuteQuery($sql);
    }
    public function update($tinhTrang)
    {
        $sql ="Update dondathang set MaTinhTrang = $tinhTrang->MaTinhTrang where MaDonDatHang= $tinhTrang->MaDonDatHang";
        $this->ExecuteQuery($sql);
    }
    public  function Delete($donHang)
    {
        $sql = " DELETE From dondathang where MaDonDatHang = '$donHang'";
        $this->ExecuteQuery($sql);
    }
    public function  timkiem($timKiem)
    {
        $sql ="SELECT  MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where MaDonDatHang like '%$timKiem%'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstDonHang = array();
        while ($row = mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function GetALLuser($mataikhoan)
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where MaTaiKhoan=$mataikhoan";
        $result= $this->ExecuteQuery($sql);
        $lstDonHang = array();
        while ($row =mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function GetDatHang()
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where  MaTinhTrang =1";
        $result= $this->ExecuteQuery($sql);
        $lstDonHang = array();
        while ($row =mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function TKGetDatHang($timKiem)
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where  MaDonDatHang like '%$timKiem%' and MaTinhTrang =1";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstDonHang = array();
        while ($row =mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function TKGetDatHuy($timKiem)
    {
        $sql ="SELECT MaDonDatHang,NgayLap,TongThanhTien,MaTaiKhoan,MaTinhTrang from dondathang where  MaDonDatHang like '%$timKiem%' and MaTinhTrang =4";
        $result= $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstDonHang = array();
        while ($row =mysqli_fetch_array($result)) {
            $donHang = new DonDatHang();
            $donHang->MaDonDatHang = $row["MaDonDatHang"];
            $donHang->NgayLap = $row["NgayLap"];
            $donHang->TongThanhTien = $row["TongThanhTien"];
            $donHang->MaTaiKhoan = $row["MaTaiKhoan"];
            $donHang->MaTinhTrang = $row["MaTinhTrang"];
            $lstDonHang[] = $donHang;
        }
        return $lstDonHang;
    }
    public function TongKetTien($bd,$kt)
    {
        $sql="Select sum(TongThanhTien) as TongTien from dondathang WHERE NgayLap>='$bd' AND NgayLap <'$kt'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row= mysqli_fetch_array($result);
        return $row["TongTien"];
    }
    public function TongKetKH($bd,$kt)
    {
        $sql="Select count(distinct(MaTaiKhoan)) as LuongKH from dondathang WHERE NgayLap>='$bd' AND NgayLap <'$kt'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row= mysqli_fetch_array($result);
        return $row["LuongKH"];
    }
}