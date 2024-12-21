<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Doi Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
<!--
@import url(../css/admin.css);
-->
</style>
<script language="JavaScript">
function doClick()
{
  if(frm.newusername.value!=frm.reusername.value)
    alert(message3.value);
  else if(frm.newpassword.value!=frm.repassword.value)
    alert(message4.value);
  else
    frm.submit();
}
</script>
<body>
<input type="hidden" name="message1" value="T&#224;i kho&#7843;n c&#7911;a b&#7841;n kh&#244;ng d&#250;ng!">
<input type="hidden" name="message2" value="&#272;&#7893;i t&#224;i kho&#7843;n th&#224;nh c&#244;ng!">
<input type="hidden" name="message3" value="Nh&#7853;p l&#7841;i t&#234;n s&#7917; d&#7909;ng kh&#244;ng kh&#7899;p!">
<input type="hidden" name="message4" value="Nh&#7853;p l&#7841;i m&#7853;t kh&#7849;u kh&#244;ng kh&#7899;p!">
<?php
  if(isset($_GET["status"]))
  {
    require_once "../connect.php";
	require_once("md5.php");
    $username=$_POST{"username"};
    $password=mina_md5($str_mahoa,$_POST{"password"});
    $newusername=$_POST{"newusername"};
    $newpassword=mina_md5($str_mahoa,$_POST{"newpassword"});    
    $sql="select * from admin where username='$username' and password='$password'";
    $result=mysql_query($sql,$link);  
    $count=mysql_num_rows($result);
    if($count==1)
    {
      $sql="update admin set username='$newusername',password='$newpassword' where username='$username' and password='$password'";
	  $result=mysql_query($sql,$link);?>
      <script language="javascript">alert(message2.value);</script><?php
	}else{?>
      <script language="javascript">alert(message1.value);</script><?php	  
	}?>
    <script language="javascript">window.location='dstaikhoan.php';</script><?php       
  }	
?>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Thay &#272;&#7893;i T&#224;i Kho&#7843;n Qu&#7843;n Tr&#7883;</div>
<p>
<table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="outTable">
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
	  <form name="frm" method="post" action="doitaikhoan.php?status=submit">
		<tr class="checkLabel">
		  <td width="22%" height="40">&nbsp;&nbsp;T&#234;n s&#7917; d&#7909;ng c&#361;:</td>
		  <td height="40">&nbsp;&nbsp;<input name="username" type="text" class="TextBox"></td>
		  <td height="40">&nbsp;&nbsp;&gt;&gt;&nbsp;T&#234;n s&#7917; d&#7909;ng m&#7899;i:</td>
		  <td width="23%" height="40">&nbsp;&nbsp;<input name="newusername" type="text" class="TextBox"></td>
		</tr>
		<tr class="checkLabel"> 
		  <td height="40">&nbsp;</td>
		  <td height="40">&nbsp;</td>
		  <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nh&#7853;p l&#7841;i t&#234;n s&#7917; d&#7909;ng:</td>
		  <td height="40">&nbsp;&nbsp;<input name="reusername" type="text" class="TextBox"></td>
		</tr>
		<tr class="checkLabel"> 
		  <td height="40">&nbsp;&nbsp;M&#7853;t kh&#7849;u c&#361;:</td>
		  <td width="29%" height="40">&nbsp;&nbsp;<input name="password" type="password" class="TextBox"></td>
		  <td width="26%" height="40">&nbsp;&nbsp;&gt;&gt;&nbsp;M&#7853;t kh&#7849;u m&#7899;i:</td>
		  <td height="40">&nbsp;&nbsp;<input name="newpassword" type="password" class="TextBox"></td>
		</tr>
		<tr class="checkLabel"> 
		  <td height="40">&nbsp;</td>
		  <td height="40">&nbsp;</td>
		  <td height="40">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Nh&#7853;p l&#7841;i m&#7853;t kh&#7849;u:</td>
		  <td height="40">&nbsp;&nbsp;<input name="repassword" type="password" class="TextBox"></td>
		</tr>
		<tr> 
		  <td height="40" colspan="4"><div align="center">
		  <input name="Button" type="button" class="bigButton" onClick="doClick()" value="Ch&#7845;p nh&#7853;n">
		  </div></td>
		</tr>
	  </form>	  
	  </table>
	</td>
  </tr>
</table>  	
</body>
</html>