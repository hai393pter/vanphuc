<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>View Image</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
<!--
body { font-family:Arial, Helvetica, sans-serif; font-size:10px; color:#FF9900; margin:0}
a, a:link, a:active, a:visited {color:#FFFFFF; text-decoration:none}
a:hover {text-decoration:underline}
-->
</style>
</head>
<?php require("../modulesupport/process.php");?>
<body>
<table width="100%" height="400"  border="0" cellpadding="0" cellspacing="0" background="images/bg.gif">
  <tr>
    <td valign="top"><table width="99%"  border="0" align="center" cellpadding="0" cellspacing="0" style="border-bottom:1px #FF9900 solid; border-top: 1px #FF9900 solid; border-left: 1px #FF9900 solid; border-right: 1px #FF9900 solid;">
      <tr>
        <td align="center" valign="top" height="20"></td>
      </tr>
      <tr>
        <td height="200" align="center" valign="middle"><?php $path=$_GET["path"];fitimagepopup($path,300);?></td>
      </tr>
      <tr>
        <td align="center" valign="top">&nbsp;</td>
      </tr>
    </table>    </td>
  </tr>
  <tr>
    <td align="center" valign="bottom"><p><img src="images/char_popup.gif" width="311" height="28">
    <br>&copy; 2005 by AnhPhat Co, Ltd.</td>
  </tr>
  <tr>
    <td height="20" align="center" valign="top">[ <a href="javascript:window.close()">Close</a> ]</td>
  </tr>
</table>
</body>
</html>
