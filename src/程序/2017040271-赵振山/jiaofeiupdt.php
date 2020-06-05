<?php
$i=$_GET["i"];
$roomID=$_GET["roomID"];
include_once 'conn.php';
$ndate =date("Y-m-d");
@$addnew=$_POST["addnew"];
if ($addnew=="1" )
{
	$roomID=$_POST["roomID"];
	$newfare=$_POST["fareadd"]+$_POST["fare"];
	$sql="update room set roomID='$roomID',fare='$newfare' where roomID=".$roomID;
	mysqli_query($conn,$sql);
	echo "<script>javascript:alert('交费成功!');location.href='jiaofeilist.php';</script>";
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交费</title><script language="javascript" src="js/Calendar.js"></script><link rel="stylesheet" href="css.css" type="text/css">
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
<p>交费： 当前日期： <?php echo $ndate; ?></p>

 <?php
 $sql="select * from room where roomID=".$roomID;
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
	<tr><td>宿舍号：</td><td><input name='roomID' type='text' id='roomID' value='<?php echo mysql_result($query,$i,"roomID");?>' readonly='readonly' /> 此项主键，不得修改</td></tr>
	<tr><td>现有费用：</td><td><input name='fare' type='text' id='fare' value='<?php echo mysql_result($query,0,"fare");?>' readonly='readonly' />&nbsp;</td></tr>
    <tr><td>缴纳费用：</td><td><input name='fareadd' type='text' id='fareadd' value='' style='border:solid 1px #000000; color:#666666' />&nbsp;</td></tr>
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

