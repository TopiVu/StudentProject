<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2018
 * Time: 9:58 CH
 */

class LoaiSanPhamDAO extends DB
{
    public function  GetAll()
    {
        $sql ="SELECT MaLoaiSanPham, TenLoaiSanPham,LogoURL, BiXoa from loaisanpham ";
        $result= $this->ExecuteQuery($sql);
        $lstLoaiSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            extract($row);
            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham= $row["MaLoaiSanPham"];
            $loaiSanPham->TenLoaiSanPham= $row["TenLoaiSanPham"];
            $loaiSanPham->LogoURL=$row["LogoURL"];
            $loaiSanPham->BiXoa= $row["BiXoa"];
            $lstLoaiSanPham[]= $loaiSanPham;
        }
        return $lstLoaiSanPham;
    }
    public function GetAllAvailable()
    {
        $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham,LogoURL,BiXoa from loaisanpham where BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstLoaiSanPham =array();
        while ($row= mysqli_fetch_array($result))
        {
            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham= $row["MaLoaiSanPham"];
            $loaiSanPham->TenLoaiSanPham= $row["TenLoaiSanPham"];
            $loaiSanPham->LogoURL=$row["LogoURL"];
            $loaiSanPham->BiXoa= $row["BiXoa"];
            $lstLoaiSanPham[]= $loaiSanPham;
        }
        return $lstLoaiSanPham;
    }
    public function GetByID($maLoaiSanPham)
    {
        $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham,BiXoa from loaisanpham where MaLoaiSanPham=$maLoaiSanPham";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
        $loaiSanPham->TenLoaiSanPham = $row["TenLoaiSanPham"];
        $loaiSanPham->BiXoa = $row["BiXoa"];
        return $loaiSanPham;
    }
    public function GetIDTen($tenLoai)
    {
        $sql = "SELECT MaLoaiSanPham, TenLoaiSanPham,BiXoa from loaisanpham where TenLoaiSanPham like '$tenLoai'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row = mysqli_fetch_array($result);
        $loaiSanPham = new LoaiSanPham();
        $loaiSanPham->MaLoaiSanPham = $row["MaLoaiSanPham"];
        $loaiSanPham->TenLoaiSanPham = $row["TenLoaiSanPham"];
        $loaiSanPham->BiXoa = $row["BiXoa"];
        return $loaiSanPham;
    }
    public  function CreateCategoryCode()
    {
        $sql ="Select MaLoaiSanPham from loaisanpham Order by MaLoaiSanPham desc limit 1";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return $row["MaLoaiSanPham"];
    }
    public function KTloaitontai($tenLoai)
    {
        $sql="Select TenLoaiSanPham from loaisanpham where TenLoaiSanPham like '$tenLoai'";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function Insert($loaiSanPham)
    {
        $sql= "INSERT into loaisanpham(MaLoaiSanPham,TenLoaiSanPham,LogoURl,BiXoa) values ($loaiSanPham->MaLoaiSanPham,'$loaiSanPham->TenLoaiSanPham','$loaiSanPham->LogoURL',$loaiSanPham->BiXoa)";
        $this->ExecuteQuery($sql);
    }
    public  function  Delete($loaiSanPham)
    {
        $sql =" DELETE From loaisanpham WHERE MaLoaiSanPham = '$loaiSanPham'";
        $this->ExecuteQuery($sql);
    }
    public function SetDelete($loaisanpham)
        {
        $sql ="UPDATE loaisanpham Set BiXoa=1-BiXoa where MaLoaiSanPham = '$loaisanpham'";
        $this->ExecuteQuery($sql);
    }
    public function UnSetDelete($loaisanpham)
    {
        $sql ="UPDATE loaisanpham Set BiXoa=0 where MaLoaiSanPham = $loaisanpham->MaLoaiSanPham";
        $this->ExecuteQuery($sql);
    }
    public function Update($loaiSanPham)
    {
        $sql ="UPDATE loaisanpham Set TenLoaiSanPham = $loaiSanPham->TenLoaiSanPham, LogoURL=$loaiSanPham->LogoURL where MaLoaiSanPham = $loaiSanPham->MaLoaiSanPham";
        $this->ExecuteQuery($sql);
    }
    public function UpdateName($ma,$loaiSanPham)
    {
        $sql ="UPDATE loaisanpham Set TenLoaiSanPham = '$loaiSanPham' where MaLoaiSanPham = $ma";
        $this->ExecuteQuery($sql);

    }
    public function KTLoaiHD($maLoaiSanPham)
    {
        $sql ="Select MaLoaiSanPham from loaisanpham where MaLoaiSanPham = '$maLoaiSanPham' and (MaLoaiSanPham in (SELECT MaLoaiSanPham from sanpham)) ";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function timkiemCategory($timKiem)
    {
        $sql ="SELECT MaLoaiSanPham, TenLoaiSanPham,LogoURL,BiXoa from loaisanpham where TenLoaiSanPham like '%$timKiem%'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstLoaiSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham= $row["MaLoaiSanPham"];
            $loaiSanPham->TenLoaiSanPham= $row["TenLoaiSanPham"];
            $loaiSanPham->LogoURL=$row["LogoURL"];
            $loaiSanPham->BiXoa= $row["BiXoa"];
            $lstLoaiSanPham[]= $loaiSanPham;
        }
        return $lstLoaiSanPham;
    }
    public function timkiemCategoryHD($timKiem)
    {
        $sql ="SELECT MaLoaiSanPham, TenLoaiSanPham,LogoURL,BiXoa from loaisanpham where TenLoaiSanPham like '%$timKiem%' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstLoaiSanPham = array();
        while ($row =mysqli_fetch_array($result))
        {
            $loaiSanPham = new LoaiSanPham();
            $loaiSanPham->MaLoaiSanPham= $row["MaLoaiSanPham"];
            $loaiSanPham->TenLoaiSanPham= $row["TenLoaiSanPham"];
            $loaiSanPham->LogoURL=$row["LogoURL"];
            $loaiSanPham->BiXoa= $row["BiXoa"];
            $lstLoaiSanPham[]= $loaiSanPham;
        }
        return $lstLoaiSanPham;
    }
}

