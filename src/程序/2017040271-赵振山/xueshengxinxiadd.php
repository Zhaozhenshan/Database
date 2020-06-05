<?php
session_start();
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$sno=$_POST["sno"];$sname=$_POST["sname"];$sex=$_POST["sex"];$nation=$_POST["nation"];$master=$_POST["master"];$grade=$_POST["grade"];$telephone=$_POST["telephone"];$dormitory=$_POST["dormitory"];$room=$_POST["room"];
	ischongfu($conn,"select sno from student where sno='".$sno."'");
	$sql="insert into student(sno,sname,sex,nation,master,grade,telephone,dormitory,room) values('$sno','$sname','$sex','$nation','$master','$grade','$telephone','$dormitory','$room') ";
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('添加成功!');location.href='xueshengxinxiadd.php';</script>";
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
<p>添加学生信息： 当前日期： <?php echo $ndate; ?></p>
<script language="javascript">
	function check()
{
	if(document.form1.sno.value==""){alert("请输入学号");document.form1.xuehao.focus();return false;}if(document.form1.sname.value==""){alert("请输入姓名");document.form1.xingming.focus();return false;}
}
</script>

 <?php
?>
<form id="form1" name="form1" method="post" action="">
<table width="100%" border="1" align="center" cellpadding="3" cellspacing="1" bordercolor="#00FFFF" style="border-collapse:collapse">    
	<tr><td>学号：</td><td><input name='sno' type='text' id='sno' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>姓名：</td><td><input name='sname' type='text' id='sname' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;*</td></tr>
	<tr><td>民族：</td><td><input name='nation' type='text' id='nation' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
	<tr><td>性别：</td><td><select name='sex' id='sex'><option value="男">男</option><option value="女">女</option></select></td></tr>
	<tr><td>专业：</td><td><input name='master' type='text' id='master' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
	<tr><td>班级：</td><td><input name='grade' type='text' id='grade' value='' size='50' style='border:solid 1px #000000; color:#666666'  /></td></tr>
	<tr><td>电话：</td><td><input name='telephone' type='text' id='telephone' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>
	<tr><td>公寓号：</td><td><select name='dormitory' id='dormitory' style='border:solid 1px #000000; color:#666666' onchange="sss();">
	  <option value="1">1</option>
	  <option value="2">2</option>
	  <option value="3">3</option>
	  <option value="4">4</option>
	  <option value="5">5</option>
	  <option value="6">6</option>
	  <option value="7">7</option>
	  <option value="8">8</option>
	</select></td></tr>
    <tr><td>房间号：</td><td><input name='room' type='text' id='room' value='' style='border:solid 1px #000000; color:#666666' /></td></tr>

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
			echo "<script>javascript:alert('对不起，该学号已经存在，请换其他学号!');history.back();</script>";
			exit;
		}
		
	}
?>
</body>
</html>

