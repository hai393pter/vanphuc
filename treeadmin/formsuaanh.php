<?php  
  $id_anh=$_GET["id_anh"];
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
    mysql_query(UpdateData("suutap","where id_anh=$id_anh"));
	//echo UpdateData("suutap","where id_anh=$id_anh");
	echo "<script language='javascript'>window.location='?id_parent=$id_parent&kieunhap=$kieunhap&id_anh=$id_anh';</script>";
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
<script language="javascript">
function BrowseListImage()
{
	var oWindow = openNewWindow("uploadimages/browse.php", "BrowseWindow",460,400) ;
	oWindow.setImage = setImage ;
}

function openNewWindow(sURL, sName, iWidth, iHeight, bResizable, bScrollbars)
{
	var iTop  = (screen.height - iHeight) / 2 ;
	var iLeft = (screen.width  - iWidth) / 2 ;
	
	var sOptions = "toolbar=no" ;
	sOptions += ",width=" + iWidth ; 
	sOptions += ",height=" + iHeight ;
	sOptions += ",resizable="  + (bResizable  ? "yes" : "no") ;
	sOptions += ",scrollbars=" + (bScrollbars ? "yes" : "no") ;
	sOptions += ",left=" + iLeft ;
	sOptions += ",top=" + iTop ;
	
	var oWindow = window.open(sURL, sName, sOptions)
	oWindow.focus();
	
	return oWindow ;
}

function setImage(sImageURL)
{	
	frmEdit.anh.value = sImageURL ;	
}
</script>
<?php
include("ebizeditor/fckeditor.php") ;
?>
<body>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;S&#7917;a &#7842;nh</div>
<p>
<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" class="outTable">
<tr><td valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_anh=<?php echo $id_anh;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from suutap where id_anh=$id_anh";
	$resulttin=mysql_query($sql);
	$rowtin=mysql_fetch_array($resulttin);
  ?>
  <tr>
    <td height="30">&nbsp;Ti&#234;u &#273;&#7873; tin:</td>
    <td height="30">&nbsp;<input name="anh" type="text" class="TextBox" size="40" value="<?php echo $rowtin["anh"];?>"><input name="button" type="button" class="smallButton" value="Ch&#7885;n &#7843;nh" onClick="BrowseListImage();"></td>
  </tr>  
  <tr>
    <td height="30">&nbsp;Tr&#237;ch d&#7851;n tin:</td>
    <td height="30">&nbsp;<input name="trichdan" type="text" class="TextBox" size="40" value="<?php echo $rowtin["trichdan"];?>"></td>
  </tr>    
  <tr>
    <td height="30">&nbsp;Ki&#7875;m duy&#7879;t:</td>
    <td height="30">&nbsp;&nbsp;
	Kh&#244;ng hi&#7875;n th&#7883;: <input type="radio" name="kiemduyet" value="1" <?php if($rowtin["kiemduyet"]==0) echo "checked";?>>
	Hi&#7875;n th&#7883;: <input type="radio" name="kiemduyet" value="1" <?php if($rowtin["kiemduyet"]==1) echo "checked";?>>&nbsp;&nbsp;	
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