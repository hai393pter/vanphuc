<?php require_once("../modulesupport/process.php");?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<?php if(isset($_GET["path"])) {$path=$_GET["path"];$file=$_GET["file"];?>
<table align="center">
<tr><td align="center" valign="middle"><?php fitimagepopup("images/$path/$file",130);?></td></tr>
<tr><td align="center"><?php echo $file;?></td></tr>
</table>
<?php }?>
</body>
</html>
