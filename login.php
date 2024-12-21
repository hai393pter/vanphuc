<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>. . : : cong ty cổ phần thương mại dịnh vụ KC&T : : . .</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
<!--
@import url("treeadmin/css/admin.css");
-->
</style>
<body>
<table width="300" height="170"  border="0" align="center" cellpadding="0" cellspacing="0">
<tr>
<td align="center" valign="middle"><br>
<form name="form1" method="post" action="login.php?status=submit">
  <table width="98%" height="98%" border="0" cellpadding="0" cellspacing="0" >
    <tr class="kho1">
      <td height="40" colspan="2"><div align="center">&#272;&#258;NG NH&#7852;P QU&#7842;N TR&#7882;</div></td>
    </tr>
    <tr>
      <td width="40%" height="40" class="articleHead">&nbsp;&nbsp;&nbsp;T&#234;n s&#7917; d&#7909;ng:</td>
      <td height="40"><input name="username" type="text"  id="username"></td>
    </tr>
    <tr>
      <td height="40" class="articleHead">&nbsp;&nbsp;M&#7853;t kh&#7849;u:</td>
      <td height="40"><input name="password" type="password" id="password"></td>
    </tr>
    <tr>
      <td height="40" colspan="2"><div align="center">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <input name="Submit" type="submit" class="formButton" value="Ch&#7845;p nh&#7853;n">
      </div></td>
    </tr>
  </table>
</form>
</td>
</tr>
</table>
<input type="hidden" name="message" value="T&#224;i kho&#7843;n &#273;&#259;ng nh&#7853;p c&#7911;a b&#7841;n kh&#244;ng h&#7907;p l&#7879;!">
<?php 
  @session_start();
  if(isset($_GET["logout"]))
  {
    unset($_SESSION["quantriKC&T"]);
	unset($_SESSION["username"]);
	echo "<script language='javascript'>window.location='login.php';</script>";
  }
  if(isset($_SESSION["quantriKC&T"]))
  {
    session_unset();		
  }
  if(isset($_GET["status"]))
  {
    require_once "treeadmin/connect.php";
    require("treeadmin/quantritaikhoan/md5.php");
    $username=$_POST{"username"};
    $password=mina_md5($str_mahoa,$_POST{"password"});
    $sql="select * from admin where username='$username' and password='$password'";
    $result=mysql_query($sql);  
    $count=mysql_num_rows($result);
    mysql_close($link);  
    if($count==1) 
    {   
	  $row=mysql_fetch_array($result);
	  $_SESSION["quantri"]=$row["level"];
	  $_SESSION["username"]=$row["username"];?>
      <script language="javascript">window.location='treeadmin/';</script><?php	  
	}else{?>
      <script language="javascript">alert(message.value);window.location='login.php';</script><?php
	}
  }
?>
</body>
</html>