<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
<!--
@import url("../css/admin.css");
-->
</style>		
</head>
<body>
<table>
<?php
$dirtm=dir("images/");  
$file=$dirtm->read();
$file=$dirtm->read();
if($folder=$dirtm->read()){
if(isset($_GET["tm"])) $folder=$_GET["tm"];
$dir=dir("images/$folder/");  
echo "<script language='javascript'>
function doClick(ds)
{
  dsanh.value=ds.id;	
  parent.view.location='viewimage.php?path=$folder&file='+dsanh.value;
  frmXoa.pathanhxoa.value='images/$folder/'+dsanh.value;
}
</script>";
$file=$dir->read();
$file=$dir->read();
while($file=$dir->read()){?>
    <tr><td onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='#FFFFFF'" id="<?php echo $file;?>" onClick="doClick(this)">
	<label><?php echo $file;?></label>
	</td></tr>
<?php }}?>
</table>
<form action="exeunupload.php?tm=$folder" method="post" name="frmXoa">
<input type="hidden" name="pathanhxoa">
</form>
<input type="hidden" name="dsanh">
</body>
</html>
