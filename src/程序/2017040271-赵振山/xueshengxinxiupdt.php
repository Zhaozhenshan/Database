<?php
$i=$_GET["i"];
$sno=$_GET["sno"];
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$sname=$_POST["sname"];
	$sex=$_POST["sex"];
	$nation=$_POST["nation"];
	$master=$_POST["master"];
	$grade=$_POST["grade"];
	$telephone=$_POST["telephone"];
	$dormitory=$_POST["dormitory"];
	$room=$_POST["room"];
	$sql="update student set sno='$sno',sname='$sname',sex='$sex',master='$master',nation='$nation',grade='$grade',dormitory='$dormitory',room='$room',telephone='$telephone' where sno=".$sno;
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('修改成功!');location.href='xueshengxinxilist.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>修改学生信息</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
</head>
<script language="javascript">
	function OpenScript(url,width,height)
{
  var win = window.open(url,"SelectToSort",'width=' + width + ',height=' + height + ',resizable=1,scrollbars=yes,menubar=no,status=yes' );
}
	function OpenDialog(sURL, iWidth, iHeight)
{
   var oDialog = window.open(sURL, "_EditorDialog", "width=" + iWidth.toString() + ",height=" + iHeight.toString() + ",resizable=no,left=0,top=0,scrollbars=no,status=no,titlebar=no,toolbar=no,menubar=no,location=no");
   oDialog.focus();
}
</script>
<body>
<p>修改学生信息： 当前日期： <?php echo $ndate; ?></p>

 <?php
 $sql="select * from student where sno=".$sno;
 $query=mysqli_query($conn,$sql);
 @$rowscount=mysqli_num_rows($query);
 if (!function_exists('mysql_result')) {
     function mysql_result($result, $number, $field=0) {
         @mysqli_data_seek($result, $number);
         $row = mysqli_fetch_array($result);
         return $row[$field] ?? '';
     }
 }
 if($rowscount>0)
{
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>学号：</td><td><input name='sno' type='text' id='sno' value='<?php echo mysql_result($query,$i,"sno");?>' readonly='readonly' /> 此项主键，不得修改</td></tr>
	<tr><td>姓名：</td><td><input name='sname' type='text' id='sname' value='<?php echo mysql_result($query,0,"sname");?>' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>民族：</td><td><input name='nation' type='text' id='nation' value='<?php echo mysql_result($query,0,"nation");?>' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>专业：</td><td><input name='master' type='text' id='master' value='<?php echo mysql_result($query,0,"master");?>' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
	<tr><td>班级：</td><td><input name='grade' type='text' id='grade' value='<?php echo mysql_result($query,0,"grade");?>' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
	<tr><td>电话：</td><td><input name='telephone' type='text' id='telephone' value='<?php echo mysql_result($query,0,"telephone");?>' style='border:solid 1px #000000; color:#666666' /></td></tr>
	<tr><td>公寓号：</td><td><select name='dormitory' id='dormitory' style='border:solid 1px #000000; color:#666666';">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	</select></td></tr>
    <tr><td>房间号：</td><td><input name='room' type='text' id='room' value='<?php echo mysql_result($query,0,"room");?>' style='border:solid 1px #000000; color:#666666' /></td></tr>

    <tr>
      <td>&nbsp;</td>
      <td>
        <input type="hidden" name="addnew" value="1"/>
        <input type="submit" name="Submit" value="修改" style='border:solid 1px #000000; color:#000000' />
        <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#000000' />
     </td>
    </tr>
  </table>
</form>
<?php
	}
?>
<p>&nbsp;</p>
</body>
</html>

