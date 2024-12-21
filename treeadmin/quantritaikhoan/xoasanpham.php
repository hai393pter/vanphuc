<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>tao thu muc</title>
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
   frmAddnew.submit();
}
</script>
<input type="hidden" name="message" value="T&#234;n s&#7917; d&#7909;ng n&#224;y &#273;&#227; t&#7891;n t&#7841;i!">
<input type="hidden" value="B&#7841;n ch&#432;a nh&#7853;p &#273;&#7911;!" name="xau">
<body bgcolor="#d2e8ff">
<?php
  require_once("../connect.php");
  require_once("../process.php");  
   if(isset($_GET["status"])) 
  {	
	$ten=$_POST["dsthumuc"];
	$tensp=$_POST["tensp"];
	$id=getid($tensp,$link,"id");
	$idd=getid($ten,$link,"id");
	$sql="select id from danhmuc where id_parent='$idd' and id='$id'";
    $result=mysql_query($sql,$link);
    $row=mysql_fetch_array($result);
    $idten=$row["id"];
	$sql= "delete from danhmuc where id=$idten ";
    $result=mysql_query($sql,$link);
  }
  $sql="select * from danhmuc where id_parent='83'";
  $result=mysql_query($sql);
?>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" width="32" height="32" align="absbottom">xoa muc san pham</div>
<p>
<table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="outTable">
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
	  	  <tr>
		 
		  <form action="../quantritaikhoan/xoasanpham.php?status=submit" method="post" name="frmAddnew">
		 	</tr>
	
		  <tr>
			<td height="40" width="35%">&nbsp;<span class="articleHead">chon thu muc co san  pham can xoa</span></td>
			<td height="40">&nbsp;<select name="dsthumuc" class="TextBox">
			<?php if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
			<option><?php echo $row["ten"];?></option>
			<?php }?>
			</select>
			</td>
			</tr>
			  <tr>
			<td height="40" width="30%">&nbsp;<span class="articleHead">nhap vao ten cua san pham can xoa</span></td>
			<td height="40">&nbsp;<input name="tensp" type="text" class="TextBox" size="50"></td>
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
