<div id ="sidebartiemkiemnangcao" >
    <?php
    if (isset($_GET["xl"]) == true)
        $a = $_GET["xl"];
    else
        $a= 0;
    if (isset($_GET["idh"]))
    {
        $idh = $_GET["idh"];
    }
    else
    {
        $idh = null;
    }
    if (isset($_GET["idl"]))
    {
        $idl = $_GET["idl"];
    }
    else
    {
        $idl = null;
    }
    if(isset($_GET["value"]))
        $value = $_GET["value"];
    else
        $value = null;
    ?>
    <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=1" <?php if($a == 1) echo "class='selectxl'"; ?> >Giá từ 0đ - 1tr</a>
    <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=2" <?php if($a == 2) echo "class='selectxl'"; ?> >Giá từ 1tr - 5tr</a>
    <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=3" <?php if($a == 3) echo "class='selectxl'"; ?>  >Giá từ 5tr - 10tr</a>
    <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=4" <?php if($a == 4) echo "class='selectxl'"; ?>  >Giá từ 10tr - 20tr </a>
    <a href="Index.php?a=2&ac=1&idl=<?php echo "$idl"; ?>&idh=<?php echo "$idh"?>&value=<?php echo "$value";?>&xl=5" <?php if($a == 5) echo "class='selectxl'"; ?>  >Từ 20tr </a>
</div>