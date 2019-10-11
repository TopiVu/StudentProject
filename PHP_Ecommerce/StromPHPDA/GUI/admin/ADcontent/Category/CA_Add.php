<?php
if (isset($_GET["xl"]))
{
    $xl = $_GET["xl"];
}
else
{
    $xl = 0;
}

if($xl==0)
{?>
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Thêm loại sản phẩm</h1>
    <br><br>
    <form action="ADcontent/Category/CA_xlAdd.php" method="GET">
        <div style="text-align: center">
            <span style="font-size: 13px; color: blue; font-weight: bold">Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" required />
            <input type="submit" value="Thêm mới" />
            <?php
            if(isset($_GET["error"])) {
                echo "<b style='color: red; text-align: center;fonts-weight: bold'>Tên loại đã tồn tại!!!</b>";
            }
            ?>
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
    <h1 style="color: red;text-align: center;font-weight: bold;font-size: 30px  ">Thay đổi tên loại sản phẩm</h1>
    <br><br>
    <form action="ADcontent/Category/CA_xlUpdate.php" method="GET">
        <div style="text-align: center">
            <input type="hidden" name="id" value="<?php echo "$id";?>">
            <span style="font-size: 13px; color: blue; font-weight: bold">Tên loại sản phẩm:</span>
            <input type="text" name="txtTen" id="txtTen" required />
            <input type="submit" value="Thay đổi" />
            <?php
            if(isset($_GET["error"])) {
                echo "<b style='color: red; text-align: center;fonts-weight: bold'>Tên loại đã tồn tại!!!</b>";
            }
            ?>
        </div>
    </form>
<?php
}
else
{
    header("location:ad_Index.php?a=404&id=404");
}
