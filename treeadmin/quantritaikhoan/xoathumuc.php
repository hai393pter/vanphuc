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
   if(isset($_GET["status"])) 
  {	
	$ten=$_POST["dsthumuc"];
	$sql= "delete from danhmuc where ten='$ten' ";
    $result=mysql_query($sql,$link);
  }
  $sql="select * from danhmuc where id_parent='83'";
  $result=mysql_query($sql);
?>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" width="32" height="32" align="absbottom">Xoá thư mục</div>
<p>
<table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="outTable">
  <tr>
    <td>
      <table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
	  	  <tr>
			
		  </tr>
		  <form action="../quantritaikhoan/xoathumuc.php?status=submit" method="post" name="frmAddnew">
		  <tr>
			<td height="40" width="35%">&nbsp;<span class="articleHead">chọn tên của thư mục cần xoá</span></td>
			<td height="40">&nbsp;<select name="dsthumuc" class="TextBox">
			<?php if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
			<option><?php echo $row["ten"];?></option>
			<?php }?>
			</select>
			</td>
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
