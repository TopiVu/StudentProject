<?php
include ("../../Include.php");
session_start();
session_destroy();
header("location:../../Index.php");
?>