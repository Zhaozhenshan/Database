<?php 
session_start();
$_SESSION['username']="";
$_SESSION['cx']="";
echo "<script language='javascript'>alert('注销登陆成功');location='login.html';</script>";
?>