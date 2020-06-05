<?php
include_once 'conn.php';
 @$id=$_GET["id"];
 @$tablename=$_GET["tablename"];
 $sql="delete from $tablename where id=$id";
 mysqli_query($conn,$sql);
 $comewhere=$_SERVER['HTTP_REFERER'];
 echo "<script language='javascript'>alert('删除成功');location.href='$comewhere';</script>"
?>