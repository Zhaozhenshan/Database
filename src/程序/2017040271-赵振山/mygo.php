<?php 
session_start();
if($_SESSION['cx']=="管理员")
{
    echo "<script>javascript:location.href='left.php';</script>";
}
?>