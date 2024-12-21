<?
  require_once("../connect.php");
  if(isset($_GET["id"]))
  {
    $id=$_GET["id"];    
	$sql="delete from admin where id=".$id;
	mysql_query($sql);
	$sql="delete from admin where id=".$id;
	mysql_query($sql);
  }
  $sql="select * from admin";
  $result=mysql_query($sql);  
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Danh Sach Tai Khoan Quan Tri</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("../css/admin.css");
-->
</style>
</head>
<body>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Danh S&#225;ch T&#224;i Kho&#7843;n Qu&#7843;n Tr&#7883;</div>
<p></p>
<table width="98%" border="0" align="right" cellspacing="0">
  <tr><td><table width="100%" border="0" cellpadding="0" cellspacing="0" class="titleHead">
      <tr>
	    <td width="30" align="center" height="25">STT</td>
		<td width="180">&nbsp;&nbsp;T&#234;n s&#7917; d&#7909;ng</td>
		<td width="180">&nbsp;&nbsp;M&#7853;t kh&#7849;u</td>
		<td>&nbsp;&nbsp;Quy&#7873;n</td>
		<td width="30" align="center">X&#243;a</td>
      </tr>
	</table>
  </td></tr>
  <tr>
  	<td colspan="3"><table width="100%" border="0" cellpadding="0" cellspacing="0" class="outTable">
  	  <tr><td><table width="100%" border="0" cellpadding="0" cellspacing="1">
	  <?php $i=1;if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
	  <tr bgcolor="#FFFFFF" onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='#FFFFFF'">
		<td width="30" height="20" align="center"><?php echo $i++;?></td>
		<td width="180">&nbsp;&nbsp;<?php echo $row["username"];?></td>
		<td width="180">&nbsp;&nbsp;<?php if($row["level"]!=1) echo $row["password"];else echo "Kh&#244;ng hi&#7875;n th&#7883;!";?></td>
		<td>&nbsp;&nbsp;<?php switch($row["level"]){ case 1:echo "Cao nh&#7845;t";break; default: echo"Nh&#7853;p";break;}?></td>
		<td width="30" align="center">
		<?php if($row["level"]!=1){?>
		<a href="javascript:if(confirm('B&#7841;n th&#7921;c s&#7921; mu&#7889;n xoa t&#224;i kho&#7843;n [<?php echo $row["username"];?>] ?'))  window.location='?id=<?php echo $row["id"];?>';">X&#243;a</a>
		<?php }?>
		</td>
	  </tr>
	  <?php }?>
	  </table></td></tr></table>
	</td>
  </tr>
</table>
</body>
</html>
