<?php  
  $id_tin=$_GET["id_tin"];
  function dachon($id_tin,$table)
  {
    $sql="select vitri from $table where id_tin=$id_tin";	
	$rs=mysql_query($sql);
	if(mysql_num_rows($rs)==0) return 0;
	else
	{
	  $row=mysql_fetch_array($rs);
	  return intval($row["vitri"]);
	}
  }
  function UpdateData($TableName,$dieukien,$id_tin)
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
	  $gt=str_replace("'","&rsquo;",$_POST["$sForm"]);
	  if($sForm=="noibat")
	  {
	    $sql_noibat="update tin_noibat set id_tin=$id_tin where vitri=$gt";
		mysql_query($sql_noibat);
	  }else if($sForm=="moi")
	  {
	    $sql_moi="update tin_moi set id_tin=$id_tin where vitri=$gt";
		mysql_query($sql_moi);
	  }else if($sForm=="dacsac")
	  {
	    $sql_dacsac="update tin_dacsac set id_tin=$id_tin where vitri=$gt";
		mysql_query($sql_dacsac);
	  }else{
	    if($i==1)  $sql.="$sForm='$gt'";
	    else $sql.=",$sForm='$gt'";
	  }
	  $i++;
    }
	$sql.=" $dieukien";
	return $sql;
  }
  if(isset($_GET["status"])) 
  {   
    mysql_query(UpdateData("tinbai","where id_tin=$id_tin",$id_tin));
	//echo UpdateData("tinbai","where id_tin=$id_tin");
	echo "<script language='javascript'>//window.location='?id_parent=$id_parent&kieunhap=$kieunhap&id_tin=$id_tin';</script>";
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
	frmEdit.anhtrichdan.value = sImageURL ;	
}
function chonngay()
{
  frmEdit.gio_hienthi.value=Calendar1.Year+"/"+Calendar1.Month+"/"+Calendar1.Day;
  frmEdit.gio_hienthi.value+=" "+gio.value+":"+phut.value+":"+giay.value;
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
<div class="tintop_title">&nbsp;&nbsp;&nbsp;<img src="icon/dstin.gif" width="32" height="32" align="absbottom">&nbsp;S&#7917;a Tin B&#224;i</div>
<p>
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0" class="outTable">
<tr><td valign="top">
<table width="100%" border="0" cellpadding="0" cellspacing="1" class="inTable">
  <form action="?status=submit&id_parent=<?php echo $id_parent;?>&kieunhap=<?php echo $kieunhap;?>&id_tin=<?php echo $id_tin;?>" method="post" name="frmEdit">
  <?php 
	$sql="select * from tinbai where id_tin=$id_tin";
	$resulttin=mysql_query($sql);
	$rowtin=mysql_fetch_array($resulttin);
  ?>
  <tr>
    <td height="30">&nbsp;Ti&#234;u &#273;&#7873; tin:</td>
    <td height="30">&nbsp;<input name="tieude" type="text" class="TextBox" size="50" value="<?php echo $rowtin["tieude"];?>">
	<input type="hidden" name="gio_hienthi" value="<?php echo $rowtin["gio_hienthi"];?>">
	<?php
	  $xaugio=substr($rowtin["gio_hienthi"],11,8);
	  $xaugio.=" ng&#224;y: ";
	  $xaugio.=substr($rowtin["gio_hienthi"],8,2);	  
	  $xaugio.="/".substr($rowtin["gio_hienthi"],5,2);
	  $xaugio.="/".substr($rowtin["gio_hienthi"],0,4);
	  echo "<script language='javascript'>
	  o_ngaygio.innerHTML='$xaugio';
	  </script>";
	?>	
	</td>
  </tr>
  <tr>
    <td height="30">&nbsp;&#7842;nh tr&#237;ch d&#7851;n:</td>
    <td height="30">&nbsp;<input name="anhtrichdan" type="text" class="TextBox" id="anhtrichdan" size="40" value="<?php echo $rowtin["anhtrichdan"];?>">
    <input type="button" class="smallButton" value="Ch&#7885;n &#7843;nh" onClick="BrowseListImage();"></td>
  </tr> 
   <tr>
    <td height="30" colspan="2">&nbsp;N&#7897;i dung tin:</td>
  </tr> 
  <tr>
    <td height="40" colspan="2"><?php
	  $oFCKeditor = new FCKeditor ;
	  $oFCKeditor->ToolbarSet ='Normal';
	  //$oFCKeditor->ToolbarSet = 'Accessibility' ;
	  //$oFCKeditor->ToolbarSet = 'Basic' ;
	  $oFCKeditor->BasePath = 'ebizeditor/' ;		// '/FCKeditor/' is the default value so this line could be deleted.
	  $oFCKeditor->Value=str_replace("vff_org_vn/","",$rowtin["noidung"]);
	  $oFCKeditor->CreateFCKeditor( 'noidung', '100%', 250 ) ;
	?></td>
  </tr>    
  <tr style="display:none">
    <td height="30">&nbsp;Ki&#7875;m duy&#7879;t:</td>
    <td height="30">&nbsp;&nbsp;
	Kh&#244;ng hi&#7875;n th&#7883;:<input type="radio" name="kiemduyet" value="0" <?php if($rowtin["kiemduyet"]==0) echo "checked";?>>
	Hi&#7875;n th&#7883;: <input type="radio" name="kiemduyet" value="1" <?php if($rowtin["kiemduyet"]==1) echo "checked";?>>&nbsp;&nbsp;	
  </tr>
  <tr style="display:none">
    <td height="30">&nbsp;Ch&#7885;n ra tin n&#7893;i b&#7853;t &#7903; v&#7883; tr&#237;:</td>
    <td height="30">&nbsp;&nbsp;
	Kh&#244;ng ch&#7885;n: <input type="radio" name="noibat" value="0" <?php if(dachon("$id_tin","tin_noibat")==0) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 1: <input type="radio" name="noibat" value="1" <?php if(dachon("$id_tin","tin_noibat")==1) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 2: <input type="radio" name="noibat" value="2" <?php if(dachon("$id_tin","tin_noibat")==2) echo "checked";?>>
    </td>
  </tr>
  <tr style="display:none">
    <td height="30">&nbsp;Ch&#7885;n ra tin m&#7899;i &#7903; v&#7883; tr&#237;:</td>
    <td height="30">
	&nbsp;&nbsp;
	Kh&#244;ng ch&#7885;n: <input type="radio" name="moi" value="0" <?php if(dachon("$id_tin","tin_moi")==0) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 1: <input type="radio" name="moi" value="1" <?php if(dachon("$id_tin","tin_moi")==1) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 2: <input type="radio" name="moi" value="2" <?php if(dachon("$id_tin","tin_moi")==2) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 3: <input type="radio" name="moi" value="3" <?php if(dachon("$id_tin","tin_moi")==3) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 4: <input type="radio" name="moi" value="4" <?php if(dachon("$id_tin","tin_moi")==4) echo "checked";?>>
	</td>
  </tr>
  <tr style="display:none">
    <td height="30">&nbsp;Ch&#7885;n ra tin d&#7863;c s&#7855;c &#7903; v&#7883; tr&#237;:</td>
    <td height="30">
	&nbsp;&nbsp;
	Kh&#244;ng ch&#7885;n: <input type="radio" name="dacsac" value="0" <?php if(dachon("$id_tin","tin_dacsac")==0) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 1: <input type="radio" name="dacsac" value="1" <?php if(dachon("$id_tin","tin_dacsac")==1) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 2: <input type="radio" name="dacsac" value="2" <?php if(dachon("$id_tin","tin_dacsac")==2) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 3: <input type="radio" name="dacsac" value="3" <?php if(dachon("$id_tin","tin_dacsac")==3) echo "checked";?>>
	&nbsp;&nbsp;V&#7883; tr&#237; 4: <input type="radio" name="dacsac" value="4" <?php if(dachon("$id_tin","tin_dacsac")==4) echo "checked";?>>
	</td>
  </tr>    
  <tr>
    <td height="40" colspan="2" align="center">
	  <input type="button" class="bigButton" onClick="frmEdit.submit();" value="Ch&#7845;p nh&#7853;n">
      &nbsp;<input type="reset" class="bigButton" value="Nh&#7853;p l&#7841;i">
	</td>
  </tr>
  </form>
</table></td>
</tr>
</table>
</body>
</html>
