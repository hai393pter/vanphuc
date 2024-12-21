<?php
  @session_start(); 
  if(!isset($_SESSION['userhoangle']))
  {
?>
<form action="login.php" name="frm"></form>
<script language="JavaScript">frm.submit();</script>
<?php 
  }
?>
<?php
  $id_tour=$HTTP_GET_VARS["id"];
  require "connect.php";
  $sql="select * from hoangle_thongtin ORDER BY thoigian DESC";
  $result=mysql_query($sql,$link);
  $count=mysql_num_rows($result);  
?>
<html>
<head>
<title>DU HOC HOANG LE</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.articleText { text-align: justify; }
</style>
</head>
<body>
  <center>
  <a href='admin.php'>Xem th&#244;ng tin</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='popup.php'>Qu&#7843;n tr&#7883; popup</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='changeAdmin.php'>Thay &#273;&#7893;i t&#234;n s&#7917; d&#7909;ng v&#224; m&#7853;t kh&#7849;u </a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='login.php?cn=1'>H&#7911;y b&#7887; qu&#7843;n tr&#7883;</a> 
</center><br>
<table border='1' width='750' align='center'>
  <tr align='center'> 
    <td colspan="7"><div align="left"><a href="insert.php">Th&#234;m m&#7899;i</a></div></td>
  </tr>
  <tr align='center'> 
    <td width='5%'><strong>STT</strong></td>
	<td width='21%'><strong>Ch&#7911; &#273;&#7873;</strong></td>
    <td width="54%"><strong>N&#7897;i dung</strong></td>
    <td colspan="3"><strong>Ch&#7913;c n&#259;ng</strong></td>
  </tr>
<?php
  if($count!=0)
  {
    $dem=0;
	$vt=$HTTP_GET_VARS{"vt"};
	$vtnho=$vt;
	$somautin=2;
    for($i=1;$i<=$vt;$i++) $row=mysql_fetch_array($result);
    while($dem<$somautin&&$row=mysql_fetch_array($result))
	{
	  $dem++;
	  $vt++;
	  $chude=$row["chude"];
	  $chitiet=str_replace("<br />","",$chitiet);
      $chitiet=str_replace("<BR>","",$chitiet);
	  $chitiet=$row["chitiet"];
	  $id=$row["id"];
?>
  <tr> 
    <td align='center' valign="top"><b><i><?php echo "$vt"?></i></b></td>
	<td valign="top" class="articleText"><?php echo $chude;?></td>
    <td valign="top" class="articleText"><?php echo $chitiet;?></td>	
    <td width="8%" valign="top"><div align="center"><a href='insert.php?id=<?php echo "$id"?>&cn=1'>S&#7917;a &#273;&#7893;i</a></div></td>
    <td width="12%" valign="top">
	<form method="post" name="frm" action="delete.php?id=<?php echo"$id"?>"></form>
	<div align="center"><a href=# onClick="doDel()">X&#243;a b&#7887;</a></div></td>
  </tr>
  <script language="javascript">
  function doDel()
  {
    if (confirm("Do you want to delete it now?")) frm.submit();
  }
  </script>
  <?php
	}
	echo "<tr><td colspan='7' align='center'>";
	if($vtnho>0)
	{
?>
  <a href='javascript:history.go(-1)'>Tr&#7903; v&#7873;</a> 
  <?php
	}
	$page=round($vt/$somautin);
	$pagesum=round($count/$somautin);
?>
  [<?php echo "$page/$pagesum";?>] 
  <?php
	if(mysql_fetch_array($result))
	{
?>
  <a href='admin.php?id=<? echo $id_tour; ?>&vt=<?php echo "$vt";?>'>Ti&#7871;p t&#7909;c</a> 
  <?php
	}
?></td></tr>
</table>
<?php
  }  
?>
</body>
</html>
<?php
  mysql_close($link);
?>