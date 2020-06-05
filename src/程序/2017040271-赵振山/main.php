<?php
session_start();
?>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>学生宿舍交费管理系统</title>
<link rel="stylesheet" type="text/css" href="images/style.css" />
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/manager.js"></script>
<style type="text/css">
<!--
.STYLE2 {color: #00FFFF}
.STYLE5 {color: #72AC27;
	font-size: 10pt;
}
.STYLE10 {color: #006666}
-->
</style>
</head>
<table border="0" cellpadding="0" cellspacing="0" height="100%" width="100%" style="background:#C0D4F2;">
 <tbody>
  <tr>
    <td height="87" colspan="3">
    <IFRAME 
      style="Z-INDEX:2; VISIBILITY:inherit; WIDTH:100%; HEIGHT:100%" 
      name="topFrame" id="topFrame"  marginWidth="0" marginHeight="0"
      src="top.php" frameBorder="0" noResize scrolling="no">
	</IFRAME>
	</td>
  </tr>
		<tr>
			<td width="210" align="middle" valign="top" id="mainLeft" ><IFRAME 
      style="Z-INDEX:2; VISIBILITY:inherit; WIDTH:210; HEIGHT:100%" 
      name="leftFrame" id="leftFrame"  marginWidth="0" marginHeight="0"
      src="mygo.php" frameBorder="0" noResize scrolling="yes">
	</IFRAME></td>
	
			<td width="137" valign="middle" style="width:8px;"><div id="sysBar" style="cursor:pointer;"><img id="barImg" src="images/butClose.gif" alt="关闭/打开左栏" /></div></td>
			<td width="947" valign="top" style="width:100%"><iframe frameborder="0" id="mainFrame" name="mainFrame" scrolling="yes" src="shanshan.php" style="height:100%;visibility:inherit; width:100%;z-index:1;"></iframe></td>
		</tr>
			<tr>
		  <td height="28" colspan="3" bgcolor="#EBF5FC" style=" color:#00FFFF;background:url(images/down.gif) repeat-x;"><table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td><div align="center" class="STYLE5">
                <div align="left" class="STYLE10"><strong>&nbsp;&nbsp;&nbsp;&nbsp;学生宿舍交费管理系统 当前日期：<?php echo date("Y-m-d")?></strong></div>
              </div></td>
              <td><div align="center" class="STYLE5">
                <div align="right" class="STYLE10"><strong>当前用户：<?php echo $_SESSION['username'];?> [<?php echo $_SESSION['cx'];?>]&nbsp;&nbsp;&nbsp;&nbsp;</strong></div>
              </div></td></td>
            </tr>
          </table></td>
		</tr>
	</tbody>
</table>
</body>
</html>













