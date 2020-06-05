<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$roomID=$_POST["roomID"];$people=$_POST["people"];$fare=$_POST["fare"];$tel=$_POST["tel"];$depid=$_POST["depid"];
	ischongfu($conn,"select sno from room where roomID='".$roomID."'");
	$sql="insert into room(roomID,people,fare,tel,depid) values('$roomID','$people','$fare','$tel','$depid') ";
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('添加成功!');location.href='roomadd.php';</script>";
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
<p>添加宿舍信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.roomID.value==""){alert("请输入宿舍号");document.form1.roomID.focus();return false;}
}
</script>

 <?php
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>宿舍号：</td><td><input name='roomID' type='text' id='roomID' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>可容纳人数：</td><td><input name='people' type='text' id='people' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>住宿费用：</td><td><input name='fare' type='text' id='fare' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>电话：</td><td><input name='tel' type='text' id='tel' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
	<tr><td>宿舍楼号：</td><td><input name='depid' type='text' id='depid' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
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
			echo "<script>javascript:alert('对不起，该宿舍号已经存在，请换其他楼号!');history.back();</script>";
			exit;
		}
		
	}
?>
</body>
</html>

