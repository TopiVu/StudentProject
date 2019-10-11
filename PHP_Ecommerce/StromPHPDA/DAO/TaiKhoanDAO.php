<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 02/12/2018
 * Time: 1:34 CH
 */

class TaiKhoanDAO extends DB
{
    public function GetAll()
    {
        $sql = "SELECT MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,NgaySinh,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan From taikhoan where MaTaiKhoan!=1";
        $result = $this->ExecuteQuery($sql);
        $lstTaiKhoan = array();
        while ($row =mysqli_fetch_array($result))
        {
            $taiKhoan = new TaiKhoan();
            $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
            $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
            $taiKhoan->MatKhau        =$row["MatKhau"];
            $taiKhoan->TenHienThi     =$row["TenHienThi"];
            $taiKhoan->NgaySinh       =$row["NgaySinh"];
            $taiKhoan->DiaChi         =$row["DiaChi"];
            $taiKhoan->DienThoai      =$row["DienThoai"];
            $taiKhoan->Email          =$row["Email"];
            $taiKhoan->BiXoa          =$row["BiXoa"];
            $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
            $lstTaiKhoan[]=$taiKhoan;
        }
        return $lstTaiKhoan;
    }
    public function GetAllAvailable()
    {
        $sql = "SELECT MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,NgaySinh,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan from taikhoan where  where MaTaiKhoan!=1 BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        $lstTaiKhoan = array();
        while ($row =mysqli_fetch_array($result))
        {
            $taiKhoan = new TaiKhoan();
            $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
            $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
            $taiKhoan->MatKhau        =$row["MatKhau"];
            $taiKhoan->TenHienThi     =$row["TenHienThi"];
            $taiKhoan->NgaySinh       =$row["NgaySinh"];
            $taiKhoan->DiaChi         =$row["DiaChi"];
            $taiKhoan->DienThoai      =$row["DienThoai"];
            $taiKhoan->Email          =$row["Email"];
            $taiKhoan->BiXoa          =$row["BiXoa"];
            $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
            $lstTaiKhoan[]=$taiKhoan;
        }
        return $lstTaiKhoan;
    }
    public function GetbyID($maTaiKhoan)
    {
        $sql = "SELECT MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,NgaySinh,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan From taikhoan where MaTaiKhoan='$maTaiKhoan'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row =mysqli_fetch_array($result);
        $taiKhoan = new TaiKhoan();
        $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
        $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
        $taiKhoan->MatKhau        =$row["MatKhau"];
        $taiKhoan->TenHienThi     =$row["TenHienThi"];
        $taiKhoan->NgaySinh       =$row["NgaySinh"];
        $taiKhoan->DiaChi         =$row["DiaChi"];
        $taiKhoan->DienThoai      =$row["DienThoai"];
        $taiKhoan->Email          =$row["Email"];
        $taiKhoan->BiXoa          =$row["BiXoa"];
        $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
        return $taiKhoan;

    }
    public function xllogin($us,$ps)
    {
        $sql = "Select MaTaiKhoan,MaLoaiTaiKhoan,TenHienThi,TenDangNhap,MatKhau,BiXoa from taikhoan where BiXoa=0 and TenDangNhap='$us' and MatKhau='$ps' ";
        $result = $this->ExecuteQuery($sql);
        $row =mysqli_fetch_array($result);
        if ($row==null)
        {
            return null;
        }
        else
        {
            $taiKhoan = new TaiKhoan();
            $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
            $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
            $taiKhoan->MatKhau        =$row["MatKhau"];
            $taiKhoan->TenHienThi     =$row["TenHienThi"];
//        $taiKhoan->DiaChi         =$row["DiaChi"];
//        $taiKhoan->DienThoai      =$row["DienThoai"];
//        $taiKhoan->Email          =$row["Email"];
            $taiKhoan->BiXoa          =$row["BiXoa"];
            $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
            return $taiKhoan;
        }

    }
    public function ktnamelogin($name)
    {
        $sql="Select TenDangNhap from taikhoan where TenDangNhap = '$name'";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public  function CreateAccountCode()
    {
        $sql ="Select MaTaiKhoan from taikhoan Order by MaTaiKhoan desc limit 1";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return $row["MaTaiKhoan"];
    }
    public  function Insert($taiKhoan)
    {
        $sql = "Insert into taikhoan(MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,NgaySinh,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan) values ($taiKhoan->MaTaiKhoan,'$taiKhoan->TenDangNhap','$taiKhoan->MatKhau','$taiKhoan->TenHienThi','$taiKhoan->NgaySinh','$taiKhoan->DiaChi','$taiKhoan->DienThoai','$taiKhoan->Email',$taiKhoan->BiXoa,$taiKhoan->MaLoaiTaiKhoan)";
        $this->ExecuteQuery($sql);
    }
    public  function  Delete($taiKhoan)
    {
        $sql =" DELETE From taikhoan WHERE MaTaiKhoan = '$taiKhoan'";
        $this->ExecuteQuery($sql);
    }
    public function SetDelete($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set BiXoa=1 -BiXoa where MaTaiKhoan ='$taiKhoan'";
        $this->ExecuteQuery($sql);
    }
    public function UnSetDelete($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set BiXoa=0 where MaTaiKhoan = $taiKhoan->MaTaiKhoan";
        $this->ExecuteQuery($sql);
    }
    public function ktHDTaiKhoan($taiKhoan)
    {
        $sql ="Select MaTaiKhoan from taikhoan where MaTaiKhoan = '$taiKhoan' and (MaTaiKhoan in (SELECT MaTaiKhoan from dondathang)) ";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function SetCategory($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set MaLoaiTaiKhoan=3-MaLoaiTaiKhoan where MaTaiKhoan ='$taiKhoan'";
        $this->ExecuteQuery($sql);
    }
    public  function SetDefaultPass($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set MatKhau = TenDangNhap where MaTaiKhoan ='$taiKhoan'";
        $this->ExecuteQuery($sql);
    }
    public function UpdateAC($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set TenDangNhap= '$taiKhoan->TenDangNhap',MatKhau='$taiKhoan->MatKhau',TenHienThi= '$taiKhoan->TenHienThi',NgaySinh='$taiKhoan->NgaySinh',DiaChi='$taiKhoan->DiaChi',DienThoai=$taiKhoan->DienThoai,Email='$taiKhoan->Email' where MaTaiKhoan = $taiKhoan->MaTaiKhoan";
        $this->ExecuteQuery($sql);
    }
    public function UpdateUser($taiKhoan)
    {
        $sql ="UPDATE taikhoan Set TenHienThi= '$taiKhoan->TenHienThi',NgaySinh='$taiKhoan->NgaySinh',DiaChi='$taiKhoan->DiaChi',DienThoai=$taiKhoan->DienThoai,Email='$taiKhoan->Email' where MaTaiKhoan = $taiKhoan->MaTaiKhoan";
        $this->ExecuteQuery($sql);
    }
    public function timkiemAcount($timKiem)
    {
        $sql ="SELECT MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan from taikhoan where TenDangNhap like '%$timKiem%'";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstTaiKhoan = array();
        while ($row =mysqli_fetch_array($result))
        {
            $taiKhoan = new TaiKhoan();
            $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
            $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
            $taiKhoan->MatKhau        =$row["MatKhau"];
            $taiKhoan->TenHienThi     =$row["TenHienThi"];
            $taiKhoan->DiaChi         =$row["DiaChi"];
            $taiKhoan->DienThoai      =$row["DienThoai"];
            $taiKhoan->Email          =$row["Email"];
            $taiKhoan->BiXoa          =$row["BiXoa"];
            $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
            $lstTaiKhoan[]=$taiKhoan;
        }
        return $lstTaiKhoan;
    }
    public function timkiemAcountHD($timKiem)
    {
        $sql ="SELECT MaTaiKhoan,TenDangNhap,MatKhau,TenHienThi,DiaChi,DienThoai,Email,BiXoa,MaLoaiTaiKhoan from taikhoan where TenDangNhap like '%$timKiem%' and BiXoa=0";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $lstTaiKhoan = array();
        while ($row =mysqli_fetch_array($result))
        {
            $taiKhoan = new TaiKhoan();
            $taiKhoan->MaTaiKhoan     =$row["MaTaiKhoan"];
            $taiKhoan->TenDangNhap    =$row["TenDangNhap"];
            $taiKhoan->MatKhau        =$row["MatKhau"];
            $taiKhoan->TenHienThi     =$row["TenHienThi"];
            $taiKhoan->DiaChi         =$row["DiaChi"];
            $taiKhoan->DienThoai      =$row["DienThoai"];
            $taiKhoan->Email          =$row["Email"];
            $taiKhoan->BiXoa          =$row["BiXoa"];
            $taiKhoan->MaLoaiTaiKhoan =$row["MaLoaiTaiKhoan"];
            $lstTaiKhoan[]=$taiKhoan;
        }
        return $lstTaiKhoan;
    }
    public function KTMK($taiKhoan,$pass)
    {
        $sql="Select MaTaiKhoan from taikhoan where MaTaiKhoan = '$taiKhoan' and MatKhau like '$pass'";
        $result = $this->ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
        if ($row == null)
        {
            return 0;
        }
        return 1;
    }
    public function UpdateMK($taiKhoan,$pass)
    {
        $sql ="UPDATE taikhoan Set MatKhau = '$pass' where MaTaiKhoan ='$taiKhoan'";
        $this->ExecuteQuery($sql);
    }
    public function TongKetTK()
    {
        $sql =" select count(MaTaiKhoan) as TongTK from taikhoan where MaLoaiTaiKhoan=2";
        $result = $this->ExecuteQuery($sql);
        if ($result == null)
            return null;
        $row= mysqli_fetch_array($result);
        return $row["TongTK"];
    }
}