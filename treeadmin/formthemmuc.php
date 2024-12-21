<?php
  function InputData($TableName,$id_parent)
  {
    if (version_compare(phpversion(), "4.1.0") == -1)
      $postArray = &$HTTP_POST_VARS;
    else
      $postArray = &$_POST;
    $i=1;
	$dstruong="";
	$dsgiatri="";
    foreach($postArray as $sForm=>$value)
    {
      $postedValue = htmlspecialchars(stripslashes($value));		  	  
	  $gt=$_POST["$sForm"];
	  if($i==1){
	    $dstruong.="$sForm";
		$dsgiatri.="'$gt'";
	  }else{
	    $dstruong.=",$sForm";
		$dsgiatri.=",'$gt'";
	  }
	  $i++;
    }
	$sql.="insert into $TableName($dstruong,id_parent,capnhat) values($dsgiatri,$id_parent,Now())";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {
	mysql_query(InputData("danhmuc",$id_parent));
	//echo InputData("danhmuc",$id_parent);
	echo "<script language='javascript'>window.location='danhsach.php?id_parent=$id_parent&kieunhap=$kieunhap&nhap=ok';</script>";
  }
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Them San Pham Moi</title>
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
	var oWindow = openNewWindow("upload/browse.php", "BrowseWindow",460,400) ;
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
	frmAddnew.anhsanpham.value = sImageURL ;	
}
function doSubmit()
{
  frmAddnew.submit();
}
</script>
<?php
#include("../ebizeditor/fckeditor.php") ;
?>
<body>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Th&#234;m Th&#244;ng Tin V&#224;o: <?php echo $chuoihienthi;?></div>
<p>
<table width="98%" border="0" align="center" cellpadding="0" cellspacing="0" class="outTable">
<tr>
<td>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">
  <tr>
    <td height="30" width="30%">&nbsp;T&#234;n hi&#7875;n th&#7883;:</td>
    <td width="30%">&nbsp;<input name="ten" type="text" class="TextBox" id="ten" size="50">	</td>
  </tr>  
  <tr>
    <td height="30">&nbsp;T&#7915; kh&#243;a:</td>
	<?php
	  $rand_str="";
	  $feed="0123456789abcdefghijklmnopqrstuvwxyz";
      for ($i=0;$i<10;$i++)
      {
        $rand_str.=substr($feed,rand(0,strlen($feed)-1),1);
      }
	?>
    <td>&nbsp;<input name="tukhoa" type="text" class="TextBox" id="tukhoa" size="50" value="<?php echo $id_parent."_".$rand_str;?>"></td>
  </tr>  
  <tr>
    <td height="30" width="30%">&nbsp;Ki&#7875;u form nh&#7853;p:</td>
    <td width="30%">&nbsp;<select name="kieunhap" class="TextBox" id="kieunhap">
      <option value="1">Form nh&#7853;p m&#7909;c</option>
      <option value="2">Form nh&#7853;p tin</option>
      <option value="3">Form nh&#7853;p &#7843;nh</option>
      <option value="4">Form nh&#7853;p s&#7843;n ph&#7849;m</option>
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