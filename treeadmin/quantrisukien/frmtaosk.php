<?php
  if(isset($_GET["status"])){
    require_once("../../logincheck.php");
    require_once("../connect.php");
	$tensk=$_POST["tensk"];  
	$sql="insert into sukien(ten) values('$tensk')";
	mysql_query($sql);
	echo "<script language='javascript'>parent.refreshme();parent.close();</script>";
  }	
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Tao Su Kien</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#CCCCCC">
<form method="post" action="?status=ok" name="frm">
T&#234;n s&#7921; ki&#7879;n:&nbsp;<input type="text" name="tensk">
</form>
</body>
</html>
