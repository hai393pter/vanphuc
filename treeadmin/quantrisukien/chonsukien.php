<?php
  require_once("../connect.php"); 
  $id_tin=$_GET["tin"];
  $id_sukien=$_GET["sukien"];
  $cn=$_GET["cn"];
  if($cn=="true") $sql="insert into tin_sukien(id_sukien,id_tin) values($id_sukien,$id_tin)";
  else $sql="delete from tin_sukien where id_sukien=$id_sukien and id_tin=$id_tin";
  mysql_query($sql);
  echo "<script language='javascript'>parent.parent.treeframe.location='../treeuser.php';</script>";
?>