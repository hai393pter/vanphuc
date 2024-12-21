<?php
  session_start();  
  if(!isset($_SESSION['userhoangle']))
  {
?>
<form action="login.php" name="frm"></form>
<script language="JavaScript">frm.submit();</script>
<?php 
  }
?>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<?php require "editorhead.php";?>
</head>

<body onbeforeunload="SaveMsg();">
<?php  
    $cn=$HTTP_GET_VARS{"cn"};
    if($cn=="1")
	{
	  $id=$HTTP_GET_VARS{"id"};
  	  echo "<div colspan=4 align=center><b>S&#7916;A TH&#212;NG TIN: $id</b></div>";	  
      require_once "connect.php";
      $sql="select * from hoangle_thongtin where id=$id";
      $result=mysql_query($sql,$link);
	  $row=mysql_fetch_array($result);
	  $chude=$row["chude"];
	  $chitiet=$row["chitiet"];
	}
	else 
	  echo "<div colspan=4 align=center><b>TH&#202;M TH&#212;NG TIN M&#7898;I</b></div>";
  ?>
<p align="center"><a href='admin.php'>Xem th&#244;ng tin</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='popup.php'>Qu&#7843;n tr&#7883; popup</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='changeAdmin.php'>Thay &#273;&#7893;i t&#234;n s&#7917; d&#7909;ng v&#224; m&#7853;t kh&#7849;u </a>&nbsp;&nbsp;||&nbsp;&nbsp;<a href='login.php?cn=1'>H&#7911;y b&#7887; qu&#7843;n tr&#7883;</a> </p>
<?php require "upload.php";?>  
</body>
</html>