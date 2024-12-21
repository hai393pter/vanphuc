<?php 
  require_once("connect.php");
  echo $id=$_GET["id"];
  echo $trangthai=$_GET["trangthai"];
  $sql="update tinbai set tieudiem=$trangthai where id_tin=$id";
  mysql_query($sql);
?>
