<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$dID=$_POST["dID"];$floor=$_POST["floor"];$roomnumber=$_POST["roomnumber"];$time=$_POST["time"];
	ischongfu($conn,"select sno from student where dID='".$dID."'");
	$sql="insert into department(dID,floor,roomnumber,time) values('$dID','$floor','$roomnumber','$time') ";
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('添加成功!');location.href='departmentadd.php';</script>";
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>添加宿舍楼信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.dID.value==""){alert("请输入楼");document.form1.dID.focus();return false;}
}
</script>

 <?php
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>楼号：</td><td><input name='dID' type='text' id='dID' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>楼层数：</td><td><input name='floor' type='text' id='floor' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>房间数：</td><td><input name='roomnumber' type='text' id='roomnumber' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>启用时间：</td><td><input name='time' type='text' id='time' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
    <tr>
      <td>&nbsp;</td>
      <td>
        <input type="hidden" name="addnew" value="1"/>
        <input type="submit" name="Submit" value="添加" onclick="return check();"  style='border:solid 1px #000000; color:#666666' />
        <input type="reset" name="Submit2" value="重置" style='border:solid 1px #000000; color:#666666' />
     </td>
    </tr>
  </table>
</form>
<p>&nbsp;</p>
<?php
	function ischongfu($conn,$sql)
	{
		$query=mysqli_query($conn,$sql);
 		$rowscount=mysqli_num_rows($query);
		if($rowscount>0)
		{
			echo "<script>javascript:alert('对不起，该楼号已经存在，请换其他楼号!');history.back();</script>";
			exit;
		}
		
	}
?>
</body>
</html>

