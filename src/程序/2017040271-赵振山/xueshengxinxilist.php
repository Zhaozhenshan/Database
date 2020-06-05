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
 学号:<input name="sno" type="text" id="sno" size=12 />
 姓名:<input name="sname" type="text" id="sname" size=12 />
 <input type="submit" name="Submit" value="查找" style='border:solid 1px #000000; color:#666666'/>
</form> 
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse"> 
  <tr>
   <td width="25" bgcolor="#CCFFFF">学号</td>
   <td width="25" bgcolor="#CCFFFF">姓名</td>
   <td width="25" bgcolor="#CCFFFF">性别</td>
   <td width="25" bgcolor="#CCFFFF">民族</td>
   <td width="25" bgcolor="#CCFFFF">专业</td>
   <td width="25" bgcolor="#CCFFFF">班级</td>
   <td width="25" bgcolor="#CCFFFF">公寓号</td>
   <td width="25" bgcolor="#CCFFFF">宿舍号</td>
   <td width="25" bgcolor="#CCFFFF">电话</td>
   <td width='25' bgcolor="#CCFFFF">操作</td>
  </tr>
  
  <?php 
   $sql="select * from student where 1=1 ";
   
   if(@$_POST["sno"]!=""){$nreqsno=@$_POST["sno"];$sql=$sql."and sno like '%$nreqsno%'";}
   if(@$_POST["sname"]!=""){$nreqsname=$_POST["sname"];$sql=$sql."and sname like '%$nreqsname%'";}
   
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
    <td><?php echo mysql_result($query,$i,"sno");?></td>
    <td><?php echo mysql_result($query,$i,"sname");?></td>
    <td><?php echo mysql_result($query,$i,"sex");?></td>
    <td><?php echo mysql_result($query,$i,"nation");?></td>
    <td><?php echo mysql_result($query,$i,"master");?></td>
    <td><?php echo mysql_result($query,$i,"grade");?></td>
    <td><?php echo mysql_result($query,$i,"dormitory");?></td>
    <td><?php echo mysql_result($query,$i,"room");?></td>
    <td><?php echo mysql_result($query,$i,"telephone");?></td>
    <td width="90" align="center">
    <a href="del.php?sno=<?php echo mysql_result($query,$i,"sno");?>&tablename=student" onclick="return confirm('真的要删除？')" style='color:#800080'>删除</a> 
    <a href="xueshengxinxiupdt.php?sno=<?php echo mysql_result($query,$i,"sno");?>&i=<?php $i ?>" style='color:#800080'>修改</a> 
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

<p align="center"><a href="xueshengxinxilist.php?pagecurrent=1">首页</a>, <a href="xueshengxinxilist.php?pagecurrent=<?php echo $pagecurrent-1;?>">前一页</a> ,<a href="xueshengxinxilist.php?pagecurrent=<?php echo $pagecurrent+1;?>">后一页</a>, <a href="xueshengxinxilist.php?pagecurrent=<?php echo $pagecount;?>">末页</a>, 当前第<?php echo $pagecurrent;?>页,共<?php echo $pagecount;?>页 </p>
<p>&nbsp; </p>

</body>
</html>







