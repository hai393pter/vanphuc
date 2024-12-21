<?php
  require("../connect.php");
  if(isset($_GET["iddel"]))
  {
    $id=$_GET["iddel"];
    $sql="delete from giohang where id=$id";
	mysql_query($sql);
  }else{
    @session_start();	
    $sess=$_SESSION["sess"];
    $sql="delete from giohang where sess='$sess'";
	mysql_query($sql);
	$sql="delete from thongtinkhachhang where sess='$sess'";
	mysql_query($sql);
	unset($_SESSION["nhapthongtin"]);
	unset($_SESSION["sess"]);
  }  
  echo "<script language='javascript'>window.location='../index.php?page=shoppingcart';</script>";
?>
