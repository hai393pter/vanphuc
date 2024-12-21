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
<?php  
  $cn=$HTTP_GET_VARS{"cn"};  
  $chude=$HTTP_POST_VARS{"chude"};
  $chitiet=$HTTP_POST_VARS{"Body"};
  $chitiet=str_replace("<DIV>","",$chitiet);
  $chitiet=str_replace("</DIV>","",$chitiet);
  $chitiet=str_replace("<div>","",$chitiet);
  $chitiet=str_replace("</div>","",$chitiet);
  $chitiet=str_replace("<br />","",$chitiet);
  $chitiet=str_replace("<BR>","",$chitiet);
  require_once "connect.php";
  if($cn=="1")
  {
    $id=$HTTP_GET_VARS{"id"};
    $sql="update hoangle_thongtin set chude='$chude',chitiet='$chitiet',thoigian=now()";
	$sql.=" where id=$id";
  }else{   
    $sql="insert into hoangle_thongtin(chude,chitiet,thoigian) values('$chude','$chitiet',now())";
  }
  mysql_query($sql,$link);  
  mysql_close($link);
?>
<form action="admin.php" name="frm">
</form>
<script language="JavaScript">
frm.submit();
</script>