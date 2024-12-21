<html>
<head>
<title>Gioi Thieu</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<style>
<!--
@import url("css/style.css");
@import url("css/frontend.css");
-->
</style>
<body>
<table width="98%" height="100% border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td width="5" height="100%"></td><td>
<table width="98%" height="100% border="0" align="center" cellpadding="0" cellspacing="0">
<tr><td valign="top"><img src="images/logo.jpg" align="center" alt="" border="0"></td></tr>
<tr>
<?php 
      $sql="select * from tinbai where id_parent='201'";
      $result=mysql_query($sql);
	  $row=mysql_fetch_array($result);

?>
<td valign="top"><br><br>
<div class="texto">
<p class="xbig"><center class="kho1"><?php echo $row["tieude"];?>
</center></p>
</div>
	<?php
	  echo $row["noidung"];
    ?>
<p align="center">  <br>
E-mail: <a href="mailto:vp@vanphuc.com">vp@vanphuc.com</a>. Website: <a href="http://www.vanphuc.com" target="_blank">http://www.vanphuc.com</a>		  </td>
</tr>
</table>
</td><td width="5" height="100%"></td></tr></table>
</body>
</html>