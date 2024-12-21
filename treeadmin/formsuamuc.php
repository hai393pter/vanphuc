<?php  
  $id=$_GET["id"];
  function UpdateData($TableName,$dieukien)
  {
    if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
	$sql="update $TableName set ";
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  
	  $gt=$_POST["$sForm"];
	  if($i==1)  $sql.="$sForm='$gt'";
	  else $sql.=",$sForm='$gt'";
	  $i++;
    }
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {   
    mysql_query(UpdateData("danhmuc","where id=$id"));
	//echo UpdateData("danhmuc","where id=$id");
	echo "<script language='javascript'>window.location='?id_parent=$id_parent&kieunhap=$kieunhap&id=$id';</script>";
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Sua Tin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("css/admin.css");
-->
</style>
</head>
<?php
include("ebizeditor/fckeditor.php") ;
?>
<body>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;S&#7917;a Tin B&#224;i</div>
<p>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="outTable">
<tr><td valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id=<?php echo $id;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from danhmuc where id=$id";
	$resulttin=mysql_query($sql);
	$row=mysql_fetch_array($resulttin);
  ?>
  <tr>
    <td height="30">&nbsp;T&#234;n hi&#7875;n th&#7883;:</td>
    <td height="30">&nbsp;<input name="ten" type="text" class="TextBox" id="ten" value="<?php echo $row["ten"];?>" size="50"></td>
  </tr>  
  <tr>
    <td height="30">&nbsp;T&#249; kh&#243;a:</td>
    <td height="30">&nbsp;<input name="tukhoa" type="text" class="TextBox" id="tukhoa" value="<?php echo $row["tukhoa"];?>" size="50"></td>
  </tr>  
  <tr>
  <td height="30" width="30%">&nbsp;Ki&#7875;u form nh&#7853;p:</td>
    <td width="30%">&nbsp;<select name="kieunhap" class="TextBox" id="kieunhap">
      <option value="1" <?php if($row["kieunhap"]=="1") echo "selected";?>>Form nh&#7853;p m&#7909;c</option>
      <option value="2" <?php if($row["kieunhap"]=="2") echo "selected";?>>Form nh&#7853;p tin</option>
      <option value="3" <?php if($row["kieunhap"]=="3") echo "selected";?>>Form nh&#7853;p &#7843;nh</option>
	  <option value="4" <?php if($row["kieunhap"]=="4") echo "selected";?>>Form nh&#7853;p s&#7843;n ph&#7849;m</option>
    </select></td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center">
	  <input type="button" value="Ch&#7845;p nh&#7853;n" onClick="frmEdit.submit();">
      &nbsp;<input type="reset" value="Nh&#7853;p l&#7841;i">
	</td>
  </tr>
  </form>
</table></td>
</tr>
</table>
</body>
</html>
