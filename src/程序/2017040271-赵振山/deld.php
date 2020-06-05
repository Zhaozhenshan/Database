<?php
include_once 'conn.php';
 @$dID=$_GET["dID"];
 @$tablename=$_GET["tablename"];
 $sql="delete from $tablename where dID=$dID";
 mysqli_query($conn,$sql);
 $comewhere=$_SERVER['HTTP_REFERER'];
 echo "<script language='javascript'>alert('删除成功');location.href='$comewhere';</script>"
?>