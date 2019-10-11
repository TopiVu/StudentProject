<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 02/12/2018
 * Time: 1:58 CH
 */

class TaiKhoanBUS
{
    var $taiKhoanDAO;

    public function __construct()
    {
        $this->taiKhoanDAO = new TaiKhoanDAO();
    }

    public function GetAll()
    {
        return $this->taiKhoanDAO->GetAll();
    }

    public function GetAllAvailable()
    {
        return $this->taiKhoanDAO->GetAllAvailable();
    }
    public function GetbyID($maTaiKhoan)
    {
        return $this->taiKhoanDAO->GetbyID($maTaiKhoan);
    }
    public function xllogin($us, $ps)
    {
        return $this->taiKhoanDAO->xllogin($us, $ps);
    }

    public function ktnamelogin($name)
    {
        return $this->taiKhoanDAO->ktnamelogin($name);
    }
    public function CreateAccountCode()
    {
        $kq =$this->taiKhoanDAO->CreateAccountCode();
        return $kq+1;
    }

    public function Insertuser($a, $b, $c, $d, $e, $f, $g, $h)
    {
        $taiKhoan = new TaiKhoan();
        $taiKhoan->MaTaiKhoan = $a;
        $taiKhoan->TenDangNhap = $b;
        $taiKhoan->MatKhau = $c;
        $taiKhoan->TenHienThi = $d;
        $taiKhoan->NgaySinh = $e;
        $taiKhoan->DiaChi = $f;
        $taiKhoan->DienThoai = $g;
        $taiKhoan->Email = $h;
        $taiKhoan->BiXoa = 0;
        $taiKhoan->MaLoaiTaiKhoan = 2;
        $this->taiKhoanDAO->Insert($taiKhoan);
    }

    public function Delete($taiKhoan)
    {
        $kt = $this->taiKhoanDAO->ktHDTaiKhoan($taiKhoan);
        if ($kt == 1)
        {
            return $this->taiKhoanDAO->SetDelete($taiKhoan);
        }
        else
        {
            return $this->taiKhoanDAO->Delete($taiKhoan);
        }

    }
    public function SetDelete($taiKhoan)
    {
        $this->taiKhoanDAO->SetDelete($taiKhoan);
    }

    public function UnsetDelete($taiKhoan)
    {
        $maTaiKhoan = new TaiKhoan();
        $maTaiKhoan->MaLoaiSanPham = $taiKhoan;
        $this->taiKhoanDAO->UnSetDelete($maTaiKhoan);
    }
    public function SetCategory($taiKhoan)
    {
        $this->taiKhoanDAO->SetCategory($taiKhoan);
    }
    public function SetDefaultPass($taiKhoan)
    {
        $this->taiKhoanDAO->SetDefaultPass($taiKhoan);
    }
    public function UpdateUser($a,$b,$c,$d,$e,$f)
    {
        $taiKhoan = new TaiKhoan();
        $taiKhoan->MaTaiKhoan = $a;
        $taiKhoan->TenHienThi = $b;
        $taiKhoan->NgaySinh =$c;
        $taiKhoan->DiaChi=$d;
        $taiKhoan->DienThoai =$e;
        $taiKhoan->Email =$f;
        $this->taiKhoanDAO->UpdateUser($taiKhoan);
    }
    public function UpdateAccount($a,$b,$c,$d,$e,$f,$g,$h)
    {
        $taiKhoan = new TaiKhoan();
        $taiKhoan->MaTaiKhoan = $a;
        $taiKhoan->TenDangNhap = $b;
        $taiKhoan->MatKhau =$c;
        $taiKhoan->TenHienThi = $d;
        $taiKhoan->NgaySinh =$e;
        $taiKhoan->DiaChi=$f;
        $taiKhoan->DienThoai =$g;
        $taiKhoan->Email =$h;
        $this->taiKhoanDAO->UpdateAC($taiKhoan);
    }
    public function timkiemAcount($timKiem)
    {
        return $this->taiKhoanDAO->timkiemAcount($timKiem);
    }
    public function timkiemAcountHD($timKiem)
    {
        return $this->taiKhoanDAO->timkiemAcountHD($timKiem);
    }
    public function KTMK($taiKhoan,$pass)
    {
        return $this->taiKhoanDAO->KTMK($taiKhoan,$pass);
    }
    public function UpdateMK($taiKhoan,$pass)
    {
        return $this->taiKhoanDAO->UpdateMK($taiKhoan,$pass);
    }
    public function TongKetTK()
    {
        return $this->taiKhoanDAO->TongKetTK();
    }
}