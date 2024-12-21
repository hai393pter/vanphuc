<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Tao Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("../css/admin.css");
-->
</style>
</head>
<script language="javascript">
function doSubmit()
{
  if(document.frmAddnew.username.value==""||document.frmAddnew.password.value=="") alert(xau.value);
  else document.frmAddnew.submit();
}
</script>
<input type="hidden" name="message" value="T&#234;n s&#7917; d&#7909;ng n&#224;y &#273;&#227; t&#7891;n t&#7841;i!">
<input type="hidden" value="B&#7841;n ch&#432;a nh&#7853;p &#273;&#7911;!" name="xau">
<body bgcolor="#d2e8ff">
<?php
  require_once("../connect.php");
  require_once("md5.php");  
  if(isset($_GET["status"])) 
  {    
	$username=$_POST["username"];
	$password=mina_md5($str_mahoa,$_POST["password"]);
	$level=$_POST["quyen"];
	$sql="select * from admin where username='$username'";
    $resulttontai=mysql_query($sql);
	if(mysql_num_rows($resulttontai)==0)
	{
	  $sql="insert into admin(username,password,level) values('$username','$password',$level)";	  
	  mysql_query($sql);
	}else{
	  echo "<script language='javascript'>alert(message.value);</script>";
	}
	echo "<script language='javascript'>window.location='taotaikhoan.php';</script>";
  }
  $sql="select * from admin";
  $result=mysql_query($sql);
?>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;T&#7841;o T&#224;i Kho&#7843;n Qu&#7843;n Tr&#7883;</div>
<p>
<table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="outTable">
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
	  	  <tr>
			<td height="40" width="35%">&nbsp;<span class="articleHead">Danh s&#225;ch t&#234;n s&#7917; d&#7909;ng:</span></td>
			<td height="40">&nbsp;<select name="dsmuc" class="TextBox">
			<?php if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
			<option><?php echo $row["username"];?></option>
			<?php }?>
			</select>
			</td>
		  </tr>
		  <form action="../quantritaikhoan/taotaikhoan.php?status=submit" method="post" name="frmAddnew">
		  <tr>
			<td height="40" width="30%">&nbsp;<span class="articleHead">T&#234;n s&#7917; d&#7909;ng m&#7899;i:</span></td>
			<td height="40">&nbsp;<input name="username" type="text" class="TextBox" size="50"></td>
		  </tr>
		  <tr>
			<td height="40" width="30%">&nbsp;<span class="articleHead">M&#7853;t kh&#7849;u:</span></td>
			<td height="40">&nbsp;<input name="password" type="text" class="TextBox" size="50"></td>
		  </tr>
		  <tr>
			<td height="40" width="30%">&nbsp;<span class="articleHead">M&#7913;c qu&#7843;n tr&#7883;:</span></td>
			<td height="40">&nbsp;<select name="quyen" class="TextBox">
                <option value="1">Cao nh&#7845;t</option>
				<option value="2" selected>Nh&#7853;p</option>
              </select></td>
		  </tr>		  
		  <tr>
			<td height="40" colspan="2" align="center"><input type="button" class="bigButton" value="Ch&#7845;p nh&#7853;n" onClick="doSubmit()">
			&nbsp;<input type="reset" class="bigButton" value="Nh&#7853;p l&#7841;i"></td>
		  </tr>
		  </form>
	  </table>
	</td>
  </tr>
</table>
</body>
</html>
