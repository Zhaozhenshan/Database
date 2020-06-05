<html>
<head>
<title>left</title><script src="images/prototype.js"></script>
<link rel="stylesheet" href="css.css">

<meta http-equiv="Content-Type" content="text/html; charset=gb2312">
<style type="text/css">
<!--
body,td,th {
	font-size: 12px;
}
body {
	background-color: #F7F7F7;
}
.STYLE2 {color: #FFFFFF}
.STYLE3 {color: #17A25F}
-->
</style></head>
<body leftmargin="0" topmargin="0" marginwidth="0" marginheight="0">
  <script type="text/javascript" src="js/dtree.js"></script>
  <link rel="stylesheet" type="text/css"  href="js/dtree.css" />
<div class="dtree" bgcolor="#cccccc">
	<!--<p>
		<a href="javascript: d.openAll();">open all</a> |
		<a href="javascript: d.closeAll();">close all</a>
	</p>-->
	<script type="text/javascript">
		<!--

		var d = new dTree('d'); 
		// Node(id, pid, name, url, title, target, icon, iconOpen, open) 
	     d.add(0,-1,'系统菜单','','images/skins/default/img/tree/imgfolder.gif');
		   d.add(1,0,'学生信息管理');
		   d.add(2,0,'公寓楼房基本信息管理','','','mainFrame');
		   d.add(3,0,'公寓寝室基本信息管理','','','mainFrame');
		   d.add(4,0,'交费功能','','','mainFrame');
		   d.add(5,0,'系统管理功能','','','mainFrame');
		   
		   d.add(11,1,'学生信息添加','xueshengxinxiadd.php','','mainFrame');
		   d.add(12,1,'学生信息查询','xueshengxinxilist.php','','mainFrame');

           d.add(11,2,'公寓楼房信息添加','departmentadd.php','','mainFrame');
           d.add(12,2,'公寓楼房信息查询','departmentlist.php','','mainFrame');

           d.add(11,3,'公寓寝室信息添加','roomadd.php','','mainFrame');
           d.add(12,3,'公寓寝室信息查询','roomlist.php','','mainFrame');

           d.add(11,4,'查询','jiaofeilist.php','','mainFrame');

           d.add(11,5,'用户管理','userManage.php','','mainFrame');
           d.add(12,5,'更改密码','mod.php','','mainFrame');

           
		   
		   
		document.write(d);
	 

		//-->
	</script>

</div>
</body>
</html>