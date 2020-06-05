<?php
//验证登陆信息
session_start();
include_once 'conn.php';
$login=$_POST["login"];
$username=$_POST['username'];
$pwd=$_POST['pwd'];
$cx=$_POST['cx'];

if($login=="1")
{
    if ($username!="" && $pwd!="")
    {
        if($cx=="管理员")
        {
            $sql="select * from allusers where username='$username' and pwd='$pwd' and cx='管理员'";
        }
        
        $result = mysqli_query($conn,$sql);
        if(mysqli_num_rows($result)>0)
        {
            $_SESSION['username']=$username;
            
            $_SESSION['cx']=$cx;
            echo "<script language='javascript'>alert('登陆成功！');location='main.php';</script>";
        }
        else
        {
            echo "<script language='javascript'>alert('用户名或密码错误！');history.back();</script>";
        }
    }
    else
    {
        echo "<script language='javascript'>alert('请输入完整！');history.back();</script>";
    }
}
?>