<?php
if (isset($_GET["xl"]))
{
    $xl = $_GET["xl"];
}
else
    $xl= 0;

if($xl==0)
{?>
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Thêm hãng sản xuất</h1>
    <br><br>
    <form action="ADcontent/Manufacturer/Ma_xlAdd.php" method="GET">
        <div style="text-align: center">
            <table name="addhang" style="margin-left: 500px; font-size: 12px">
                <tr>
                    <td>Tên Hãng :<b style="color: #c80000">*</b></td>
                    <td><input type="text" name="txtTen" value="" required/><br></td>
                </tr>
                <tr>
                    <td>Logo:<b style="color: #c80000">*</b></td>
                    <td><input type="text" name="txtURL" value="" required/><br></td>
                </tr>
            </table>
            <br><br>
            <input style="margin-left: 300px" type="submit" value="Thêm mới">
        </div>
    </form>
    <?php
}
elseif ($xl==1)
{
    if (isset($_GET["id"]))
    {
        $id = $_GET["id"];
    }?>
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Thay đổi logo hãng</h1>
    <br><br>
    <form action="ADcontent/Manufacturer/Ma_xlUpdate.php" method="GET">
        <div style="text-align: center">
            <input type="hidden" name="id" value="<?php echo "$id";?>">
            <table name="updatehang" style="margin-left: 500px; font-size: 12px">
                <tr>
                    <td>Tên Hãng :<b style="color: #c80000">*</b></td>
                    <td><input type="text" name="txtten" value="" required/><br></td>
                </tr>
                <tr>
                    <td>Logo:<b style="color: #c80000">*</b></td>
                    <td><input type="text" name="txtlogo" value="" required/><br></td>
                </tr>
            </table>
            <br><br>
            <input style="margin-left: 300px" type="submit" value="Cập nhật">
        </div>
    </form>
    <?php
}
else
    header("location:ad_Index.php?a=404&id=404");
