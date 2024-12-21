<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<style>
<!--
@import url("../css/admin.css");
-->
</style>		
<script language="javascript">
function doChange(sl)
{
  parent.list.location="listimage.php?tm="+sl.value;
}
function doClick()
{
  frm.action+="?tm="+thumuc.value;
  frm.submit();
}
function doNew()
{
  var name=prompt(msg1.value,"New Folder");
  if(name!=null&&name!="") window.location="makedir.php?tm="+thumuc.value+"&tentm="+name;
}
function doDel()
{
  if(thumuc.value!="")
  if(confirm(msg2.value+thumuc.value+"'?")) window.location="deldir.php?tm="+thumuc.value;
}
function doRe()
{
  var name=prompt(msg3.value+thumuc.value+msg4.value,"New Folder");  
  if(name!=null&&name!="") window.location="renamedir.php?tm="+thumuc.value+"&tentm="+name;
}
</script>
<body>
<br>
<input type="hidden" name="msg1" value="B&#7841;n h&#227;y nh&#7853;p t&#234;n th&#432; m&#7909;c c&#7847;n t&#7841;o:">
<input type="hidden" name="msg2" value="B&#7841;n ch&#7855;c ch&#7855;n x&#243;a th&#432; m&#7909;c '">
<input type="hidden" name="msg3" value="B&#7841;n ch&#7855;c ch&#7855;n &#273;&#7893;i t&#234;n th&#432; m&#7909;c '">
<input type="hidden" name="msg4" value="' th&#224;nh:">
<center>Ch&#7885;n th&#432; m&#7909;c &#7843;nh:&nbsp;<select name="thumuc" class="TextBox" onChange="doChange(this);">
<?php $dir=dir("images/");  
$file=$dir->read();
$file=$dir->read();
while($file=$dir->read()) if(is_dir("images/".$file)){?>
  <option value="<?php echo $file;?>" <?php if(isset($_GET["tm"])) if($_GET["tm"]==$file) echo "selected";?>><?php echo $file;?></option>	
<?php }?>
</select><br>
<input type="button" class="smallButton" value="S&#7917;a" onClick="if(thumuc.value!='') doRe();">
&nbsp;<input type="button" class="smallButton" value="X&#243;a" onClick="doDel();">
&nbsp;<input type="button" class="smallButton" value="T&#7841;o" onClick="doNew();">
<form method="post" action="exeupload.php" enctype="multipart/form-data" name="frm">
Ch&#7885;n &#7843;nh &#273;&#7875; t&#7843;i: <input name="userfile" type="file" class="TextBox">
&nbsp;<input type="button" class="smallButton" value="T&#7843;i l&#234;n" onClick="doClick();">
</form></center>
</body>
</html>
