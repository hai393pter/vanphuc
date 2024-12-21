<?php  
  $id_sp=$_GET["id_sp"];
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
	if($_POST["spmoi"]=="") $sql.=",spmoi='off'";
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {       
    mysql_query(UpdateData("sanpham","where id_sp=$id_sp"));
	//echo UpdateData("sanpham","where id_sp=$id_sp");
	echo "<script language='javascript'>//window.location='?id_parent=$id_parent&kieunhap=$kieunhap&id_sp=$id_sp';</script>";
  }
?>
<html>
<head>
<title>Them San Pham Moi</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<script language="javascript">
function BrowseListImage()
{
	var oWindow = openNewWindow("news_images/browse.php", "BrowseWindow",460,400) ;
	oWindow.setImage = setImage ;
}
function BrowseListImage1()
{
	var oWindow = openNewWindow("news_images/browse1.php", "BrowseWindow",460,400) ;
	oWindow.setImage1 = setImage1 ;
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
	frmAddnew.anhsp.value = sImageURL ;	
}
function setImage1(sImageURL)
{	
	frmAddnew.tailieu.value = sImageURL ;	
}

</script>
<?php
include("ebizeditor/fckeditor.php") ;
?>
<style type="text/css">
<!--
@import url("css/admin.css");
-->
</style>
<body>
<br>
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;Th&#234;m Th&#244;ng Tin V&#224;o: <?php echo $chuoihienthi;?></div>
<p>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="outTable">
<tr><td>
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">	
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_sp=<?php echo $id_sp;?>" method="post" name="frmAddnew">    
  <?php 
		$sql="select * from sanpham where id_sp=$id_sp";
		$resultsanpham=mysql_query($sql);
		$rowsanpham=mysql_fetch_array($resultsanpham);
	 ?>
  <tr>
    <td width="30%" height="30">&nbsp;T&#234;n s&#7843;n ph&#7849;m:</td>
    <td height="30">&nbsp;<input name="tensp" type="text" class="TextBox" id="tensp" size="50" value="<?php echo $rowsanpham["tensp"];?>"></td>
  </tr>
  <tr>
    <td width="30%" height="30">&nbsp;&#7842;nh:</td>
    <td height="30">&nbsp;<input name="anhsp" type="text" class="TextBox" size="40" value="<?php echo $rowsanpham["anhsp"];?>">      
      <input name="button" type="button" class="smallButton" onClick="BrowseListImage();" value="Ch&#7885;n &#7843;nh"></td>
  </tr>
  <tr>
    <td width="30%" height="30">tài liệu:</td>
    <td height="30">&nbsp;<input name="tailieu" type="text" class="TextBox" size="40" value="<?php echo $rowsanpham["tailieu"];?>">      
      <input name="button" type="button" class="smallButton" onClick="BrowseListImage1();" value="Ch&#7885;n &#7843;nh"></td>
  </tr>
  <tr>
    <td height="30">hỗ trợ của nhà sản xuất</td>
    <td height="30">&nbsp;<input name="lienket" type="text" class="TextBox" id="lienket" size="50" value="<?php echo $rowsanpham["lienket"];?>">&nbsp;&nbsp;đường dẫn</td>
  </tr>
  <tr>
    <td height="30">&nbsp;B&#7843;o h&#224;nh:</td>
    <td height="30">&nbsp;<input name="baohanh" type="text" class="TextBox" id="baohanh" size="10" value="<?php echo $rowsanpham["baohanh"];?>"> th&#225;ng</td>
  </tr>
  <tr>
    <td height="30">&nbsp;Gi&#225;:</td>
    <td height="30">&nbsp;<input name="gia" type="text" class="TextBox" id="gia" size="10" value="<?php echo $rowsanpham["gia"];?>"> USD</td>
  </tr>
  <tr>
    <td height="30">&nbsp;Kho:</td>
    <td height="30">
	  &nbsp;C&#242;n h&#224;ng <input name="kho" type="radio" value="1" <?php if($rowsanpham["kho"]==1) echo "checked";?>>
      H&#7871;t h&#224;ng <input name="kho" type="radio" value="0" <?php if($rowsanpham["kho"]==0) echo "checked";?>></td>
  </tr>
  <tr>
    <td height="30">S&#7843;n ph&#7849;m m&#7899;i:</td>
    <td height="30"><input type="checkbox" name="spmoi" <?php if($rowsanpham["spmoi"]=="on") echo "checked";?>></td>
  </tr>
  <tr>
    <td height="30">&nbsp;Gi&#7899;i thi&#7879;u:</td>
    <td height="30"><?php
	  $oFCKeditor = new FCKeditor ;
	  $oFCKeditor->ToolbarSet = 'Upload' ;
	  $oFCKeditor->BasePath = 'ebizeditor/';
	  $oFCKeditor->Value=$rowsanpham["gioithieu"];
	  $oFCKeditor->CreateFCKeditor( 'gioithieu', '100%', 250 ) ;
	?></td>
  </tr>
  <tr style="display:none">
    <td height="30" colspan="2">&nbsp;N&#7897;i dung:</td>
    </tr>
  <tr style="display:none">
    <td height="30" colspan="2"><?php
	  $oFCKeditor = new FCKeditor ;
	  $oFCKeditor->ToolbarSet ='Normal';
	  $oFCKeditor->BasePath = 'ebizeditor/';
	  $oFCKeditor->Value=$rowsanpham["noidung"];
	  $oFCKeditor->CreateFCKeditor( 'noidung', '100%', 250 ) ;
	?></td>
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