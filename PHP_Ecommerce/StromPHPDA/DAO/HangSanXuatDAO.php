<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 29/11/2018
 * Time: 1:01 CH
 */

class HangSanXuatDAO extends DB
{
    public function GetAll()
    {
        $sql = "SELECT MaHangSanXuat, TenHangSanXuat,LogoURL, BiXoa from hangsanxuat ";
        $result = $this->ExecuteQuery($sql);
        $lstHangSanXuat = array();
        while ($row = mysqli_fetch_array($result)) {
            extract($row);
            $hangSanXuat = new HangSanXuat();
            $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
            $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
            $hangSanXuat->LogoURL = $row["LogoURL"];
            $hangSanXuat->BiXoa = $row["BiXoa"];
            $lstHangSanXuat[] = $hangSanXuat;
        }
        return $lstHangSanXuat;
    }

    public function GetAllAvailable()
    {
        $sql = "SELECT MaHangSanXuat, TenHangSanXuat,LogoURL,BiXoa from hangsanxuat where BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstHangSanXuat = array();
        while ($row = mysqli_fetch_array($result)) {
            $hangSanXuat = new HangSanXuat();
            $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
            $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
            $hangSanXuat->LogoURL = $row["LogoURL"];
            $hangSanXuat->BiXoa = $row["BiXoa"];
            $lstHangSanXuat[] = $hangSanXuat;
        }
        return $lstHangSanXuat;
    }

    public function GetByID($maHangSanXuat)
    {
        $sql = "SELECT MaHangSanXuat, TenHangSanXuat,BiXoa from hangsanxuat where MaHangSanXuat=$maHangSanXuat";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $hangSanXuat = new HangSanXuat();
        $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
        $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
        $hangSanXuat->BiXoa = $row["BiXoa"];
        return $hangSanXuat;
    }
    public function GetIDTen($tenHang)
    {
        $sql = "SELECT MaHangSanXuat, TenHangSanXuat,BiXoa from hangsanxuat where TenHangSanXuat like '$tenHang'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $hangSanXuat = new HangSanXuat();
        $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
        $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
        $hangSanXuat->BiXoa = $row["BiXoa"];
        return $hangSanXuat;
    }

    public function Insert($hangSanXuat)
    {
        $sql = "INSERT into hangsanxuat(MaHangSanXuat,TenHangSanXuat,LogoURL,BiXoa) values ($hangSanXuat->MaHangSanXuat,'$hangSanXuat->TenHangSanXuat','$hangSanXuat->LogoURL',$hangSanXuat->BiXoa)";
        $this->ExecuteQuery($sql);
    }

    public function KTHangHD($hangSanXuat)
    {
        $sql = "Select MaHangSanXuat from hangsanxuat where MaHangSanXuat = '$hangSanXuat' and (MaHangSanXuat in (SELECT MaHangSanXuat from sanpham)) ";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null) {
            return 0;
        }
        return 1;
    }

    public function Delete($hangSanXuat)
    {
        $sql = " DELETE From hangsanxuat WHERE MaHangSanXuat = '$hangSanXuat'";
        $this->ExecuteQuery($sql);
    }

    public function SetDelete($hangSanXuat)
    {
        $sql = "UPDATE hangsanxuat Set BiXoa=1-BiXoa where MaHangSanXuat = '$hangSanXuat'";
        $this->ExecuteQuery($sql);
    }

    public function UnSetDelete($hangSanXuat)
    {
        $sql = "UPDATE hangsanxuat Set BiXoa=0 where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
        $this->ExecuteQuery($sql);
    }

    public function Update($hangSanXuat)
    {
        $sql = "UPDATE hangsanxuat Set TenHangSanXuat = $hangSanXuat->TenHangSanXuat, BiXoa=$hangSanXuat->BiXoa where MaHangSanXuat = $hangSanXuat->MaHangSanXuat";
        $this->ExecuteQuery($sql);
    }
    public function UpdateNameLogo($id,$name,$logo)
    {
        $sql = "UPDATE hangsanxuat Set TenHangSanXuat = '$name',LogoURL='$logo' where MaHangSanXuat = $id";
        $this->ExecuteQuery($sql);
    }
    public function timkiemManufacturer($timKiem)
    {
        $sql ="SELECT MaHangSanXuat, TenHangSanXuat,LogoURL,BiXoa from hangsanxuat where TenHangSanXuat like '%$timKiem%'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstHangSanXuat = array();
        while ($row = mysqli_fetch_array($result)) {
            $hangSanXuat = new HangSanXuat();
            $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
            $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
            $hangSanXuat->LogoURL = $row["LogoURL"];
            $hangSanXuat->BiXoa = $row["BiXoa"];
            $lstHangSanXuat[] = $hangSanXuat;
        }
        return $lstHangSanXuat;
    }
    public function timkiemManufacturerHD($timKiem)
    {
        $sql ="SELECT MaHangSanXuat, TenHangSanXuat,LogoURL,BiXoa from hangsanxuat where TenHangSanXuat like '%$timKiem%' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstHangSanXuat = array();
        while ($row = mysqli_fetch_array($result)) {
            $hangSanXuat = new HangSanXuat();
            $hangSanXuat->MaHangSanXuat = $row["MaHangSanXuat"];
            $hangSanXuat->TenHangSanXuat = $row["TenHangSanXuat"];
            $hangSanXuat->LogoURL = $row["LogoURL"];
            $hangSanXuat->BiXoa = $row["BiXoa"];
            $lstHangSanXuat[] = $hangSanXuat;
        }
        return $lstHangSanXuat;
    }
    public function KThangtontai($tenHang)
    {
        $sql="Select TenHangSanXuat from hangsanxuat where TenHangSanXuat like '$tenHang'";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function CreateManufacturerCode()
    {
        $sql ="Select MaHangSanXuat from hangsanxuat Order by MaHangSanXuat desc limit 1";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return $row["MaHangSanXuat"];
    }
}