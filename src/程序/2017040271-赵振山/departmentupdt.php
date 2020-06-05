<?php
$i=$_GET["i"];
$dID=$_GET["dID"];
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$dID=$_POST["dID"];
	$floor=$_POST["floor"];
	$roomnumber=$_POST["roomnumber"];
	$time=$_POST["time"];
	$sql="update department set dID='$dID',floor='$floor',roomnumber='$roomnumber',time='$time' where dID=".$dID;
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('修改成功!');location.href='departmentlist.php';</script>";
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
 $sql="select * from department where dID=".$dID;
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
	<tr><td>宿舍楼号：</td><td><input name='dID' type='text' id='dID' value='<?php echo mysql_result($query,$i,"dID");?>' readonly='readonly' /> 此项主键，不得修改</td></tr>
	<tr><td>楼层数：</td><td><input name='floor' type='text' id='floor' value='<?php echo mysql_result($query,0,"floor");?>' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>房间数：</td><td><input name='roomnumber' type='text' id='roomnumber' value='<?php echo mysql_result($query,0,"roomnumber");?>' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>启用时间：</td><td><input name='time' type='text' id='time' value='<?php echo mysql_result($query,0,"time");?>' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>

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

