<?php
include_once 'conn.php';
 @$roomID=$_GET["roomID"];
 @$tablename=$_GET["tablename"];
 $sql="delete from $tablename where roomID=$roomID";
 mysqli_query($conn,$sql);
 $comewhere=$_SERVER['HTTP_REFERER'];
 echo "<script language='javascript'>alert('删除成功');location.href='$comewhere';</script>"
?>