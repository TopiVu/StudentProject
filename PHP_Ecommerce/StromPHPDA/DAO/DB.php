<?php
/**
 * Created by PhpStorm.
 * User: ADMIN
 * Date: 28/11/2018
 * Time: 9:52 CH
 */

class DB
{
    public function ExecuteQuery($sql)
    {
        $connect = mysqli_connect('localhost','root','','1660742_topishop') or die("cannot connect db");
        mysqli_query($connect,"set names 'utf8'");
        $result = mysqli_query($connect,$sql);
        mysqli_close($connect);
        return $result;
    }
}
