<?php require_once("process.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body bgcolor="#EFF8FF">
<?php if(isset($_GET["path"])) {$path=$_GET["path"];?>
<table align="center">
<tr><td align="center" valign="middle"><?php fitimage("images/$path",130,1);?></td></tr>
<tr><td align="center"><?php echo $path;?></td></tr>
</table>
<?php }?>
</body>
</html>
