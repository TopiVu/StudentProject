<?php
    include ("../../Include.php");
    if ($_POST["ues"]!= null)
    {
        $tenDangNhap     =$_POST["ues"];
        $matKhau         =$_POST["paw"];
        $tenHienThi      =$_POST["showname"];
        if ($_POST["birthday"]== null)
        {
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $ngaySinh        =date("Y-m-d");
        }
        else
        {
            $ngaySinh        =$_POST["birthday"];
        }
        if ($_POST["ips"]== null)
        {
            $diaChi        ="";
        }
        else
        {
            $diaChi          =$_POST["ips"];
        }

        $dienThoai       =$_POST["phone"];
        if ($_POST["mail"]== null)
        {
            $email        ="";
        }
        else
        {
            $email           =$_POST["mail"];
        }
        $taiKhoanBUS = new TaiKhoanBUS();
        $kt = $taiKhoanBUS->ktnamelogin($tenDangNhap);
        if ($kt == 1)
        {
            header("location:../../Index.php?a=6&error=1");
            // Xuất câu thông báo trùng tên đăng nhập
        }
        else
        {
            $maTaiKhoan     = $taiKhoanBUS->CreateAccountCode();
            $taiKhoanBUS->Insertuser($maTaiKhoan,$tenDangNhap,$matKhau,$tenHienThi,$ngaySinh,$diaChi,$dienThoai,$email);
            header("location:../../Index.php?a=404&id=2");
        }
    }
    else
    {
        header("Location:../../Index.php?a=404&id=404");
    }
?>