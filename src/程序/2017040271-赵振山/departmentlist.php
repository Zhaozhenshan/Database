<?php 
include_once 'conn.php';

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>学生信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<body>
<p>已有学生信息列表:</p>

<form id="form1" name="form1" method="post" action="">
 宿舍楼号:<input name="dID" type="text" id="dID" size=12 />
 <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666'/>
</form>
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
  <tr>
   <td width="25" bgcolor="#CCFFFF">宿舍楼号</td>
   <td width="25" bgcolor="#CCFFFF">楼层数</td>
   <td width="25" bgcolor="#CCFFFF">房间数</td>
   <td width="25" bgcolor="#CCFFFF">启用时间</td>
   <td width="25" bgcolor="#CCFFFF">操作</td>
  </tr>
  
  <?php 
   $sql="select * from department where 1=1 ";
   if(@$_POST["dID"]!=""){$nreqdID=@$_POST["dID"];$sql=$sql."and dID like '%$nreqdID%'";}
   $query=mysqli_query($conn,$sql);
   @$rowscount=mysqli_num_rows($query);
   if (!function_exists('mysql_result')) {
       function mysql_result($result, $number, $field=0) {
           mysqli_data_seek($result, $number);
           $row = mysqli_fetch_array($result);
           return $row[$field] ?? '';
       }
   }
   
   //下面是分页显示学生信息
   if($rowscount==0){}
   else 
   {
       $pagelarge=10;//每页行数；
       @$pagecurrent=$_GET["pagecurrent"];
       if($rowscount%$pagelarge==0)
       {
           $pagecount=$rowscount/$pagelarge;
       }
       else
       {
           $pagecount=intval($rowscount/$pagelarge)+1;
       }
       if($pagecurrent=="" || $pagecurrent<=0)
       {
           $pagecurrent=1;
       }
       
       if($pagecurrent>$pagecount)
       {
           $pagecurrent=$pagecount;
       }
       $max=$pagecurrent*$pagelarge;
       if($pagecurrent==$pagecount)
       {
           if($rowscount%$pagelarge==0)
           {
               $max=$pagecurrent*$pagelarge;
           }
           else
           {
               $max=$pagecurrent*$pagelarge-$pagelarge+$rowscount%$pagelarge;
           }
       }
       
       for($i=$pagecurrent*$pagelarge-$pagelarge;$i<$max;$i++)
       {
           ?>
  <tr>
    <td><?php echo mysql_result($query,$i,"dID");?></td>
    <td><?php echo mysql_result($query,$i,"floor");?></td>
    <td><?php echo mysql_result($query,$i,"roomnumber");?></td>
    <td><?php echo mysql_result($query,$i,"time");?></td>
    <td width="90" align="center">
    <a href="deld.php?dID=<?php echo mysql_result($query,$i,"dID");?>&tablename=department" onclick="return confirm('真的要删除？')" style='color:#800080'>删除</a> 
     <a href="departmentupdt.php?dID=<?php echo mysql_result($query,$i,"dID");?>&i=<?php $i ?>" style='color:#800080'>修改</a> 
      </td>
  </tr>
  	<?php
	}
}
?>
</table>
<?php //yougongzitongji?>
<p>以上数据共<?php
		echo $rowscount;
	?>条,
</p>

<p align="center"><a href="departmentlist.php?pagecurrent=1">首页</a>, <a href="departmentlist.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="departmentlist.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="departmentlist.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>
<p>&nbsp; </p>

</body>
</html>







