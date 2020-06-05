<?php
include_once 'conn.php';
 @$sno=$_GET["sno"];
 @$tablename=$_GET["tablename"];
 $sql="delete from $tablename where sno=$sno";
 mysqli_query($conn,$sql);
 $comewhere=$_SERVER['HTTP_REFERER'];
 echo "<script language='javascript'>alert('删除成功');location.href='$comewhere';</script>"
?>