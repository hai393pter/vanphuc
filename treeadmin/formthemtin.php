<?php require("../logincheck.php");?>
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
	  $gt=str_replace("'","&rsquo;",$_POST["$sForm"]);
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
	mysql_query(InputData("tinbai",$id_parent));
	//echo InputData("tinbai",$id_parent);
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
	var oWindow = openNewWindow("news_images/browse.php", "BrowseWindow",460,400) ;
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
	frmAddnew.anhtrichdan.value = sImageURL ;	
}
function chonngay()
{
  frmAddnew.gio_hienthi.value=Calendar1.Year+"/"+Calendar1.Month+"/"+Calendar1.Day;
  frmAddnew.gio_hienthi.value+=" "+gio.value+":"+phut.value+":"+giay.value;
  o_ngaygio.innerHTML="&nbsp;"+gio.value+":"+phut.value+":"+giay.value;
  o_ngaygio.innerHTML+="  ng&#224;y: "+Calendar1.Day+"/"+Calendar1.Month+"/"+Calendar1.Year+"&nbsp;";
  showclick('lich');
}
</script>
<?php
include("ebizeditor/fckeditor.php") ;
?>
<body>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Th&#234;m Th&#244;ng Tin V&#224;o: <?php echo $chuoihienthi;?></div>
<p>
<table width="90%" align="center" border="0" cellpadding="0" cellspacing="0" class="outTable">
<tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>" method="post" name="frmAddnew">    
  <tr>
    <td width="30%" height="30">&nbsp;Ti&#234;u &#273;&#7873; tin:</td>
    <td height="30">&nbsp;<input name="tieude" type="text" class="TextBox" size="50">
	<input type="hidden" name="gio_hienthi" value="<?php echo date("m/d/y h:i:s");?>"></td>
  </tr>
  <tr>
    <td width="30%" height="30">&nbsp;&#7842;nh:</td>
    <td height="30">&nbsp;<input name="anhtrichdan" type="text" class="TextBox" id="anhtrichdan" size="40">
      <input name="button" type="button" class="smallButton" onClick="BrowseListImage();" value="Ch&#7885;n &#7843;nh"></td>
  </tr> 
  <tr>
    <td height="20">&nbsp;Tr&#237;ch d&#7851;n tin:</td>
    <td height="20"><?php
	  $oFCKeditor = new FCKeditor ;
	  //$oFCKeditor->ToolbarSet ='Normal';
	  $oFCKeditor->ToolbarSet = 'Upload' ;
	  //$oFCKeditor->ToolbarSet = 'Accessibility' ;
	  //$oFCKeditor->ToolbarSet = 'Basic' ;
	  $oFCKeditor->BasePath = 'ebizeditor/' ;
	  $oFCKeditor->CreateFCKeditor( 'trichdan', '100%', 120 ) ;
	?></td>
  </tr>  
  <tr>
    <td height="20" colspan="2">&nbsp;N&#7897;i dung tin:</td>
  </tr>
  <tr>
    <td height="40" colspan="2"><?php
	  $oFCKeditor = new FCKeditor ;
	  $oFCKeditor->ToolbarSet ='Normal';
	  //$oFCKeditor->ToolbarSet = 'Upload' ;
	  //$oFCKeditor->ToolbarSet = 'Accessibility' ;
	  //$oFCKeditor->ToolbarSet = 'Basic' ;
	  $oFCKeditor->BasePath = 'ebizeditor/' ;
	  $oFCKeditor->CreateFCKeditor( 'noidung', '100%', 250 ) ;
	?></td>
  </tr>
  <tr style="display:none">
    <td height="30">&nbsp;Ki&#7875;m duy&#7879;t:</td>
    <td height="30">&nbsp;&nbsp;
	Kh&#244;ng hi&#7875;n th&#7883;: <input type="radio" name="kiemduyet" value="0">
	Hi&#7875;n th&#7883;: <input type="radio" name="kiemduyet" value="1" checked>&nbsp;&nbsp;	
	</td>
  </tr>
  <tr>
    <td height="40" colspan="2" align="center"><input type="button" class="bigButton" value="Ch&#7845;p nh&#7853;n" onClick="frmAddnew.submit();">
    &nbsp;<input type="reset" class="bigButton" value="Nh&#7853;p l&#7841;i"></td>
  </tr>  
  </form>
</table>
</td></tr>
</table>
</body>
</html>