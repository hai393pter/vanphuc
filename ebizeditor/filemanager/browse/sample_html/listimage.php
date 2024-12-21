<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<title>Untitled Document</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<style>
<!--
@import url("../../../css/style.css");
@import url("../../../css/frontend.css");
-->
</style>		
</head>
<script language="javascript">
function doClick(ds)
{
    dsanh.value=ds.id;	
	parent.view.location="viewimage.php?path="+dsanh.value;
	frmXoa.pathanhxoa.value="images/"+dsanh.value;
}
</script>
<body bgcolor="#EFF8FF">
<table>
<?php
$dir=dir("images/");  
$file=$dir->read();
$file=$dir->read();
while($file=$dir->read())
{
?>
    <tr><td onmouseover="this.bgColor='#D7E3FF'" onmouseout="this.bgColor='#EFF8FF'" id="<?php echo $file;?>" onClick="doClick(this)">
	<label><?php echo $file;?></label>
	</td></tr>
<?php
}
?>
<form action="exeunupload.php" method="post" name="frmXoa">
<input type="hidden" name="pathanhxoa">
</form>
<input type="hidden" name="dsanh">
</table>
</body>
</html>
