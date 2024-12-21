<?php   
  require("../connect.php");
  @session_start(); 
  $sess=$_SESSION["sess"];
  if (version_compare(phpversion(), "4.1.0") == -1)
    $postArray = &$HTTP_POST_VARS;
  else
    $postArray = &$_POST;
  foreach($postArray as $sForm=>$value)
  {
    $postedValue = htmlspecialchars(stripslashes($value));	
	$sql="update giohang set soluong=$postedValue where id=$sForm";
	mysql_query($sql);
  }
  echo "<script language='javascript'>window.location='../index.php?page=shoppingcart'</script>";
?>