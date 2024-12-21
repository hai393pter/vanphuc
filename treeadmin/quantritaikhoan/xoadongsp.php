<?
  require_once("../connect.php");
  if(isset($_GET["status"])) 
  {    
    $id=$_POST["dsmuc"];
	$sql="delete from danhmuc  where id=$id";
	mysql_query($sql);
  }  
  if(isset($_GET["idprt"])) $idprt=$_GET["idprt"];
  else $idprt="83";
  if(isset($_POST["loai"]))  $idprt=$_POST["loai"];
  $sql="select * from danhmuc where id_parent='$idprt' order by capnhat asc";
  $result=mysql_query($sql);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sua Muc San Pham</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<style>
<!--
@import url("../css/admin.css");
-->
</style>
</head>
<script language="javascript">
function doSubmit()
{
  frmEdit.submit();
}
</script>
<body>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="../icon/dstin.gif" align="absbottom">xóa mục sản phẩm</div>
<p></p>
<table width="98%" border="0" align="right" cellpadding="0" cellspacing="0" class="outTable">
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="xoamucsanpham.php?status=submit" method="post" name="frmEdit">
 <tr>
    <td height="40" width="30%">chọn mục</td>
    <td>&nbsp;&nbsp;&nbsp;<select name="loai" class="TextBox" onChange="window.location='?&idprt='+this.value;">
	<?php if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
	<option value=<?php echo $row["id"];?><?php if($idprt==$row["id"])echo "selected";?>><?php echo $row["ten"];?></option>
	<?php }?>
	</select>
	</td>
  </tr>
  <tr>
    <td height="40" width="30%">chọn sản phẩm cần xóa</td>
    <td height="40">&nbsp;&nbsp;
      <select name="dsmuc" class="TextBox" onChange="frmEdit.action='xoadongsp.php';frmEdit.submit();">
	  <option value="0"  <?php  echo "selected";?>>Ch&#432;a ch&#7885;n</option>
	<?php if(mysql_num_rows($result)!=0) while($row=mysql_fetch_array($result)){?>
	<option value="<?php echo $row["id"];?>" <?php if(isset($_POST["dsmuc"])) if($_POST["dsmuc"]==$row["id"]) echo "selected";?>><?php echo $row["ten"];?></option>
	<?php }?>
	</select>	</td>
  </tr>
  <?php
    $kt=0;
    if(isset($_POST["dsmuc"])) if($_POST["dsmuc"]!="0"){
	$kt=1;
	$sql="select * from mucsanpham where id_mucsanpham=".$_POST["dsmuc"];
	$rs=mysql_query($sql);
	$ro=mysql_fetch_array($rs);
  ?>
   
  <tr>
    <td height="40" colspan="2" align="center"><input type="button" class="formButton" value="Ch&#7845;p nh&#7853;n" onClick="doSubmit()">
    &nbsp;<input type="reset" class="formButton" value="Nh&#7853;p l&#7841;i"></td>
  </tr>
  <script language="javascript">frmEdit.tenmuc.focus();</script>
  <?php }?>
  </form>
</table>
</td>
</tr>
</table>
<input type="hidden" value="Ch&#432;a c&#243; danh m&#7909;c &#273;&#7875; s&#7917;a!" name="xau1">
<input type="hidden" value="Ch&#432;a nh&#7853;p sanpham m&#7899;i cho danh m&#7909;c c&#7847;n s&#7917;a!" name="xau2">
<input type="hidden" value="B&#7841;n mu&#7889;n &#273;&#7893;i t&#234;n danh m&#7909;c c&#7847;n s&#7917;a th&#224;nh '" name="dau">
<input type="hidden" value="' ch&#7913;?" name="cuoi">
</body>
</html>


